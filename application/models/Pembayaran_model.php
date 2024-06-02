<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Pembayaran_model extends CI_Model
{

    function get_historypembayaran($id_customer)
    {
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT pay.id_payment, pay.id_pemesanan, pay.id_customer, 
        cst.nama_lengkap, prd.nama_produk, bank, harga, pay.grand_total, ord.quantity, bukti_bayar,pay.payment_status, status, tgl_bayar
         FROM pembayaran as pay
         LEFT JOIN customer as cst
         ON pay.id_customer = cst.id_customer
         LEFT JOIN orders as ord
         ON pay.id_pemesanan = ord.id_pemesanan
         LEFT JOIN products as prd
         ON ord.id_produk = prd.id_produk
         WHERE pay.id_customer='$id_customer'
         ORDER BY tgl_bayar DESC");
        return $data;
    }

    function get_pembayaran()
    {
        $data = $this->db->query("SELECT pay.id_payment, pay.id_pemesanan, pay.id_customer, cst.nama_lengkap, bank, grand_total, bukti_bayar, payment_status, status, tgl_bayar
        FROM pembayaran as pay
        LEFT JOIN customer as cst
        ON pay.id_customer = cst.id_customer
        ORDER BY tgl_bayar DESC");
        return $data;
    }

    function send_payment($id_payment, $id_pemesanan, $id_customer, $bank, $grand_total, $bukti_bayar, $payment_status, $status)
    {
        $id_payment = Uuid::uuid4()->toString();
        $sendPay = $this->db->query("INSERT INTO pembayaran (id_payment,id_pemesanan, id_customer, bank, grand_total, bukti_bayar, payment_status, status)
        VALUES ('$id_payment','$id_pemesanan', '$id_customer',  '$bank', '$grand_total', '$bukti_bayar', '$payment_status', '$status') ");
        return $sendPay;
    }

    function change_status($status_code, $status_id)
    {
        $set_status = $this->db->query("UPDATE orders_status SET status_code='$status_code' WHERE status_id='$status_id'");
        return $set_status;
    }

    function get_dataPay($id_payment)
    {
        $query = $this->db->query("SELECT pay.id_payment, pay.id_pemesanan,pay.bukti_bayar,pay.id_customer,
        pay.bank, pay.grand_total, pay.bukti_bayar, 
        pay.payment_status, pay.status, pay.tgl_bayar,
        ord.status_id as orders_status_id, 
        stts.status_id as status_id, stts.status_code
        FROM pembayaran as pay
        LEFT JOIN orders as ord
        ON pay.id_pemesanan = ord.id_pemesanan
        LEFT JOIN orders_status as stts
        ON ord.status_id = stts.status_id
        WHERE pay.id_payment='$id_payment' ");
        return $query;
    }


    function get_data()
    {
        $query = $this->db->query("SELECT * FROM orders_status");
        return $query;
    }

    function get_idpemesanan($id_pemesanan)
    {
        $query = $this->db->get_where('orders', array('id_pemesanan' => $id_pemesanan));
        return $query;
    }

    function update($id_payment, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id_payment', $id_payment);
        $this->db->update('pembayaran', $data);
    }

    function update_status_order($status_id, $status_code)
    {
        $data = array(
            'status_code' => $status_code
        );
        $this->db->where('status_id', $status_id);
        $this->db->update('orders_status', $data);
    }

    function pay_code()
    {
        $pay_code = Uuid::uuid4()->toString();
        return $pay_code;
    }
}