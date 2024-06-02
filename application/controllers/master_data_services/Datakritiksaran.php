<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datakritiksaran extends CI_Controller
{



    function __construct()

    {
        parent::__construct();
        $this->load->model('kritik_model');
        $this->load->helper('url');
    }



    public function index()
    {
        $data['kritik_saran'] = $this->kritik_model->get_kritiksaran();
        $this->load->view('page/datakritiksaran', $data);
        $this->load->view('template/sidebar');
    }
}