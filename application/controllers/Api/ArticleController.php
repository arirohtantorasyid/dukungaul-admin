<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArticleModel');
        $this->output->set_content_type('application/json');
    }

    public function get_articles()
    {
        $articles = $this->ArticleModel->get_all_articles();
        $article_list = array();

        foreach ($articles as $article) {
            $imageUrl = base_url('public/uploads/articles/') . $article->gambar; // GANTI $article->gambar_artikel (atau $article->image) menjadi $article->gambar

            $article_list[] = array(
                'id' => $article->id,
                'judul' => $article->judul,
                'konten' => $article->konten,
                'kategori' => $article->kategori,
                'tanggal_publikasi' => $article->tanggal_publikasi,
                'image_url' => $imageUrl,
            );
        }

        $this->output->set_output(json_encode(array('status' => 'success', 'articles' => $article_list)));
    }

    public function get_article_detail($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'ID Artikel tidak valid.')));
            return;
        }

        $article = $this->ArticleModel->get_article_by_id($id);
        if ($article) {
            $imageUrl = base_url('public/uploads/articles/') . $article->gambar; // GANTI $article->gambar_artikel (atau $article->image) menjadi $article->gambar

            $article_detail = array(
                'id' => $article->id,
                'judul' => $article->judul,
                'konten' => $article->konten,
                'kategori' => $article->kategori,
                'tanggal_publikasi' => $article->tanggal_publikasi,
                'image_url' => $imageUrl,
            );
            $this->output->set_output(json_encode(array('status' => 'success', 'article' => $article_detail)));
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'Artikel tidak ditemukan.')));
        }
    }

    // ... (Endpoint API Artikel lainnya) ...
}