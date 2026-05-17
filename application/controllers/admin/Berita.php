<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Berita';
        $data['berita'] = $this->Berita_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/berita/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi Berita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Berita';
            $data['kategori'] = $this->Berita_model->get_categories();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/berita/tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $config['upload_path']   = './uploads/berita/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            $thumbnail = null;
            if ($this->upload->do_upload('thumbnail')) {
                $upload_data = $this->upload->data();
                $thumbnail = $upload_data['file_name'];
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => url_title($this->input->post('judul'), 'dash', TRUE),
                'kategori_id' => $this->input->post('kategori_id'),
                'isi' => $this->input->post('isi'),
                'thumbnail' => $thumbnail,
                'tanggal_publish' => $this->input->post('tanggal_publish'),
                'penulis' => $this->session->userdata('nama'),
                'status_publish' => $this->input->post('status_publish')
            ];

            $this->Berita_model->insert($data);
            $this->Activity_model->log('Menambahkan berita baru: ' . $this->input->post('judul'));
            $this->session->set_flashdata('success', 'Berita berhasil diterbitkan.');
            redirect('admin/berita');
        }
    }

    public function edit($id) {
        $this->db->where('id', $id);
        $data['b'] = $this->db->get('berita')->row_array();
        if (!$data['b']) show_404();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Berita';
            $data['kategori'] = $this->Berita_model->get_categories();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/berita/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data_update = [
                'judul' => $this->input->post('judul'),
                'slug' => url_title($this->input->post('judul'), 'dash', TRUE),
                'kategori_id' => $this->input->post('kategori_id'),
                'isi' => $this->input->post('isi'),
                'tanggal_publish' => $this->input->post('tanggal_publish'),
                'status_publish' => $this->input->post('status_publish')
            ];

            if (!empty($_FILES['thumbnail']['name'])) {
                $config['upload_path']   = './uploads/berita/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('thumbnail')) {
                    if ($data['b']['thumbnail']) {
                        unlink('./uploads/berita/' . $data['b']['thumbnail']);
                    }
                    $upload_data = $this->upload->data();
                    $data_update['thumbnail'] = $upload_data['file_name'];
                }
            }

            $this->db->where('id', $id);
            $this->db->update('berita', $data_update);
            $this->Activity_model->log('Mengupdate berita: ' . $this->input->post('judul'));
            $this->session->set_flashdata('success', 'Berita berhasil diupdate.');
            redirect('admin/berita');
        }
    }

    public function hapus($id) {
        $b = $this->db->get_where('berita', ['id' => $id])->row_array();
        $this->Berita_model->delete($id);
        $this->Activity_model->log('Menghapus berita: ' . $b['judul']);
        $this->session->set_flashdata('success', 'Berita berhasil dihapus.');
        redirect('admin/berita');
    }
}
