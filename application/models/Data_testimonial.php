<?php

class Data_testimonial extends CI_Model
{


    function get_testimonial()
    {

        $testimonial = $this->db->get('testimonial_customer');
        return $testimonial;
    }
    function delete($id_testimonial)
    {
        $this->db->where('id_testimonial', $id_testimonial);
        $this->db->delete('testimonial_customer');
    }
}