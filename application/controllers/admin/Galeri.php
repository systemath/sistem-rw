<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Galeri';
        $data['galeri'] = $this->Galeri_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/galeri/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Foto Galeri';
            $data['kategori'] = $this->Galeri_model->get_categories();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/galeri/tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $config['upload_path']   = './uploads/galeri/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $data = [
                    'kategori_id' => $this->input->post('kategori_id'),
                    'judul' => $this->input->post('judul'),
                    'foto' => $upload_data['file_name'],
                    'deskripsi' => $this->input->post('deskripsi'),
                    'tanggal_upload' => date('Y-m-d')
                ];

                $this->Galeri_model->insert($data);
                $this->Activity_model->log('Menambahkan foto galeri baru: ' . $this->input->post('judul'));
                $this->session->set_flashdata('success', 'Foto berhasil ditambahkan ke galeri.');
                redirect('admin/galeri');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/galeri/tambah');
            }
        }
    }

    public function edit($id) {
        $data['g'] = $this->Galeri_model->get_by_id($id);
        if (!$data['g']) show_404();

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Foto Galeri';
            $data['kategori'] = $this->Galeri_model->get_categories();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/galeri/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data_update = [
                'kategori_id' => $this->input->post('kategori_id'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']   = './uploads/galeri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    if ($data['g']['foto']) {
                        unlink('./uploads/galeri/' . $data['g']['foto']);
                    }
                    $upload_data = $this->upload->data();
                    $data_update['foto'] = $upload_data['file_name'];
                }
            }

            $this->db->where('id', $id);
            $this->db->update('galeri', $data_update);
            $this->Activity_model->log('Mengupdate foto galeri: ' . $this->input->post('judul'));
            $this->session->set_flashdata('success', 'Foto galeri berhasil diupdate.');
            redirect('admin/galeri');
        }
    }

    public function hapus($id) {
        $g = $this->Galeri_model->get_by_id($id);
        $this->Galeri_model->delete($id);
        $this->Activity_model->log('Menghapus foto galeri: ' . $g['judul']);
        $this->session->set_flashdata('success', 'Foto galeri berhasil dihapus.');
        redirect('admin/galeri');
    }
}
