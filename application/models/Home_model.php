<?php

class Home_model extends CI_Model
{

    function get_limittestimonial()
    {
        $hasil = $this->db->query("SELECT * FROM testimonial_customer ORDER BY tgl_testimonial DESC LIMIT 8");
        return $hasil;
    }

    function get_products()
    {
        $products = $this->db->query("SELECT products.id_produk, products.nama_produk, harga, diskon, harga_diskon, 
        total_harga, foto, deskripsi, waktu_pengerjaan, status_produk, min_order, dimensional, 
        size_height, tanggal_masuk,material_satu, material_dua, material_tiga, material_empat, material_lima,category_name
         FROM products
         LEFT JOIN product_material
         ON products.nama_produk = product_material.nama_produk
         LEFT JOIN product_category
         ON products.category_id = product_category.category_id
         GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
         ORDER BY tanggal_masuk DESC");
        return $products;
    }

    function record_count()
    {
        return $this->db->count_all("products");
    }
}
