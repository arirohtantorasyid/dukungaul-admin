<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('paymentgateway');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() { // Contoh halaman form pembayaran
        $data['gateway_options'] = $this->paymentgateway->get_gateway_options();
        $this->load->view('payment_form', $data); // Load view payment_form.php
    }

    public function process_payment() {
        // Validasi input form
        $this->form_validation->set_rules('amount', 'Jumlah Pembayaran', 'required|numeric|greater_than[0]|trim|xss_clean');
        $this->form_validation->set_rules('customer_email', 'Email Pelanggan', 'required|valid_email|trim|xss_clean');
        $this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'required|in_list[' . implode(',', array_keys($this->paymentgateway->get_gateway_options())) . ']|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['gateway_options'] = $this->paymentgateway->get_gateway_options();
            $this->load->view('payment_form', $data); // Tampilkan kembali form dengan error
        } else {
            $payment_data = array(
                'amount' => $this->input->post('amount', TRUE), // TRUE untuk XSS Clean
                'customer_email' => $this->input->post('customer_email', TRUE), // TRUE untuk XSS Clean
                'description' => 'Pembayaran untuk layanan Dukung Gaul', // Bisa dinamis juga
                // ... (Data lain yang mungkin dibutuhkan oleh gateway, bisa ambil dari form atau session)
            );

            $selected_gateway = $this->input->post('payment_gateway', TRUE); // TRUE untuk XSS Clean
            $this->paymentgateway->set_gateway($selected_gateway); // Set gateway yang dipilih dari form

            $payment_result = $this->paymentgateway->process_payment($payment_data);

            if ($payment_result['status'] === true) {
                // Pembayaran berhasil diproses
                $data['payment_result'] = $payment_result;
                $this->load->view('payment_success', $data); // Load view payment_success.php
                // *** Langkah Selanjutnya Penting: ***
                // 1. Simpan data transaksi ke database (transaction_id, order_id, status, dll.)
                // 2. Redirect user ke halaman sukses atau tampilkan pesan sukses
            } else {
                // Pembayaran gagal diproses
                $data['payment_result'] = $payment_result;
                $data['gateway_options'] = $this->paymentgateway->get_gateway_options(); // Kirim lagi opsi gateway untuk form
                $this->load->view('payment_form', $data); // Tampilkan kembali form dengan pesan error
                log_message('error', 'PaymentController: Pembayaran gagal. Gateway: ' . $selected_gateway . ', Error: ' . $payment_result['message'] . ', Detail: ' . json_encode($payment_result)); // Log error di controller
                // *** Langkah Selanjutnya Penting: ***
                // 1. Log error (sudah dilakukan di library, tapi bisa tambahkan logging di controller juga)
                // 2. Tampilkan pesan error yang ramah ke user
                // 3. Pertimbangkan retry mechanism atau opsi pembayaran alternatif
            }
        }
    }

    public function admin_payment_gateway_config() {
        // *** Contoh controller untuk halaman konfigurasi Payment Gateway di Admin Panel ***
        $data['gateway_options'] = $this->paymentgateway->get_gateway_options();
        $data['active_gateway'] = $this->paymentgateway->get_active_gateway();

        if ($this->input->method() == 'post') {
            $selected_gateway = $this->input->post('default_gateway');
            // *** Implementasi logika untuk menyimpan pilihan gateway default ke database atau konfigurasi (contoh sederhana: session) ***
            $this->session->set_flashdata('success_message', 'Gateway default berhasil diubah menjadi ' . $data['gateway_options'][$selected_gateway]);
            redirect('admin/payment/config'); // Redirect kembali ke halaman konfigurasi
        }

        $this->load->view('admin/layout/header_admin');
        $this->load->view('admin/payment_gateway/config', $data); // View untuk form konfigurasi gateway (perlu dibuat)
        $this->load->view('admin/layout/footer_admin');
    }

    // *** Contoh Webhook Handler (Perlu diimplementasikan di controller terpisah, misalnya WebhookController.php) ***
    // public function xendit_webhook() { ... }
    // public function midtrans_webhook() { ... }
}