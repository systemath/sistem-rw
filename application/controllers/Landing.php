<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Berita_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Galeri_model');
        $this->load->model('Faq_model');
    }

    public function index() {
        $data['title'] = 'Home';
        
        $this->db->limit(3);
        $data['berita'] = $this->Berita_model->get_all();
        
        $this->db->limit(3);
        $this->db->where('status_publish', 'publish');
        $data['pengumuman'] = $this->Pengumuman_model->get_all();

        $data['total_warga'] = $this->db->count_all('warga');

        // Fetch Warga Data if Logged In
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') == 'warga') {
            $user_id = $this->session->userdata('user_id');
            $this->load->model('Warga_model');
            $this->load->model('Surat_model');
            $this->load->model('Pengaduan_model');

            $this->db->where('user_id', $user_id);
            $data['warga'] = $this->db->get('warga')->row_array();

            if ($data['warga']) {
                $this->db->where('warga_id', $data['warga']['id']);
                $data['total_surat'] = $this->db->count_all_results('surat_pengantar');

                $this->db->where('user_id', $user_id);
                $data['total_pengaduan'] = $this->db->count_all_results('pengaduan');

                $this->db->where('warga_id', $data['warga']['id']);
                $this->db->order_by('created_at', 'DESC');
                $this->db->limit(5);
                $data['recent_surat'] = $this->db->get('surat_pengantar')->result_array();
            }
        }

        $this->load->view('templates/public/header', $data);
        $this->load->view('public/home', $data);
        $this->load->view('templates/public/footer');
    }

    public function berita() {
        $data['title'] = 'Berita & Kegiatan RW';
        $data['berita'] = $this->Berita_model->get_all();
        
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/berita/index', $data);
        $this->load->view('templates/public/footer');
    }

    public function berita_detail($slug) {
        $this->db->select('berita.*, kategori_berita.nama_kategori');
        $this->db->from('berita');
        $this->db->join('kategori_berita', 'kategori_berita.id = berita.kategori_id', 'left');
        $this->db->where('berita.slug', $slug);
        $data['b'] = $this->db->get()->row_array();

        if (!$data['b']) show_404();

        $data['title'] = $data['b']['judul'];
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/berita/detail', $data);
        $this->load->view('templates/public/footer');
    }

    public function pengumuman() {
        $data['title'] = 'Pengumuman';
        $this->db->where('status_publish', 'publish');
        $data['pengumuman'] = $this->Pengumuman_model->get_all();
        
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/pengumuman', $data);
        $this->load->view('templates/public/footer');
    }

    public function galeri() {
        $data['title'] = 'Galeri Kegiatan';
        $data['galeri'] = $this->Galeri_model->get_all();
        
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/galeri', $data);
        $this->load->view('templates/public/footer');
    }

    public function faq() {
        $data['title'] = 'FAQ';
        $data['faq'] = $this->Faq_model->get_all();
        
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/faq', $data);
        $this->load->view('templates/public/footer');
    }

    public function kontak() {
        $data['title'] = 'Hubungi Kami';
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/kontak');
        $this->load->view('templates/public/footer');
    }

    public function tentang() {
        $data['title'] = 'Tentang RW';
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/tentang');
        $this->load->view('templates/public/footer');
    }

    public function visi_misi() {
        $data['title'] = 'Visi & Misi';
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/visi_misi');
        $this->load->view('templates/public/footer');
    }

    public function struktur() {
        $data['title'] = 'Struktur Organisasi';
        $this->load->view('templates/public/header', $data);
        $this->load->view('public/struktur');
        $this->load->view('templates/public/footer');
    }

    public function kirim_pesan() {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        ];
        $this->db->insert('kontak_pesan', $data);
        $this->session->set_flashdata('success', 'Pesan Anda berhasil dikirim. Terima kasih.');
        redirect('kontak');
    }
}
