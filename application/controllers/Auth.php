<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->_redirect_by_role();
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->login($username, $password);

            if ($user) {
                if ($user['status_akun'] == 'nonaktif') {
                    $this->session->set_flashdata('error', 'Akun Anda dinonaktifkan. Silakan hubungi admin.');
                    redirect('auth');
                }

                // Get Warga Photo if exists
                $foto = null;
                if ($user['role'] == 'warga') {
                    $warga = $this->db->get_where('warga', ['user_id' => $user['id']])->row_array();
                    $foto = $warga['foto'] ?? null;
                }

                $session_data = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'foto' => $foto,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                $this->User_model->update_last_login($user['id']);

                if ($user['force_password_change'] == 1) {
                    $this->session->set_flashdata('info', 'Silakan ganti password default Anda untuk keamanan.');
                    redirect('auth/change_password');
                }

                $this->_redirect_by_role();
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth');
            }
        }
    }

    public function change_password() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/change_password');
        } else {
            $new_password = $this->input->post('new_password');
            $user_id = $this->session->userdata('user_id');

            $data = [
                'password' => password_hash($new_password, PASSWORD_BCRYPT),
                'force_password_change' => 0
            ];

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);

            $this->session->set_flashdata('success', 'Password berhasil diperbarui. Silakan login kembali.');
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    private function _redirect_by_role() {
        $role = $this->session->userdata('role');
        if ($role == 'admin') {
            redirect('admin/dashboard');
        } else {
            redirect(base_url());
        }
    }
}
