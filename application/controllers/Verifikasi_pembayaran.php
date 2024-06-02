<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Verifikasi_pembayaran extends CI_Controller
{




    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_products');
        $this->load->model('auth');
        $this->auth->cek_login();
    }


    public function index()
    {
        $data['orders'] = $this->Pemesanan_products->get_payment();
        $this->load->view('page/verifikasi_pembayaran', $data);
    }
}
