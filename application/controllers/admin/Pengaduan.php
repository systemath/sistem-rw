<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengaduan_model');
    }

    public function index() {
        $data['title'] = 'Pengaduan Warga';
        $data['pengaduan'] = $this->Pengaduan_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/pengaduan/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function detail($id) {
        $data['title'] = 'Detail Pengaduan';
        $data['p'] = $this->Pengaduan_model->get_by_id($id);
        if (!$data['p']) show_404();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/pengaduan/detail', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tanggapi($id) {
        $data = [
            'status' => $this->input->post('status'),
            'tanggapan_admin' => $this->input->post('tanggapan_admin'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($_FILES['foto_tindak_lanjut']['name'])) {
            $config['upload_path']   = './uploads/pengaduan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_tindak_lanjut')) {
                $upload_data = $this->upload->data();
                $data['foto_tindak_lanjut'] = $upload_data['file_name'];
            }
        }

        $this->Pengaduan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Tanggapan berhasil disimpan.');
        redirect('admin/pengaduan/detail/'.$id);
    }

    public function cetak() {
        $data['title'] = 'Laporan Pengaduan Warga';
        $data['pengaduan'] = $this->Pengaduan_model->get_all();
        $this->load->view('admin/pengaduan/cetak', $data);
    }
}
