<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_last_login($id) {
        $this->db->where('id', $id);
        $this->db->update('users', ['last_login' => date('Y-m-d H:i:s')]);
    }

    public function create_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
}
