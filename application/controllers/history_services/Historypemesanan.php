<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historypemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != TRUE) {
            session_start();
            $url =  base_url('home');
            redirect($url);
        };
        $this->load->library('session');
        $this->load->model(array('auth', 'history_pemesananmodel', 'pembayaran_model', 'home_model', 'beranda_model', 'user_model', 'pemesanan_model'));
        $this->auth->cek_login();
    }

    function index()
    {
        $id_pemesanan           = $this->uri->segment(4);
        $id_customer = $this->session->userdata['id_customer'];
        $username = $this->session->userdata('username');
        $data['order_success'] = $this->history_pemesananmodel->get_order_success($id_customer);
        $data['success_confirmed'] = $this->history_pemesananmodel->get_success_confirmed($id_customer);
        $data['order_confirmed'] = $this->history_pemesananmodel->get_order_confirmed($id_customer);
        $data['not_confirmed'] = $this->history_pemesananmodel->get_order_not_confirmed($id_customer);
        $data['payments_history'] = $this->pembayaran_model->get_historypembayaran($id_customer);
        $data['image'] = $this->beranda_model->get_foto($username);
        $data['customers'] = $this->beranda_model->get_customer($username);
        $data['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $data['notification']              = $this->user_model->user_notifications($id_customer);
        $data['payments']       = $this->pemesanan_model->getorder_id($id_pemesanan);
        $data['data_category']  = $this->pemesanan_model->getcategory();
        $this->load->view('page/front_end_new/navbar', $data);
        $this->load->view('page/front_end_new/history_pemesanan', $data);
        $this->load->view('page/icons_wa/icon_wa.htm');
    }


    function remove($id_pemesanan)
    {
        $id_pemesanan = $this->uri->segment(4);
        $this->history_pemesananmodel->orderDelete($id_pemesanan);
        $this->session->set_flashdata('sukses_hapus', 'Berhasil menghapus pesanan ' . $id_pemesanan);
        redirect('order-history');
    }
}
