<?php

class Blog_model extends CI_Model
{

    function getArticle()
    {
        $data = $this->db->query("SELECT * FROM blog ORDER BY article_date DESC LIMIT 6 ");
        return $data;
    }


    function getBlog($id)
    {
        $data = $this->db->query("SELECT * FROM blog WHERE id='$id'");
        return $data;
    }


    function delete_banner($id_banner)
    {
        $delete_banner = $this->db->query("DELETE FROM banner WHERE id='$id_banner';");
        return $delete_banner;
    }
}
