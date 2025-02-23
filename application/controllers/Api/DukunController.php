<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/api/DukunController.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class DukunController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DukunModel');
        $this->output->set_content_type('application/json');
    }

    public function get_dukuns()
    {
        $dukuns = $this->DukunModel->get_all_dukuns();
        $this->output->set_output(json_encode(array('status' => 'success', 'dukuns' => $dukuns)));
    }

    public function get_dukun_detail($id)
    {
        $id = intval($id); // Pastikan ID integer
        if ($id <= 0) {
            $this->output->set_status_header(400); // Bad Request
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'ID Dukun tidak valid.')));
            return;
        }

        $dukun = $this->DukunModel->get_dukun_by_id($id);
        if ($dukun) {
            $this->output->set_output(json_encode(array('status' => 'success', 'dukun' => $dukun)));
        } else {
            $this->output->set_status_header(404); // Not Found
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'Dukun tidak ditemukan.')));
        }
    }

    // ... (Endpoint API Dukun lainnya - Anda kembangkan: daftar dukun berdasarkan spesialisasi, dll.)
}