<?php
class Registration_model extends CI_Model{

	var $account = 'account';
	var $customer = 'customer';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//checks if email already exists during registration
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

	//to add new customer into database
	public function addNewUser($accInfo, $userInfo, $level)
	{
		if($level == 'customer'){
			$this->db->insert($this->account, $accInfo);
			$id = $this->db->insert_id();

			$id = array('cus_ID'=>$id);
			$userInfo = $id + $userInfo;
			$this->db->insert($this->customer, $userInfo);
		}

		return $this->db->insert_id();

	}
}