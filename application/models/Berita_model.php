<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get_all() {
        $this->db->select('berita.*, kategori_berita.nama_kategori');
        $this->db->from('berita');
        $this->db->join('kategori_berita', 'kategori_berita.id = berita.kategori_id', 'left');
        $this->db->order_by('berita.tanggal_publish', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_categories() {
        return $this->db->get('kategori_berita')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('berita', $data);
    }

    public function delete($id) {
        $berita = $this->db->get_where('berita', ['id' => $id])->row_array();
        if ($berita && $berita['thumbnail']) {
            $path = './uploads/berita/' . $berita['thumbnail'];
            if (file_exists($path)) unlink($path);
        }
        $this->db->where('id', $id);
        return $this->db->delete('berita');
    }
}
