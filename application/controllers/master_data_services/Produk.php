<?php
require 'vendor/autoload.php';


use Ramsey\Uuid\Uuid;

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login_admin') != TRUE) {
            session_start();
            $url =  base_url('loginadmin');
            redirect($url);
        }
        $this->load->model(array('auth_admin', 'product_model', 'home_model'));
        $this->auth_admin->cek_login_admin();
        $this->load->library(array('upload', 'form_validation', 'session'));
        $this->load->helper('url');
    }

    public function index()
    {
        $data['product'] = $this->product_model->get_product();
        $data['category'] = $this->product_model->get_category();
        $this->load->view('page/data_services/produk', $data);
        $this->load->view('template/sidebar');
    }



    function add_data()
    {
        $this->load->view('data_services/produk');
    }

    function save_data()
    {
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->form_validation->set_rules('nama_produk', 'nama produk', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('diskon', 'diskon harus diisi', 'required');
        $this->form_validation->set_rules('harga_diskon', 'harga_diskon harus diisi', 'required');
        $this->form_validation->set_rules('total_harga', 'total_harga harus diisi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi harus diisi', 'required');


        $this->upload->initialize($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/produk');
        } else {
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {


                    $gbr = $this->upload->data();
                    $foto = $gbr['file_name'];
                    $id_produk          = $this->input->post('id_produk');
                    $nama_produk        = $this->input->post('nama_produk');
                    $harga              = $this->input->post('harga');
                    $diskon             = $this->input->post('diskon');
                    $harga_diskon       = $this->input->post('harga_diskon');
                    $total_harga        = $this->input->post('total_harga');
                    $deskripsi          = $this->input->post('deskripsi');
                    $waktu_pengerjaan   = $this->input->post('waktu_pengerjaan');
                    $status_produk      = $this->input->post('status_produk');
                    $category           = $this->input->post('category_id');
                    $min_order          = $this->input->post('min_order');
                    $dimensional        = $this->input->post('dimensional');
                    $size_height        = $this->input->post('size_height');

                    $this->product_model->add_data(
                        $id_produk,
                        $nama_produk,
                        $harga,
                        $diskon,
                        $harga_diskon,
                        $total_harga,
                        $foto,
                        $deskripsi,
                        $waktu_pengerjaan,
                        $status_produk,
                        $category,
                        $min_order,
                        $dimensional,
                        $size_height
                    );


                    $material_id    = $this->input->post('material_id');
                    $nama_produk    = $this->input->post('nama_produk');
                    $material_satu  = $this->input->post('material_satu');
                    $material_dua   = $this->input->post('material_dua');
                    $material_tiga  = $this->input->post('material_tiga');
                    $material_empat = $this->input->post('material_empat');
                    $material_lima  = $this->input->post('material_lima');

                    $this->product_model->save_material(
                        $material_id,
                        $nama_produk,
                        $material_satu,
                        $material_dua,
                        $material_tiga,
                        $material_empat,
                        $material_lima
                    );

                    $this->session->set_flashdata('success_message', 'Data Produk berhasil ditambahkan');
                    redirect('master_data_services/produk');
                } else {
                    echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp|JPG|PNG";
                }
            } else {
                echo "Gagal, gambar belum di pilih";
            }
        }
    }

    function delete($id_produk)
    {
        $id_produk = $this->uri->segment(4);
        $this->product_model->delete_products($id_produk);
        $this->session->set_flashdata('success_message', 'Data produk berhasil dihapus');
        redirect('master_data_services/produk');
    }
}
