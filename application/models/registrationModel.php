<?php
class registrationModel extends CI_Model{

	var $account = 'account';
	var $customer = 'customer';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//to validate email and password during login
	function login($email, $password)
	{
		$this->db->from($this->account);
		$this->db->where('email',$email);
		$query = $this->db->get();

		$user = $query->result();

		if(!empty($user)){
			if($password == $user[0]->password){
				// password matches email
				return $user;
			} else {
				// password does not match email
				return array();
			}
		} else {
			// email does not exist
			return array();
		}
	}

	//checks if email exists
	function isExistingEmail($email)
	{
		$this->db->from($this->account);
		$this->db->where('email',$email);
		$query = $this->db->get();

		$result = $query->result();

		if(!empty($result)){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function createAccount($accInfo, $userInfo, $level)
	{
		if($level == 'customer'){
			$this->db->insert($this->account, $accInfo);
			$id = $this->db->insert_id();

			$id = array('custID'=>$id);
			$userInfo = $id + $userInfo;
			$this->db->insert($this->customer, $userInfo);
		}

		return $this->db->insert_id();

	}

}
