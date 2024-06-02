<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritiksaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != TRUE) {
            session_start();
            $url =  base_url('home');
            redirect($url);
        };
        $this->load->model('kritik_model');
        $this->load->model('auth');
        $this->auth->cek_login();
    }

    function delete()
    {
        $id_kritiksaran = $this->uri->segment(3);
        $this->kritik_model->delete($id_kritiksaran);
        redirect('kritiksaran');
    }

    public function index()
    {
        $data['kritik_saran'] = $this->kritik_model->get_kritik();

        $this->load->view('page/kritiksaran', $data);
    }

    function send_kritiksaran()
    {


        $id_kritiksaran = strip_tags($this->input->post('id_kritiksaran'));
        $id_customer = strip_tags($this->input->post('id_customer'));
        $nama_customer = strip_tags($this->input->post('nm_customer'));
        $deskripsi = strip_tags($this->input->post('deskripsi'));


        $this->kritik_model->simpan_kritiksaran($id_kritiksaran, $id_customer, $nama_customer, $deskripsi);
        redirect('kritiksaran');
    }
}
