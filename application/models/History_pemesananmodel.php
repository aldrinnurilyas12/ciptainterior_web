<?php

class History_pemesananmodel extends CI_Model
{

    function get_order_success()
    {
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT DISTINCT ord.id_pemesanan, ord.id_customer,
        ord.id_produk, ord.material, 
        ord.quantity, ord.grand_total,tgl_pesan, prd.foto, prd.nama_produk, prd.total_harga ,pay.status, pay.tgl_bayar, ords.status_code, ords.confirm_date
        FROM orders as ord
        LEFT JOIN products as prd
        ON ord.id_produk=prd.id_produk
        LEFT JOIN pembayaran as pay
        ON ord.id_pemesanan = pay.id_pemesanan
        LEFT JOIN orders_status as ords
        ON ord.status_id = ords.status_id
        WHERE ord.id_customer='$id_customer' AND (ords.status_code='2' OR ords.status_code='3')
        ORDER BY pay.tgl_bayar DESC;");
        return $data;
    }

    function get_success_confirmed()
    {
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT DISTINCT ord.id_pemesanan, ord.id_customer,
        ord.id_produk, ord.material, 
        ord.quantity, ord.grand_total,tgl_pesan, cst.alamat, prd.foto, prd.nama_produk, prd.total_harga,pay.id_payment ,pay.status, pay.tgl_bayar, ords.status_code
        FROM orders as ord
        LEFT JOIN products as prd
        ON ord.id_produk=prd.id_produk
        LEFT JOIN pembayaran as pay
        ON ord.id_pemesanan = pay.id_pemesanan
        LEFT JOIN orders_status as ords
        ON ord.status_id = ords.status_id
        LEFT JOIN customer as cst
        ON ord.id_customer = cst.id_customer 
        WHERE ord.id_customer='$id_customer' AND ords.status_code='1'
        ORDER BY pay.tgl_bayar DESC;");
        return $data;
    }

    function get_order_not_confirmed($id_customer)
    {
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT DISTINCT orders.id_pemesanan, orders.id_customer, 
        orders.id_produk, orders.status_id, orders.material, 
        orders.quantity, orders.grand_total,orders.tgl_pesan,prd.nama_produk, 
        prd.total_harga,prd.foto,pay.id_payment, pay.status, pay.tgl_bayar, stts.status_code, cst.alamat
        FROM orders
        LEFT JOIN products as prd
        ON orders.id_produk = prd.id_produk
        LEFT JOIN pembayaran as pay
        ON orders.id_pemesanan = pay.id_pemesanan
        LEFT JOIN orders_status as stts
        ON orders.status_id = stts.status_id
        LEFT JOIN customer as cst
        ON orders.id_customer = cst.id_customer 
        WHERE orders.id_customer='$id_customer' AND stts.status_code='0'
        ORDER BY orders.tgl_pesan DESC;");
        return $data;
    }

    function get_order_confirmed($id_customer)
    {
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT DISTINCT orders.id_pemesanan, orders.id_customer, 
        orders.id_produk, orders.status_id, orders.material, 
        orders.quantity, orders.grand_total,orders.tgl_pesan,prd.nama_produk, 
        prd.total_harga,prd.foto,pay.id_payment, pay.status, pay.tgl_bayar, stts.status_code, cst.alamat
        FROM orders
        LEFT JOIN products as prd
        ON orders.id_produk = prd.id_produk
        LEFT JOIN pembayaran as pay
        ON orders.id_pemesanan = pay.id_pemesanan
        LEFT JOIN orders_status as stts
        ON orders.status_id = stts.status_id
        LEFT JOIN customer as cst
        ON orders.id_customer = cst.id_customer 
        WHERE orders.id_customer='$id_customer' 
       
        HAVING stts.status_code='1'
        ORDER BY orders.tgl_pesan DESC;");
        return $data;
        // ambil status_id di table orders_status
        // -- HAVING stts.status_code='0'
    }

    public function orderDelete($id_pemesanan)
    {
        $order_delete = $this->db->query("DELETE FROM orders where id_pemesanan='$id_pemesanan';");
        return $order_delete;
    }
}
