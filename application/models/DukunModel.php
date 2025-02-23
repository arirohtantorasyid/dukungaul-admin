<?php
// PASTE COMPLETE CODE FOR backend/application/models/DukunModel.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class DukunModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_dukuns()
    {
        return $this->db->get('dukuns')->result();
    }

    public function get_dukun_by_id($id)
    {
        return $this->db->where('id', $id)->get('dukuns')->row();
    }

    public function insert_dukun($data)
    {
        return $this->db->insert('dukuns', $data);
    }

    // ... (Fungsi model lainnya - Anda kembangkan: update_dukun, delete_dukun, dll.)
}