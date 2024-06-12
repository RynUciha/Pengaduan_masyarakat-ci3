<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function ceklogin($username, $password)
    {
        $hashedPassword = md5($password);
        return $this->db->get_where('masyarakat', ['username' => $username, 'password' => $hashedPassword]);
    }
    public function validasiLogin($username, $password)
    {
        $hashedPassword = md5($password);
        return $this->db->get_where('petugas', ['username' => $username, 'password' => $hashedPassword]);
    }

}


/* End of file Auth_model.php and path \application\models\Auth_model.php */