<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->db->get('users')->result_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/users/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function status($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('users', ['status_akun' => $status]);
        $this->Activity_model->log('Mengubah status user ID: ' . $id . ' menjadi ' . $status);
        $this->session->set_flashdata('success', 'Status user berhasil diubah.');
        redirect('admin/users');
    }

    public function reset_password($id) {
        $new_password = password_hash('123456', PASSWORD_BCRYPT);
        $this->db->where('id', $id);
        $this->db->update('users', ['password' => $new_password]);
        $this->Activity_model->log('Reset password user ID: ' . $id);
        $this->session->set_flashdata('success', 'Password berhasil direset menjadi: 123456');
        redirect('admin/users');
    }
}
