<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models here (e.g., $this->load->model('Warga_model');)
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        
        // Mock data for now
        $data['total_warga'] = $this->db->count_all('warga');
        $data['total_surat'] = $this->db->count_all('surat_pengantar');
        $data['total_pengaduan'] = $this->db->count_all('pengaduan');
        $data['total_berita'] = $this->db->count_all('berita');

        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin/footer');
    }
}
