<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function customer(){
    //Allowing access to customer only
      if($this->session->userdata('level')==='customer'){
          $this->load->view('customerView');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing access to staff only
    if($this->session->userdata('level')==='staff'){
      $this->load->view('staffView');
    }else{
        echo "Access Denied";
    }
  }
 
  function rider(){
    //Allowing access to rider only
    if($this->session->userdata('level')==='rider'){
      $this->load->view('riderView');
    }else{
        echo "Access Denied";
    }
  }
 
}