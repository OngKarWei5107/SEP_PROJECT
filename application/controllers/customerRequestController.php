<?php  
class customerRequestController extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('customerRequestModel');
	}
	
	//customer view request data
	public function viewRequest()
	{
	$username = $this->session->userdata('username');
	$this->load->model("customerRequestModel");
	$result['data']=$this->customerRequestModel->viewRequest();
	$this->load->view('customerRequestView/requestStatus',$result);
	
	}

	//customer add repair request
	public function addRequest()
	{
		/*load registration view form*/
		$username = $this->session->userdata('username');
		$this->load->view('customerRequestView/addRequest');
	
		//save entry
		if($this->input->post('save'))
		{
			$data['username']=$this->session->userdata('username');
		    $data['type']=$this->input->post('type');
			$data['brand']=$this->input->post('brand');
			$data['symptom']=$this->input->post('symptom');
			$data['message']=$this->input->post('message');
			$response=$this->customerRequestModel->addRequest($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
		
	}

	//customer edit and update repair request

	public function editRequest()
	{
	$username = $this->session->userdata('username');
	$result['data']=$this->customerRequestModel->displayRequest($username);
	$this->load->view('customerRequestView/editRequest',$result);
	
		if($this->input->post('update'))
		{
		$username=$this->session->userdata('username');
		$type=$this->input->post('type');
		$brand=$this->input->post('brand');
		$symptom=$this->input->post('symptom');
		$message=$this->input->post('message');
		$this->customerRequestModel->editRequest($username,$type,$brand,$symptom,$message);
		echo "Date updated successfully !";
		}
	}
	//allow customer to view their info
	public function viewCustInfo()
	{
	$username = $this->session->userdata('username');
	$this->load->model("customerRequestModel");
	$result['data']=$this->customerRequestModel->viewCustInfo();
	$this->load->view('customerRequestView/viewCustInfo',$result);
	}
	
}
