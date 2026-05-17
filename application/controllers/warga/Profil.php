<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Warga_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = 'Edit Profil';
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $data['w'] = $this->db->get('warga')->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/warga/header', $data);
            $this->load->view('warga/profil', $data);
            $this->load->view('templates/warga/footer');
        } else {
            $warga_data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'provinsi' => $this->input->post('provinsi'),
                'kode_pos' => $this->input->post('kode_pos'),
                'no_hp' => $this->input->post('no_hp')
            ];

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']   = './uploads/warga/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $warga_data['foto'] = $upload_data['file_name'];
                    
                    // Update session foto if you want to use it
                    $this->session->set_userdata('foto', $upload_data['file_name']);
                }
            }

            $this->db->where('user_id', $user_id);
            $this->db->update('warga', $warga_data);

            $this->db->where('id', $user_id);
            $this->db->update('users', ['nama' => $this->input->post('nama_lengkap')]);

            $this->session->set_userdata('nama', $this->input->post('nama_lengkap'));
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
            redirect('warga/profil');
        }
    }

    public function ganti_password() {
        $data['title'] = 'Ganti Password';
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/warga/header', $data);
            $this->load->view('warga/ganti_password');
            $this->load->view('templates/warga/footer');
        } else {
            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user_by_id($user_id);

            if (password_verify($this->input->post('password_lama'), $user['password'])) {
                $new_password = password_hash($this->input->post('password_baru'), PASSWORD_BCRYPT);
                $this->db->where('id', $user_id);
                $this->db->update('users', ['password' => $new_password]);
                $this->session->set_flashdata('success', 'Password berhasil diganti.');
                redirect('warga/password');
            } else {
                $this->session->set_flashdata('error', 'Password lama salah.');
                redirect('warga/password');
            }
        }
    }
}
