<?php
class deliveryAndPickupModel extends CI_Model{

    //retreive customer delivery list
	public function viewDelivery()
	{
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_name = 'delivery' AND status <> ' Success'");
		return $query->result();
	}

    //retreive customer pickup list
    public function viewPickup()
	{
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status, dandp.date, dandp.time
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_name = 'pickup' AND status <> ' Success'");
		return $query->result();
	}

    //delete customer service
    public function rejectRequest($serv_ID)
    {
        $query=$this->db->query("DELETE FROM deliveryandpickup
                                WHERE serv_ID = '$serv_ID'");
		return $query;
    }

    //retrieve the accepted the customer request service
    public function acceptRequest($serv_ID)
    {
        $query=$this->db->query("SELECT cust.custName, cust.address, cust.phone, dandp.serv_ID, dandp.status
                                FROM deliveryandpickup dandp INNER JOIN customer cust
                                ON dandp.cust_id = cust.custID 
                                WHERE serv_ID = '$serv_ID'");
        return $query->result();
    }

    //update the status of the service
    public function updateCustService($serv_ID, $status)
    {
        $query=$this->db->query("UPDATE deliveryandpickup
                                SET status = ' $status'
                                WHERE serv_ID = '$serv_ID'");
        return $query;
    }

    //retireve the status progress of delivery and pickup service
    public function viewProgress($user)
	{
        $query=$this->db->query("SELECT rd.rider_platNo, rd.rider_contact, dandp.serv_ID, cust.username, dandp.status, dandp.serv_name
                                FROM deliveryandpickup dandp 
                                INNER JOIN rider rd ON dandp.rider_ID = rd.rider_ID
                                INNER JOIN customer cust ON dandp.cust_id = cust.custID
                                WHERE cust.username = '$user'");
		return $query->result();
	}

}
