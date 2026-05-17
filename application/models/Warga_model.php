<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga_model extends CI_Model {

    public function get_all() {
        return $this->db->get('warga')->result_array();
    }

    public function get_by_id($id) {
        $this->db->select('warga.*, users.username, users.status_akun');
        $this->db->from('warga');
        $this->db->join('users', 'users.id = warga.user_id', 'left');
        $this->db->where('warga.id', $id);
        return $this->db->get()->row_array();
    }

    public function insert($data) {
        $this->db->insert('warga', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('warga', $data);
    }

    public function delete($id) {
        $warga = $this->db->get_where('warga', ['id' => $id])->row_array();
        if ($warga && $warga['user_id']) {
            $this->db->delete('users', ['id' => $warga['user_id']]);
        }
        $this->db->where('id', $id);
        return $this->db->delete('warga');
    }
}
