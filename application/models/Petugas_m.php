<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_m extends CI_Model
{

	private $table = 'petugas';
	private $primary_key = 'id_petugas';

	public function create($data)
	{
		// return $this->db->get_where('petugas', ['username' => $username, 'password' => md5($password)]);
		return $this->db->insert($this->table, $data);
	}

}