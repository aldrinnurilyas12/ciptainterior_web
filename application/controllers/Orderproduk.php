<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orderproduk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('order_model');
        $this->load->model('auth');
        $this->load->library(array('session', 'cart'));
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('page/front_end_new/orderproduk');
    }

    function product($id_produk)
    {
        $this->load->model(array('order_model', 'beranda_model', 'product_model'));
        $id_produk = $this->uri->segment(3);
        $username = $this->session->userdata('username');
        $result = $this->order_model->get_products($id_produk);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_produk'    => $i['id_produk'],
                'nama_produk'  => $i['nama_produk'],
                'harga'     => $i['harga'],
                'diskon'     => $i['diskon'],
                'total_harga'     => $i['total_harga'],
                'foto'    => $i['foto'],
                'deskripsi'  => $i['deskripsi'],
                'status_produk' => $i['status_produk'],
                'waktu_pengerjaan' => $i['waktu_pengerjaan'],
                'category_id' => $i['category_id'],
                'min_order' => $i['min_order'],
                'dimensional' => $i['dimensional'],
                'size_height' => $i['size_height'],
                'category_name' => $i['category_name']
            );

            $data['total_rev_avg'] = $this->product_model->total_review($id_produk);
            $data['reviews'] = $this->product_model->get_reviews($id_produk);
            $data['total_sold'] = $this->order_model->get_sold($id_produk);
            $data['product_material'] = $this->order_model->get_material_product($id_produk);
            $data['customers'] = $this->beranda_model->get_customer($username);
            $data['product'] = $this->product_model->getproduct();

            $this->load->view('page/front_end_new/order_products', $data);
        } else {
            echo "<h1>Data Was Not Found</h1>";
        }
    }


    function pesanproduk()
    {

        if ($this->session->userdata('is_login') != TRUE) {
            $url = base_url('login');
            redirect($url);
        } else {

            $id_pemesanan = $this->input->post('id_pemesanan');
            $id_customer = $this->input->post('id_customer');
            $id_produk = $this->input->post('id_produk');
            $status_id = $this->input->post('status_id');
            $material = $this->input->post('material');
            $qty = $this->input->post('quantity');
            $grand_total = $this->input->post('grand_total');



            $this->order_model->order(
                $id_pemesanan,
                $id_customer,
                $id_produk,
                $status_id,
                $material,
                $qty,
                $grand_total,

            );

            $status_id = $this->input->post('status_id');
            $status_code = $this->input->post('status_code');

            $this->order_model->set_status(
                $status_id,
                $status_code
            );
            $this->cart->destroy();
            $this->session->set_flashdata('success_message', 'Berhasil memesan produk ' . $id_pemesanan);
            redirect('order-history');
        }
    }
}
