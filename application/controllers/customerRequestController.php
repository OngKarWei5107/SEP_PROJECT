<?php  
class customerRequestController extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	/*load Model*/
	$this->load->model('customerRequestModel');
	}
	
	public function viewRequest()
	{
	$username = $this->session->userdata('username');
	$this->load->model("customerRequestModel");
	$result['data']=$this->customerRequestModel->viewRequest();
	$this->load->view('customerRequestView/viewRequest',$result);
	
	}
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('insert');
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['first_name']=$this->input->post('first_name');
			$data['last_name']=$this->input->post('last_name');
			$data['email']=$this->input->post('email');
			$response=$this->customerRequestModel->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
		
	}
	
	public function updatedata()
	{
	$username = $this->session->userdata('username');
	$result['data']=$this->customerRequestModel->displayrecordsById($id);
	$this->load->view('editRequest',$result);
	
		if($this->input->post('update'))
		{
		$first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		$this->customerRequestModel->editRequest($first_name,$last_name,$email,$id);
		echo "Date updated successfully !”;
		}
	}
	
	public function viewCustInfo()
	{
	$username = $this->session->userdata('username');
	$this->load->model("customerRequestModel");
	$result['data']=$this->customerRequestModel->viewCustInfo();
	$this->load->view('customerRequestView/viewCustInfo',$result);
	}
	
}
