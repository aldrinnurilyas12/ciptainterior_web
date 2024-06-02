<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->auth->cek_login();
        $this->load->model(array('beranda_model', 'testimonial_model', 'user_model', 'pemesanan_model'));
        $this->load->library('session');
        $this->load->helper('url');
    }


    public function index()
    {
        $data['products'] = $this->beranda_model->get_produk();
        $data['testimonial_customer'] = $this->testimonial_model->get_testimoni();
        $this->load->view('page/front_end_new/beranda', $data);
        $this->load->view('page/icons_wa/icon_wa.htm');
    }


    function profil()
    {
        $this->load->model('beranda_model');
        $this->load->model('user_model');
        $this->load->helper('url');
        $id_customer = $this->session->userdata('id_customer');
        $username = $this->session->userdata('username');
        $z['customers'] = $this->beranda_model->get_customer($username);
        $result = $this->beranda_model->get_customer($username);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_customer'  => $i['id_customer'],
                'nama_lengkap'  => $i['nama_lengkap'],
                'alamat' => $i['alamat'],
                'telepon' => $i['telepon'],
                'email' => $i['email'],
                'image' => $i['image'],
                'username' => $i['username'],
                'register_date' => $i['register_date'],
                'create_at'     => $i['create_at'],
                'update_at'     => $i['update_at']

            );

            $data['orders_total']           = $this->user_model->get_transaction($id_customer);
            $data['total_payment']          = $this->user_model->get_payment($id_customer);
            $data['total_kritik']           = $this->user_model->get_kritik($id_customer);
            $data['image']                  = $this->beranda_model->get_foto($username);
            $data['total_testimonial']      = $this->user_model->get_testimonial($id_customer);
            $data['customer_image']         = $this->user_model->getImage($id_customer);
            $data['customers']              = $this->beranda_model->get_customer($id_customer);
            $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
            $z['notification']              = $this->user_model->user_notifications($id_customer);
            $z['customers']                 = $this->beranda_model->get_customer($username);
            $z['image']                     = $this->beranda_model->get_foto($username);
            $this->load->view('page/front_end_new/navbar', $z);
            $this->load->view('page/front_end_new/profile', $data);
        } else {
            echo "Data Was Not Found";
        }
    }

    function update_profile()
    {
        $username = $this->session->userdata('username');
        if (!empty($_FILES['filefoto']['name'])) {

            $config['upload_path'] = './profile_picture/';
            $config['allowed_types'] = 'gif|jpg|JPG|PNG|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('filefoto')) {
                $foto = $this->upload->data();
                $profile_picture = $foto['file_name'];
            } else {
                echo '<script>alert("PERINGATAN! Gambar harus diupload")</script>';
                return;
            }
        } else {
            $profile_picture = $this->user_model->get_profile_picture($username);
        }

        $username       = $this->session->userdata('username');
        $id_customer    = $this->input->post('id_customer');
        $nama           = $this->input->post('nama_lengkap');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $telepon        = $this->input->post('telepon');
        $username       = $this->input->post('username');

        $this->user_model->update_profile($id_customer, $nama, $alamat, $email, $telepon, $username, $profile_picture);
        $this->session->set_flashdata('success_message', 'Data diri sudah diubah...');
        redirect('user-profile');
    }

    function reset_password()
    {
        $register_id = $this->session->userdata('register_id');
        $password = $this->input->post('password');

        $reset = $this->user_model->reset_password($register_id, $password);
        if ($reset == TRUE) {
            $this->session->set_flashdata('success_message', 'Password berhasil diubah');
            redirect('user-profile');
        } else {
            echo 'error';
        }
    }


    function shopping_list()
    {
        $this->load->model('beranda_model');
        $username = $this->session->userdata('username');
        $id_customer = $this->session->userdata('id_customer');
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $z['customers'] = $this->beranda_model->get_customer($username);
        $z['image'] = $this->beranda_model->get_foto($username);
        $data['customer'] = $this->session->userdata('username');
        $data['savedData'] = $this->user_model->getSavedItems($id_customer);
        $z['notification'] = $this->user_model->user_notifications($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/saved_items', $data);
    }

    function saved_items()
    {
        if ($this->session->userdata('is_login') != TRUE) {
            $url = base_url('login');
            redirect($url);
        } else {

            $id_customer = $this->session->userdata('id_customer');
            $id_produk = $this->input->post('id_produk');
            $this->user_model->saved_items($id_customer, $id_produk);
            $this->session->set_flashdata('success_message', 'Berhasil menambahkan item');
            redirect('user/shopping_list');
        }
    }

    function deleteItems($id_list)
    {
        $id_list = $this->uri->segment(3);
        $this->user_model->deleteItems($id_list);
        $this->session->set_flashdata('success_message', 'Berhasil menghapus item');
        redirect('saved-items');
    }

    public function notifications()
    {
        $this->load->model('beranda_model');
        $username = $this->session->userdata('username');
        $id_customer = $this->session->userdata('id_customer');
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $z['customers'] = $this->beranda_model->get_customer($username);
        $z['image'] = $this->beranda_model->get_foto($username);
        $data['customer'] = $this->session->userdata('username');
        $data['notification'] = $this->user_model->user_notifications($id_customer);
        $data['notification_success'] = $this->user_model->confirmed_notification($id_customer);
        $data['pay_notifications'] = $this->user_model->pay_notifications($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/notifications', $data);
    }

    public function invoice($id_pemesanan)
    {
        $this->load->model('user_model');
        $id_pemesanan = $this->uri->segment(3);
        $id_customer = $this->session->userdata('id_customer');
        $data['transactions'] = $this->user_model->get_transactions($id_customer, $id_pemesanan);
        $data['customers'] = $this->user_model->get_customers($id_customer);
        $data['spent_total'] = $this->user_model->invoice_total($id_customer, $id_pemesanan);
        $this->load->view('page/front_end_new/invoice', $data);
    }


    // CONFIRM STATUS

    public function order_accept()
    {
        $id_pemesanan           = $this->uri->segment(3);
        $data['payments']       = $this->pemesanan_model->getorder_id($id_pemesanan);
        $data['data_category']  = $this->pemesanan_model->getconfirm();
        $this->load->view('page/accept_orders', $data);
    }

    function updatestatus_order()
    {
        $status_id = $this->input->post('status_id');
        $status_code = $this->input->post('status_code');
        $this->pemesanan_model->change_code_status($status_id, $status_code);
        redirect('order-history');
    }
}
