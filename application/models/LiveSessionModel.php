<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveSessionModel extends CI_Model {

    public function getLiveSessions($limit = 10, $offset = 0) {
        return $this->db->order_by('start_time', 'DESC')
                        ->get('live_sessions', $limit, $offset)
                        ->result();
    }

    public function getVideoFeeds($limit = 10, $offset = 0) {
        return $this->db->order_by('created_at', 'DESC')
                        ->get('video_feeds', $limit, $offset)
                        ->result();
    }

    public function addLiveSession($data) {
        return $this->db->insert('live_sessions', $data);
    }
}
?>
