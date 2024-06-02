<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historypembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('pembayaran_model');
        $this->load->model('auth');
        $this->auth->cek_login();
        $this->load->model('home_model');
    }

    function index()
    {

        $data['pembayaran'] = $this->historypembayaran_model->get_historipembayaran();
        $this->load->view('page/pembayaran', $data);
        $this->load->view('page/icons_wa/icon_wa.htm');
    }
}
