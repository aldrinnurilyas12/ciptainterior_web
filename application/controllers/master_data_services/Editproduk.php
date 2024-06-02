<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editproduk extends CI_Controller
{




    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library(array('upload', 'session'));
    }
    public function index()

    {
        $this->load->view('template/sidebar');
        $this->load->view('page/editproduk');
    }



    function ubah()
    {
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
                $id_produk = strip_tags($this->input->post('id_produk'));
                $nama_produk = strip_tags($this->input->post('nama_produk'));
                $harga = strip_tags($this->input->post('harga'));
                $diskon = strip_tags($this->input->post('diskon'));
                $harga_diskon = strip_tags($this->input->post('harga_diskon'));
                $total_harga = strip_tags($this->input->post('total_harga'));
                $deskripsi = strip_tags($this->input->post('deskripsi'));
                $waktu_pengerjaan = strip_tags($this->input->post('waktu_pengerjaan'));
                $status_produk = strip_tags($this->input->post('status_produk'));
                $min_order = $this->input->post('min_order');
                $dimensional = $this->input->post('dimensional');
                $size_height = $this->input->post('size_height');
                $this->product_model->update_data_produk($id_produk, $foto, $nama_produk, $harga, $diskon, $harga_diskon, $total_harga, $deskripsi, $waktu_pengerjaan, $status_produk, $min_order, $dimensional, $size_height);
                $this->session->set_flashdata('success_message', 'Data produk berhasil diperbarui');
                redirect('master_data_services/produk');
            } else {
                echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp|JPG|PNG|JPEG";
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("PERINGATAN! Gambar harus diupload")';  //not showing an alert box.
            echo '</script>';
        }
    }

    function edit_data($id_produk)

    {
        $id_produk = $this->uri->segment(4);
        $result = $this->product_model->get_id_produk($id_produk);
        $data['products'] = $this->product_model->product($id_produk);
        $this->load->view('template/sidebar');
        $this->load->view('page/data_services/editproduk', $data, $result);
    }
}
