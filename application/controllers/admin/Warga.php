<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->model('User_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Data Warga';
        $data['warga'] = $this->Warga_model->get_all();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/warga/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|is_unique[warga.nik]|exact_length[16]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Warga';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/warga/tambah');
            $this->load->view('templates/admin/footer');
        } else {
            // 1. Create User
            $password_default = $this->input->post('tanggal_lahir'); // Format: YYYY-MM-DD
            $user_data = [
                'nama' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('nik'),
                'email' => $this->input->post('email'),
                'password' => password_hash($password_default, PASSWORD_BCRYPT),
                'role' => 'warga',
                'status_akun' => 'aktif',
                'force_password_change' => 1
            ];
            $user_id = $this->User_model->create_user($user_data);

            // 2. Create Warga
            $warga_data = [
                'user_id' => $user_id,
                'nik' => $this->input->post('nik'),
                'no_kk' => $this->input->post('no_kk'),
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
                'no_hp' => $this->input->post('no_hp'),
                'status_warga' => $this->input->post('status_warga')
            ];
            $this->Warga_model->insert($warga_data);

            $this->Activity_model->log('Menambahkan warga baru: ' . $this->input->post('nama_lengkap'));
            $this->session->set_flashdata('success', 'Data warga berhasil ditambahkan. Akun warga otomatis dibuat dengan password default: ' . $password_default);
            redirect('admin/warga');
        }
    }

    public function edit($id) {
        $data['w'] = $this->Warga_model->get_by_id($id);
        if (!$data['w']) show_404();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Warga';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/warga/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $warga_data = [
                'no_kk' => $this->input->post('no_kk'),
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
                'no_hp' => $this->input->post('no_hp'),
                'status_warga' => $this->input->post('status_warga')
            ];
            $this->Warga_model->update($id, $warga_data);

            $this->Activity_model->log('Mengupdate data warga: ' . $this->input->post('nama_lengkap'));
            $this->session->set_flashdata('success', 'Data warga berhasil diupdate.');
            redirect('admin/warga');
        }
    }

    public function hapus($id) {
        $w = $this->Warga_model->get_by_id($id);
        $this->Warga_model->delete($id);
        $this->Activity_model->log('Menghapus data warga: ' . $w['nama_lengkap']);
        $this->session->set_flashdata('success', 'Data warga berhasil dihapus.');
        redirect('admin/warga');
    }

    public function cetak() {
        $data['title'] = 'Data Warga RW 011';
        $data['warga'] = $this->Warga_model->get_all();
        $this->load->view('admin/warga/cetak', $data);
    }

    public function excel() {
        $warga = $this->Warga_model->get_all();
        
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data_warga_".date('Ymd').".xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1">';
        echo '<tr><th>No</th><th>NIK</th><th>No KK</th><th>Nama Lengkap</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>L/P</th><th>Agama</th><th>Status Perkawinan</th><th>Pekerjaan</th><th>Kewarganegaraan</th><th>Alamat</th><th>RT</th><th>RW</th><th>Kelurahan</th><th>Kecamatan</th><th>Kabupaten</th><th>Provinsi</th><th>Kode Pos</th><th>No HP</th><th>Status Warga</th></tr>';
        $no = 1;
        foreach($warga as $w) {
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>\''.$w['nik'].'</td>'; 
            echo '<td>\''.$w['no_kk'].'</td>';
            echo '<td>'.$w['nama_lengkap'].'</td>';
            echo '<td>'.$w['tempat_lahir'].'</td>';
            echo '<td>'.$w['tanggal_lahir'].'</td>';
            echo '<td>'.$w['jenis_kelamin'].'</td>';
            echo '<td>'.$w['agama'].'</td>';
            echo '<td>'.$w['status_perkawinan'].'</td>';
            echo '<td>'.$w['pekerjaan'].'</td>';
            echo '<td>'.$w['kewarganegaraan'].'</td>';
            echo '<td>'.$w['alamat'].'</td>';
            echo '<td>'.$w['rt'].'</td>';
            echo '<td>'.$w['rw'].'</td>';
            echo '<td>'.$w['kelurahan'].'</td>';
            echo '<td>'.$w['kecamatan'].'</td>';
            echo '<td>'.$w['kabupaten'].'</td>';
            echo '<td>'.$w['provinsi'].'</td>';
            echo '<td>'.$w['kode_pos'].'</td>';
            echo '<td>'.$w['no_hp'].'</td>';
            echo '<td>'.$w['status_warga'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
