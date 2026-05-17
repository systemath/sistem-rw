<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model {

    public function get_all() {
        $this->db->select('pengaduan.*, users.nama as nama_pelapor');
        $this->db->from('pengaduan');
        $this->db->join('users', 'users.id = pengaduan.user_id');
        $this->db->order_by('pengaduan.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        $this->db->select('pengaduan.*, users.nama as nama_pelapor');
        $this->db->from('pengaduan');
        $this->db->join('users', 'users.id = pengaduan.user_id');
        $this->db->where('pengaduan.id', $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pengaduan', $data);
    }
}
