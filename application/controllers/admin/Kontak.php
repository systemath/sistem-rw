<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Pesan Masuk';
        $this->db->order_by('created_at', 'DESC');
        $data['pesan'] = $this->db->get('kontak_pesan')->result_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/kontak/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('kontak_pesan');
        $this->Activity_model->log('Menghapus pesan kontak ID: ' . $id);
        $this->session->set_flashdata('success', 'Pesan berhasil dihapus.');
        redirect('admin/kontak');
    }
}
