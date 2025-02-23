<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('users')->row();
    }

    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('users')->row();
    }

    // ... (Fungsi model lainnya - Anda kembangkan: update_user, delete_user, dll.)
}