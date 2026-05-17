<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends Warga_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengaduan_model');
    }

    public function index() {
        $data['title'] = 'Pengaduan Saya';
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();

        $this->load->view('templates/warga/header', $data);
        $this->load->view('warga/pengaduan/index', $data);
        $this->load->view('templates/warga/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul_pengaduan', 'Judul', 'required');
        $this->form_validation->set_rules('isi_pengaduan', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Buat Pengaduan';
            $this->load->view('templates/warga/header', $data);
            $this->load->view('warga/pengaduan/tambah');
            $this->load->view('templates/warga/footer');
        } else {
            $config['upload_path']   = './uploads/pengaduan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            $foto_bukti = null;
            if ($this->upload->do_upload('foto_bukti')) {
                $upload_data = $this->upload->data();
                $foto_bukti = $upload_data['file_name'];
            }

            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'judul_pengaduan' => $this->input->post('judul_pengaduan'),
                'kategori_pengaduan' => $this->input->post('kategori_pengaduan'),
                'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                'foto_bukti' => $foto_bukti,
                'status' => 'pending'
            ];

            $this->db->insert('pengaduan', $data);
            $this->session->set_flashdata('success', 'Pengaduan berhasil dikirim. Kami akan segera menindaklanjuti.');
            redirect('pengaduan');
        }
    }
}
