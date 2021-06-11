<?php
class customerRequestModel extends CI_Model 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
		parent::__construct();
		//load database libray manually
		$this->load->database();
	}

    //retrieve request data according to the session data
	function viewRequest()
	{
	$query=$this->db->query("select * from request where username='".$this->session->userdata('username')."'");

	return $query->result();
	}

	//display request using session data
	function displayRequest($username)
	{
	$query=$this->db->query("select * from request where username='".$this->session->userdata('username')."'");
	return $query->result();
	}


	//add data
	function addRequest($data)
		{
	        $this->db->insert('request',$data);
	        return true;
		}


	//edit and update data

	/*Update*/
	function editRequest($username,$type,$brand,$symptom,$message)
	{
	$query=$this->db->query("update request SET type='$type',brand='$brand',symptom='$symptom',message='$message' where username='".$this->session->userdata('username')."'");
	}
	
	//view customer data
	function viewCustInfo()
	{
	$query=$this->db->get("request");
	return $query->result();
	}

	

	}
