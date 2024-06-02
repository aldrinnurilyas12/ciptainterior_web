<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_admin');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('page/loginadmin');
    }


    public function login_proccess()
    {
        $username = $this->input->post('user');
        $password = $this->input->post('password');
        if ($this->auth_admin->login_admin($username, $password)) {
            $userAdmin = array(
                'user' => $username,
                'password' => $password,
                'is_login_admin' => true
            );
            $this->session->set_userdata($userAdmin);
            $this->session->set_flashdata('sukses_login', 'Anda berhasil login');
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('gagal_login', 'Nama pengguna atau Kata sandi salah');
            redirect('loginadmin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_unset();
        echo '<script>alert("Anda Telah Keluar, Silahkan Login kembali");</script>';
        redirect('loginadmin', 'refresh');
    }
}
