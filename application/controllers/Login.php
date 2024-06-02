<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('page/login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->auth->login_user($username, $password)) {
            $userData = array(
                'username' => $username,
                'password' => $password,
                'is_login' => true
            );
            $this->session->set_userdata($userData);
            $this->session->set_flashdata('sukses_login', 'Anda berhasil login');
            redirect('beranda');
        } else {
            $this->session->set_flashdata('gagal_login', 'Nama pengguna atau Kata sandi salah');
            redirect('login');
        }
    }
}
