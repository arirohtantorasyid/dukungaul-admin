<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeBannerSliderModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_active_banner_sliders()
    {
        $this->db->where('is_active', 1); // Ambil hanya banner yang aktif
        $query = $this->db->get('home_banner_sliders');
        return $query->result_array();
    }

    public function get_banner_slider_by_id($id)
    {
        $query = $this->db->get_where('home_banner_sliders', array('id' => $id));
        return $query->row_array();
    }

    public function insert_banner_slider($data)
    {
        return $this->db->insert('home_banner_sliders', $data);
    }

    public function update_banner_slider($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('home_banner_sliders', $data);
    }

    public function delete_banner_slider($id)
    {
        return $this->db->delete('home_banner_sliders', array('id' => $id));
    }
}