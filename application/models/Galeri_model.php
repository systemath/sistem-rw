<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    public function get_all() {
        $this->db->select('galeri.*, kategori_galeri.nama_kategori');
        $this->db->from('galeri');
        $this->db->join('kategori_galeri', 'kategori_galeri.id = galeri.kategori_id', 'left');
        $this->db->order_by('galeri.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_categories() {
        return $this->db->get('kategori_galeri')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('galeri', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('galeri', $data);
    }

    public function delete($id) {
        $row = $this->get_by_id($id);
        if ($row && $row['foto']) {
            $path = './uploads/galeri/' . $row['foto'];
            if (file_exists($path)) unlink($path);
        }
        $this->db->where('id', $id);
        return $this->db->delete('galeri');
    }
}
