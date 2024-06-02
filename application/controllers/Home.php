<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == TRUE) {
			session_start();
			$url =  base_url('beranda');
			redirect($url);
		}
		$this->load->model('auth');
		$this->auth->cek_login();
		$this->load->model(array('home_model', 'beranda_model', 'testimonial_model', 'product_model', 'blog_model'));
		$this->load->library(array('pagination', 'session'));
	}


	public function index()
	{

		$data['testimonial_customer'] = $this->home_model->get_limittestimonial();
		$data['products'] 			  = $this->product_model->get_produk();
		$data['review'] 			  = $this->product_model->getReviews();
		$data['banner']  			  = $this->product_model->getbanner();
		$data['blog'] 				  = $this->blog_model->getArticle();
		$this->load->view('page/front_end_new/home', $data);
		$this->load->view('page/icons_wa/icon_wa.htm');
	}



	public function searchProduct()
	{
		$this->load->model('product_model');
		$keyword 		= $this->input->get('q');
		$search 		= $this->product_model->ambil_data($keyword);
		$search = array(
			'q'			=> $keyword,
			'data'		=> $search
		);
		$this->load->view('page/front_end_new/resultproducts', $search);
	}


	function get_tests()
	{
		$data = array(
			'products' => $this->product_model->dapat_Product()
		);
		$this->load->view('page/home', $data);
	}


	function alltestimonial()
	{

		$config = array();
		$config["base_url"] = base_url() . "home/alltestimonial";
		$config["total_rows"] = $this->testimonial_model->record_count();
		$config["per_page"] = 6; // Number of items per page
		$config["uri_segment"] = 3;

		// Bootstrap styles for pagination
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$username = $this->session->userdata('username');
		$data['customers'] = $this->beranda_model->get_customer($username);
		$data["links"] = $this->pagination->create_links();
		$data['testimonial_customer'] = $this->testimonial_model->get_alltestimonial($config["per_page"], $page);
		$this->load->view('page/front_end_new/show_testimonial', $data);
	}


	function sendemail()
	{
		$id_subs 		= $this->input->post('id_subs');
		$nama_customer 	= $this->input->post('nama_customer');
		$email 			= $this->input->post('email');


		$this->home_model->send_email(
			$id_subs,
			$nama_customer,
			$email

		);
		redirect('home');
	}
}
