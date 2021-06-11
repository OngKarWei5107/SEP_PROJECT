<?php
class accountModel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  //retreive data according to the session data
	function viewAccount()
	{
	$query=$this->db->query("select * from customer where username='".$this->session->userdata('username')."'");

	return $query->result();
	}

	//display using session data
  function displayAccountByUsername()
	{
	$query=$this->db->query("select * from customer where username='".$this->session->userdata('username')."'");
	return $query->result();
	}

	//Update 
	function updateAccount($username,$password,$phone,$address,$email)
	{
	$query=$this->db->query("update customer SET username='$username',password='$password',phone='$phone',address='$address',email='$email' where username='".$this->session->userdata('username')."'");
	}

	//retreive the data from customer table
	function viewCustAccount()
	{
	$query=$this->db->get("customer");
	return $query->result();
	}

	//retreive the data according to the custID
	function displayAccount($custID)
	{
	$query=$this->db->query("select * from customer where custID='$custID'");
	return $query->result();
	}

	//update the data and save to the table
	function editAccount($username,$phone,$address,$email,$ban, $custID)
	{
	$query=$this->db->query("update customer SET username='$username',phone='$phone',address='$address',email='$email' ,ban='$ban' where custID='$custID'");
	}

	//delete data
	function deleteAccount($custID)
  {
    $this->db->where("custID", $custID);
    $this->db->delete("customer");
    return true;
  }

  //change the ban status 
  function banAccount($custID)
  {
    
    $this->db->where("custID", $custID);
    $this->db->query("update customer SET ban='1' where custID='$custID'");
    return true;
  }
}