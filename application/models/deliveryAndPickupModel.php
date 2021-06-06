<?php
class deliveryAndPickupModel extends CI_Model{


	public function viewDelivery()
	{
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_name = 'delivery' AND status <> ' Success'");
		return $query->result();
	}

    public function viewPickup()
	{
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status, dandp.date, dandp.time
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_name = 'pickup' AND status <> ' Success'");
		return $query->result();
	}

    public function rejectRequest($serv_ID)
    {
        $query=$this->db->query("DELETE FROM deliveryandpickup
                                WHERE serv_ID = '$serv_ID'");
		return $query;
    }

    public function acceptRequest($serv_ID)
    {
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_ID = '$serv_ID'");
        return $query->result();
    }

    public function updateCustService($serv_ID, $status)
    {
        $query=$this->db->query("UPDATE deliveryandpickup
                                SET status = ' $status'
                                WHERE serv_ID = '$serv_ID'");
        return $query;
    }

}
