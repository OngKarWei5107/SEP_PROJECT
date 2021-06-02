<?php
class accountModel extends CI_Model 
{
    /*Display*/
	function viewAccount()
	{
	$query=$this->db->query("select * from customer");
	return $query->result();
	}

    function displayAccountById($custID)
	{
	$query=$this->db->query("select * from form where custID='".$custID.”’”);
	return $query->result();
	}

	/*Update*/
	function update_records($username,$password,$phone,$address,$email,$custID)
	{
	$query=$this->db->query("update form SET username='$username',password='$password',phone='$phone',address='$address',email='$email' where custID='$custID’”);
	}
	
}