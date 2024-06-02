<?php

use PHPUnit\Util\Color;

defined('BASEPATH') or exit('No direct script access allowed');


class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('cart', 'session'));
        $this->load->model(array('product_model', 'beranda_model', 'order_model', 'user_model'));
    }

    function shopping_cart()
    {
        $username                       = $this->session->userdata('username');
        $id_customer                       = $this->session->userdata('id_customer');
        $z['customers']                 = $this->beranda_model->get_customer($username);
        $z['image']                     = $this->beranda_model->get_foto($username);
        $z['notification']               = $this->user_model->user_notifications($id_customer);
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/shopping_cart');
    }

    function add_cart()
    {
        $id_produk = $this->uri->segment(3);
        $products = $this->product_model->getProducts($id_produk);
        $i = $products->row_array();
        $data = array(
            'id'      => $i['id_produk'],
            'status_id' => $i['status_id'],
            'qty'     => 1,
            'price'   => $i['total_harga'],
            'diskon' => $i['diskon'],
            'name'    => $i['nama_produk'],
            'image'    => $i['foto']

        );

        $this->session->set_flashdata('success_message', 'Berhasil menambahkan produk ke Keranjang');
        $this->cart->insert($data);
        redirect('shopping-cart', $data);
    }

    function order_to_detail()
    {

        $id_produk = $this->uri->segment(3);
        $products = $this->product_model->getProducts($id_produk);
        $i = $products->row_array();
        $quantity = $this->input->post('quantity');
        $grand_total = $this->input->post('grand_total');
        $height_product = $this->input->post('height');
        $data = array(
            'id'      => $i['id_produk'],
            'qty'       => $quantity,
            'status_id' => $i['status_id'],
            'price'   => $i['total_harga'],
            'diskon' => $i['diskon'],
            'name'    => $i['nama_produk'],
            'image'    => $i['foto'],
            'grand_total' => $grand_total,
            'height'       => $height_product

        );
        $this->cart->update($_POST);
        $this->cart->insert($data);

        $this->session->set_flashdata('success_message', 'Berhasil memesan produk');
        redirect('detail-order', $data);
    }


    function update()
    {
        $this->cart->update($_POST);
        $this->session->set_flashdata('success_message', 'Berhasil update pesanan');
        redirect('shopping-cart');
    }

    function check_out()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $id_pemesanan = $this->order_model->get_id_order();
            $id_customer = $this->session->userdata('id_customer');
            $id_produk = $this->input->post('id_produk');
            $status_id = $this->input->post('status_id');
            $quantity = $this->input->post('quantity');
            $grand_total = $this->input->post('subtotal');


            $this->order_model->order_services($id_pemesanan, $id_customer, $id_produk, $status_id, $quantity, $grand_total);


            $status_id = $this->input->post('status_id');
            $status_code = $this->input->post('status_code');
            $this->order_model->set_status(
                $status_id,
                $status_code
            );

            $this->session->set_flashdata('success_message', 'Berhasil memesan produk');
            $this->cart->destroy();
            redirect('order-history');
        } else {

            $url = base_url('login');
            $this->session->set_flashdata('success_message', 'Harap Login dahulu');
            redirect($url);
        }
    }

    function delete_cart()
    {
        $row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid'      => $row_id,
            'qty'     => 0
        ));
        $this->session->set_flashdata('sukses_hapus', 'Berhasil menghapus pesanan');
        redirect('cart/shopping_cart');
    }

    function delete_order_detail()
    {
        $row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid'      => $row_id,
            'qty'     => 0
        ));
        $this->session->set_flashdata('sukses_hapus', 'Berhasil menghapus pesanan');
        redirect('beranda');
    }

    function detail_orders()

    {
        $username                       = $this->session->userdata('username');
        $id_customer                       = $this->session->userdata('id_customer');
        $id_produk = $this->uri->segment(4);
        $products = $this->product_model->getProducts($id_produk);
        $z['customers']                 = $this->beranda_model->get_customer($username);
        $z['image']                     = $this->beranda_model->get_foto($username);
        $z['notification']               = $this->user_model->user_notifications($id_customer);
        $z['notif_total']               = $this->user_model->get_notif_total($id_customer);
        $this->load->view('page/front_end_new/navbar', $z);
        $this->load->view('page/front_end_new/orders_detail');
    }

    public function cek_ongkir()
    {
        $this->load->view('page/test_quantity');
    }



    // API ONGKIR

    function _api_ongkir_post($origin, $des, $qty, $cour)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                /* masukan api key disini*/
                "key: ganti api key"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }
    function _api_ongkir($data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
            //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province" . $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                /* masukan api key disini*/
                "key:837a7cc5804bc0816eb7529405c76521"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return  $err;
        } else {
            return $response;
        }
    }
    public function provinsi()
    {
        $provinsi = $this->_api_ongkir('province');
        $data = json_decode($provinsi, true);
        echo json_encode($data['rajaongkir']['results']);
    }
    public function lokasi()
    {
        $this->load->view('head');
        $this->load->view('nav');
        $this->load->view('halaman');
        $this->load->view('footer');
    }
    public function kota($provinsi = "")
    {
        if (!empty($provinsi)) {
            if (is_numeric($provinsi)) {
                $kota = $this->_api_ongkir('city?province=' . $provinsi);
                $data = json_decode($kota, true);
                echo json_encode($data['rajaongkir']['results']);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
    public function tarif($origin, $des, $qty, $cour)
    {
        $berat = $qty * 1000;
        $tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);
        $data = json_decode($tarif, true);
        echo json_encode($data['rajaongkir']['results']);
    }
}
