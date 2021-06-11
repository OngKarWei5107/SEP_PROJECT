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
	$query=$this->db->query("select * from customer where username='".$this->session->userdata('username')."'");

	return $query->result();
	}

	/*Update*/
	function editRequest($type,$brand,$symptom,$message)
	{
	$query=$this->db->query("update request SET type='$type',brand='$brand',symptom='$symptom',message='$message' where username='".$this->session->userdata('username')."'");
	}
	
	function viewCustInfo()
	{
	$query=$this->db->get("customer");
	return $query->result();
	}

	function saverecords($data)
	{
        $this->db->insert('customer',$data);
        return true;
	}

	}
