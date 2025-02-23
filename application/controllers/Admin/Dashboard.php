<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/admin/Dashboard.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Proteksi halaman admin - cek login admin
        if(!$this->session->userdata('admin_logged_in')){
            redirect('admin/authadmin/login'); // Redirect ke halaman login admin jika belum login
        }
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/layout/footer_admin');
    }

    // ... (Fungsi controller admin lainnya - Anda kembangkan)
}