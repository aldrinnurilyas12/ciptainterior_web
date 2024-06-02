<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Order_model extends CI_Model
{
    public function getAllOrder()
    {
        $this->db->select('*');
        $query = $this->db->get("orders");
        return $query->result();
    }

    function get_products($id_produk)
    {
        $query = $this->db->query("SELECT id_produk, nama_produk, harga, diskon, harga_diskon, total_harga,
        foto, deskripsi, waktu_pengerjaan, status_produk, products.category_id, min_order, dimensional, size_height, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        WHERE id_produk ='$id_produk'
        GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15");
        return $query;
    }

    function order($id_pemesanan, $id_customer, $id_produk, $status_id, $material, $qty, $grand_total)
    {
        // $id_pemesanan = Uuid::uuid4()->toString();
        $order = $this->db->query("INSERT INTO orders (id_pemesanan, id_customer,id_produk, status_id, material, quantity, grand_total) 
        VALUES('$id_pemesanan','$id_customer','$id_produk','$status_id','$material','$qty','$grand_total')");
        return $order;
    }



    // ORDER WITH SHOPPING CART
    function order_services($id_pemesanan, $id_customer, $status_id, $quantity, $grand_total)
    {
        $id_customer = $this->session->userdata('id_customer');
        $status_id = $this->input->post('status_id');
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_pemesanan'  => $id_pemesanan,
                'id_customer'   => $id_customer,
                'id_produk'     => $items['id'],
                'status_id'     => $status_id,
                'quantity'      => $items['qty'],
                'grand_total'   => $items['subtotal']
            );
            $this->db->insert('orders', $data);
        }
        return true;
    }

    function set_status($status_id, $status_code)
    {
        $data = $this->db->query("INSERT INTO orders_status (status_id, status_code)
        VALUES ('$status_id','$status_code') ");
        return $data;
    }


    function get_sold($id_produk)
    {

        $result = $this->db->query("SELECT prd.nama_produk, SUM(ord.quantity) as total_sold, pay.status
        FROM products as prd
        LEFT JOIN orders as ord
        ON prd.id_produk = ord.id_produk
        LEFT JOIN pembayaran as pay 
        ON ord.id_pemesanan = pay.id_pemesanan
        WHERE prd.id_produk='$id_produk' AND pay.status='1'
        GROUP BY 1,3;");
        return $result;
    }

    function get_sold_product()
    {
        $result = $this->db->query("SELECT prd.id_produk, prd.nama_produk, prd.harga, prd.diskon, prd.harga_diskon, 
        prd.total_harga, foto, SUM(ord.quantity) as total_sold
         FROM products as prd
          LEFT JOIN orders as ord
        ON prd.id_produk = ord.id_produk
         GROUP BY 1,2,3,4,5
         ORDER BY tanggal_masuk DESC");
        return $result;
    }

    function get_material_product($id_produk)
    {
        $query = $this->db->query("SELECT prd.nama_produk, material_satu, material_dua, material_tiga, material_empat, material_lima
        FROM products as prd
        JOIN  product_material as mtr
        ON prd.nama_produk= mtr.nama_produk
        WHERE prd.id_produk ='$id_produk'
        GROUP BY 1,2,3,4,5, 6");
        return $query->result();
    }

    function kodeunik()
    {
        $id_pemesanan = Uuid::uuid4()->toString();
        return $id_pemesanan;
    }

    function status_id()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(status_id,6)) AS kd_max FROM orders_status where date(confirm_date)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "code_status" . date('dmy') . $kd;
    }






    // FIXED THE BUGS
    function get_id_order()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pemesanan,6)) AS kd_max FROM orders where date(orders.tgl_pesan);");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "INV-" . date('dmy') . "-" . $kd;
    }


    function get_status_id()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pemesanan,6)) AS kd_max FROM orders where date(orders.tgl_pesan);");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "STS" . date('dmy') . "-" . $kd;
    }
}
