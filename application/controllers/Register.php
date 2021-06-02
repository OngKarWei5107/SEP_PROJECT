<?php
class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('registration_model','register');
	}

	function index(){
		$data['meta_title'] = 'Registration';
		$data['content_heading'] = 'Registration';
		$this->load->view('Manage Registration/register_customer_view', $data);
	}

	//to register new customers
	public function registerCust()
	{
		$this->_validate_cust_reg();

		$name = ucwords(strtolower($this->input->post('name')));
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = 'customer';
		$contact_no = $this->input->post('contact_no');
		$address = $this->input->post('address');

		$accountInfo = array(
			'accType' => $level,
			'email' => $email,
			'password' => $password,
		);

		$userInfo = array(
			'cus_name' => $name,
			'cus_contact' => $contact_no,
			'cus_address' => $address,
		);

		$insert = $this->register->addNewUser($accountInfo, $userInfo, $level);

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

		if ($this->register->isExistingEmail($email)){
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