<?php

class Customer_model extends CI_Model
{
    function get_customer()
    {
        $result = $this->db->get('customer');
        return $result;
    }
}