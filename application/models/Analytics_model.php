<?php

class Analytics_model extends CI_Model
{

    function getCustomer()
    {
        $customer = $this->db->query("SELECT COUNT(id_customer) as total_customer from customer");
        return $customer;
    }

    function getOrders()
    {
        $order = $this->db->query("SELECT COUNT(id_payment) as total_order, SUM(grand_total) as revenue FROM pembayaran");
        return $order;
    }



    // Write query with condition pay status 1
    function getProducts()
    {
        $products = $this->db->query("SELECT ord.id_produk,prd.foto,
            prd.nama_produk,prd.total_harga,
            SUM(ord.grand_total) AS revenue, 
            SUM(ord.quantity) AS total_sold,
            pay.status
            FROM products AS prd
            LEFT JOIN orders AS ord 
            ON prd.id_produk = ord.id_produk
            LEFT JOIN pembayaran as pay
            ON ord.id_pemesanan = pay.id_pemesanan
            WHERE pay.status='1'
            GROUP BY 1,2,3,4,7
            ORDER BY revenue DESC;");
        return $products;
    }


    function getstatisticProducts()
    {
        $products = $this->db->query("SELECT ord.id_produk,prd.foto,
            prd.nama_produk,prd.total_harga,
            SUM(ord.grand_total) AS revenue, 
            SUM(ord.quantity) AS total_sold,
            pay.status
            FROM products AS prd
            LEFT JOIN orders AS ord 
            ON prd.id_produk = ord.id_produk
            LEFT JOIN pembayaran as pay
            ON ord.id_pemesanan = pay.id_pemesanan
            WHERE pay.status='1'
            GROUP BY 1,2,3,4,7
            ORDER BY revenue DESC;");
        return $products;
    }

    function total_revenue()
    {
        $total = $this->db->query("SELECT SUM(ord.grand_total) AS total_revenue, 
        pay.status
        FROM products AS prd
        LEFT JOIN orders AS ord 
        ON prd.id_produk = ord.id_produk
        LEFT JOIN pembayaran as pay
        ON ord.id_pemesanan = pay.id_pemesanan
        WHERE pay.status='1'
        GROUP BY 2;");
        return $total;
    }


    function getKategori()
    {
        $products = $this->db->query("SELECT  SUM(ord.quantity) as total_sold,category_name as kategori,pay.status
        FROM products as prd
        LEFT JOIN orders as ord
        ON prd.id_produk = ord.id_produk
        LEFT JOIN product_category as ctg
        ON prd.category_id = ctg.category_id
        LEFT JOIN pembayaran as pay
        ON ord.id_pemesanan = pay.id_pemesanan
        WHERE pay.status ='1'
        GROUP BY 2,3;");
        return $products;
    }

    function revenueChartMonth()
    {
        $data = $this->db->query("SELECT SUM(grand_total) as revenue , DATE_FORMAT(tgl_bayar, ' %d - %m - %y') as tanggal from pembayaran
        GROUP BY 2
        ORDER BY tanggal;");
        return $data;
    }
}