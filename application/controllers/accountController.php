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
	$username = $this->session->userdata('username');
	$this->load->model("accountModel");
	$result['data']=$this->accountModel->viewAccount();
	$this->load->view('accountView/viewAccount',$result);
	
	}

	public function updatedata()
	{
	$username = $this->session->userdata('username');
	$result['data']=$this->accountModel->displayAccountById();
	$this->load->view('accountView/updateInfo',$result);

	
		if($this->input->post('update'))
		{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		
		$this->accountModel->updateAccount($username,$password,$phone,$address,$email);
		echo "Data updated successfully !";
		redirect('accountController/dispdata');
		}
	}

	public function viewAccount()
	{
	$this->load->model("accountModel");
	$result['data']=$this->accountModel->staffViewAccount();
	$this->load->view('accountView/manageAccount',$result);
	}

	public function staffUpdateAccount()
	{
	$custID=$this->input->get('custID');
	$result['data']=$this->accountModel->displayAccount($custID);
	$this->load->view('accountView/editAccount',$result);

	
		if($this->input->post('update'))
		{
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		$ban=$this->input->post('ban');
		
		$this->accountModel->staffUpdateAccount($username,$phone,$address,$email,$ban,$custID);
		echo "Account edited successfully !";
		redirect('accountController/viewAccount');
		}
	}

	public function deletedata()
	{
  	$custID=$this->input->get('custID');
  	$response=$this->accountModel->deleteAccount($custID);
  		if($response==true){
  			echo '<script language="javascript">' .
     		'alert("Data had been deleted");' .
     		'setTimeout(function(){ window.location.href = "viewAccount"; }, 300);' .
     		'</script>';
		}
  		else{
  			echo '<script language="javascript">' .
     		'alert("Error!");' .
     		'setTimeout(function(){ window.location.href = "viewAccount"; }, 300);' .
     		'</script>';
  		}
	}

	public function banAccount()
	{
  	$custID=$this->input->get('custID');
  	$response=$this->accountModel->banAccount($custID);
  		if($response==true){
  			echo '<script language="javascript">' .
     		'alert("Account had been banned successfully");' .
     		'setTimeout(function(){ window.location.href = "viewAccount"; }, 300);' .
     		'</script>';
    		
		}
  		else{
    		echo '<script language="javascript">' .
     		'alert("Account Already Banned");' .
     		'setTimeout(function(){ window.location.href = "viewAccount"; }, 300);' .
     		'</script>';
    		
  		}
	}
}
?>