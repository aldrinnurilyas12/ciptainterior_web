<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datapembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login_admin') != TRUE) {
            session_start();
            $url =  base_url('loginadmin');
            redirect($url);
        }
        $this->load->model(array('auth_admin', 'pembayaran_model'));
        $this->auth_admin->cek_login_admin();
        $this->load->library('session');
        $this->load->helper('url');
    }




    public function index()
    {

        $data['pembayaran'] = $this->pembayaran_model->get_pembayaran();
        $this->load->view('page/data_services/datapembayaran', $data);
        $this->load->view('template/sidebar');
    }
    function delete()
    {
        $id_payment     = $this->uri->segment(3);
        $this->pembayaran_model->delete($id_payment);
        redirect('datapembayaran');
    }

    function confirmed_payment()
    {
        $id_payment     = $this->uri->segment(4);
        $result         = $this->pembayaran_model->get_dataPay($id_payment);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_payment'    => $i['id_payment'],
                'status'        => $i['status'],
                'id_pemesanan'  => $i['id_pemesanan'],
                'status_id'     => $i['status_id'],
                'status_code'   => $i['status_code']
            );

            $this->load->view('page/confirm_payment', $data);
        } else {
            echo "NOT FOUND";
        }
    }


    function update_payment()
    {
        $id_payment     = $this->input->post('id_payment');
        $status         = $this->input->post('status');
        $this->pembayaran_model->update($id_payment, $status);

        $status_id      = $this->input->post('status_id');
        $status_code    = $this->input->post('status_code');
        $this->pembayaran_model->update_status_order($status_id, $status_code);
        redirect('master_data_services/datapembayaran');
    }
}
