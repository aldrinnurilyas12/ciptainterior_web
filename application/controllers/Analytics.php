<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login_admin') != TRUE) {
            session_start();
            $url =  base_url('loginadmin');
            redirect($url);
        }
        $this->load->model(array('auth_admin', 'analytics_model'));
        $this->auth_admin->cek_login_admin();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('analytics_model');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');

        $data['total_account'] = $this->analytics_model->getCustomer();
        $data['total_order'] = $this->analytics_model->getOrders();
        $data['revenues'] = $this->analytics_model->getOrders();
        $data['revenue'] = $this->analytics_model->getProducts();
        $data['products_statistic'] = $this->analytics_model->getstatisticProducts();
        $data['category_sold'] = $this->analytics_model->getKategori();
        $data['revenuechartmonth'] = $this->analytics_model->revenueChartMonth();
        $data['total_revenue']   = $this->analytics_model->total_revenue();
        $this->load->view('page/data_services/analytics', $data);
        $this->load->view('template/footer');
    }
}
