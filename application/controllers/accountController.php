<?php  
class accountController extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	/*load Model*/
	$this->load->model('accountModel');
	}
	//view account info
	public function viewAccount()
	{
	$username = $this->session->userdata('username');
	$this->load->model("accountModel");
	$result['data']=$this->accountModel->viewAccount();
	$this->load->view('accountView/viewAccount',$result);
	
	}
	//customer update account
	public function updateAccount()
	{
	$username = $this->session->userdata('username');
	$result['data']=$this->accountModel->displayAccountByUsername();//display according to session
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
		redirect('accountController/viewAccount');
		}
	}

	//allow staff to view customer account
	public function viewCustAccount()
	{
	$this->load->model("accountModel");
	$result['data']=$this->accountModel->viewCustAccount();
	$this->load->view('accountView/manageAccount',$result);
	}

	//staff edit certain account
	public function editAccount()
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
		
		$this->accountModel->editAccount($username,$phone,$address,$email,$ban,$custID);
		echo "Account edited successfully !";
		redirect('accountController/viewCustAccount');
		}
	}

	//staff delete certain account
	public function deleteAccount()
	{
  	$custID=$this->input->get('custID');
  	$response=$this->accountModel->deleteAccount($custID);
  		if($response==true){
  			echo '<script language="javascript">' .
     		'alert("Data had been deleted");' .
     		'setTimeout(function(){ window.location.href = "viewCustAccount"; }, 300);' .
     		'</script>';
		}
  		else{
  			echo '<script language="javascript">' .
     		'alert("Error!");' .
     		'setTimeout(function(){ window.location.href = "viewCustAccount"; }, 300);' .
     		'</script>';
  		}
	}
	
	//staff ban certain account
	public function banAccount()
	{
  	$custID=$this->input->get('custID');
  	$response=$this->accountModel->banAccount($custID);
  		if($response==true){
  			echo '<script language="javascript">' .
     		'alert("Account had been banned successfully");' .
     		'setTimeout(function(){ window.location.href = "viewCustAccount"; }, 300);' .
     		'</script>';
    		
		}
  		else{
    		echo '<script language="javascript">' .
     		'alert("Account Already Banned");' .
     		'setTimeout(function(){ window.location.href = "viewCustAccount"; }, 300);' .
     		'</script>';
    		
  		}
	}
}
?>