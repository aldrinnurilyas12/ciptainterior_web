<?php

class Auth_admin extends CI_Model
{

    function cek_login_admin()
    {
        if ($this->session->userdata('is_login_admin')) {
        }
    }

    function login_admin($username, $password)
    {
        $query = $this->db->query("SELECT user, password, kategori_status 
        FROM admin_Login
        WHERE user='$username' AND password=md5('$password');");
        if ($query->num_rows() > 0) {
            $data_admin = $query->row();
            $this->session->set_userdata('user', $username);
            $this->session->set_userdata('kategori_status', $data_admin->kategori_status);
            $this->session->set_userdata('is_login_admin', TRUE);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
