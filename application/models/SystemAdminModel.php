<?php
// PASTE COMPLETE CODE FOR backend/application/models/SystemAdminModel.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemAdminModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_admin_by_email($email)
    {
        return $this->db->where('email', $email)->get('system_admins')->row();
    }

    public function get_admin_by_id($id)
    {
        return $this->db->where('id', $id)->get('system_admins')->row();
    }

    public function get_all_admins()
    {
        return $this->db->get('system_admins')->result();
    }

    public function insert_admin($data)
    {
        return $this->db->insert('system_admins', $data);
    }

    public function update_admin($id, $data)
    {
        return $this->db->where('id', $id)->update('system_admins', $data);
    }

    public function delete_admin($id)
    {
        return $this->db->where('id', $id)->delete('system_admins');
    }

    // ... (Fungsi model lainnya - Anda kembangkan: manajemen role admin, dll.)
}