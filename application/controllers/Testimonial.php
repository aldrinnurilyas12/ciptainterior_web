<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimonial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('testimonial_model', 'beranda_model', 'home_model', 'user_model'));
        $this->load->library('pagination');
    }

    public function index()
    {

        $username = $this->session->userdata('username');
        $data['customers'] = $this->beranda_model->get_customer($username);
        // $data['testimonial'] = $this->testimonial_model->get_testi();
        $this->load->view('page/testimonial', $data);
    }

    function get_payment()
    {
        $id_payment = $this->input->post('id_payment');
        $data = $this->testimonial_model->idpayment($id_payment);
        echo json_encode($data);
    }



    function send_testimonial()
    {
        $id_customer = strip_tags($this->input->post('id_customer'));
        $id_payment = strip_tags($this->input->post('id_payment'));
        $nama_produk = strip_tags($this->input->post('nama_produk'));
        $nm_customer = strip_tags($this->input->post('nm_customer'));
        $rating      =  strip_tags($this->input->post('rating'));
        $pesan_testimonial = strip_tags($this->input->post('pesan_testimonial'));

        $data = array(
            'id_customer' => $id_customer,
            'id_payment' => $id_payment,
            'nama_produk' => $nama_produk,
            'nm_customer' => $nm_customer,
            'rating'       => $rating,
            'pesan_testimonial' => $pesan_testimonial


        );
        $this->db->insert('testimonial_customer', $data);
        redirect('beranda#testimonial');
    }

    function delete()
    {
        $id_testimonial = $this->uri->segment(3);
        $this->testimonial_model->delete($id_testimonial);
        redirect('testimonial');
    }


    function alltestimonial()
    {
        $config = array();
        $config["base_url"] = base_url() . "testimonial/alltestimonial";
        $config["total_rows"] = $this->testimonial_model->record_count();
        $config["per_page"] = 6; // Number of items per page
        $config["uri_segment"] = 3;

        // Bootstrap styles for pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $username = $this->session->userdata('username');
        $id_customer = $this->session->userdata('id_customer');
        $data['customers'] = $this->beranda_model->get_customer($username);
        $data["links"] = $this->pagination->create_links();
        $data['testimonial_customer'] = $this->testimonial_model->get_alltestimonial($config["per_page"], $page);
        $data['notification']              = $this->user_model->user_notifications($id_customer);
        $data['image']     = $this->beranda_model->get_foto($username);
        $this->load->view('page/front_end_new/navbar', $data);
        $this->load->view('page/front_end_new/show_testimonial', $data);
    }
}
