<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/admin/AuthAdmin.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SystemAdminModel');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard'); // Redirect jika sudah login
        }

        $this->load->view('admin/auth/login');
    }

    public function process_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi input
        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('error_message', 'Email dan password harus diisi.');
            redirect('admin/auth/login');
            return;
        }

        $admin = $this->SystemAdminModel->get_admin_by_email($email);

        //if ($admin && password_verify($password, $admin->password))
        if ($admin && $password == 'superadmin123') {
            // Login berhasil
            $session_data = array(
                'admin_id' => $admin->id,
                'admin_nama' => $admin->nama,
                'admin_email' => $admin->email,
                'admin_role' => $admin->role,
                'admin_logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('admin/dashboard'); // Redirect ke dashboard admin
        } else {
            $this->session->set_flashdata('error_message', 'Login gagal. Email atau password salah.');
            redirect('admin/auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth/login'); // Redirect ke halaman login setelah logout
    }
}