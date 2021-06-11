<?php
class registrationController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('registrationModel','registrationController');
	}

	//to display registration form
	function index(){
		$data['meta_title'] = 'Registration';
		$data['content_heading'] = 'Registration';
		$this->load->view('registrationView/registerForm', $data);
	}

	//to display login form
	function loginForm(){
		$data['meta_title'] = 'Login';
		$data['content_heading'] = 'Log in to Your Account';
		$data['meta_keywords'] = 'home_meta_keywords';
		$this->load->view('registrationView/loginView', $data);
	}

	//to validate account login
	function auth(){
		$email    = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		$result = $this->registrationController->login($email, $password);

		if(!$this->registrationController->isExistingEmail($email)){
			echo $this->session->set_flashdata('login-error','Account does not exist');
			redirect('registrationController/loginForm');
		}
		if(count($result) > 0)
		{
			foreach ($result as $res)
			{
				$sessionArray = array('id'=>$res->accID,
					'username'=>$res->username,
					'email'=>$res->email,
					'level'=>$res->accType,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sessionArray);
				// access login for customer
				if($res->accType === 'customer'){
					redirect('page/customer');

				// access login for staff
				}elseif($res->accType === 'staff'){
					redirect('page/staff');

				// access login for rider
				}else{
					redirect('page/rider');

				}
			}
		}else{
			echo $this->session->set_flashdata('login-error','Incorrect email or password.');
			redirect('registrationController//loginForm');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('registrationController/loginForm');
	}

	//to register new customers
	public function signUp()
	{
		$this->_validate_cust_reg();

		$name = ucwords(strtolower($this->input->post('name')));
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = 'customer';
		$contact_no = $this->input->post('contact_no');
		$address = $this->input->post('address');


		$accountInfo = array(
			'accType' => $level,
			'username' => $username,
			'email' => $email,
			'password' => $password,
		);

		$userInfo = array(
			'custName' => $name,
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'phone' => $contact_no,
			'address' => $address,
		);

		$insert = $this->registrationController->createAccount($accountInfo, $userInfo, $level);

		echo $this->session->set_flashdata('msg','Registered new acc successfully!');

		echo json_encode(array("status" => TRUE));
	}


	//Validation for register_cust_view form
	private function _validate_cust_reg()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}

		//For email, check if empty, if follows valid format and if email exists in db
		$email = $this->input->post('email');

		if($email== '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Invalid email format';
			$data['status'] = FALSE;
		}

		if ($this->registrationController->isExistingEmail($email)){
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email already exists';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Address is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('contact_no') == '')
		{
			$data['inputerror'][] = 'contact_no';
			$data['error_string'][] = 'Contact no. is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}