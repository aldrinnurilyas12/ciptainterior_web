<?php

class Pemesanan_products extends CI_Model
{

    function get_payment()
    {

        $id_customer = $this->session->userdata['id_customer'];
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id_customer', $id_customer);
        $query = $this->db->get();
        return $query->result();
    }

    function get_id_customer($id_customer)
    {
        $query = $this->db->get_where('id_customer', array('id_customer' => $id_customer));
        return $query;
    }
}
