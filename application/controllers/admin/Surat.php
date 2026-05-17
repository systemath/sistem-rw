<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Surat_model');
    }

    public function index() {
        $data['title'] = 'Pengajuan Surat';
        $data['surat'] = $this->Surat_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/surat/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function detail($id) {
        $data['title'] = 'Detail Pengajuan Surat';
        $data['s'] = $this->Surat_model->get_by_id($id);
        if (!$data['s']) show_404();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/surat/detail', $data);
        $this->load->view('templates/admin/footer');
    }

    public function update_status($id) {
        $status = $this->input->post('status');
        $data = ['status' => $status];

        if ($status == 'selesai') {
            $config['upload_path']   = './uploads/surat/';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_surat_jadi')) {
                $upload_data = $this->upload->data();
                $data['file_surat_jadi'] = $upload_data['file_name'];
                $data['tanggal_selesai'] = date('Y-m-d');
                $data['nomor_surat'] = $this->input->post('nomor_surat');
            }
        }

        $this->Surat_model->update($id, $data);
        $this->session->set_flashdata('success', 'Status surat berhasil diperbarui.');
        redirect('admin/surat/detail/'.$id);
    }

    public function cetak() {
        $data['title'] = 'Laporan Pengajuan Surat';
        $data['surat'] = $this->Surat_model->get_all();
        $this->load->view('admin/surat/cetak', $data);
    }
}
