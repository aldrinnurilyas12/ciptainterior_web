<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_product extends CI_Controller
{


	function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');
	}

	public function index()
	{
		$this->load->model('product_model');
		$keyword 	= $this->input->get('keyword');
		$data 		= $this->product_model->ambil_data($keyword);
		$data = array(
			'keyword'	=> $keyword,
			'data'		=> $data
		);
		$this->load->view('beranda', $data);
	}
}
