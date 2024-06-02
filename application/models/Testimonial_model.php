<?php

class Testimonial_model extends CI_Model
{

    function get_alltestimonial()
    {

        $result = $this->db->query("SELECT * FROM testimonial_customer ORDER BY tgl_testimonial DESC");
        return $result->result();
    }

    function idpayment($id_payment)
    {
        $hsl = $this->db->query("SELECT * FROM pembayaran WHERE id_payment='$id_payment'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_payment' => $data->id_payment,
                    'nama_produk' => $data->nama_produk,
                    'nm_customer' => $data->nm_customer,
                    'tgl_bayar' => $data->tgl_bayar


                );
            }
        }
        return $hasil;
    }
    function record_count()
    {
    }
}
