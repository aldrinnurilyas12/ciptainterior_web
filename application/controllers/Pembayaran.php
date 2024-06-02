<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != TRUE) {
            session_start();
            $url =  base_url('home');
            redirect($url);
        };
        $this->load->model('pembayaran_model');
        $this->load->library('upload', 'session');
        $this->load->model('auth');
        $this->load->model('home_model');
        $this->load->model('beranda_model');
        $this->load->model('pemesanan_model');
        $this->auth->cek_login();
    }

    function delete()
    {
        $id_payment = $this->uri->segment(3);
        $this->pembayaran_model->delete($id_payment);
        redirect('historypemesanan');
    }

    public function index()

    {
        $data['pembayaran'] = $this->pembayaran_model->get_pembayaran();
        $data['pembayaran'] = $this->pembayaran_model->get_historypembayaran();
        $username                       = $this->session->userdata('username');
        $id_customer                       = $this->session->userdata('id_customer');
        $z['customers']                 = $this->beranda_model->get_customer($username);
        $z['image']                     = $this->beranda_model->get_foto($username);
        $z['notification']               = $this->user_model->user_notifications($id_customer);
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/pembayaran', $data);
    }


    function get_order($id_pemesanan)
    {
        $id_pemesanan = $this->input->post('id_pemesanan');
        $data = $this->pembayaran_model->get_idorder($id_pemesanan);
        echo json_encode($data);
    }


    function send_payment()
    {
        $config['upload_path']      = './fotobuktibayar/'; //path folder
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $bukti_bayar        = $gbr['file_name'];
                $id_payment         = $this->input->post('id_payment');
                $id_pemesanan       = $this->input->post('id_pemesanan');
                $id_customer        = $this->input->post('id_customer');
                $bank               = $this->input->post('bank');
                $grand_total        = $this->input->post('grand_total');
                $payment_status     = $this->input->post('payment_status');
                $status             = $this->input->post('status');
                $this->pembayaran_model->send_payment($id_payment, $id_pemesanan, $id_customer, $bank, $grand_total, $bukti_bayar, $payment_status, $status);


                $status_code        = $this->input->post('status_code');
                $this->pembayaran_model->change_status($status_code, $id_pemesanan);
                $this->session->set_flashdata('success_message', 'Berhasil melakukan pembayaran produk ' . $id_pemesanan);
                redirect('history_services/historypemesanan');
            } else {
                echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp|JPG|PNG";
            }
        } else {
            echo "Gagal gambar belum dipilih";
        }
    }


    function confirmed_payment($id_payment, $id_pemesanan)
    {

        $id_payment     = $this->uri->segment(3);
        $result         = $this->pembayaran_model->get_confirm_id($id_payment);
        $result         = $this->pembayaran_model->get_idpemesanan($id_pemesanan);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_payment'    => $i['id_payment'],
                'status'        => $i['status'],
                'status_order'  => $i['status_order']
            );
            $this->load->view('page/confirm_payment', $data);
        } else {
            echo "Data Was Not Found";
        }
    }

    // function update_payment()
    // {
    //     $id_payment = $this->input->post('id_payment');
    //     $status = $this->input->post('status');
    //     $this->pembayaran_model->update($id_payment, $status);


    //     $status_order = $this->input->post('status_order');
    //     $this->pembayaran_model->update_status_order($status_order);
    //     redirect('datapembayaran');
    // }



    function sendpay($id_pemesanan)
    {
        $username       = $this->session->userdata('username');
        $id_pemesanan   = $this->uri->segment(3);
        $result         = $this->pemesanan_model->get_idpemesanan($id_pemesanan);
        $this->load->model(array('pemesanan_model', 'user_model'));
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_pemesanan'  => $i['id_pemesanan'],
                // 'nama_produk'   => $i['nama_produk'],
                // 'total_harga'   => $i['total_harga'],
                'quantity'      => $i['qty'],
                'grand_total'   => $i['grand_total'],
                'tgl_pesan'     => $i['tgl_pesan']


            );
            $username                       = $this->session->userdata('username');
            $id_customer                       = $this->session->userdata('id_customer');
            $z['customers']                 = $this->beranda_model->get_customer($username);
            $z['image']                     = $this->beranda_model->get_foto($username);
            $z['notification']               = $this->user_model->user_notifications($id_customer);
            $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
            $this->load->view('page/front_end_new/navbar', $z);
            $this->load->view('page/front_end_new/pembayaran', $data);
        } else {
            echo "data not found";
        }
    }
}
