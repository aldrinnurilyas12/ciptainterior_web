<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login_admin') != TRUE) {
			session_start();
			$url =  base_url('loginadmin');
			redirect($url);
		}
		$this->load->model('auth_admin');
		$this->auth_admin->cek_login_admin();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->model('dashboard_model');
		$data['orders'] = $this->dashboard_model->get_data();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('page/dashboard', $data);
		$this->load->view('template/footer');
	}
}
