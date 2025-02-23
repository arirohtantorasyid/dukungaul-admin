<?php
class HomeFeatureCardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_active_feature_cards() {
        $this->db->where('is_active', 1);
        $query = $this->db->get('home_feature_cards');
        return $query->result();
    }

    public function get_feature_card_by_id($id) {
        $query = $this->db->get_where('home_feature_cards', array('id' => $id));
        return $query->row();
    }

    public function insert_feature_card($data) {
        $query = $this->db->insert('home_feature_cards', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $error = $this->db->error();
            log_message('error', 'Database Error saat insert fitur card: ' . $error['message'] . ' | Query: ' . $this->db->last_query());
            return false;
        }
    }

    public function update_feature_card($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('home_feature_cards', $data);
    }

    public function delete_feature_card($id) {
        return $this->db->delete('home_feature_cards', array('id' => $id));
    }
}