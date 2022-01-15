<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class HomeModel extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    //This function will daily present employe info.
    public function presentEmploy() {
        $data = array();
        $date = strtotime(date('d-m-Y'));
        $query = $this->db->query("SELECT id FROM teacher_attendance WHERE date='$date' AND present_or_absent='Present'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //This function will daily present employe info.
    public function absentEmploy() {
        $data = array();
        $date = strtotime(date('d-m-Y'));
        $query = $this->db->query("SELECT id FROM teacher_attendance WHERE date='$date' AND present_or_absent='Absent'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //This function will daily present employe info.
    public function leaveEmploy() {
        $data = array();
        $date = strtotime(date('d-m-Y'));
        $query = $this->db->query("SELECT id FROM users WHERE user_status='Employ' AND leave_status='Leave' AND leave_start<='$date' AND leave_end>='$date'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //This function will show daily attendance percentise
    public function atten_chart() {
        $data = array();
        $query = $this->db->query("SELECT class_title,attendance_percentices_daily FROM class");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all events
    public function all_event($userId) {
        $data = array();
        $query = $this->db->query("SELECT * FROM calender_events WHERE user_id='$userId' ORDER BY start_date DESC");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return single events
    public function single_event($eve_id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM calender_events WHERE id='$eve_id'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
