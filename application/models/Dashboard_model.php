<?php

class dashboard_model extends CI_Model
{
    function get_data()
    {

        $testimonial = $this->db->get('testimonial_customer');
        return $testimonial;
    }
}