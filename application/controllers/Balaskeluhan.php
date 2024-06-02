
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balaskeluhan extends CI_Controller
{




    function __construct()
    {
        parent::__construct();
        $this->load->model('keluhan_model');
        $this->load->library('upload');
    }
    public function index()

    {
        $this->load->view('template/sidebar');
        $this->load->view('page/balaskeluhan');
    }



    function ubah()
    {


        $id_keluhan = strip_tags($this->input->post('id_keluhan'));
        $nm_customer = strip_tags($this->input->post('nm_customer'));
        $nama_produk = strip_tags($this->input->post('nama_produk'));
        $keluhan = strip_tags($this->input->post('keluhan'));
        $balasan = strip_tags($this->input->post('balasan'));
        $this->keluhan_model->balasankeluhan($id_keluhan, $nm_customer, $nama_produk, $keluhan, $balasan);
        redirect('datakeluhan');
    }
    function balasan($id_keluhan)

    {


        $id_keluhan = $this->uri->segment(3);
        $result = $this->keluhan_model->geting_id_keluhan($id_keluhan);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_keluhan'    => $i['id_keluhan'],
                'nm_customer'  => $i['nm_customer'],
                'nama_produk'  => $i['nama_produk'],
                'keluhan'     => $i['keluhan'],
                'balasan'    => $i['balasan']




            );

            $this->load->view('page/balaskeluhan', $data);
        } else {
            echo "Data Was Not Found";
        }
    }
}
