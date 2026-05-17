<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            show_error('Akses ditolak!', 403);
        }
    }
}

class Warga_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'warga') {
            show_error('Akses ditolak!', 403);
        }
    }
}
