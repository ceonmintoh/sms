<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class noticemodel extends CI_Model {
    /**
     * This model is using into the Notice controller
     * Load : $this->load->model('noticemodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function is using for the get all and Teacher's notice by SQL where query.
    public function getTeacherNotice() {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='teacher' OR receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function is using for the get all and student's notice by SQL where query.
    public function getStudentNotice() {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='student' OR receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function is using for the get all Employe's and Accountends's notice by SQL where query.
    public function getEANotice() {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

}
