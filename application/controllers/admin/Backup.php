<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends Admin_Controller {

    public function index() {
        $this->load->dbutil();
        $prefs = [
            'format' => 'sql',
            'filename' => 'backup_db_rw_' . date('Ymd_His') . '.sql'
        ];
        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('download');
        force_download($prefs['filename'], $backup);
    }
}
