<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Configarationmodel extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function return language name from database;
    public function language() {
        $data = array();
        $query = $this->db->query('SELECT language FROM configuration WHERE id=1');
        foreach ($query->result_array() as $row) {
            $data[] = $row['language'];
        }
        return $data;
    }

    //This function will return class exam term
    public function checkClassFee($a) {
        $query = $this->db->query("SELECT id FROM set_fees WHERE Class_title = '$a'")->row();
        if (empty($query)) {
            $rowId = 'empty';
            return $rowId;
        } else {
            $rowId = $query->id;
            return $rowId;
        }
    }

    //This function will provide previous fees amount by class
    public function getClassFee($id) {
        $query = $this->db->query("SELECT * FROM set_fees WHERE id = $id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //this function will return all employe fromusers table
    public function employ() {
        $data = array();
        $query = $this->db->query("SELECT id,username FROM users WHERE user_status='Employee' AND salary=0");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will cheack employe group
    public function employGroup($uId) {
        $data = array();
        $query = $this->db->query("SELECT group_id FROM users_groups WHERE user_id=$uId");
        foreach ($query->result_array() as $row) {
            $groupId = $row['group_id'];
            if ($groupId == 1 || $groupId == 4) {
                echo $groupId;
            } else {
                echo 'not';
            }
        }
    }

    //This function will reaturn set salary's informations.
    public function salaryInfo() {
        $data = array();
        $query = $this->db->query("SELECT * FROM set_salary");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all salery info 
    public function saleryConFigInfo($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM set_salary WHERE id= $id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will show all user frope list with id
    public function allGroup() {
        $data = array();
        $query = $this->db->query("SELECT id,name FROM groups");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will check employee secority password is set? or not ?
    public function cheEmpPass() {
        $data = array();
        $query = $this->db->query("SELECT t_a_s_p FROM configuration");
        foreach ($query->result_array() as $row) {
            $data = $row['t_a_s_p'];
        }
        if (!empty($data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //This function will return student item fee
    public function item_fee_info($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM fee_item WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

}
