<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChangePasswordController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Ubah Password';

		$this->form_validation->set_rules('current_password', 'Password Sekarang', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|min_length[3]|max_length[15]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'trim|required|min_length[3]|max_length[15]|matches[new_password]');
		$this->form_validation->set_rules('confirmation_password', 'Konfirmasi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/ganti_password');
			$this->load->view('templates/footer');
		} else {
			$currentPassword = $this->input->post('current_password');
			$newPassword = md5($this->input->post('new_password'));

			$this->changePassword($currentPassword, $newPassword);
		}
	}

	private function changePassword($currentPassword, $newPassword)
	{
		$petugas = $this->db->get_where('petugas', ['id_petugas' => $this->session->userdata('id_petugas')])->row_array();

		if ($petugas) {
			if ($newPassword = md5($currentPassword, $petugas['password'])) {
				$params = [
					'password' => md5($newPassword),
				];

				$this->db->where('username', $petugas['username']);
				$result = $this->db->update('petugas', $params);

				if ($result) {
					$this->session->set_flashdata('msg', 'Ganti password berhasil!');
					redirect('ChangePasswordController');
				} else {
					$this->session->set_flashdata('msg', 'Ganti password gagal!');
					redirect('ChangePasswordController');
				}
			} else {
				$this->session->set_flashdata('msg', 'Password salah!');
				redirect('ChangePasswordController');
			}
		} else {
			$this->session->set_flashdata('msg', 'Password salah!');
			redirect('ChangePasswordController');
		}
	}
}