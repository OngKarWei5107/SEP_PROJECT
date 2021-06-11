<?php
class customerRequestModel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    /*Display*/
	function viewRequest()
	{
	$query=$this->db->query("select * from request where username='".$this->session->userdata('username')."'");

	return $query->result();
	}

	function displayRequest($username)
	{
	$query=$this->db->query("select * from request where username='".$this->session->userdata('username')."'");
	return $query->result();
	}
	function addRequest($data)
		{
	        $this->db->insert('request',$data);
	        return true;
		}
	/*Update*/
	function editRequest($username,$type,$brand,$symptom,$message)
	{
	$query=$this->db->query("update request SET type='$type',brand='$brand',symptom='$symptom',message='$message' where username='".$this->session->userdata('username')."'");
	}
	
	function viewCustInfo()
	{
	$query=$this->db->get("request");
	return $query->result();
	}

	

	}
