<?php  
class paymentController extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	/*load Model*/
	$this->load->model('paymentModel');
	}
	
	public function viewPayment()
	{
	$username = $this->session->userdata('username');
	$this->load->model("paymentModel");
	$result['data']=$this->paymentModel->viewPayment();
	$this->load->view('paymentView/paymentStatus',$result);
	
	}
	
		/*Check submit button */
		if($this->input->post('save'))
		{
			$data['username']=$this->session->userdata('username');
		    $data['type']=$this->input->post('type');
			$data['brand']=$this->input->post('brand');
			$data['symptom']=$this->input->post('symptom');
			$data['message']=$this->input->post('message');
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
		
	}
	
	
	
	public function viewPaymentInfo()
	{
	$username = $this->session->userdata('username');
	$this->load->model("paymentModel");
	$result['data']=$this->paymenttModel->paymentInfo();
	$this->load->view('paymentView/paymentInfo',$result);
	}
	
}
