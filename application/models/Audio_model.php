<?php

class Audio_model extends CI_Model
{

    function getaudio()
    {
        $data = $this->db->query("SELECT * FROM audio_files ORDER BY created_at DESC");
        return $data;
    }
}
