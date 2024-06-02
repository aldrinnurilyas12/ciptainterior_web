<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['blog'] = $this->blog_model->getArticle();
        $this->load->view('template/sidebar');
        $this->load->view('page/front_end_new/blog', $data);
    }

    function createpost()
    {
        $config['upload_path'] = './blog_media/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
                $nama_artikel = $this->input->post('nama_artikel');
                $isi_konten = $this->input->post('isi_artikel');
                $data = array(
                    'nama_artikel' => $nama_artikel,
                    'isi_artikel' => $isi_konten,
                    'foto' => $foto
                );
                $this->db->insert('blog', $data);
                redirect('master_data_services/blog');
            } else {
                echo "Not foto";
            };
        } else {
            echo "gambar belum dipilih";
        }
    }

    function view_blog($id)
    {
        $id = $this->uri->segment(3);
        $this->load->model('blog_model');
        $data['blog_content'] = $this->blog_model->getBlog($id);
        $this->load->view('page/front_end_new/view_blog', $data);
    }
}
