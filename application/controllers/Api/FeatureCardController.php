<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class FeatureCardController extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('HomeFeatureCardModel');
    }

    public function index_get()
    {
        $feature_cards = $this->HomeFeatureCardModel->get_active_feature_cards();

        if ($feature_cards) {
            $response = [
                'status' => "success",
                'feature_cards' => $feature_cards
            ];
            $this->response($response, RestController::HTTP_OK);
        } else {
            $response = [
                'status' => "error",
                'message' => "Data fitur cards tidak ditemukan"
            ];
            $this->response($response, RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'title'       => $this->post('title'),
            'description' => $this->post('description'),
            'icon_url'    => $this->post('icon_url'),
            'is_active'   => $this->post('is_active')
        ];

        $feature_card_id = $this->HomeFeatureCardModel->insert_feature_card($data);

        if ($feature_card_id) {
            $response = [
                'status' => "success",
                'message' => "Fitur card berhasil ditambahkan",
                'feature_card_id' => $feature_card_id
            ];
            $this->response($response, RestController::HTTP_CREATED);
        } else {
            $response = [
                'status' => "error",
                'message' => "Gagal menambahkan fitur card"
            ];
            $this->response($response, RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'title'       => $this->put('title'),
            'description' => $this->put('description'),
            'icon_url'    => $this->put('icon_url'),
            'is_active'   => $this->put('is_active')
        ];

        $updated = $this->HomeFeatureCardModel->update_feature_card($id, $data);

        if ($updated) {
            $response = [
                'status' => "success",
                'message' => "Fitur card berhasil diupdate"
            ];
            $this->response($response, RestController::HTTP_OK);
        } else {
            $response = [
                'status' => "error",
                'message' => "Gagal mengupdate fitur card"
            ];
            $this->response($response, RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $deleted = $this->HomeFeatureCardModel->delete_feature_card($id);

        if ($deleted) {
            $response = [
                'status' => "success",
                'message' => "Fitur card berhasil dihapus"
            ];
            $this->response($response, RestController::HTTP_OK);
        } else {
            $response = [
                'status' => "error",
                'message' => "Gagal menghapus fitur card"
            ];
            $this->response($response, RestController::HTTP_BAD_REQUEST);
        }
    }
}
