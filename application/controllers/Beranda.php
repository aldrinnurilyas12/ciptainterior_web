<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != TRUE) {
            session_start();
            $url =  base_url('home');
            redirect($url);
        };
        $this->load->model('auth');
        $this->load->library('session');
        $this->auth->cek_login();
        $this->load->model(array(
            'auth', 'order_model', 'beranda_model',
            'testimonial_model', 'product_model', 'home_model', 'blog_model', 'user_model'
        ));
    }


    public function index()
    {
        $username                       = $this->session->userdata('username');
        $id_customer                    = $this->session->userdata('id_customer');
        $data['products']               = $this->product_model->get_produk();
        $data['testimonial_customer']   = $this->home_model->get_limittestimonial();
        $data['banner']                 = $this->product_model->getbanner();
        $data['blog']                   = $this->blog_model->getArticle();
        $z['customers']                 = $this->beranda_model->get_customer($username);
        $z['image']                     = $this->beranda_model->get_foto($username);
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/beranda', $data, $z);
        $this->load->view('page/icons_wa/icon_wa.htm');
    }


    public function searchproducts()
    {
        $this->load->model('product_model');
        $username       = $this->session->userdata('username');
        $id_customer                    = $this->session->userdata('id_customer');
        $z['customers'] = $this->beranda_model->get_customer($username);
        $z['image']     = $this->beranda_model->get_foto($username);
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $keyword        = $this->input->get('q');
        $search         = $this->product_model->ambil_data($keyword);
        $search         = array(
            'q'         => $keyword,
            'data'      => $search
        );
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/resultquery', $search);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_destroy();
        redirect('/');
    }

    public function blog()
    {
        $this->load->view('page/front_end_new/blog');
    }
}
