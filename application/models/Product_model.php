<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;


class Product_model extends CI_Model
{


    public function add_data(
        $id_produk,
        $nama_produk,
        $harga,
        $diskon,
        $harga_diskon,
        $total_harga,
        $foto,
        $deskripsi,
        $waktu_pengerjaan,
        $status_produk,
        $category_id,
        $min_order,
        $dimensional,
        $size_height
    ) {
        $id_produk = Uuid::uuid4()->toString();
        $add_data = $this->db->query("INSERT INTO products (id_produk, nama_produk, harga, diskon, harga_diskon, total_harga,
         foto, deskripsi, waktu_pengerjaan, status_produk, category_id, min_order, dimensional, size_height)
        VALUES('$id_produk', '$nama_produk', '$harga', '$diskon', '$harga_diskon', '$total_harga', '$foto',
         '$deskripsi', '$waktu_pengerjaan', '$status_produk', '$category_id','$min_order', '$dimensional', '$size_height')");

        return $add_data;
    }

    public function save_material($material_id, $nama_produk, $material_satu, $material_dua, $material_tiga, $material_empat, $material_lima)
    {

        $add_material = $this->db->query("INSERT INTO product_material 
        (material_id,nama_produk, material_satu, material_dua, material_tiga, material_empat, material_lima) 
        VALUES ('$material_id','$nama_produk', '$material_satu', '$material_dua', '$material_tiga', '$material_empat', '$material_lima')");
        return $add_material;
    }

    function get_product()
    {
        $products = $this->db->query("SELECT products.id_produk, products.nama_produk, harga, diskon, harga_diskon, 
        total_harga, foto, deskripsi, waktu_pengerjaan, status_produk, category_id as nama_kategori,min_order, dimensional, 
        size_height, tanggal_masuk,material_satu, material_dua, material_tiga, material_empat, material_lima
         FROM products
         LEFT JOIN product_material
         ON products.nama_produk = product_material.nama_produk
         GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
         ORDER BY tanggal_masuk DESC");
        return $products;
    }

    function get_produk()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        ORDER BY 
		prd.tanggal_masuk DESC
        LIMIT 8;");
        return $products->result();
    }

    function product($id_produk)
    {
        $data = $this->db->query("SELECT * FROM products WHERE id_produk='$id_produk';");
        return $data;
    }

    function delete_products($id_produk)
    {
        $delete = $this->db->query("DELETE FROM products WHERE id_produk='$id_produk';");
        return $delete;
    }

    function update_data_produk(
        $id_produk,
        $foto,
        $nama_produk,
        $harga,
        $diskon,
        $harga_diskon,
        $total_harga,
        $deskripsi,
        $waktu_pengerjaan,
        $status_produk,
        $min_order,
        $dimensional,
        $size_height
    ) {
        $update = array(

            'id_produk' => $id_produk,
            'foto' => $foto,
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'diskon' => $diskon,
            'harga_diskon' => $harga_diskon,
            'total_harga' => $total_harga,
            'deskripsi' => $deskripsi,
            'waktu_pengerjaan'  => $waktu_pengerjaan,
            'status_produk' => $status_produk,
            'min_order'     => $min_order,
            'dimensional'   => $dimensional,
            'size_height'   => $size_height

        );
        $this->db->where('id_produk', $id_produk);
        $this->db->update('products', $update);
    }


    function get_products()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, prd.harga, prd.diskon, prd.harga_diskon, 
        prd.total_harga, prd.foto, category_name, AVG(rev.rating) as avg_ratings, SUM(ord.quantity) as total_sold
         FROM products as prd
         LEFT JOIN product_category
         ON prd.category_id = product_category.category_id
         LEFT JOIN orders as ord
        ON prd.id_produk = ord.id_produk
         LEFT JOIN reviews as rev
        ON prd.id_produk = rev.id_produk
         GROUP BY 1,2,3,4,5,6,7,8
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function getReviews()
    {
        $data = $this->db->query("SELECT prd.id_produk,prd.nama_produk, COUNT(rvw.reviews_id) as total_review, 
        AVG(rvw.rating) as avg_ratings
        FROM products as prd
        LEFT JOIN reviews as rvw
        ON prd.id_produk = rvw.id_produk
        GROUP BY 1,2");
        return $data;
    }

    function get_category()
    {
        $category = $this->db->query("SELECT * FROM product_category");
        return $category;
    }

    function kode_products($id_produk)
    {
        $id_produk = Uuid::uuid4()->toString();
        return $id_produk;
    }

    function getProducts($id_produk)
    {
        $data = $this->db->query("SELECT * FROM products WHERE id_produk='$id_produk';");
        return $data;
    }

    function get_id_produk($id_produk)
    {
        $data = $this->db->query("SELECT id_produk FROM products
        WHERE id_produk='$id_produk';");
        return $data;
    }


    function get_reviews($id_produk)
    {
        $data = $this->db->query("SELECT prd.nama_produk, rev.rating, rev.review, rev.review_date, 
        usr.nama_lengkap, usr.image as foto
        FROM products as prd
        LEFT JOIN reviews as rev
        ON prd.id_produk = rev.id_produk
        LEFT JOIN customer as usr
        ON rev.id_customer = usr.id_customer
        WHERE prd.id_produk ='$id_produk'
        GROUP BY 1,2,3,4,5,6
        ORDER BY rev.review_date DESC");
        return $data->result();
    }

    function total_review($id_produk)
    {
        $total = $this->db->query("SELECT prd.nama_produk, COUNT(rev.reviews_id) as total_reviews, AVG(rev.rating) as avg_ratings
        FROM products as prd
        LEFT JOIN reviews as rev
        ON prd.id_produk = rev.id_produk
        WHERE prd.id_produk ='$id_produk'
        GROUP BY 1");
        return $total;
    }

    function getbanner()
    {
        $data = $this->db->query("SELECT * FROM banner");
        return $data;
    }

    function getproduct()
    {
        $result = $this->db->query("SELECT * FROM products LIMIT 5");
        return $result;
    }


    function get_promo()
    {

        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
         HAVING prd.diskon <> 0
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function get_sofa()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        WHERE category_name ='Sofa'
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function get_gordyn()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        WHERE category_name ='Gordyn'
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function get_blind()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        WHERE category_name ='Blind'
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function get_vinyls()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        WHERE category_name ='Vinyl'
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function get_others()
    {
        $products = $this->db->query("SELECT prd.id_produk, prd.nama_produk, 
        prd.harga, prd.diskon, prd.harga_diskon,prd.total_harga, prd.foto, 
        IFNULL(ord.totalSold,0) as totalSold,
        IFNULL(rvw.totalRating, 0) as totalRating,
        IFNULL(rvw.avgRating,0) as avgRating,
        pc.category_name
        FROM
		products as prd
        LEFT JOIN (SELECT id_produk, SUM(quantity) as totalSold
			FROM orders 
            GROUP BY id_produk) AS ord 
            ON prd.id_produk = ord.id_produk
        LEFT JOIN (SELECT id_produk , COUNT(rating) as totalRating, AVG(rating) as avgRating
			FROM reviews
            GROUP BY id_produk) AS rvw
            ON prd.id_produk = rvw.id_produk
        LEFT JOIN product_category AS pc 
			ON prd.category_id = pc.category_id
        WHERE category_name ='Lainnya'
         ORDER BY tanggal_masuk DESC");
        return $products->result();
    }

    function total_lainnya()
    {
        $lainnya = $this->db->query("SELECT COUNT(products.id_produk) AS total_other, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        where category_name ='Lainnya'
        GROUP BY 2;");
        return $lainnya;
    }

    function total_sofa()
    {
        $lainnya = $this->db->query("SELECT COUNT(products.id_produk) AS total_sofa, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        where category_name ='Sofa'
        GROUP BY 2;");
        return $lainnya;
    }

    function total_gordyn()
    {
        $lainnya = $this->db->query("SELECT COUNT(products.id_produk) AS total_gordyn, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        where category_name ='Gordyn'
        GROUP BY 2;");
        return $lainnya;
    }

    function total_blind()
    {
        $lainnya = $this->db->query("SELECT COUNT(products.id_produk) AS total_blind, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        where category_name ='Blind'
        GROUP BY 2;");
        return $lainnya;
    }

    function total_vinyl()
    {
        $lainnya = $this->db->query("SELECT COUNT(products.id_produk) AS total_vinyl, category_name
        FROM products
        LEFT JOIN product_category
        ON products.category_id = product_category.category_id
        where category_name ='Vinyl'
        GROUP BY 2;");
        return $lainnya;
    }

    function total_promo()
    {
        $lainnya = $this->db->query("SELECT count(products.id_produk) AS total_promo
        FROM products
        where diskon > 0;");
        return $lainnya;
    }

    function total_produk()
    {
        $lainnya = $this->db->query("SELECT count(products.id_produk) AS total_produk
        FROM products");
        return $lainnya;
    }



    public function ambil_data($keyword = null)
    {
        $this->db->select('prd.id_produk, prd.nama_produk, prd.harga, prd.diskon, prd.harga_diskon, prd.total_harga, foto, SUM(ord.quantity) as total_sold, category_name');
        $this->db->from('products as prd');
        $this->db->join('orders as ord', 'prd.id_produk = ord.id_produk', 'LEFT');
        $this->db->join('product_category', 'prd.category_id = product_category.category_id', 'LEFT');
        $this->db->group_by('prd.id_produk, prd.nama_produk, prd.harga, prd.diskon, prd.harga_diskon, prd.total_harga, foto, category_name');

        if (!empty($keyword)) {
            $this->db->like('prd.nama_produk', $keyword);
        }

        $products = $this->db->get();

        return $products->result_array();
    }
}
