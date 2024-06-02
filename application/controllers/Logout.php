<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function exit()
    {
        $this->session->sess_destroy();
        session_unset();
        echo '<script>alert("Anda Telah Keluar, Silahkan Login kembali");</script>';
        redirect('home', 'refresh');
    }
}