<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilModel extends CI_Model
{
    public function getProfil()
    {
        // Ambil data profil dari tabel masyarakat berdasarkan username
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        return $this->db->get('masyarakat')->row_array();
    }

    public function updateProfil($telp, $foto_profile)
    {
        $data = array(
            'telp' => $telp,
            'foto_profile' => $foto_profile
        );

        $this->db->where('id', 1);
        $this->db->set($data); // Use the "set" method to set the updated data
        $this->db->update('pengguna');
    }

}