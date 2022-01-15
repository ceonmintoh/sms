<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AttendanceModule extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function returan a day only.
    public function day() {
        $a = date("d");
        return $a;
    }

    //This function is returan an integer as a monthly class amount.
    public function classAmountMonthly($var) {
        $maxid = 0;
        $row = $this->db->query("SELECT MAX(class_amount_monthly) AS `maxid` FROM `daily_attendance` WHERE student_id='$var'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }

    //This function is returan an integer as a yearly class amount.
    public function classAmountYearly($var) {
        $maxid = 0;
        $row = $this->db->query("SELECT MAX(class_amount_yearly) AS `maxid` FROM `daily_attendance` WHERE student_id='$var'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }

    //This function is returan an integer as a monthly attend's amount.
    public function attendAmountMonthly($var) {
        $maxid = 0;
        $row = $this->db->query("SELECT MAX(attend_amount_monthly) AS `maxid` FROM `daily_attendance` WHERE student_id='$var'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }

    //This function is returan an integer as a yearly attend's amount.
    public function attendAmountYearly($var) {
        $maxid = 0;
        $row = $this->db->query("SELECT MAX(attend_amount_yearly) AS `maxid` FROM `daily_attendance` WHERE student_id='$var'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }

    //This function used to findout monthly attendence % by an student monthly.
    public function attendPercentiseMonthly($ver_1, $ver_2) {
        $a = $ver_1 * 100;
        $b = $a / $ver_2;
        return $b;
    }

    //This function used to findout monthly attendence % by an student monthly.
    public function attendPercentiseYearly($ver_1, $ver_2) {
        $a = $ver_1 * 100;
        $b = $a / $ver_2;
        return $b;
    }

    public function allStudentsDailyAttendence($date, $classTitle) {
        $data = array();
        $query = $this->db->get_where('daily_attendance', array('date' => $date, 'class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $data[] = $row['percentise_month'];
        } $a = $data;
        $return = count($a);
        $allPercentise = array_sum($a);
        $garPercentise = $allPercentise / $return;
        return $garPercentise;
    }

    public function allStudentsYearlyAttendence($date, $classTitle) {
        $data = array();
        $query = $this->db->get_where('daily_attendance', array('date' => $date, 'class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $data[] = $row['percentise_year'];
        } $a = $data;
        $return = count($a);
        $allPercentise = array_sum($a);
        $garPercentise = $allPercentise / $return;
        return $garPercentise;
    }

    //This function will return teacher's list
    public function teacherList() {
        $data = array();
        $year = date('Y');
        $date = strtotime(date("d-m-Y"));
        $query = $this->db->query("SELECT id,employ_title FROM teacher_attendance WHERE present_or_absent = 'Absent' AND date=$date AND year = $year");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will cheack that today teacher attendance taken or note
    public function todayTeacherAtt($date) {
        $year = date('Y');
        $query = $this->db->query("SELECT id FROM teacher_attendance WHERE year='$year' AND date='$date'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            return 'Taken';
        }
    }

    //This function will return attend employees info
    public function attend_employe() {
        $data = array();
        $year = date('Y');
        $date = strtotime(date('d-m-Y'));
        $query = $this->db->query("SELECT id,date,employ_id,employ_title,present_or_absent,attend_time FROM teacher_attendance WHERE year='$year'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
