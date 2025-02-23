<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/admin/AdminDukun.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDukun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DukunModel');
        $this->load->library('session');
        $this->load->helper('url');

        // Proteksi halaman admin - cek login admin
        if(!$this->session->userdata('admin_logged_in')){
            redirect('admin/authadmin/login'); // Redirect ke halaman login admin jika belum login
        }
    }

    public function index()
    {
        $data['title'] = 'Manajemen Dukun';
        $data['dukuns'] = $this->DukunModel->get_all_dukuns();
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/dukuns/index', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function create()
    {
        $data['title'] = 'Tambah Dukun Baru';
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/dukuns/create');
        $this->load->view('admin/layout/footer_admin');
    }

    public function save()
    {
        $nama_panggung = $this->input->post('nama_panggung');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $spesialisasi = $this->input->post('spesialisasi');
        $deskripsi = $this->input->post('deskripsi');
        $tarif_per_jam = $this->input->post('tarif_per_jam');

        // Validasi input (Tambahkan validasi lebih lengkap)
        if (empty($nama_panggung) || empty($nama_lengkap) || empty($email) || empty($password)) {
            $this->session->set_flashdata('error_message', 'Semua field wajib diisi.');
            redirect('admin/admindukun/create');
            return;
        }

        $data = array(
            'nama_panggung' => $nama_panggung,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'spesialisasi' => $spesialisasi,
            'deskripsi' => $deskripsi,
            'tarif_per_jam' => $tarif_per_jam,
            // ... (Field lainnya)
        );

        if ($this->DukunModel->insert_dukun($data)) {
            $this->session->set_flashdata('success_message', 'Data dukun berhasil disimpan.');
            redirect('admin/admindukun');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menyimpan data dukun.');
            redirect('admin/admindukun/create');
        }
    }

    public function edit($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/admindukun');
            return;
        }
        $data['title'] = 'Edit Dukun';
        $data['dukun'] = $this->DukunModel->get_dukun_by_id($id);
        if (!$data['dukun']) {
            redirect('admin/admindukun');
            return;
        }
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/dukuns/edit', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function update($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/admindukun');
            return;
        }

        $nama_panggung = $this->input->post('nama_panggung');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $spesialisasi = $this->input->post('spesialisasi');
        $deskripsi = $this->input->post('deskripsi');
        $tarif_per_jam = $this->input->post('tarif_per_jam');

        // Validasi input (Tambahkan validasi lebih lengkap)
        if (empty($nama_panggung) || empty($nama_lengkap) || empty($email)) {
            $this->session->set_flashdata('error_message', 'Semua field wajib diisi.');
            redirect('admin/admindukun/edit/'.$id);
            return;
        }

        $data = array(
            'nama_panggung' => $nama_panggung,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'spesialisasi' => $spesialisasi,
            'deskripsi' => $deskripsi,
            'tarif_per_jam' => $tarif_per_jam,
            // ... (Field lainnya)
        );

        if ($this->DukunModel->update_dukun($id, $data)) {
            $this->session->set_flashdata('success_message', 'Data dukun berhasil diupdate.');
            redirect('admin/admindukun');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal mengupdate data dukun.');
            redirect('admin/admindukun/edit/'.$id);
        }
    }

    public function delete($id)
    {
        $id = intval($id);
        if ($id <= 0) {
            redirect('admin/admindukun');
            return;
        }

        if ($this->DukunModel->delete_dukun($id)) {
            $this->session->set_flashdata('success_message', 'Data dukun berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus data dukun.');
        }
        redirect('admin/admindukun');
    }
}