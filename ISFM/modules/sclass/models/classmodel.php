<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classmodel extends CI_Model {
    /**
     * This model is using into the sclass controller
     * Load : $this->load->model('classmodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function sent an array to sclass controller's "addClassRoutin" function.
    public function classSubject($a) {
        $data = array();
        $query = $this->db->get_where('class', array('class_title' => $a));
        foreach ($query->result_array() as $row) {
            $data = $row;
        }return $data;
    }

    //This functionn is for get data from database with two condition.
    public function getWhere($a, $b, $c, $d, $e) {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c, $d => $e));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function return total student amount in a class
    public function totalClassStudent($classTitle) {
        $data = array();
        $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //This function return section amount in a class
    public function totalClassSection($c_id) {
        $data = array();
        $query = $this->db->get_where('class', array('id' => $c_id));
        foreach ($query->result_array() as $row) {
            $data = $row['section'];
        }
        if (!empty($data)) {
            $section = explode(',', $data);
            return count($section);
        } else {
            return 'No Section';
        }
    }

    public function classCodeCheck($a) {
        $data = array();
        $query = $this->db->get('class');
        foreach ($query->result_array() as $row) {
            $data[] = $row['classCode'];
        }
        if (in_array($a, $data)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //This function will return true or false final exam and result compleate or not
    public function chFiExRe($class_id) {
        $query = $this->db->query("SELECT publish,status FROM add_exam WHERE class_id='$class_id' AND final='Final'");
        foreach ($query->result_array() as $row) {
            $publich = $row['publish'];
            $status = $row['status'];
        }
        if (!empty($publich)) {
            if ($publich == 'Publish') {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    //This function will make marite list 
    public function meritList($examId) {
        $data = array();
        $query = $this->db->query("SELECT student_id,total_mark FROM final_result WHERE exam_id='$examId'");
        foreach ($query->result_array() as $row) {
            $index = $row['student_id'];
            $data["$index"] = $row['total_mark'];
        }
        arsort($data);
        $ri = 1;
        foreach ($data as $key => $value) {
            $meritList = array(
                'maride_list' => $ri
            );
            $this->db->where('student_id', $key);
            $this->db->update('final_result', $meritList);
            $ri++;
        }
    }

    //This function will return class section student capacity
    public function sectionCap($classId) {
        $data = array();
        $query = $this->db->query("SELECT section_student_capacity FROM class WHERE id='$classId'");
        foreach ($query->result_array() as $row) {
            return $row['section_student_capacity'];
        }
    }

    //This function will return student new class section by his studentid
    public function sectionSelect($studentId, $i) {
        $data = array();
        $query = $this->db->query("SELECT class_title,sex FROM class WHERE student_id='$studentId'");
        foreach ($query->result_array() as $row) {
            
        }
    }
}
