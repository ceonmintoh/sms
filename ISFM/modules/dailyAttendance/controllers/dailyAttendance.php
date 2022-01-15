<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DailyAttendance extends MX_Controller {
//    private $input;

    /**
     * This is DailyAttendance Controller in Class Module.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/dailyAttendance
     * 	- or -  
     * 		http://example.com/index.php/dailyAttendance/index
     */
    function __construct() {
        parent::__construct();
        $this->load->model('attendancemodule');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function show the class & section for selecting class to take attendance 
    public function selectClassAttendance() {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectClassAttendance', $data);
        $this->load->view('temp/footer');
    }

    //This function is used for take attendence to class students
    public function attendance() {
        if ($this->input->post('submit', TRUE)) {
            //Whene submit the attendence information after takeing the attendence
            $i = $this->input->post('in_velu', TRUE);
            $day = date("d-m-Y");
            $date = strtotime($day);
            $classTitle = $this->input->post('classTitle', TRUE);
            for ($x = 1; $x <= $i; $x++) {
                $roll = $this->input->post("roll_$x", TRUE);
                $name = $this->input->post("atudentName_$x", TRUE);
                $present = "";
                if ($this->input->post("action_$x", TRUE)) {
                    if ($this->input->post("action_$x", TRUE) === 'P') {
                        $present = "P";
                    } else {
                        $present = "A";
                    }
                }
                $userId = $this->input->post("userId_$x", TRUE);
                $studentInfoId = $this->input->post("studentInfoId_$x", TRUE);
                $section = $this->input->post("section_$x", TRUE);
                $data = array(
                    'date' => $this->db->escape_like_str($date),
                    'user_id' => $this->db->escape_like_str($userId),
                    'student_id' => $this->db->escape_like_str($studentInfoId),
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'present_or_absent' => $this->db->escape_like_str($present),
                    'section' => $this->db->escape_like_str($section),
                    'roll_no' => $this->db->escape_like_str($roll),
                    'student_title' => $this->db->escape_like_str($name),
                );
                //insert the $data information into "daily_attendance" database.
                $this->db->insert('daily_attendance', $data);
                //Take class and attend amount monthly and make the attendence percintise monthly 
                $classAmountMonthly = $this->attendancemodule->classAmountMonthly($studentInfoId);
                if ($this->input->post("action_$x", TRUE) === 'P') {
                    $attendAmountMonthly = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                } else {
                    $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                    $todayAttendAmountM = 1;
                    $attendAmountMonthly = $previousAttendAmountM - $todayAttendAmountM;
                }
                $attendencePercenticeMonthly = $this->attendancemodule->attendPercentiseMonthly($attendAmountMonthly, $classAmountMonthly);
                //Take class and attend amount yearly and make the attendence percintise yearly 
                $classAmountYearly = $this->attendancemodule->classAmountYearly($studentInfoId);
                if ($this->input->post("action_$x", TRUE) === 'P') {
                    $attendAmountYearly = $this->attendancemodule->attendAmountYearly($studentInfoId);
                } else {
                    $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                    $todayAttendAmountY = 1;
                    $attendAmountYearly = $previousAttendAmountY - $todayAttendAmountY;
                }
                $attendencePercenticeYearly = $this->attendancemodule->attendPercentiseYearly($attendAmountYearly, $classAmountYearly);
                $data_1 = array(
                    'class_amount_monthly' => $this->db->escape_like_str($classAmountMonthly),
                    'class_amount_yearly' => $this->db->escape_like_str($classAmountYearly),
                    'attend_amount_monthly' => $this->db->escape_like_str($attendAmountMonthly),
                    'attend_amount_yearly' => $this->db->escape_like_str($attendAmountYearly),
                    'percentise_month' => $this->db->escape_like_str($attendencePercenticeMonthly),
                    'percentise_year' => $this->db->escape_like_str($attendencePercenticeYearly),
                );
                $this->db->update('daily_attendance', $data_1, array('student_id' => $studentInfoId, 'date' => $date));
                $data_2 = array(
                    'attendance_percentices_daily' => $this->db->escape_like_str($attendencePercenticeMonthly)
                );
                $this->db->update('class_students', $data_2, array('student_id' => $studentInfoId, 'class_title' => $classTitle));
            }
            $dailyClassAttendencePercentise = $this->attendancemodule->allStudentsDailyAttendence($date, $classTitle);
            $yearClassAttendencePercentise = $this->attendancemodule->allStudentsYearlyAttendence($date, $classTitle);
            $data_3 = array(
                'attendance_percentices_daily' => $this->db->escape_like_str($dailyClassAttendencePercentise),
                'attend_percentise_yearly' => $this->db->escape_like_str($yearClassAttendencePercentise)
            );
            $this->db->where('class_title', $classTitle);
            $this->db->update('class', $data_3);
            redirect('dailyAttendance/attendanceCompleteMessage', 'refresh');
        } else {
            //Load attendence view before takeing attendence with class,All section and specific class section
            $classTitle = $this->input->post('class_title', TRUE);
            if ($this->input->post('section', TRUE)) {
                $Section = $this->input->post('section', TRUE);
                if ($Section == 'all') {
                    //if want any class's specific section's students attendence sheet,then work this erea.
                    $queryData = array();
                    $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
                    foreach ($query->result_array() as $row) {
                        $queryData[] = $row;
                    }$data['students'] = $queryData;
                    if (!empty($data['students'])) {
                        $this->load->view('temp/header');
                        $this->load->view('attendance', $data);
                        $this->load->view('temp/footer');
                    } else {
                        echo $classTitle . ' and all section are no any student.';
                    }
                } elseif ($Section != 'all') {
                    //if want All section's students attendence sheet,then work this erea.
                    $queryData = array();
                    $query = $this->db->get_where('class_students', array('class_title' => $classTitle, 'section' => $Section));
                    foreach ($query->result_array() as $row) {
                        $queryData[] = $row;
                    }$data['students'] = $queryData;
                    if (!empty($data['students'])) {
                        $this->load->view('temp/header');
                        $this->load->view('attendance', $data);
                        $this->load->view('temp/footer');
                    } else {
                        echo $classTitle . ' and ' . $Section . ' section are no any student.';
                    }
                }
            } else {
                //whene want any class students attendence sheet only,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }
                $data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendance', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' are no any student.';
                }
            }
        }
    }

    //This function send a message that Attendance Was completed.
    //And gives two link for re-check and can edit the attendance.
    public function attendanceCompleteMessage() {
        $this->load->view('temp/header');
        $this->load->view('attendenceCompleateMessage');
        $this->load->view('temp/footer');
    }

    //This function is used for filtering to get students information(which class and which section if the section in that class)
    public function ajaxClassAttendanceSection() {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                            <select name="section" class="form-control">
                                <option value="all">' . lang('attc_1') . '</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no section.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
    }

    public function selectAttendancePreview() {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectAttendencePreview', $data);
        $this->load->view('temp/footer');
    }

    public function attendencePreview() {
        //Load attendence view before takeing attendence with class,All section and specific class section
        $classTitle = $this->input->post('class_title', TRUE);
        $date = $this->input->post('date', TRUE);
        $intDate = strtotime($date);
        if ($this->input->post('section', TRUE)) {
            $Section = $this->input->post('section', TRUE);
            if ($Section == 'all') {
                //if want any class's specific section's students attendence sheet,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }$data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendencePreview', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' and all section are no any student.';
                }
            } elseif ($Section != 'all') {
                //if want All section's students attendence sheet,then work this erea.
                //if want any class's specific section's students attendence sheet,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate, 'section' => $Section));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }
                $data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendencePreview', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' and ' . $Section . ' section are no any student.';
                }
            }
        } else {
            //whene want any class students attendence sheet only,then work this erea.
            $queryData = array();
            $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate));
            foreach ($query->result_array() as $row) {
                $queryData[] = $row;
            }
            $data['students'] = $queryData;
            if (!empty($data['students'])) {
                $this->load->view('temp/header');
                $this->load->view('attendencePreview', $data);
                $this->load->view('temp/footer');
            } else {
                echo $classTitle . ' ' . lang('attc_2');
            }
        }
    }

    //This function send class section to view by ajax. 
    public function ajaxAttendencePreview() {
        $classTitle = $this->input->get('q', TRUE);
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                            <select name="section" class="form-control">
                                <option value="all">' . lang('attc_1') . '</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no section.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>' . lang('attc_3') . ' </strong> ' . $section . '
                        </div></div></div>';
        }
    }

    //This function can edit and update the related table's info.
    public function editAttendance() {
        $id = $this->input->get('ghtnidjdfjkid', TRUE);
        $day = date("m/d/y");
        $date = strtotime($day);
        if ($this->input->post('submit', TRUE)) {
            $studentInfoId = $this->input->post('studentInfoId', TRUE);
            $classTitle = $this->input->post('classTitle', TRUE);

            $present = "";
            if ($this->input->post("action", TRUE)) {
                if ($this->input->post("action", TRUE) == 'P') {
                    $present = "P";
                } else {
                    $present = "A";
                }
            }
            //Take class and attend amount monthly and make the attendence percintise monthly 
            $classAmountMonthly = $this->attendancemodule->classAmountMonthly($studentInfoId);
            if ($this->input->post("action", TRUE) == 'P') {
                $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                $todayAttendAmountM = 2;
                $attendAmountMonthly = $previousAttendAmountM + $todayAttendAmountM;
            } else {
                $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                $todayAttendAmountM = 2;
                $attendAmountMonthly = $previousAttendAmountM - $todayAttendAmountM;
            }
            $attendencePercenticeMonthly = $this->attendancemodule->attendPercentiseMonthly($attendAmountMonthly, $classAmountMonthly);
            //Take class and attend amount yearly and make the attendence percintise yearly 
            $classAmountYearly = $this->attendancemodule->classAmountYearly($studentInfoId);
            if ($this->input->post("action", TRUE) == 'P') {
                $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                $todayAttendAmountY = 2;
                $attendAmountYearly = $previousAttendAmountY + $todayAttendAmountY;
            } else {
                $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                $todayAttendAmountY = 2;
                $attendAmountYearly = $previousAttendAmountY - $todayAttendAmountY;
            }
            $attendencePercenticeYearly = $this->attendancemodule->attendPercentiseYearly($attendAmountYearly, $classAmountYearly);
            $tableData = array(
                'present_or_absent' => $this->db->escape_like_str($present),
                'class_amount_monthly' => $this->db->escape_like_str($classAmountMonthly),
                'class_amount_yearly' => $this->db->escape_like_str($classAmountYearly),
                'attend_amount_monthly' => $this->db->escape_like_str($attendAmountMonthly),
                'attend_amount_yearly' => $this->db->escape_like_str($attendAmountYearly),
                'percentise_month' => $this->db->escape_like_str($attendencePercenticeMonthly),
                'percentise_year' => $this->db->escape_like_str($attendencePercenticeYearly),
            );
            $this->db->update('daily_attendance', $tableData, array('student_id' => $studentInfoId, 'date' => $date));
            $tableData_1 = array(
                'attendance_percentices_daily' => $this->db->escape_like_str($attendencePercenticeMonthly)
            );
            $this->db->update('class_students', $tableData_1, array('student_id' => $studentInfoId, 'class_title' => $classTitle));
            redirect('dailyAttendance/attendanceEditCompleteMessage', 'refresh');
        } else {
            $data['editInfo'] = $this->common->getWhere('daily_attendance', 'id', $id);
            //load the attendance edit view with information.
            $this->load->view('temp/header');
            $this->load->view('editAttendance', $data);
            $this->load->view('temp/footer');
        }
    }

    public function attendanceEditCompleteMessage() {
        $this->load->view('temp/header');
        $this->load->view('attendanceEditCompleteMessage');
        $this->load->view('temp/footer');
    }

    //This functio check teacher security password
    public function t_a_s_p() {
        if ($this->input->post('submit', TRUE)) {
            $password = $this->input->post('password', TRUE);
            $security = $this->db->query('SELECT t_a_s_p FROM configuration');
            foreach ($security->result_array() as $row) {
                $data = $row['t_a_s_p'];
            }
            if ($password == $data) {
                $today = strtotime(date('d-m-Y'));
                if ($this->attendancemodule->todayTeacherAtt($today) == 'Taken') {
                    redirect('dailyAttendance/teacherAttendance', 'refresh');
                } else {
                    $query = $this->db->query("SELECT id,username FROM users WHERE user_status='Employee' AND NOT (leave_status='Leave' AND leave_start<='$today' AND leave_end>='$today')");
                    foreach ($query->result_array() as $row) {
                        $tData = array(
                            'year' => date('Y'),
                            'date' => strtotime(date("d-m-Y")),
                            'employ_id' => $row['id'],
                            'employ_title' => $row['username'],
                            'present_or_absent' => 'Absent'
                        );
                        $this->db->insert('teacher_attendance', $tData);
                    }
                    redirect('dailyAttendance/teacherAttendance', 'refresh');
                }
            } else {
                $dat['message'] = '<div class="alert alert-danger alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>' . lang('attc_4') . ' </strong> ' . lang('attc_5') . '
							</div>';
                $this->load->view('temp/header');
                $this->load->view('selcetTeacAttView', $dat);
                $this->load->view('temp/footer');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('selcetTeacAttView');
            $this->load->view('temp/footer');
        }
    }

    //Start teacher attendance's function now.
    //take teacher attendance
    public function teacherAttendance() {
        if ($this->input->post('submit', TRUE)) {
            $query = $this->db->query('SELECT time_zone FROM configuration');
            foreach ($query->result_array() as $row) {
                $data = $row['time_zone'];
            }
            $datestring = "%h:%i %a";
            $now = now();
            $timezone = $data;
            $time = gmt_to_local($now, $timezone);
            $compTime = mdate($datestring, $time);
            $teacherAttenId = $this->input->post('teacher', TRUE);
            if ($this->input->post('presAbsent', TRUE) == 'Absent') {
                $compTime = '';
            }
            $insertData = array(
                'id' => $teacherAttenId,
                'present_or_absent' => $this->input->post('presAbsent', TRUE),
                'attend_time' => $compTime
            );
            $this->db->where('id', $teacherAttenId);
            if ($this->db->update('teacher_attendance', $insertData)) {
                redirect('dailyAttendance/teacherAttendance', 'refresh');
            }
        } else {
            $data['teacher'] = $this->attendancemodule->teacherList();
            $this->load->view('temp/header');
            $this->load->view('teacAtteView', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will return employee attendance information
    public function employe_atten_view() {
        $data['employee'] = $this->attendancemodule->attend_employe();
        $this->load->view('temp/header');
        $this->load->view('employe_atten_view', $data);
        $this->load->view('temp/footer');
    }

}
