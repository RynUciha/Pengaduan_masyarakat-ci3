<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    public function getAdminData()
    {
        // Query to retrieve admin data from the database
        $query = $this->db->get_where('petugas', ['level' => 'admin']);

        // Check if the query has returned any rows


        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }
    public function getPetugasData()
    {
        // Query to retrieve petugas data from the database
        $query = $this->db->get_where('petugas', ['level' => 'petugas']);

        // Check if the query has returned any rows
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }


}