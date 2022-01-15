<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Messagemodel extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function return all students phone number.
    public function studentNumber($a, $b, $c = NULL) {
        $number = array();
        if ($a == 'Student') {
            //The message receiver group is student.
            if ($b == 'AllStudentSchool') {
                $query = $this->db->query('SELECT phone FROM student_info');
                foreach ($query->result_array() as $row) {
                    $number[] = $row['phone'];
                }
            } elseif (!empty($b)) {
                if ($c == 'AllStudentsClass') {
                    $query = $this->db->query("SELECT phone FROM student_info WHERE class_title ='$b'");
                    foreach ($query->result_array() as $row) {
                        $number[] = $row['phone'];
                    }
                } else {
                    $query = $this->db->query("SELECT phone FROM student_info WHERE student_id =$c");
                    foreach ($query->result_array() as $row) {
                        $number[] = $row['phone'];
                    }
                }
            }
        } elseif ($a == 'Teacher') {
            //The message receiver group is teacher.
            if ($b == 'AllTeacher') {
                $query = $this->db->query('SELECT phone FROM teachers_info');
                foreach ($query->result_array() as $row) {
                    $number[] = $row['phone'];
                }
            } elseif (!empty($b)) {
                $query = $this->db->query("SELECT phone FROM teachers_info WHERE user_id = $b");
                foreach ($query->result_array() as $row) {
                    $number[] = $row['phone'];
                }
            }
        } else {
            //The message receiver group is parents.
        }
        return $number;
    }
}
