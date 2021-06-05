<?php
class accountModel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    /*Display*/
	function viewAccount()
	{
	$query=$this->db->query("select * from customer where username='".$this->session->userdata('username')."'");

	return $query->result();
	}

    function displayAccountById()
	{
	$query=$this->db->query("select * from customer where username='".$this->session->userdata('username')."'");
	return $query->result();
	}

	/*Update*/
	function updateAccount($username,$password,$phone,$address,$email)
	{
	$query=$this->db->query("update customer SET username='$username',password='$password',phone='$phone',address='$address',email='$email' where username='".$this->session->userdata('username')."'");
	}
	
	function staffViewAccount()
	{
	$query=$this->db->get("customer");
	return $query->result();
	}

	function displayAccount($custID)
	{
	$query=$this->db->query("select * from customer where custID='$custID'");
	return $query->result();
	}

	function staffUpdateAccount($username,$phone,$address,$email,$ban, $custID)
	{
	$query=$this->db->query("update customer SET username='$username',phone='$phone',address='$address',email='$email' ,ban='$ban' where custID='$custID'");
	}
	
	function deleteAccount($custID)
  {
    $this->db->where("custID", $custID);
    $this->db->delete("customer");
    return true;
  }

  function banAccount($custID)
  {
    
    $this->db->where("custID", $custID);
    $this->db->query("update customer SET ban='1' where custID='$custID'");
    return true;
  }
}