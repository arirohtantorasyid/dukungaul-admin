<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ConsultationController extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ConsultationModel');
        $this->load->library('paymentgateway');
        $this->load->library('form_validation');
    }

    public function index_get()
    {
        $consultations = $this->ConsultationModel->get_all_consultations();
        if ($consultations) {
            $this->response($consultations, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Konsultasi tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function detail_get($id)
    {
        $consultation = $this->ConsultationModel->get_consultation_by_id($id);
        if ($consultation) {
            $this->response($consultation, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Konsultasi tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function create_post()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|integer|trim|xss_clean');
        $this->form_validation->set_rules('dukun_id', 'Dukun ID', 'required|integer|trim|xss_clean');
        $this->form_validation->set_rules('jenis_layanan', 'Jenis Layanan', 'required|trim|xss_clean');
        $this->form_validation->set_rules('durasi_menit', 'Durasi Menit', 'required|integer|greater_than[0]|trim|xss_clean');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric|greater_than_equal_to[0]|trim|xss_clean');
        // ... tambahkan validasi untuk field lain

        if ($this->form_validation->run() == FALSE) {
            $this->response(['status' => FALSE, 'message' => validation_errors()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = [
                'user_id' => $this->post('user_id', TRUE),
                'dukun_id' => $this->post('dukun_id', TRUE),
                'jenis_layanan' => $this->post('jenis_layanan', TRUE),
                'tanggal_konsultasi' => date('Y-m-d H:i:s'), // Set tanggal sekarang (atau ambil dari input jika diperlukan)
                'durasi_menit' => $this->post('durasi_menit', TRUE),
                'biaya' => $this->post('biaya', TRUE),
                'status' => 'pending', // Status awal konsultasi
                // ... field lain
            ];

            if ($this->ConsultationModel->create_consultation($data)) {
                $this->response(['status' => TRUE, 'message' => 'Konsultasi berhasil dibuat'], REST_Controller::HTTP_CREATED);
            } else {
                $this->response(['status' => FALSE, 'message' => 'Gagal membuat konsultasi'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    // ... (Tambahkan fungsi PUT, DELETE, dan fungsi API lain untuk konsultasi - sesuaikan dengan kebutuhan fitur)
    // ... (Implementasi proses pembayaran konsultasi menggunakan $this->paymentgateway)
}