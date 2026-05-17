<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Warga_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->model('Surat_model');
        $this->load->model('Pengaduan_model');
    }

    public function index() {
        redirect(base_url());
    }
}
