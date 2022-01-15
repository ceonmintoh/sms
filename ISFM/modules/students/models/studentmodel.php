<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Studentmodel extends CI_Model {
    /**
     * This model is using into the students controller
     * Load : $this->load->model('studentmodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function return class section 
    public function classSection($class_id) {
        $data = array();
        $query = $this->db->query("SELECT section FROM class WHERE id=$class_id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function return all student in a class.
    public function getAllStudent($a) {
        $query = $this->db->get_where('class_students', array('class_id' => $a, 'year' => date('Y')));
        $data = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    public function getStudentByClassSection($a, $b) {
        if ($b == 'all') {
            $query = $this->db->get_where('class_students', array('class_id' => $a));
            $data = array();
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }return $data;
        } else {
            $query = $this->db->get_where('class_students', array('class_id' => $a, 'section' => $b));
            $data = array();
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }return $data;
        }
    }

    //THis function return student's picture name from database.
    public function studentPhoto($studentId) {
        $query = $this->db->get_where('student_info', array('student_id' => $studentId));
        $data = array();
        foreach ($query->result_array() as $row) {
            $data = $row;
        }
        return $data['student_photo'];
    }

    //THis function return student's picture name from database.
    public function ownStudentPhoto($userId) {
        $query = $this->db->get_where('student_info', array('user_id' => $userId));
        $data = array();
        foreach ($query->result_array() as $row) {
            $data = $row;
        }
        return $data['student_photo'];
    }

    //This function return a student's details by student database row id.
    public function studentDetails($a) {
        $query = $this->db->get_where('class_students', array('id' => $a));
        $data = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function return a student's details by student database row id.
    public function ownStudentDetails($a) {
        $query = $this->db->get_where('class_students', array('user_id' => $a));
        $data = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function return a class section by this class title.
    public function section($a) {
        $query = $this->common->getWhere('class', 'class_title', $a);
        foreach ($query as $row) {
            $data = $row;
        }
        //making here Class Section fild.
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            return $sectionArray;
        } else {
            $section = 'This class has no section.';
            return $section;
        }
    }

    //This function return markshit by examtitle,class title and student id.
    public function markshit($examTitle, $class_id, $studentId) {
        $data = array();
        $query = $this->db->get_where('result_shit', array('exam_title' => $examTitle, 'class_id' => $class_id, 'student_id' => $studentId));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }
}
