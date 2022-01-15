<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
    }
    //This function will return logo link
    public function logoTitle(){
        $data = array();
        $query =  $this->db->query("SELECT logo,school_name FROM configuration");
        foreach($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    }
    
    //This function return the last inserted user id.
    function usersId() {
        $query = $this->db->query('SELECT id FROM users ORDER BY id DESC LIMIT 1');
        foreach ($query->result_array() as $row){
            $data = $row['id'];
        }
        return $data;
    }
    
    //This function select user access ability.
    public function user_access($role, $userId) {
        $data = array();
        $query = $this->db->query('SELECT ' . $role . ' FROM role_based_access WHERE user_id=' . $userId . ';')->row();
        foreach ($query as $row) {
            $data = $row;
        }
        if ($data == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    //This function show the class title for class selecting class
    public function selectClass(){
        $data = array();
        $query = $this->db->query('SELECT id,class_title FROM class');
        foreach ($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    } 
    
    //Total students will returan this function
    public function totalStudent() {
        $data = array();
        $query = $this->db->get('student_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }
    
    //This function will cheack data table empty or not
    public function emptyCheack($a){
        $query = $this->db->query("SELECT * FROM $a")->row();
        if(empty($query)){
            return TRUE;
        }  else {
            return FALSE;
        }
    }

    //Total teachers will returan this function
    public function totalTeacher() {
        $data = array();
        $query = $this->db->get('teachers_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //Total parents will returan this function
    public function totalParents() {
        $data = array();
        $query = $this->db->get('parents_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //Today total Attend student will returan this function
    public function totalAttendStudent() {
        $day = date("m/d/y");
        $date = strtotime($day);
        $data = array();
        $query = $this->db->get_where('daily_attendance', array('date' => $date, 'present_or_absent' => 'P'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
    }

    //This function will return time and date as a string
    public function iceTime() {
        $data = array();
        $query = $this->db->query('SELECT time_zone FROM configuration');
        foreach ($query->result_array() as $row) {
            $data = $row['time_zone'];
        }
        $datestring = "<i class=\"fa fa-clock-o\"></i> %h:%i %a  <i class=\"fa fa-calendar\"></i>  %d %M, %Y ";
        $now = now();
        $timezone = $data;
        $time = gmt_to_local($now, $timezone);
        echo mdate($datestring, $time);
    }

    //This function will return only class title by class id from class table.
    public function class_title($class_id){
        $data = array();
        $query = $this->db->query("SELECT class_title FROM class WHERE id=$class_id")->row();
            return $query->class_title;
    }
    
    //This function will show student title by student id
    public function student_title($student_id){
//        $data = array();
        $query = $this->db->query("SELECT student_nam FROM student_info WHERE student_id=$student_id")->row();
            return $query->student_nam;
    }
    
    //This function will return student ID by user ID
    public function student_id($user_id){
        if($this->ion_auth->in_group(3)){
            $query = $this->db->query("SELECT student_id FROM student_info WHERE user_id=$user_id")->row();
            return $query->student_id;
        }elseif ($this->ion_auth->in_group(5)) {
            $query = $this->db->query("SELECT student_id FROM parents_info WHERE user_id=$user_id")->row();
            return $query->student_id;
        }
    }
    
    //class's short information will give this function 
    public function classInfo(){
        $data = array();
        $query = $this->db->query("SELECT class_title,student_amount,attendance_percentices_daily,attend_percentise_yearly FROM class");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    function studentInfoId() {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `student_info`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid;
    }

    public function getAllData($a) {
        $data = array();
        $query = $this->db->get($a);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    public function getWhere($a, $b, $c) {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    public function getWhere22($a, $b, $c, $d, $e) {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c, $d => $e));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //THis function is take class title and make unic Roll nomber that class.
    //And return that roll number.
    public function rollNumber($a) {
        $query2 = $this->db->get_where('class_students', array('class_id' => $a));
        $qq = array();
        foreach ($query2->result_array() as $aa) {
            $qq[] = $aa;
        }
        $a = $qq;
        //return $a;
        $b = array();
        foreach ($a as $row) {
            $b[] = $row['roll_number'];
        }$c = $b;
        //return max($c);
        if (empty($a)) {
            $d = 1;
            return $d;
        } else {
            $c;
            $e = max($c);
            $e++;
            return $e;
        }
    }

    //This function will return total student amount in a class
    public function classStudentAmount($id) {
        $data = array();
        $query = $this->db->get_where('class', array('id' => $id));
        foreach ($query->result_array() as $row) {
            $data = $row;
        }
        $b = $data['student_amount'];
        $c = $b + 1;
        return $c;
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

    //This function return school name
    public function schoolName() {
        $data = array();
        $query = $this->db->get('configuration');
        foreach ($query->result_array() as $row) {
            $data = $row['school_name'];
        }return $data;
    }

    //This function return currency class name
    public function currencyClass() {
        $data = array();
        $query = $this->db->get('configuration');
        foreach ($query->result_array() as $row) {
            $data = $row['currenct'];
        }return $data;
    }
    
    //This function will returan students information by id 
    public function stuInfoId($a){
        $query = $this->db->query("SELECT user_id,class_id,student_nam,student_photo FROM student_info WHERE student_id = $a")->row();
        return $query;
    }
    
    //This function will returan country code
    public function countryPhoneCode(){
        $query = $this->db->query("SELECT countryPhonCode FROM configuration")->row();
        return $query;
    }
    
    //This function will return teacher's list
    public function teacherAttendance(){
        $data = array();
        $year = date('Y');
        $date = strtotime(date("d-m-Y"));
        $query = $this->db->query("SELECT employ_title,present_or_absent,attend_time FROM teacher_attendance WHERE date=$date AND year = $year");
        foreach ($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    }
    
    //This function will return class exam term
    public function examTerm($a){
        $preExamTerm = array();
        $query = $this->db->query("SELECT exam_term FROM set_fees WHERE class_id = '$a'");
        foreach ($query->result_array() as $row){
            $preExamTerm = $row['exam_term'];
        }
        if($preExamTerm == 0){
            $nextExamTerm = $preExamTerm + 1;
            return $nextExamTerm;
        }  elseif ($preExamTerm == 1) {
            $nextExamTerm = $preExamTerm + 1;
            return $nextExamTerm;
        }  elseif ($preExamTerm == 2) {
            $nextExamTerm = $preExamTerm + 1;
            return $nextExamTerm;
        }  else {
            $nextExamTerm = 1;
            return $nextExamTerm;         
        }
    }
    
    //This function will return fee amount from configaration by class
    public function feeAmount($col,$classTitle){
        $data = array();
        $query = $this->db->query("SELECT $col FROM set_fees WHERE class_title = '$classTitle'");
//      return $query->$col;
        foreach ($query->result_array() as $row){
            $data = (int) $row[$col];
        }
        $value = $data;
        return $value;
    }
    
    //This function will return only have any entry by this current date
    public function cashBookyes($table){
        $data = array();
        $date = strtotime(date('d-m-Y'));
        $query =  $this->db->query("SELECT id FROM $table WHERE date=$date ORDER BY id DESC LIMIT 1");
        foreach ($query->result_array() as $row){
            $data = $row['id'];
        }
        if(!empty($data)){
            return $data;
//            return TRUE;
        }  else {
            return FALSE;
        }
    }
    
    //This function will return cash book item previous value
    public function cashBookItem($si,$table){
        $data = array();
        $date = strtotime(date('d-m-Y'));
        $query =  $this->db->query("SELECT $si FROM $table WHERE date=$date ORDER BY id DESC LIMIT 1");
        foreach ($query->result_array() as $row){
            $data = $row["$si"];
        }
        return $data;
    }
    
    //This function will return only class list from "class" table.
    public function classList(){
        $data = array();
        $query = $this->db->query("SELECT class_title FROM class");
        foreach ($query->result_array() as $row){
            $data[] = $row['class_title'];
        }return $data;
    }
    
    //This function will return final exam by it's class name 
    public function finalExam($classTitle){
        $data =array();
//        $query  = $this->db->query("SELECT id FROM add_exam WHERE class_title='$classTitle' AND final='Final' AND publish='Publish'");
        $query  = $this->db->query("SELECT id FROM add_exam WHERE class_title='$classTitle' AND final='Final'");
        foreach ($query->result_array() as $row){
            $data[] = $row['id'];
        }
        return $data;
    }
    
    //This function will return class potional subjects
    public function class_os($class_title)
    {
        $data = array();
        $query = $this->db->query("SELECT id,subject_title FROM class_subject WHERE class_title='$class_title' AND optional = 1");
        foreach ($query->result_array() as $row)
        {
            $data[] = $row;
        }
        return $data;
    }
    //This function will show user group name
    public function group_name($gid){
        $data = array();
        $query = $this->db->query("SELECT name FROM groups WHERE id=$gid");
        foreach ($query->result_array() as $row){
            $group_name = $row['name'];
        }
        return $group_name;
    }
}
