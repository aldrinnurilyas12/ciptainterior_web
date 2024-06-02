<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datapelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login_admin') != TRUE) {
            session_start();
            $url =  base_url('loginadmin');
            redirect($url);
        }
        $this->load->model(array('auth_admin', 'customer_model'));
        $this->auth_admin->cek_login_admin();
        $this->load->library('session');
    }




    public function index()
    {
        $data['customer'] = $this->customer_model->get_customer();

        $this->load->view('page/data_services/datapelanggan', $data);
        $this->load->view('template/sidebar');
    }
}
