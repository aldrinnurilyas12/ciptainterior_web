<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{



    function __construct()
    {
        parent::__construct();
        $this->load->model('keluhan_model');
        $this->load->library('upload');
    }

    public function index()


    {
        $data['keluhan_customer'] = $this->keluhan_model->get_keluh();
        $this->load->view('page/keluhan', $data);
    }

    function delete()
    {
        $id_keluhan = $this->uri->segment(3);
        $this->keluhan_model->delete($id_keluhan);
        redirect('keluhan');
    }


    function get_pemesananproduk()
    {
        $id_pemesanan = $this->input->post('id_pemesanan');
        $data = $this->keluhan_model->get_idpemesanan($id_pemesanan);
        echo json_encode($data);
    }


    function send_keluhan()
    {
        $id_customer = strip_tags($this->input->post('id_customer'));
        $nm_customer = strip_tags($this->input->post('nm_customer'));
        $id_pemesanan = strip_tags($this->input->post('id_pemesanan'));
        $tgl_pesan = strip_tags($this->input->post('tgl_pesan'));
        $nama_produk = strip_tags($this->input->post('nama_produk'));
        $email = strip_tags($this->input->post('email'));
        $keluhan = strip_tags($this->input->post('keluhan'));
        $this->keluhan_model->save_keluhan($id_customer, $nm_customer,  $id_pemesanan, $tgl_pesan, $nama_produk, $email, $keluhan);
        redirect('keluhan');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        session_unset();
        echo '<script>alert("Anda Telah Keluar, Silahkan Login kembali");</script>';
        redirect('home', 'refresh');
    }
}
