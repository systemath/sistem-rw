<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Activity_model');
    }

    public function berita() {
        $data['title'] = 'Kategori Berita';
        $data['kategori'] = $this->Kategori_model->get_berita();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/kategori/berita', $data);
        $this->load->view('templates/admin/footer');
    }

    public function berita_tambah() {
        $nama = $this->input->post('nama_kategori');
        $this->Kategori_model->insert_berita([
            'nama_kategori' => $nama,
            'slug' => url_title($nama, 'dash', TRUE)
        ]);
        $this->Activity_model->log('Menambahkan kategori berita: ' . $nama);
        $this->session->set_flashdata('success', 'Kategori berita berhasil ditambahkan.');
        redirect('admin/kategori/berita');
    }

    public function berita_hapus($id) {
        $this->Kategori_model->delete_berita($id);
        $this->Activity_model->log('Menghapus kategori berita ID: ' . $id);
        $this->session->set_flashdata('success', 'Kategori berita berhasil dihapus.');
        redirect('admin/kategori/berita');
    }

    public function galeri() {
        $data['title'] = 'Kategori Galeri';
        $data['kategori'] = $this->Kategori_model->get_galeri();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/kategori/galeri', $data);
        $this->load->view('templates/admin/footer');
    }

    public function galeri_tambah() {
        $nama = $this->input->post('nama_kategori');
        $this->Kategori_model->insert_galeri(['nama_kategori' => $nama]);
        $this->Activity_model->log('Menambahkan kategori galeri: ' . $nama);
        $this->session->set_flashdata('success', 'Kategori galeri berhasil ditambahkan.');
        redirect('admin/kategori/galeri');
    }

    public function galeri_hapus($id) {
        $this->Kategori_model->delete_galeri($id);
        $this->Activity_model->log('Menghapus kategori galeri ID: ' . $id);
        $this->session->set_flashdata('success', 'Kategori galeri berhasil dihapus.');
        redirect('admin/kategori/galeri');
    }
}
