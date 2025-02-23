<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    public function not_found() {
        $this->output->set_status_header('404');
        echo json_encode([
            'status' => 404,
            'message' => 'Halaman tidak ditemukan'
        ]);
    }
}
