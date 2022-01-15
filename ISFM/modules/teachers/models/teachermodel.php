<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Teachermodel extends CI_Model {
    /**
     * This model is using into the students controller
     * Load : $this->load->model('studentmodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This functiion will return all teacher information
    public function allTeachers() {
        $data = array();
        $query = $this->db->query("SELECT * FROM teachers_info");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
