<?php

class Beranda_model extends CI_Model
{

    function get_customer($username)
    {
        $user_data = $this->db->query("SELECT cst.id_customer, cst.nama_lengkap, cst.alamat, 
        cst.email, cst.telepon, cst.username, cst.image, cst.register_date, csp.create_at, cst.update_at
        FROM customer as cst
        LEFT JOIN customers_password as csp
        ON cst.register_id = csp.register_id
        WHERE username='$username';");
        return $user_data;
    }
    function cek_login()
    {
        if ($this->session->userdata('online')) {
        }
    }

    function get_foto($username)
    {
        $foto = $this->db->query("SELECT image FROM customer WHERE username='$username'");
        return $foto;
    }
}
