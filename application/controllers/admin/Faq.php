<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Faq_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Manajemen FAQ';
        $data['faq'] = $this->Faq_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/faq/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah FAQ';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/faq/tambah');
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban')
            ];
            $this->Faq_model->insert($data);
            $this->Activity_model->log('Menambahkan FAQ baru');
            $this->session->set_flashdata('success', 'FAQ berhasil ditambahkan.');
            redirect('admin/faq');
        }
    }

    public function edit($id) {
        $data['f'] = $this->db->get_where('faq', ['id' => $id])->row_array();
        if (!$data['f']) show_404();

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit FAQ';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/faq/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data_update = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban')
            ];
            $this->db->where('id', $id);
            $this->db->update('faq', $data_update);
            $this->Activity_model->log('Mengupdate FAQ ID: ' . $id);
            $this->session->set_flashdata('success', 'FAQ berhasil diupdate.');
            redirect('admin/faq');
        }
    }

    public function hapus($id) {
        $this->Faq_model->delete($id);
        $this->Activity_model->log('Menghapus FAQ ID: ' . $id);
        $this->session->set_flashdata('success', 'FAQ berhasil dihapus.');
        redirect('admin/faq');
    }
}
