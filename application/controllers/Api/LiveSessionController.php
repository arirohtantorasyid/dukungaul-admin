<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class LiveSessionController extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('LiveSessionModel');
        $this->load->library('form_validation');
    }

    public function index_get()
    {
        $liveSessions = $this->LiveSessionModel->get_all_live_sessions();
        if ($liveSessions) {
            $this->response($liveSessions, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Live Session tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function detail_get($id)
    {
        $liveSession = $this->LiveSessionModel->get_live_session_by_id($id);
        if ($liveSession) {
            $this->response($liveSession, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Live Session tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function create_post()
    {
        $this->form_validation->set_rules('dukun_id', 'Dukun ID', 'required|integer|trim|xss_clean');
        $this->form_validation->set_rules('judul', 'Judul Live Session', 'required|max_length[255]|trim|xss_clean');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Live Session', 'trim|xss_clean');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|valid_datetime|trim|xss_clean'); // valid_datetime untuk datetime
        $this->form_validation->set_rules('durasi_menit', 'Durasi Menit', 'required|integer|greater_than[0]|trim|xss_clean');
        $this->form_validation->set_rules('link_streaming', 'Link Streaming', 'trim|xss_clean|valid_url');
        $this->form_validation->set_rules('biaya_sesi', 'Biaya Sesi', 'numeric|greater_than_equal_to[0]|trim|xss_clean');
        // ... tambahkan validasi untuk field lain

        if ($this->form_validation->run() == FALSE) {
            $this->response(['status' => FALSE, 'message' => validation_errors()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = [
                'dukun_id' => $this->post('dukun_id', TRUE),
                'judul' => $this->post('judul', TRUE),
                'deskripsi' => $this->post('deskripsi', TRUE),
                'tanggal_mulai' => $this->post('tanggal_mulai', TRUE),
                'durasi_menit' => $this->post('durasi_menit', TRUE),
                'link_streaming' => $this->post('link_streaming', TRUE),
                'biaya_sesi' => $this->post('biaya_sesi', TRUE),
                'status' => 'pending', // Status awal live session
                // ... field lain
            ];

            if ($this->LiveSessionModel->create_live_session($data)) {
                $this->response(['status' => TRUE, 'message' => 'Live Session berhasil dibuat'], REST_Controller::HTTP_CREATED);
            } else {
                $this->response(['status' => FALSE, 'message' => 'Gagal membuat Live Session'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    // ... (Tambahkan fungsi PUT, DELETE, dan fungsi API lain untuk live session - sesuaikan dengan kebutuhan fitur)
}