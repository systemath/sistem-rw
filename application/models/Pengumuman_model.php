<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    public function get_all() {
        $this->db->order_by('tanggal_publish', 'DESC');
        return $this->db->get('pengumuman')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('pengumuman', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pengumuman', $data);
    }

    public function delete($id) {
        $row = $this->get_by_id($id);
        if ($row && $row['gambar']) {
            $path = './uploads/pengumuman/' . $row['gambar'];
            if (file_exists($path)) unlink($path);
        }
        $this->db->where('id', $id);
        return $this->db->delete('pengumuman');
    }
}
