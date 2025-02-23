<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSystemConfig extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        // Proteksi halaman admin
        if(!$this->session->userdata('admin_logged_in')){
            redirect('admin/authadmin/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Konfigurasi Sistem';
        // TODO: Ambil data konfigurasi dari database atau file konfigurasi (jika ada)
        $data['smtp_config'] = array( // Contoh data dummy
            'smtp_host' => 'smtp.example.com',
            'smtp_port' => 587,
            'smtp_user' => 'user@example.com',
            'smtp_pass' => 'password123',
            'smtp_encryption' => 'tls',
            'smtp_enabled' => true,
        );
        $data['payment_gateway_config'] = array( // Contoh data dummy
            'payment_gateway_enabled' => true,
            'payment_gateway_provider' => 'xendit',
            // ... (Konfigurasi spesifik Xendit/Midtrans)
        );
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/system_config/index', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function update_smtp_config()
    {
        // TODO: Implementasi logika update konfigurasi SMTP
        // - Ambil data dari form POST
        // - Validasi input
        // - Simpan data konfigurasi SMTP ke database atau file konfigurasi
        // - Set flashdata success/error message
        $this->session->set_flashdata('success_message', 'Konfigurasi SMTP berhasil diupdate.');
        redirect('admin/systemconfig');
    }

    public function update_payment_gateway_config()
    {
        // TODO: Implementasi logika update konfigurasi Payment Gateway
        // - Ambil data dari form POST
        // - Validasi input
        // - Simpan data konfigurasi Payment Gateway ke database atau file konfigurasi
        // - Set flashdata success/error message
        $this->session->set_flashdata('success_message', 'Konfigurasi Payment Gateway berhasil diupdate.');
        redirect('admin/systemconfig');
    }

    // ... (Fungsi controller admin lainnya - Anda kembangkan: konfigurasi login methods, dll.)
}