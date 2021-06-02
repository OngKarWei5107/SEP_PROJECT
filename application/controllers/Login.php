<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model','login');
	}

	function index(){
		$data['meta_title'] = 'Login';
		$data['content_heading'] = 'Log in to Your Account';
		$data['meta_keywords'] = 'home_meta_keywords';
		$this->load->view('Manage Registration/login_view', $data);
	}

	function auth(){
		$email    = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		$result = $this->login->login($email, $password);

		if(!$this->login->isExistingEmail($email)){
			echo $this->session->set_flashdata('login-error','Email does not exist, create a new account');
			redirect('login');
		}
		if(count($result) > 0)
		{
			foreach ($result as $res)
			{
				$sessionArray = array('id'=>$res->user_id,
					'username'=>$res->user_name,
					'email'=>$res->user_email,
					'level'=>$res->accType,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sessionArray);
				// access login for customer
				if($res->user_level === 'customer'){
					redirect('page');

				// access login for staff
				}elseif($res->user_level === 'staff'){
					redirect('page');

				// access login for rider
				}else{
					redirect('page');
				}
			}
		}else{
			echo $this->session->set_flashdata('login-error','Incorrect email or password.');
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
