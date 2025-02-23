<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/api/Auth.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->output->set_content_type('application/json');
    }

    public function register()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi input
        if (empty($nama) || empty($email) || empty($password)) {
            $this->output->set_status_header(400); // Bad Request
            $response = array('status' => 'error', 'message' => 'Semua field harus diisi.');
            $this->output->set_output(json_encode($response));
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->output->set_status_header(400);
            $response = array('status' => 'error', 'message' => 'Email tidak valid.');
            $this->output->set_output(json_encode($response));
            return;
        }

        if (strlen($password) < 6) { // Contoh validasi password minimal 6 karakter
            $this->output->set_status_header(400);
            $response = array('status' => 'error', 'message' => 'Password minimal 6 karakter.');
            $this->output->set_output(json_encode($response));
            return;
        }

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );

        if ($this->UserModel->insert_user($data)) {
            $response = array('status' => 'success', 'message' => 'Registrasi berhasil!');
        } else {
            $this->output->set_status_header(409); // Conflict - Email mungkin sudah terdaftar
            $response = array('status' => 'error', 'message' => 'Registrasi gagal. Email mungkin sudah terdaftar.');
        }
        $this->output->set_output(json_encode($response));
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi input
        if (empty($email) || empty($password)) {
            $this->output->set_status_header(400); // Bad Request
            $response = array('status' => 'error', 'message' => 'Email dan password harus diisi.');
            $this->output->set_output(json_encode($response));
            return;
        }

        $user = $this->UserModel->get_user_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            // Login berhasil
            $response = array('status' => 'success', 'message' => 'Login berhasil!', 'user' => $user);
        } else {
            $this->output->set_status_header(401); // Unauthorized - Invalid credentials
            $response = array('status' => 'error', 'message' => 'Login gagal. Email atau password salah.');
        }
        $this->output->set_output(json_encode($response));
    }
}