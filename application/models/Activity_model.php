<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model {

    public function log($activity) {
        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'aktivitas' => $activity,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent()
        ];
        return $this->db->insert('activity_log', $data);
    }

    public function get_all() {
        $this->db->select('activity_log.*, users.nama as nama_user');
        $this->db->from('activity_log');
        $this->db->join('users', 'users.id = activity_log.user_id', 'left');
        $this->db->order_by('activity_log.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
}
