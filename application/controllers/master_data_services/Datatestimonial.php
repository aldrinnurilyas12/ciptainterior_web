<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datatestimonial extends CI_Controller
{
    function __construct()

    {
        parent::__construct();
        $this->load->model('data_testimonial');
        $this->load->helper('url');
    }



    public function index()
    {
        $data['testimonial_customer'] = $this->data_testimonial->get_testimonial();
        $this->load->view('page/data_services/datatestimonial', $data);
        $this->load->view('template/sidebar');
    }
    function delete()
    {
        $id_testimonial = $this->uri->segment(3);
        $this->data_testimonial->delete($id_testimonial);
        redirect('datatestimonial');
    }
}
