
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balastestimonial extends CI_Controller
{




    function __construct()
    {
        parent::__construct();
        $this->load->model('testimonial_model');
        $this->load->library('upload');
    }
    public function index()

    {
        $this->load->view('template/sidebar');
        $this->load->view('page/balastestimonial');
    }



    function ubah()
    {


        $id_testimonial = strip_tags($this->input->post('id_testimonial'));
        $nm_customer = strip_tags($this->input->post('nm_customer'));
        $rating = strip_tags($this->input->post('rating'));
        $pesan_testimonial = strip_tags($this->input->post('pesan_testimonial'));
        $balasan = strip_tags($this->input->post('balasan'));
        $this->testimonial_model->balasantestimonial($id_testimonial, $nm_customer, $rating, $pesan_testimonial, $balasan);
        redirect('datatestimonial');
    }
    function balasan($id_testimonial)

    {


        $id_keluhan = $this->uri->segment(3);
        $result = $this->testimonial_model->geting_id_testimonial($id_keluhan);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_testimonial'    => $i['id_testimonial'],
                'nm_customer'  => $i['nm_customer'],
                'rating'  => $i['rating'],
                'pesan_testimonial'     => $i['pesan_testimonial'],
                'balasan'    => $i['balasan']




            );

            $this->load->view('page/balastestimonial', $data);
        } else {
            echo "Data Was Not Found";
        }
    }
}
