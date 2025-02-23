<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ForumController extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ForumModel');
        $this->load->library('form_validation');
    }

    public function index_get()
    {
        $forums = $this->ForumModel->get_all_forums();
        if ($forums) {
            $this->response($forums, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Forum tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function detail_get($id)
    {
        $forum = $this->ForumModel->get_forum_by_id($id);
        if ($forum) {
            $this->response($forum, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Forum tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function create_post()
    {
        $this->form_validation->set_rules('judul', 'Judul Forum', 'required|max_length[255]|trim|xss_clean');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Forum', 'trim|xss_clean');
        $this->form_validation->set_rules('created_by_user_id', 'User ID Pembuat', 'required|integer|trim|xss_clean');
        // ... tambahkan validasi untuk field lain

        if ($this->form_validation->run() == FALSE) {
            $this->response(['status' => FALSE, 'message' => validation_errors()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = [
                'judul' => $this->post('judul', TRUE),
                'deskripsi' => $this->post('deskripsi', TRUE),
                'created_by_user_id' => $this->post('created_by_user_id', TRUE),
                // ... field lain
            ];

            if ($this->ForumModel->create_forum($data)) {
                $this->response(['status' => TRUE, 'message' => 'Forum berhasil dibuat'], REST_Controller::HTTP_CREATED);
            } else {
                $this->response(['status' => FALSE, 'message' => 'Gagal membuat forum'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    // ... (Tambahkan fungsi PUT, DELETE, dan fungsi API lain untuk forum - sesuaikan dengan kebutuhan fitur)
}