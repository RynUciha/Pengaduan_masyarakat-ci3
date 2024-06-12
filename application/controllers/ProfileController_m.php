<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController_m extends CI_Controller
{


	public function index()
	{
		$data['title'] = 'Profile';

		$masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		if ($masyarakat == TRUE) {
			$data['user'] = $masyarakat;
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_m', $data);
		$this->load->view('templates/topbar_m', $data);
		$this->load->view('user/profile_m');
		$this->load->view('templates/footer');
	}
}