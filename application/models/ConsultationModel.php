<?php
// PASTE COMPLETE CODE FOR backend/application/models/ConsultationModel.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultationModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_consultation($data)
    {
        return $this->db->insert('consultations', $data);
    }

    public function get_consultation_by_id($id)
    {
        return $this->db->where('id', $id)->get('consultations')->row();
    }

    public function get_consultation_history_by_user_id($user_id)
    {
        return $this->db->where('user_id', $user_id)->get('consultations')->result();
    }

    public function update_consultation($id, $data)
    {
        return $this->db->where('id', $id)->update('consultations', $data);
    }

    public function delete_consultation($id)
    {
        return $this->db->where('id', $id)->delete('consultations');
    }

    // ... (Fungsi model lainnya - Anda kembangkan: get_consultations_by_dukun_id, get_consultations_by_status, dll.)
}