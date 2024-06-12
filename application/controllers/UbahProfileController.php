<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UbahProfileController extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Ubah Profil';

        $petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        if ($petugas == TRUE) {
            $data['user'] = $petugas;
        }
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama_petugas');
            $telp = $this->input->post('telp');
            $upload_image = $_FILES['foto_profile']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 7048;
                $config['upload_path'] = './assets/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profile')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto_profile', $new_foto);
                } else {
                    // Penanganan jika proses upload gagal
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                        Upload foto pengaduan gagal: ' . $error . '
                    </div>');
                    redirect('UbahProfileController');
                }

            }

            $this->db->where('username', $this->session->userdata('level'));
            $this->db->update('petugas', ['nama_petugas' => $nama, 'telp' => $telp, 'foto_profile' => $upload_image]);

            $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
                Update data berhasil!
            </div>');
            redirect('profilecontroller');
        }
    }
}