<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapemesanan extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login_admin') != TRUE) {
			session_start();
			$url =  base_url('loginadmin');
			redirect($url);
		}
		$this->load->model(array('auth_admin','pemesanan_model'));
		$this->auth_admin->cek_login_admin();
		$this->load->library('session');
        $this->load->helper('url');
	}


    public function index()
    {

        $data['order_complete']     = $this->pemesanan_model->get_order_complete();
        $data['not_complete']       = $this->pemesanan_model->get_order_not_complete();
        $data['comfirmed']          = $this->pemesanan_model->get_order_confirmed();
        $data['category']           = $this->pemesanan_model->getcategory();
        $this->load->view('page/data_services/orders_data', $data);
        $this->load->view('template/sidebar');
    }

    public function total()
    {
        $this->db->select_sum('harga');
        $result = $this->db->get('orders')->row();
        return $result->amount;
    }

    public function change_status()
    {
        $id_pemesanan           = $this->uri->segment(4);
        $data['payments']       = $this->pemesanan_model->getorder_id($id_pemesanan);
        $data['data_category']  = $this->pemesanan_model->getcategory();
        $this->load->view('page/changestatus', $data);
    }

    function updatestatus_code()
    {
        $status_id = $this->input->post('status_id');
        $status_code = $this->input->post('status_code');
        $this->pemesanan_model->change_code_status($status_id, $status_code);
        redirect('master_data_services/datapemesanan');
    }

    function delete()
    {
        $id_pemesanan     = $this->uri->segment(3);
        $this->pemesanan_model->delete($id_pemesanan);
        redirect('master_data_services/datapemesanan');
    }

    function update()
    {
        $id_pemesanan    = $this->input->post('id_pemesanan');
        $status          = $this->input->post('status');
        $this->pemesanan_model->update($id_pemesanan, $status);
        redirect('master_data_services/datapemesanan');
    }
}