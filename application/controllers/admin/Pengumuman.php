<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengumuman_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Pengumuman';
        $data['pengumuman'] = $this->Pengumuman_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/pengumuman/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Pengumuman';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/pengumuman/tambah');
            $this->load->view('templates/admin/footer');
        } else {
            $config['upload_path']   = './uploads/pengumuman/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            $gambar = null;
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'gambar' => $gambar,
                'tanggal_publish' => $this->input->post('tanggal_publish'),
                'status_publish' => $this->input->post('status_publish')
            ];

            $this->Pengumuman_model->insert($data);
            $this->Activity_model->log('Menambahkan pengumuman baru: ' . $this->input->post('judul'));
            $this->session->set_flashdata('success', 'Pengumuman berhasil ditambahkan.');
            redirect('admin/pengumuman');
        }
    }

    public function edit($id) {
        $data['p'] = $this->Pengumuman_model->get_by_id($id);
        if (!$data['p']) show_404();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Pengumuman';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/pengumuman/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data_update = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'tanggal_publish' => $this->input->post('tanggal_publish'),
                'status_publish' => $this->input->post('status_publish')
            ];

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './uploads/pengumuman/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    if ($data['p']['gambar']) {
                        unlink('./uploads/pengumuman/' . $data['p']['gambar']);
                    }
                    $upload_data = $this->upload->data();
                    $data_update['gambar'] = $upload_data['file_name'];
                }
            }

            $this->db->where('id', $id);
            $this->db->update('pengumuman', $data_update);
            $this->Activity_model->log('Mengupdate pengumuman: ' . $this->input->post('judul'));
            $this->session->set_flashdata('success', 'Pengumuman berhasil diupdate.');
            redirect('admin/pengumuman');
        }
    }

    public function hapus($id) {
        $p = $this->Pengumuman_model->get_by_id($id);
        $this->Pengumuman_model->delete($id);
        $this->Activity_model->log('Menghapus pengumuman: ' . $p['judul']);
        $this->session->set_flashdata('success', 'Pengumuman berhasil dihapus.');
        redirect('admin/pengumuman');
    }
}
