<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datakeluhan extends CI_Controller
{



    function __construct()

    {
        parent::__construct();
        $this->load->model('keluhan_model');
        $this->load->helper('url');
    }



    public function index()
    {
        $data['keluhan_customer'] = $this->keluhan_model->get_keluhan();
        $this->load->view('page/datakeluhan', $data);
        $this->load->view('template/sidebar');
    }
    function delete()
    {
        $id_keluhan = $this->uri->segment(3);
        $this->keluhan_model->delete($id_keluhan);
        redirect('datakeluhan');
    }
}
