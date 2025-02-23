<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Gunakan Composer autoload untuk memuat pustaka REST_Controller
require FCPATH . 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class BannerSliderController extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeBannerSliderModel');
    }

    public function index_get()
    {
        $banner_sliders = $this->HomeBannerSliderModel->get_active_banner_sliders();

        if ($banner_sliders) {
            $response = [
                'status' => "success",
                'banner_sliders' => $banner_sliders
            ];
            $this->response($response, RestController::HTTP_OK);
        } else {
            $response = [
                'status' => "error",
                'message' => "Data banner sliders tidak ditemukan"
            ];
            $this->response($response, RestController::HTTP_NOT_FOUND);
        }
    }
}
