<?php
// PASTE COMPLETE CODE FOR backend/application/controllers/api/UserController.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->output->set_content_type('application/json');
        // Tambahkan autentikasi jika diperlukan untuk endpoint user
        // $this->load->library('authorization_token'); // Contoh library autentikasi JWT
        // if(!$this->authorization_token->checkToken()){
        //     $this->output->set_status_header(401);
        //     $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'Unauthorized')));
        //     return;
        // }
    }

    public function get_user_profile($id)
    {
        $id = intval($id); // Pastikan ID integer
        if ($id <= 0) {
            $this->output->set_status_header(400); // Bad Request
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'ID User tidak valid.')));
            return;
        }

        $user = $this->UserModel->get_user_by_id($id);
        if ($user) {
            $this->output->set_output(json_encode(array('status' => 'success', 'user' => $user)));
        } else {
            $this->output->set_status_header(404); // Not Found
            $this->output->set_output(json_encode(array('status' => 'error', 'message' => 'User tidak ditemukan.')));
        }
    }

    // ... (Endpoint API User lainnya - Anda kembangkan)
}