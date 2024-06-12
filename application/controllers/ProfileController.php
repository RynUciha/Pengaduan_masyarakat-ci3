<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}
	public function index()
	{
		$level = $this->session->userdata('level');
		if ($level == 'admin') {
			$this->adminProfile();
		} elseif ($level == 'petugas') {
			$this->petugasProfile();
		} else {
			redirect('BlockedController');
		}
	}
	private function adminProfile()
	{
		$data['title'] = 'Admin Profile';

		// Menggunakan model atau metode untuk mendapatkan data pengguna
		$data['user'] = $this->model->getAdminData();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}


	private function petugasProfile()
	{
		$data['title'] = 'Petugas Profile';
		$data['user'] = $this->model->getPetugasData();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}
}