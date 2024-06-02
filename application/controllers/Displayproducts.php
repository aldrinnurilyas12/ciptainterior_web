<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Displayproducts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('beranda_model', 'home_model', 'product_model'));
        $this->load->library('pagination');
    }


    public function index()
    {
        $data['products'] = $this->product_model->get_produk();
        $username = $this->session->userdata('username');
        $data['customers'] = $this->beranda_model->get_customer($username);
        $this->load->view('page/front_end_new/navbar', $data);
        $this->load->view('page/front_end_new/show_products', $data);
    }

    function allproducts()
    {

        $config = array();
        $config["base_url"] = base_url() . "displayproducts/allproducts";
        $config["total_rows"] = $this->home_model->record_count();
        $config["per_page"] = 8; // Number of items per page
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
        $data['image'] = $this->beranda_model->get_foto($username);
        $data['customers'] = $this->beranda_model->get_customer($username);
        $data['links'] = $this->pagination->create_links();
        $data['products'] = $this->product_model->get_produk($config["per_page"], $page);
        $data['promo'] = $this->product_model->get_promo($config["per_page"], $page);
        $data['sofa'] = $this->product_model->get_sofa($config["per_page"], $page);
        $data['gordyn'] = $this->product_model->get_gordyn($config["per_page"], $page);
        $data['blind'] = $this->product_model->get_blind($config["per_page"], $page);
        $data['vinyls'] = $this->product_model->get_vinyls($config["per_page"], $page);
        $data['others'] = $this->product_model->get_others($config["per_page"], $page);
        $data['total_other'] = $this->product_model->total_lainnya();
        $data['total_sofa'] = $this->product_model->total_sofa();
        $data['total_gordyn'] = $this->product_model->total_gordyn();
        $data['total_vinyl'] = $this->product_model->total_vinyl();
        $data['total_promo'] = $this->product_model->total_promo();
        $data['total_blind'] = $this->product_model->total_blind();
        $data['total_produk'] = $this->product_model->total_produk();

        $this->load->view('page/front_end_new/show_products', $data);
    }
}
