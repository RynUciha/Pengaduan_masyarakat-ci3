<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChangePasswordController_m extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Ubah Password';

		$this->form_validation->set_rules('current_password', 'Password Sekarang', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|min_length[3]|max_length[15]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'trim|required|min_length[3]|max_length[15]|matches[new_password]');
		$this->form_validation->set_rules('confirmation_password', 'Konfirmasi', 'required');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_m', $data);
			$this->load->view('templates/topbar_m', $data);
			$this->load->view('user/ganti_password_m');
			$this->load->view('templates/footer');
		else:
			$passwordSekarang = htmlspecialchars($this->input->post('current_password', true));
			$passwordBaru = htmlspecialchars($this->input->post('new_password', true));

			$this->change_password($passwordSekarang, $passwordBaru);
		endif;
	}

	public function change_password($passwordSekarang, $passwordBaru)
	{
		// cek akun di table masyarakat dan petugas berdasarkan username
		$masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		if ($masyarakat == TRUE):

			if ($passwordBaru = md5($passwordSekarang, $masyarakat['password'])):

				$params = [
					'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
				];

				$resp = $this->db->update('masyarakat', $params, ['nik' => $masyarakat['nik']]);
				if ($resp):
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Ganti password berhasil!
						</div>');

					redirect('ChangePasswordController_m');
				else:
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Ganti password gagal!
						</div>');

					redirect('ChangePasswordController_m');
				endif;

			else:
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Password salah!
					</div>');

				redirect('ChangePasswordController_m');
			endif;
		else:
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Password salah!
				</div>');

			redirect('ChangePasswordController_m');
		endif;
	}
}

/* End of file ChangePasswordController.php */
/* Location: ./application/controllers/Auth/ChangePasswordController.php */