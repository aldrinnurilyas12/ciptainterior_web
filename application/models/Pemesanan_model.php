<?php

class Pemesanan_model extends CI_Model
{

    function get_order_complete()
    {
        $result = $this->db->query("SELECT DISTINCT ord.id_pemesanan, ord.id_customer,
        ord.id_produk,  ord.material, 
                ord.quantity, ord.grand_total, pay.id_payment, ord.tgl_pesan,prd.nama_produk, prd.total_harga,cust.nama_lengkap, cust.telepon, cust.alamat, ords.status_code
                FROM orders as ord
                LEFT JOIN customer as cust
                ON ord.id_customer = cust.id_customer
                LEFT JOIN pembayaran as pay
               ON ord.id_pemesanan = pay.id_pemesanan
               LEFT JOIN orders_status as ords
               ON ord.status_id = ords.status_id
               LEFT JOIN products as prd
               ON ord.id_produk = prd.id_produk
               WHERE ords.status_code ='2' OR ords.status_code='3'
               ORDER BY tgl_pesan DESC");
        return $result;
    }

    function get_order_confirmed()
    {
        $result = $this->db->query("SELECT ord.id_pemesanan, ord.id_customer,
        ord.id_produk,  ord.material, 
                ord.quantity, ord.grand_total, pay.id_payment, ord.tgl_pesan,prd.nama_produk, prd.total_harga,cust.nama_lengkap, cust.telepon, cust.alamat, ords.status_code
                FROM orders as ord
                LEFT JOIN customer as cust
                ON ord.id_customer = cust.id_customer
                LEFT JOIN pembayaran as pay
               ON ord.id_pemesanan = pay.id_pemesanan
               LEFT JOIN orders_status as ords
               ON ord.status_id = ords.status_id
               LEFT JOIN products as prd
               ON ord.id_produk = prd.id_produk
               WHERE ords.status_code ='1'
               ORDER BY tgl_pesan DESC");
        return $result;
    }

    function get_order_not_complete()
    {
        $result = $this->db->query("SELECT ord.id_pemesanan, ord.id_customer,
        ord.id_produk,  ord.material, 
                ord.quantity, ord.grand_total, pay.id_payment,pay.payment_status ,ord.tgl_pesan,prd.nama_produk, prd.total_harga,cust.nama_lengkap, cust.telepon, cust.alamat, ords.status_code
                FROM orders as ord
                LEFT JOIN customer as cust
                ON ord.id_customer = cust.id_customer
                LEFT JOIN pembayaran as pay
               ON ord.id_pemesanan = pay.id_pemesanan
               LEFT JOIN orders_status as ords
               ON ord.status_id = ords.status_id
               LEFT JOIN products as prd
               ON ord.id_produk = prd.id_produk
               WHERE ords.status_code ='0'
               ORDER BY tgl_pesan DESC");
        return $result;
    }

    function get_idpemesanan($id_pemesanan)
    {
        $query = $this->db->query("SELECT ord.id_pemesanan, SUM(ord.quantity) as qty, SUM(ord.grand_total) as grand_total, tgl_pesan
        FROM orders as ord
        WHERE ord.id_pemesanan = '$id_pemesanan'
        GROUP BY 1,4
        ");
        return $query;
    }

    function get_idpayment($id_payment)
    {
        $query = $this->db->query("SELECT id_payment from pembayaran WHERE id_payment ='$id_payment'");
        return $query;
    }


    function getcategory()
    {
        $result = $this->db->query("SELECT id, status_category_name FROM category_status WHERE id='2'");
        return $result;
    }

    function getconfirm()
    {
        $result = $this->db->query("SELECT id, status_category_name FROM category_status WHERE id='3' ");
        return $result;
    }



    function change_code_status($status_id, $status_code)
    {
        $query = $this->db->query("UPDATE orders_status SET status_code = '$status_code' WHERE status_id = '$status_id';
        ");
        return $query;
    }

    function getorder_id($id_pemesanan)
    {
        $data =  $this->db->query("SELECT * FROM orders WHERE id_pemesanan='$id_pemesanan'");
        return $data;
    }
}
