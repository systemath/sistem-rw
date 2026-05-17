<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function get_berita() {
        return $this->db->get('kategori_berita')->result_array();
    }

    public function get_galeri() {
        return $this->db->get('kategori_galeri')->result_array();
    }

    public function insert_berita($data) {
        return $this->db->insert('kategori_berita', $data);
    }

    public function insert_galeri($data) {
        return $this->db->insert('kategori_galeri', $data);
    }

    public function delete_berita($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kategori_berita');
    }

    public function delete_galeri($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kategori_galeri');
    }
}
