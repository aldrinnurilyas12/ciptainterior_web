<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datapengiriman extends CI_Controller
{
    function __construct()

    {
        parent::__construct();
        $this->load->model('lappengiriman_model');
        $this->load->helper('url');
    }



    public function index()

    {

        $data['laporan_pengiriman'] = $this->lappengiriman_model->get_pengiriman();
        $this->load->view('page/datapengiriman', $data);
        $this->load->view('template/sidebar');
    }
}