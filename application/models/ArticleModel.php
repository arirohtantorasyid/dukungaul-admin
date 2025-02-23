<?php
// PASTE COMPLETE CODE FOR backend/application/models/ArticleModel.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_articles()
    {
        return $this->db->get('articles')->result();
    }

    public function get_article_by_id($id)
    {
        return $this->db->where('id', $id)->get('articles')->row();
    }

    public function insert_article($data)
    {
        return $this->db->insert('articles', $data);
    }

    // ... (Fungsi model lainnya - Anda kembangkan: update_article, delete_article, dll.)
}