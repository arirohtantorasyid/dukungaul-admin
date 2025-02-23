<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFeatureCard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('HomeFeatureCardModel');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = 'Manajemen Fitur Cards';
        $data['feature_cards'] = $this->HomeFeatureCardModel->get_active_feature_cards();
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/feature_cards/index', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function create_form() {
        $data['title'] = 'Tambah Fitur Card';
        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/feature_cards/create', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function save() {
        if ($this->input->post()) {
            $data['title'] = 'Tambah Fitur Card';

            $this->form_validation->set_rules('title', 'Judul Fitur', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/layout/header_admin', $data);
                $this->load->view('admin/feature_cards/create', $data);
                $this->load->view('admin/layout/footer_admin');
            } else {
                $data_card = [
                    'title'       => trim($this->input->post('title')),
                    'description' => trim($this->input->post('description')),
                    'icon_url'    => trim($this->input->post('icon_url')),
                    'is_active'   => $this->input->post('is_active') ? 1 : 0,
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                ];

                if ($this->HomeFeatureCardModel->insert_feature_card($data_card)) {
                    $this->session->set_flashdata('success_message', 'Fitur Card berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Gagal menambahkan Fitur Card.');
                }
                redirect('admin/feature_card');
            }
        } else {
            redirect('admin/feature_card/create');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Fitur Card';
        $data['feature_card'] = $this->HomeFeatureCardModel->get_feature_card_by_id($id);

        if (!$data['feature_card']) {
            show_404();
            return;
        }

        // Load header dan footer sebagai bagian dari data
        $data['header_admin'] = $this->load->view('admin/layout/header_admin', $data, true);
        $data['footer_admin'] = $this->load->view('admin/layout/footer_admin', '', true);

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Judul Fitur', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $data['error_message'] = validation_errors();
            } else {
                $data_card_update = [
                    'title'       => trim($this->input->post('title')),
                    'description' => trim($this->input->post('description')),
                    'icon_url'    => trim($this->input->post('icon_url')),
                    'is_active'   => $this->input->post('is_active') ? 1 : 0,
                    'updated_at'  => date('Y-m-d H:i:s'),
                ];

                if ($this->HomeFeatureCardModel->update_feature_card($id, $data_card_update)) {
                    $this->session->set_flashdata('success_message', 'Fitur Card berhasil diperbarui.');
                    redirect('admin/feature_card');
                } else {
                    $data['error_message'] = 'Gagal memperbarui Fitur Card.';
                }
            }
        }

        $this->load->view('admin/feature_cards/edit', $data);
    }

    public function delete($id) {
        if ($this->HomeFeatureCardModel->delete_feature_card($id)) {
            $this->session->set_flashdata('success_message', 'Fitur Card berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus Fitur Card.');
        }
        redirect('admin/feature_card');
    }
}
