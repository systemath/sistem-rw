<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Activity Log';
        $data['logs'] = $this->Activity_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/activity_log/index', $data);
        $this->load->view('templates/admin/footer');
    }
}
