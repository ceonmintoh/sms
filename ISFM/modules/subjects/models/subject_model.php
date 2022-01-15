<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subject_model extends CI_Model {
    /**
     * This model is using into the sclass controller
     * Load : $this->load->model('classmodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function will return an array which is in class subject by class Id 
    public function class_op_sub($class_id) {
        $data = array();
        $query = $this->db->query("SELECT id,subject_title FROM class_subject WHERE class_id=$class_id AND optional=1");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
