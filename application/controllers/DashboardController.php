<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('id_petugas', 'level'))) {
			redirect('auth');
		}
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['petugas'] = $this->db->get('petugas')->num_rows();
		$data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
		$data['pengaduan_proses'] = $this->db->get_where('pengaduan', ['status' => 'proses'])->num_rows();
		$data['pengaduan_selesai'] = $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
	}
}