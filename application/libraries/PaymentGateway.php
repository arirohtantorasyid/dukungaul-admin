<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentGateway {

    protected $CI;
    protected $gateway_config;
    protected $active_gateway_name;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('payment_gateway');
        $this->gateway_config = $this->CI->config->item('payment_gateway_config');
        $this->active_gateway_name = $this->gateway_config['default_gateway'];
    }

    /**
     * Set gateway yang akan digunakan (xendit atau midtrans)
     * @param string $gateway_name 'xendit' atau 'midtrans'
     */
    public function set_gateway($gateway_name)
    {
        if (isset($this->gateway_config['gateway_options'][$gateway_name])) {
            $this->active_gateway_name = $gateway_name;
        } else {
            log_message('error', 'PaymentGateway: Gateway tidak valid: ' . $gateway_name . '. Menggunakan gateway default.');
            $this->active_gateway_name = $this->gateway_config['default_gateway'];
        }
    }

    /**
     * Mendapatkan nama gateway yang sedang aktif
     * @return string
     */
    public function get_active_gateway()
    {
        return $this->active_gateway_name;
    }

    /**
     * Mendapatkan daftar opsi gateway yang tersedia
     * @return array
     */
    public function get_gateway_options()
    {
        return $this->gateway_config['gateway_options'];
    }


    public function process_payment($payment_data)
    {
        $gateway_name = $this->get_active_gateway();

        if ($gateway_name == 'xendit') {
            return $this->process_payment_xendit($payment_data);
        } elseif ($gateway_name == 'midtrans') {
            return $this->process_payment_midtrans($payment_data);
        } else {
            log_message('error', 'PaymentGateway: Gateway aktif tidak valid: ' . $gateway_name);
            return ['status' => false, 'message' => 'Konfigurasi gateway tidak valid.'];
        }
    }

    private function process_payment_xendit($payment_data)
    {
        $xendit_config = $this->gateway_config['xendit'];

        // *** IMPLEMENTASI TERBAIK: GUNAKAN XENDIT PHP SDK ***
        try {
            // **PASTIKAN XENDIT PHP SDK SUDAH TER-INSTALL VIA COMPOSER & AUTOLOADED**
            \Xendit\Xendit::setApiKey($xendit_config['secret_key']);

            $params = [ // **SESUAIKAN PARAMETER DENGAN API XENDIT YANG ANDA GUNAKAN (INVOICE, DLL.)**
                'external_id' => 'invoice-' . time() . '-' . rand(1000, 9999), // Order ID unik
                'amount' => $payment_data['amount'],
                'payer_email' => $payment_data['customer_email'],
                'description' => $payment_data['description'],
                // ... (Parameter lain yang diperlukan oleh API Xendit)
            ];

            $createInvoice = \Xendit\Invoice::create($params); // Contoh: Membuat Invoice Xendit
            return [
                'status' => true,
                'transaction_id' => $createInvoice['id'] ?? null,
                'payment_url' => $createInvoice['invoice_url'] ?? null,
                'message' => 'Pembayaran Xendit berhasil diproses (SDK).',
                'raw_response' => $createInvoice,
            ];

        } catch (\Xendit\Exceptions\ApiException $e) {
            log_message('error', 'PaymentGateway (Xendit) SDK Exception: ' . $e->getMessage() . ', HTTP Status: ' . $e->getHttpStatusCode() . ', Response Body: ' . json_encode($e->getResponseBody()));
            return [
                'status' => false,
                'message' => 'Gagal memproses pembayaran Xendit (SDK Error).',
                'error_detail' => $e->getMessage(),
                'http_status' => $e->getHttpStatusCode(),
                'raw_response' => $e->getResponseBody(),
            ];
        } catch (\Exception $e) { // Tangkap exception umum lainnya
            log_message('error', 'PaymentGateway (Xendit) General Exception: ' . $e->getMessage());
            return [
                'status' => false,
                'message' => 'Gagal memproses pembayaran Xendit (General Error).',
                'error_detail' => $e->getMessage(),
            ];
        }
    }

    private function process_payment_midtrans($payment_data)
    {
        $midtrans_config = $this->gateway_config['midtrans'];

        // *** IMPLEMENTASI TERBAIK: GUNAKAN MIDTRANS PHP SDK ***
        try {
            // **PASTIKAN MIDTRANS PHP SDK SUDAH TER-INSTALL VIA COMPOSER & AUTOLOADED**
            \Midtrans\Config::$serverKey = $midtrans_config['server_key'];
            \Midtrans\Config::$isProduction = $midtrans_config['is_production'];
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $order_id = 'ORDER-' . time() . '-' . rand(1000, 9999); // Order ID unik
            $params = array( // **SESUAIKAN PARAMETER DENGAN API MIDTRANS YANG ANDA GUNAKAN (SNAP, CORE API, DLL.)**
                'transaction_details' => array(
                    'order_id' => $order_id,
                    'gross_amount' => $payment_data['amount'],
                ),
                'customer_details' => array(
                    'email' => $payment_data['customer_email'],
                    // ... (Detail customer lain yang diperlukan oleh API Midtrans)
                ),
            );

            $chargeTransaction = \Midtrans\CoreApi::charge($params); // Contoh: Menggunakan Core API Midtrans
            return [
                'status' => true,
                'transaction_id' => $chargeTransaction->transaction_id ?? null,
                'payment_url' => isset($chargeTransaction->actions[0]->url) ? $chargeTransaction->actions[0]->url : null, // Ambil URL dari response actions (tergantung API Midtrans)
                'message' => 'Pembayaran Midtrans berhasil diproses (SDK).',
                'raw_response' => $chargeTransaction,
            ];

        } catch (\Exception $e) {
            log_message('error', 'PaymentGateway (Midtrans) SDK Exception: ' . $e->getMessage() . ', Trace: ' . $e->getTraceAsString());
            return [
                'status' => false,
                'message' => 'Gagal memproses pembayaran Midtrans (SDK Error).',
                'error_detail' => $e->getMessage(),
                'raw_response' => $e->getTraceAsString(),
            ];
        }
    }

    // Fungsi lain yang mungkin diperlukan (misalnya untuk handle webhook, cek status pembayaran, dll.) - perlu diimplementasikan
}