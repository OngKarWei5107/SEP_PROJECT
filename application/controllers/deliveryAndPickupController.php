<?php
class deliveryAndPickupController extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->database();
		$this->load->model('deliveryAndPickupModel');
	}

    //to display the all customer delivery service
	function viewCustDelivery(){
        $data['customerList']=$this->deliveryAndPickupModel->viewDelivery();
        $this->load->view('deliveryAndPickupView/delivery', $data);
	}

    //to display the all customer pickup service
	function viewCustPickup(){
        $data['customerList']=$this->deliveryAndPickupModel->viewPickup();
        $this->load->view('deliveryAndPickupView/pickup', $data);
	}


    //to reject the service
    function rejectServRequest(){
        $serv_ID=$this->uri->segment(3);
        echo $this->router->fetch_method();
        if ($this->deliveryAndPickupModel->rejectRequest($serv_ID)) {
            echo "<script>alert('Successfully rejected');window.location.href='".site_url('page/rider')."';</script>";
        }
        else
        {
            echo "<script>alert('Something when wrong');window.location.href='".site_url('page/rider')."';</script>";
        }

	}

    //to accept the service
    function acceptServRequest(){
        $serv_ID=$this->uri->segment(3);
        $data['result']=$this->deliveryAndPickupModel->acceptRequest($serv_ID);
        $this->load->view('deliveryAndPickupView/customerInfo', $data);
    }

    //to update the service status
    function updateStatus(){
        $serv_ID=$this->uri->segment(3);
        $status=$this->input->post('status');
        if ($this->deliveryAndPickupModel->updateCustService($serv_ID, $status)) {
            echo "<script>alert('Successfully Updated');window.location.href='".site_url('deliveryAndPickupController/acceptServRequest/'.$serv_ID.'')."';</script>";
        }
        else
        {
            echo "<script>alert('Something when wrong');window.location.href='".site_url('deliveryAndPickupController/acceptServRequest/'.$serv_ID.'')."';</script>";
        }
    }
    

	
}