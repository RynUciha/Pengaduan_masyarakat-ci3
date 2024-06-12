<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Model');

    }
    public function tampil()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $password = md5($this->input->post('password', true));
            $this->cek($username, $password);
        }
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $password = md5($this->input->post('password', true));
            $this->cek($username, $password);
        }
    }
    
    private function cek($username, $password)
{
    $masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row();

    if ($masyarakat) {
        // If a masyarakat with the given username is found
        // Check the password
        if (md5($password, $masyarakat->password)) {
            // Password is correct
            // Create session userdata
            $session = [
                'username' => $masyarakat->username,
            ];

            $this->session->set_userdata($session);

            $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
                Login berhasil!
            </div>');

            return redirect('ProfileController_m');
        } else {
            // Password is incorrect
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                Username atau Password salah!
            </div>');

            return redirect('Auth');
        }
    } else {
        // No masyarakat found with the given username
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            Username atau Password salah!
        </div>');

        return redirect('Auth');
    }
}

    
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login_admin');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $this->cek_login($username, $password);
        }
    }

    private function cek_login($username, $password)
    {
        $this->load->model('Auth_model', 'mauth');

        $user = $this->mauth->validasiLogin($username, $password);

        if ($user->num_rows() == 1) {
            $user_data = $user->row_array();

            $session_data = [
                'id_petugas' => $user_data['id_petugas'],
                'username' => $user_data['username'],
                'level' => $user_data['level']
            ];
            $this->session->set_userdata($session_data);
            redirect('dashboardcontroller');
        } else {
            redirect('auth');
        }
    }



    public function registrations()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required|numeric|is_unique[masyarakat.nik]');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont math!',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrations');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik')),
                'nama' => htmlspecialchars($this->input->post('name')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => md5($this->input->post('password1')),
                'telp' => $this->input->post('telp'),
                'foto profile' => 'user.png'
            ];
            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Registrasi Suksess Silahkan Login
</div>');
            redirect('auth');
        }
    }
    public function username_check($str = NULL)
    {
        if (!empty($str)) {
            $masyarakat = $this->db->get_where('masyarakat', ['username' => $str])->row_array();
            $petugas = $this->db->get_where('petugas', ['username' => $str])->row_array();

            if ($masyarakat == TRUE or $petugas == TRUE) {

                $this->form_validation->set_message('username_check', 'Username ini sudah terdaftar ada.');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            $this->form_validation->set_message('username_check', 'Inputan Kosong');

            return FALSE;
        }
    }
    public function logout()
    {
        $data = ['id_petugas', 'level'];

        $this->session->unset_userdata($data);

        $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
			Logout berhasil!
			</div>');

        redirect('auth');
    }
}