<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

    public function get_all() {
        return $this->db->get('faq')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('faq', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('faq', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('faq', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('faq');
    }
}
