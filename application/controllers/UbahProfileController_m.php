<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UbahProfileController_m extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Ubah Profil';

        $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        if ($masyarakat) {
            $data['user'] = $masyarakat;
        }

        // ...

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_m', $data);
            $this->load->view('templates/topbar_m', $data);
            $this->load->view('user/edit_m', $data);
            $this->load->view('templates/footer');
        } else {
            // Process form submission and update profile

            // Retrieve input data
            $nama = $this->input->post('nama');
            $telp = $this->input->post('telp');
            $upload_image = $_FILES['foto_profile']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/profile_m/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profile')) {
                    $data_upload = $this->upload->data();
                    $new_foto = $data_upload['file_name'];

                    // Delete previous profile photo
                    $previous_foto = $data['user']['foto_profile'];
                    if ($previous_foto != 'default.jpg') {
                        unlink('./assets/profile_m/' . $previous_foto);
                    }

                    // Update profile data in database
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('masyarakat', ['nama' => $nama, 'telp' => $telp, 'foto_profile' => $new_foto]);

                    // Set flashdata and redirect
                    $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
                        Update data berhasil!
                    </div>');
                    redirect('profilecontroller_m');
                } else {
                    // Error in photo upload
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                        Upload foto profil gagal: ' . $error . '
                    </div>');
                    redirect('UbahProfileController_m');
                }
            } else {
                // Update profile data in database without changing the photo
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('masyarakat', ['nama' => $nama, 'telp' => $telp]);

                // Set flashdata and redirect
                $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
                    Update data berhasil!
                </div>');
                redirect('profilecontroller_m');
            }
        }
    }
}
