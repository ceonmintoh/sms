<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LeaveModel extends CI_Model {
    /**
     * This model is using into the Examination controller
     * Load : $this->load->model('exammodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function will reaturn all leave application
    public function allLeaveApplication() {
        $data = array();
        $query = $this->db->query('SELECT id,application_date,sender_title,subject,status,cheack_statuse FROM leave_application');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return a singule application full
    public function checkApplication($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM leave_application WHERE id=$id ");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
