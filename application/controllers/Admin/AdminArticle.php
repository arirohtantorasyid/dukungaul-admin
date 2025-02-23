<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/admin/AdminArticle.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminArticle extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArticleModel');
        $this->load->library('session');
        $this->load->helper('url');

        // Proteksi Halaman Admin
        if(!$this->session->userdata('admin_logged_in')){
            redirect('admin/authadmin/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Manajemen Artikel';
        $data['articles'] = $this->ArticleModel->get_all_articles();
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/articles/index', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function create()
    {
        $data['title'] = 'Tambah Artikel Baru';
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/articles/create');
        $this->load->view('admin/layout/footer_admin');
    }

    public function save()
    {
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');
        $kategori = $this->input->post('kategori');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        // TODO: Handle Upload Gambar Artikel

        // Validasi Input
        if (empty($judul) || empty($konten)) {
            $this->session->set_flashdata('error_message', 'Judul dan Konten Artikel wajib diisi.');
            redirect('admin/adminarticle/create');
            return;
        }

        $data = array(
            'judul' => $judul,
            'konten' => $konten,
            'kategori' => $kategori,
            'tanggal_publikasi' => $tanggal_publikasi,
            // TODO: Tambahkan Field Gambar
        );

        if ($this->ArticleModel->insert_article($data)) {
            $this->session->set_flashdata('success_message', 'Artikel berhasil disimpan.');
            redirect('admin/adminarticle');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menyimpan artikel.');
            redirect('admin/adminarticle/create');
        }
    }

    public function edit($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/adminarticle');
            return;
        }
        $data['title'] = 'Edit Artikel';
        $data['article'] = $this->ArticleModel->get_article_by_id($id);
        if (!$data['article']) {
            redirect('admin/adminarticle');
            return;
        }
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/articles/edit', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function update($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/adminarticle');
            return;
        }

        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');
        $kategori = $this->input->post('kategori');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        // TODO: Handle Upload Gambar Artikel (Update)

        // Validasi Input
        if (empty($judul) || empty($konten)) {
            $this->session->set_flashdata('error_message', 'Judul dan Konten Artikel wajib diisi.');
            redirect('admin/adminarticle/edit/'.$id);
            return;
        }

        $data = array(
            'judul' => $judul,
            'konten' => $konten,
            'kategori' => $kategori,
            'tanggal_publikasi' => $tanggal_publikasi,
            // TODO: Tambahkan Field Gambar (Update)
        );

        if ($this->ArticleModel->update_article($id, $data)) {
            $this->session->set_flashdata('success_message', 'Artikel berhasil diupdate.');
            redirect('admin/adminarticle');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal mengupdate artikel.');
            redirect('admin/adminarticle/edit/'.$id);
        }
    }

    public function delete($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/adminarticle');
            return;
        }

        if ($this->ArticleModel->delete_article($id)) {
            $this->session->set_flashdata('success_message', 'Artikel berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus artikel.');
        }
        redirect('admin/adminarticle');
    }
}