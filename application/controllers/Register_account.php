<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_account extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('page/register');
    }

    function regaccount_process()
    {
        //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path']      = './profile_picture/'; //path folder
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|JPG|JPEG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = '10000'; //maksimum besar file 2M

        $this->form_validation->set_rules('username', 'Username harus diisi', 'required');
        $this->form_validation->set_rules('password', 'Password harus diisi', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama harus diisi', 'required');
        $this->form_validation->set_rules('alamat', 'alamat harus diisi', 'required');
        $this->form_validation->set_rules('email', 'Email harus diisi', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon harus diisi', 'required');
        $this->upload->initialize($config);
        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/register');
        } else {
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    $profile_picture = $gbr['file_name'];
                    $username        = htmlspecialchars($this->input->post('username'));
                    $id_customer     = $this->input->post('id_customer');
                    $nama_lengkap    = htmlspecialchars($this->input->post('nama_lengkap'));
                    $alamat          = htmlspecialchars($this->input->post('alamat'));
                    $email           = htmlspecialchars($this->input->post('email'));
                    $telepon         = htmlspecialchars($this->input->post('telepon'));

                    $checking_username = $this->auth->get_username($username);
                    $cheking_email =  $this->auth->get_email($email);
                    if ($checking_username->num_rows() > 0) {
                        $this->session->set_flashdata('gagal_register', 'Username sudah digunakan coba lagi');
                        redirect('register_account');
                    } elseif ($cheking_email->num_rows() > 0) {
                        $this->session->set_flashdata('gagal_register', 'Email sudah digunakan coba lagi');
                        redirect('register_account');
                    } else {
                        $this->auth->register($username, $id_customer, $nama_lengkap, $alamat, $email, $telepon, $profile_picture);


                        $password        = htmlspecialchars($this->input->post('password'));
                        $this->auth->register_password($password);
                        $this->session->set_flashdata('sukses_register', 'Berhasil daftar akun');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Gagal upload foto');
                    redirect('register_account');
                }
            } else {
                $this->session->set_flashdata('error_message', 'Upload foto dahulu');
                redirect('register_account');
            }
        }
    }
}
