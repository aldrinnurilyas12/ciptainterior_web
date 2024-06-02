<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ulasproducts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != TRUE) {
            session_start();
            $url =  base_url('home');
            redirect($url);
        };
        $this->load->model(array('product_model', 'beranda_model', 'auth', 'user_model'));
        $this->auth->cek_login();
    }
    function ulasan()
    {
        $id_produk = $this->uri->segment(3);
        $data = $this->product_model->getProducts($id_produk);
        if ($data->num_rows() > 0) {
            $i = $data->row_array();
            $product = array(
                'id_produk' => $i['id_produk'],
                'nama_produk' => $i['nama_produk'],
                'foto' => $i['foto']

            );
            $username = $this->session->userdata('username');
            $id_customer = $this->session->userdata('id_customer');
            $z['customers'] = $this->beranda_model->get_customer($username);
            $z['image'] = $this->beranda_model->get_foto($username);
            $z['notif_total'] = $this->user_model->get_notif_total($id_customer);
            $this->load->view('page/front_end_new/navbar', $z);
            $this->load->view('page/front_end_new/ulas', $product);
        } else {
            echo "data not found";
        }
    }

    function send_reviews()
    {

        $id_produk = $this->input->post('id_produk');
        $id_customer = $this->input->post('id_customer');
        $rating = $this->input->post('rating');
        $review = $this->input->post('review');

        $data_review = array(
            'id_produk' => $id_produk,
            'id_customer' => $id_customer,
            'rating' => $rating,
            'review' => $review
        );
        $this->db->insert('reviews', $data_review);
        redirect('displayproducts/allproducts');
    }
}
