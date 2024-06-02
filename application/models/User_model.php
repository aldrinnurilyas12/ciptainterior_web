<?php
class User_model extends CI_Model
{

    function get_transaction($id_customer)
    {
        $getTransaction = $this->db->query("SELECT orders.id_customer,COUNT(orders.id_pemesanan) as totals, pay.status
        FROM orders as orders
        LEFT JOIN pembayaran as pay
        ON orders.id_pemesanan = pay.id_pemesanan
        WHERE orders.id_customer='$id_customer' AND pay.status='1'
        GROUP BY 1,3");
        return $getTransaction;
    }

    function get_transactions()
    {
        $id_pemesanan = $this->uri->segment(3);
        $id_customer = $this->session->userdata['id_customer'];
        $data = $this->db->query("SELECT ord.id_pemesanan, ord.id_customer,
        ord.id_produk, ord.material,ord.quantity, SUM(ord.grand_total) as total_shop,tgl_pesan, prd.foto, prd.nama_produk, 
        prd.total_harga,pay.id_payment ,pay.status, pay.tgl_bayar, ords.status_code
        FROM orders as ord
        LEFT JOIN products as prd
        ON ord.id_produk=prd.id_produk
        LEFT JOIN pembayaran as pay
        ON ord.id_pemesanan = pay.id_pemesanan
        LEFT JOIN orders_status as ords
        ON ord.status_id = ords.status_id
        WHERE ord.id_customer='$id_customer' AND ord.id_pemesanan='$id_pemesanan'
        GROUP BY 1,2,3,4,5,7,8,9,10,11,12,13,14
        HAVING ords.status_code='2' OR ords.status_code='3'
        ORDER BY pay.tgl_bayar DESC;");
        return $data;
    }


    function get_payment($id_customer)
    {
        $getTransaction = $this->db->query("SELECT COUNT(id_payment) as total_payment 
        FROM pembayaran WHERE id_customer='$id_customer'
        AND status='1'");
        return $getTransaction;
    }

    function get_kritik($id_customer)
    {
        $getTransaction = $this->db->query("SELECT * FROM kritik_saran WHERE id_customer='$id_customer'");
        return $getTransaction;
    }

    function get_testimonial($id_customer)
    {
        $getTransaction = $this->db->query("SELECT * FROM testimonial_customer WHERE id_customer='$id_customer'");
        return $getTransaction;
    }

    function getImage()
    {
        $image = $this->db->query("SELECT * from customer");
        return $image;
    }

    function get_profile_picture($username)
    {
        $profile_picture = $this->db->query("SELECT image FROM customer WHERE username='$username';");
        $result = $profile_picture->row_array();
        return $result ? $result['image'] : null;
    }

    function update_profile($id_customer, $nama, $alamat, $email, $telepon, $username, $profile_picture)
    {
        $update_data = $this->db->query("UPDATE customer SET nama_lengkap='$nama', alamat='$alamat',email ='$email', telepon='$telepon',
        username ='$username',image ='$profile_picture', register_date = register_date WHERE id_customer='$id_customer'");
        return $update_data;
    }

    function reset_password($register_id, $password)
    {
        $register_id = $this->session->userdata('register_id');
        $encrypt_password = password_hash($password, PASSWORD_BCRYPT);
        $reset = $this->db->query("UPDATE customers_password SET password='$encrypt_password' WHERE register_id='$register_id'");
        return $reset;
    }

    function saved_items($id_customer, $id_produk)
    {
        $saved = $this->db->query("INSERT INTO shopping_list (id_customer, id_produk) 
        VALUES('$id_customer', '$id_produk')");
        return $saved;
    }

    function getSavedItems($id_customer)
    {
        $savedData = $this->db->query(
            "SELECT shp.id_list, shp.id_produk, prd.nama_produk as nama_produk, 
        prd.foto as foto,prd.total_harga as price,  list_date
        FROM shopping_list as shp
        LEFT JOIN products as prd
        ON shp.id_produk = prd.id_produk
        WHERE shp.id_customer = '$id_customer'
        ORDER BY list_date DESC;"
        );
        return $savedData;
    }

    function deleteItems($id_list)
    {
        $deleteItems = $this->db->query("DELETE FROM shopping_list WHERE id_list='$id_list'");
        return $deleteItems;
    }

    function user_notifications($id_customer)
    {
        $id_customer = $this->session->userdata('id_customer');
        $notif_orders = $this->db->query(
            "SELECT DISTINCT id_pemesanan,ord.id_customer,nama_produk, SUM(grand_total) as spent_total, tgl_pesan,status_code, confirm_date
        FROM orders as ord
        LEFT JOIN products as prd
        ON ord.id_produk = prd.id_produk
        LEFT JOIN customer as cst
        ON ord.id_customer = cst.id_customer
        LEFT JOIN orders_status as sts
        ON ord.status_id = sts.status_id
        WHERE ord.id_customer ='$id_customer'
        GROUP BY 1,2,3,5,6,7
        HAVING status_code='1' OR status_code='2' OR status_code='0'
        ORDER BY confirm_date DESC;"
        );
        return $notif_orders;
    }

    public function confirmed_notification($id_customer)
    {
        $id_customer = $this->session->userdata('id_customer');
        $notif_orders = $this->db->query(
            "SELECT DISTINCT id_pemesanan,ord.id_customer,nama_produk, SUM(grand_total) as spent_total, tgl_pesan, status_code, confirm_date
        FROM orders as ord
        LEFT JOIN products as prd
        ON ord.id_produk = prd.id_produk
        LEFT JOIN customer as cst
        ON ord.id_customer = cst.id_customer
        LEFT JOIN orders_status as sts
        ON ord.status_id = sts.status_id
        WHERE ord.id_customer ='$id_customer'
        GROUP BY 1,2,3,5,6,7
        HAVING status_code='1' OR status_code='2'
        ORDER BY confirm_date DESC;"
        );
        return $notif_orders;
    }

    public function pay_notifications($id_customer)
    {
        $pay_notif = $this->db->query("WITH pay_notif AS( SELECT pay.id_payment, pay.id_pemesanan, pay.id_customer,prd.nama_produk, pay.grand_total, pay.status, tgl_bayar
        FROM pembayaran as pay
        LEFT JOIN orders as ord
        ON pay.id_pemesanan = ord.id_pemesanan
        LEFT JOIN products as prd
        ON ord.id_produk = prd.id_produk) 

        SELECT * FROM pay_notif WHERE id_customer='$id_customer' AND status='1' ORDER BY tgl_bayar DESC;");
        return $pay_notif;
    }

    public function get_notif_total($id_customer)
    {
        $notif_total = $this->db->query(
            "SELECT COUNT(*) as total_notif
            FROM (
                SELECT COALESCE(ord.id_pemesanan, pay.id_pemesanan) as id_pemesanan
                FROM orders as ord
                LEFT JOIN pembayaran as pay ON ord.id_pemesanan = pay.id_pemesanan
                WHERE ord.id_customer='$id_customer'
            ) as notiftotal;
            "
        );
        return $notif_total;
    }

    public function get_customers($id_customer)
    {
        $invoice = $this->db->query("SELECT * FROM customer WHERE id_customer ='$id_customer'");
        return $invoice;
    }
    public function invoice_total($id_customer, $id_pemesanan)
    {
        $invoice_total = $this->db->query("SELECT id_pemesanan,SUM(grand_total) as spent_total
        FROM orders
        WHERE id_customer='$id_customer' AND id_pemesanan='$id_pemesanan'
        GROUP BY 1;");
        return $invoice_total;
    }
}
