<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login_admin') != TRUE) {
            session_start();
            $url =  base_url('loginadmin');
            redirect($url);
        }
        $this->load->model(array('auth_admin', 'product_model', 'blog_model'));
        $this->auth_admin->cek_login_admin();
        $this->load->helper('url');
        $this->load->library(array('upload', 'session'));
    }

    public function index()
    {
        $data['banner'] = $this->product_model->getbanner();
        $this->load->view('template/sidebar');
        $this->load->view('page/front_end_new/banner', $data);
    }

    function banner_upload_content()
    {
        $config['upload_path'] = './banner/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
                $title = $this->input->post('title');
                $data = array(
                    'title' => $title,
                    'foto' => $foto
                );
                $this->db->insert('banner', $data);
                $this->session->set_flashdata('success_message', 'Data Banner berhasil ditambahkan');
                redirect('master_data_services/banner');
            } else {
                echo "Not foto";
            };
        } else {
            echo "gambar belum dipilih";
        }
    }

    function deletebanner($id_banner)
    {
        $id_banner = $this->uri->segment(4);
        $this->blog_model->delete_banner($id_banner);
        $this->session->set_flashdata('success_message', 'Data Banner berhasil dihapus...');
        redirect('master_data_services/banner');
    }
}
