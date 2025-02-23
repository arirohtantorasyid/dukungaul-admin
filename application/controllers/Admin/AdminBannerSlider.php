<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBannerSlider extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('HomeBannerSliderModel');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Banner Slider';
        $data['header_admin'] = $data['title'];
        $data['banner_sliders'] = $this->HomeBannerSliderModel->get_active_banner_sliders();

        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/banner_sliders/index', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function create()
    {
        $data['title'] = 'Tambah Banner Slider';
        $data['header_admin'] = $data['title'];

        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/banner_sliders/create', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function save()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('image_url', 'URL Gambar Banner', 'required|trim|valid_url');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_message', validation_errors());
                redirect('admin/banner_slider/create');
            } else {
                $data_banner = [
                    'image_url'  => $this->input->post('image_url', TRUE),
                    'is_active'  => $this->input->post('is_active') ? 1 : 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if ($this->HomeBannerSliderModel->insert_banner_slider($data_banner)) {
                    $this->session->set_flashdata('success_message', 'Banner slider berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Gagal menambahkan banner slider.');
                }
                redirect('admin/banner_slider');
            }
        } else {
            redirect('admin/banner_slider/create');
        }
    }

    public function edit($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('error_message', 'ID Banner Slider tidak valid.');
            redirect('admin/banner_slider');
            return;
        }

        $data['title'] = 'Edit Banner Slider';
        $data['header_admin'] = $data['title'];
        $data['banner_slider'] = $this->HomeBannerSliderModel->get_banner_slider_by_id($id);

        if (!$data['banner_slider']) {
            $this->session->set_flashdata('error_message', 'Banner Slider tidak ditemukan.');
            redirect('admin/banner_slider');
            return;
        }

        $this->load->view('admin/layout/header_admin', $data);
        $this->load->view('admin/banner_sliders/edit', $data);
        $this->load->view('admin/layout/footer_admin');
    }

    public function update($id)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('image_url', 'URL Gambar Banner', 'required|trim|valid_url');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_message', validation_errors());
                redirect('admin/banner_slider/edit/' . $id);
            } else {
                $data_banner_update = [
                    'image_url'  => $this->input->post('image_url', TRUE),
                    'is_active'  => $this->input->post('is_active') ? 1 : 0,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if ($this->HomeBannerSliderModel->update_banner_slider($id, $data_banner_update)) {
                    $this->session->set_flashdata('success_message', 'Banner slider berhasil diperbarui.');
                } else {
                    $this->session->set_flashdata('error_message', 'Gagal memperbarui banner slider.');
                }
                redirect('admin/banner_slider');
            }
        } else {
            redirect('admin/banner_slider/edit/' . $id);
        }
    }

    public function delete($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('error_message', 'ID Banner Slider tidak valid.');
            redirect('admin/banner_slider');
            return;
        }

        if ($this->HomeBannerSliderModel->delete_banner_slider($id)) {
            $this->session->set_flashdata('success_message', 'Banner slider berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus banner slider.');
        }

        redirect('admin/banner_slider');
    }
}
