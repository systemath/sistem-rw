<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

    public function get_all() {
        $this->db->select('surat_pengantar.*, warga.nama_lengkap, warga.nik');
        $this->db->from('surat_pengantar');
        $this->db->join('warga', 'warga.id = surat_pengantar.warga_id');
        $this->db->order_by('surat_pengantar.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        $this->db->select('surat_pengantar.*, warga.nama_lengkap, warga.nik, warga.alamat, warga.rt, warga.rw');
        $this->db->from('surat_pengantar');
        $this->db->join('warga', 'warga.id = surat_pengantar.warga_id');
        $this->db->where('surat_pengantar.id', $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('surat_pengantar', $data);
    }
}
