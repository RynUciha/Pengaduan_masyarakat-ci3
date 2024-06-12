<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

}