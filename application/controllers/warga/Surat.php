<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends Warga_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Surat_model');
    }

    public function index() {
        $data['title'] = 'Pengajuan Surat Saya';
        $user_id = $this->session->userdata('user_id');
        
        $this->db->where('user_id', $user_id);
        $warga = $this->db->get('warga')->row_array();

        $this->db->where('warga_id', $warga['id']);
        $this->db->order_by('created_at', 'DESC');
        $data['surat'] = $this->db->get('surat_pengantar')->result_array();

        $this->load->view('templates/warga/header', $data);
        $this->load->view('warga/surat/index', $data);
        $this->load->view('templates/warga/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Buat Pengajuan Surat';
            $this->load->view('templates/warga/header', $data);
            $this->load->view('warga/surat/tambah');
            $this->load->view('templates/warga/footer');
        } else {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id', $user_id);
            $warga = $this->db->get('warga')->row_array();

            $config['upload_path']   = './uploads/surat/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            $file_persyaratan = null;
            if ($this->upload->do_upload('file_persyaratan')) {
                $upload_data = $this->upload->data();
                $file_persyaratan = $upload_data['file_name'];
            }

            $data = [
                'warga_id' => $warga['id'],
                'jenis_surat' => $this->input->post('jenis_surat'),
                'keperluan' => $this->input->post('keperluan'),
                'keterangan' => $this->input->post('keterangan'),
                'file_persyaratan' => $file_persyaratan,
                'status' => 'menunggu',
                'tanggal_pengajuan' => date('Y-m-d')
            ];

            $this->db->insert('surat_pengantar', $data);
            $this->session->set_flashdata('success', 'Pengajuan surat berhasil dikirim. Silakan tunggu proses verifikasi.');
            redirect('pengajuan-surat');
        }
    }
}
