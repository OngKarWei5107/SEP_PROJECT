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

<<<<<<< HEAD
	//display request using session data
=======
>>>>>>> 9456435aa45d5df06a4d69e53500f05732c26fd7
	function displayRequest($username)
	{
	$query=$this->db->query("select * from request where username='".$this->session->userdata('username')."'");
	return $query->result();
	}
<<<<<<< HEAD

	//add data
=======
>>>>>>> 9456435aa45d5df06a4d69e53500f05732c26fd7
	function addRequest($data)
		{
	        $this->db->insert('request',$data);
	        return true;
		}
<<<<<<< HEAD

	//edit and update data
=======
	/*Update*/
>>>>>>> 9456435aa45d5df06a4d69e53500f05732c26fd7
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
