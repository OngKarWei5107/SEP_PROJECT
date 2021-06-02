<?php  
class accountController extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('accountModel');
	}
	public function dispdata()
	{
	$result['data']=$this->accountModel->viewAccount();
	$this->load->view('viewAccount',$result);
	}
	public function updatedata()
	{
	$custID=$this->input->get('custID');
	$result['data']=$this->accountModel->displayAccountById($custID);
	$this->load->view('updateInfo',$result);
	
		if($this->input->post('update'))
		{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		$email=$this->input->post('email');
		$this->accountModel->updateAccount($username,$password,$phone,$address,$email,$custID);
		echo "Date updated successfully !”;
		}
	}
	
}
?>