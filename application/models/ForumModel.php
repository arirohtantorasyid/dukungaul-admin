<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumModel extends CI_Model {

    protected $table = 'forums';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('UserModel'); // Load model terkait
    }

    public function get_all_forums()
    {
        $this->db->select('forums.*, users.nama as created_by_username');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = forums.created_by_user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_forum_by_id($id)
    {
        $this->db->select('forums.*, users.nama as created_by_username');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = forums.created_by_user_id', 'left');
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function create_forum($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_forum($id, $data)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_forum($id)
    {
        return $this->db->delete($this->table, [$this->primaryKey => $id]);
    }

    // Tambahkan fungsi model lainnya sesuai kebutuhan
}