<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Sclass extends MX_Controller {
    /**
     * This controller is use for add class and maintain class
     *
     * Maps to the following URL
     * 		http://example.com/index.php/Sclass
     * 	- or -  
     * 		http://example.com/index.php/Sclass/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->model('classmodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    //This function is useing for add a new class and section.
    public function addClass() {
        if ($this->input->post('submit', TRUE)) {
            $classTitle = $this->input->post('class_title', TRUE);
            $group = $this->input->post('group', TRUE);
            if ($this->input->post('group_2', TRUE)) {
                $group = $this->input->post('group', TRUE) . ',' . $this->input->post('group_2', TRUE);
            }
            if ($this->input->post('group_3', TRUE)) {
                $group = $this->input->post('group', TRUE) . ',' . $this->input->post('group_2', TRUE) . ',' . $this->input->post('group_3', TRUE);
            }
            $section = $this->input->post('section', TRUE);
            if ($this->input->post('section_2', TRUE)) {
                $section = $this->input->post('section', TRUE) . ',' . $this->input->post('section_2', TRUE);
            }
            if ($this->input->post('section_3', TRUE)) {
                $section = $this->input->post('section', TRUE) . ',' . $this->input->post('section_2', TRUE) . ',' . $this->input->post('section_3', TRUE);
            }
            if ($this->input->post('section_4', TRUE)) {
                $section = $this->input->post('section', TRUE) . ',' . $this->input->post('section_2', TRUE) . ',' . $this->input->post('section_3', TRUE) . ',' . $this->input->post('section_4', TRUE);
            }
            if ($this->input->post('section_5', TRUE)) {
                $section = $this->input->post('section', TRUE) . ',' . $this->input->post('section_2', TRUE) . ',' . $this->input->post('section_3', TRUE) . ',' . $this->input->post('section_4', TRUE) . ',' . $this->input->post('section_5', TRUE);
            }
            $capicity = $this->input->post('capicity', TRUE);
            $classCode = $this->input->post('class_code', TRUE);
            $tableData = array(
                'class_title' => $this->db->escape_like_str($classTitle),
                'class_group' => $this->db->escape_like_str($group),
                'section' => $this->db->escape_like_str($section),
                'section_student_capacity' => $this->db->escape_like_str($capicity),
                'classCode' => $this->db->escape_like_str($classCode)
            );
            if ($this->db->insert('class', $tableData)) {
                $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                            <strong>'.lang('success').'</strong>'.lang('clasc_1').' "' . $classTitle . '" '.lang('clasc_2').'
                                    </div>';
                $data['classInfo'] = $this->common->getAllData('class');
                $this->load->view('temp/header');
                $this->load->view('allClass', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('addClassSection', $data);
            $this->load->view('temp/footer');
        }
    }
    
    //This function can edit class information
    public function deleteClass() {
        $id = $this->input->get('id');
        if ($this->db->delete('class', array('id' => $id))) {
            redirect('sclass/allClass/', 'refresh');
        }
    }
    
    //This function is useing for geting all class short information
    public function allClass() {
        $data['classInfo'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('allClass', $data);
        $this->load->view('temp/footer');
    }
    
    //This function is useing for a class's full informtion
    public function classDetails() {
        $class_id = $this->input->get('c_id');
        $data['class'] = $this->common->getWhere('class', 'id', $class_id);
        $data['day'] = $this->common->getAllData('config_week_day');
        $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
        $data['teacher'] = $this->common->getAllData('teachers_info');
        $data['classSection'] = $this->classmodel->totalClassSection($class_id);
        $this->load->view('temp/header');
        $this->load->view('classDetails', $data);
        $this->load->view('temp/footer');
    }
    //This function lode the view for select which class routine add or make
    public function selectClassRoutin() {
        $data['classTile'] = $this->common->getAllData('class');
        $data['day'] = $this->common->getAllData('config_week_day');
        $this->load->view('temp/header');
        $this->load->view('selectClassRoutine', $data);
        $this->load->view('temp/footer');
    }
    //This function is useing for add new class routine
    public function addClassRoutin() {
        $class_id = $this->input->post('class', TRUE);
        $classTitle = $this->common->class_title($class_id);
        //if admin set section for any class then bellow [if(){ condition]  will execute ***(Start)***
        if ($this->input->post('section', TRUE)) {
            $section = $this->input->post('section', TRUE);
            //if admin set "all" section for any class then bellow [if(){ condition]  will execute ***(Start)***
            if ($section == 'all') {
                if ($this->input->post('submit2', TRUE)) {
                    $day = $this->input->post('day', TRUE);
                    $subject = $this->input->post('subject', TRUE);
                    $teacher = $this->input->post('teacher', TRUE);
                    $startTime = $this->input->post('startTime', TRUE);
                    $endTime = $this->input->post('endTime', TRUE);
                    $roomNumber = $this->input->post('roomNumber', TRUE);
                    $tableData = array(
                        'class_id' => $this->db->escape_like_str($class_id),
                        'day_title' => $this->db->escape_like_str($day),
                        'section' => $this->db->escape_like_str($section),
                        'subject' => $this->db->escape_like_str($subject),
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                        'start_time' => $this->db->escape_like_str($startTime),
                        'end_time' => $this->db->escape_like_str($endTime),
                        'room_number' => $this->db->escape_like_str($roomNumber)
                    );
                    $tableData2 = array(
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                    );
                    if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_id' => $class_id, 'subject_title' => $subject))) {
                        $data['classTile'] = $classTitle;
                        $data['class_id'] = $class_id;
                        $data['day'] = $this->common->getAllData('config_week_day');
                        $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                        $data['teacher'] = $this->common->getAllData('teachers_info');
                        $this->load->view('temp/header');
                        $this->load->view('addClassRoutin', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $data['classTile'] = $classTitle;
                    $data['class_id'] = $class_id;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            }
            //if admin set "Section A or any specific section" for any class then bellow [ealse{ condition]  will execute ***(Start)***
            else {
                if ($this->input->post('submit2', TRUE)) {
                    $day = $this->input->post('day', TRUE);
                    $subject = $this->input->post('subject', TRUE);
                    $teacher = $this->input->post('teacher', TRUE);
                    $startTime = $this->input->post('startTime', TRUE);
                    $endTime = $this->input->post('endTime', TRUE);
                    $roomNumber = $this->input->post('roomNumber', TRUE);
                    $tableData = array(
                        'class_id' => $this->db->escape_like_str($class_id),
                        'day_title' => $this->db->escape_like_str($day),
                        'section' => $this->db->escape_like_str($section),
                        'subject' => $this->db->escape_like_str($subject),
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                        'start_time' => $this->db->escape_like_str($startTime),
                        'end_time' => $this->db->escape_like_str($endTime),
                        'room_number' => $this->db->escape_like_str($roomNumber)
                    );
                    $tableData2 = array(
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                    );
                    if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_id' => $class_id, 'subject_title' => $subject))) {
                        $data['classTile'] = $classTitle;
                        $data['class_id'] = $class_id;
                        $data['day'] = $this->common->getAllData('config_week_day');
                        $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                        $data['teacher'] = $this->common->getAllData('teachers_info');
                        $this->load->view('temp/header');
                        $this->load->view('addClassRoutin', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $data['classTile'] = $classTitle;
                    $data['class_id'] = $class_id;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            }
        }
        //if admin do not set section for any class then bellow [else{ condition]  will execute ***(Start)***
        else {
            if ($this->input->post('submit2', TRUE)) {
                $day = $this->input->post('day', TRUE);
                $subject = $this->input->post('subject', TRUE);
                $teacher = $this->input->post('teacher', TRUE);
                $startTime = $this->input->post('startTime', TRUE);
                $endTime = $this->input->post('endTime', TRUE);
                $roomNumber = $this->input->post('roomNumber', TRUE);
                $tableData = array(
                    'class_id' => $this->db->escape_like_str($class_id),
                    'day_title' => $this->db->escape_like_str($day),
                    'subject' => $this->db->escape_like_str($subject),
                    'subject_teacher' => $this->db->escape_like_str($teacher),
                    'start_time' => $this->db->escape_like_str($startTime),
                    'end_time' => $this->db->escape_like_str($endTime),
                    'room_number' => $this->db->escape_like_str($roomNumber)
                );
                $tableData2 = array(
                    'subject_teacher' => $this->db->escape_like_str($teacher),
                );
                //$this->db->where(array('class_title' => $classTitle,'subject_title' =>$subject));
                if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_id' => $class_id, 'subject_title' => $subject))) {
                    $data['classTile'] = $classTitle;
                    $data['class_id'] = $class_id;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            } else {
                $data['classTile'] = $classTitle;
                $data['class_id'] = $class_id;
                $data['day'] = $this->common->getAllData('config_week_day');
                $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('addClassRoutin', $data);
                $this->load->view('temp/footer');
            }
        }
    }

    //This function gives us class section and class info.
    public function ajaxClassInfo() {
        $class_id = $this->input->get('q');
        $query = $this->common->getWhere('class', 'id', $class_id);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class_title" value="' . $data['id'] . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">'.lang('clasc_3').' <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section" class="form-control">
                                <option value="all">'.lang('clasc_4').'</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>'.lang('clasc_5').'</strong> '.lang('clasc_6').'
                        </div></div></div>';
        }
    }
    //This function check class code data type and leanth
    public function ajaxClassCodeInfo() {
        $classCode = $this->input->get('q');
        if ($classCode <= 99) {
            if ($this->classmodel->classCodeCheck($classCode) == TRUE) {
                echo '<input type="hidden" value="' . $classCode . '" name="class_code">';
            } else {
                echo ''.lang('clasc_7').' " ' . $classCode . ' " '.lang('clasc_8');
            }
        } else {
            echo lang('clasc_9');
        }
    }
    //This function gives a view for serlect class routine
    public function selectAllRoutine() {
        $data['classTile'] = $this->common->getAllData('class');
        $data['day'] = $this->common->getAllData('config_week_day');
        $this->load->view('temp/header');
        $this->load->view('selectAllRoutine', $data);
        $this->load->view('temp/footer');
    }
    //This function gives a class routine after selecting a class
    public function allClassRoutine() {
        if ($this->input->post('submit', TRUE)) {
            $class_id = $this->input->post('class', TRUE);
            $data['class_id'] = $class_id;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('viewRoutine', $data);
            $this->load->view('temp/footer');
        }
    }
    //By this function edit routine previous information 
    public function editRoutine() {
        $routinClassId = $this->input->get('id', TRUE);
        $class_id = $this->input->get('class', TRUE);
        if ($this->input->post('update', TRUE)) {
            $day = $this->input->post('day', TRUE);
            $subject = $this->input->post('subject', TRUE);
            $teacher = $this->input->post('teacher', TRUE);
            $startTime = $this->input->post('startTime', TRUE);
            $endTime = $this->input->post('endTime', TRUE);
            $roomNumber = $this->input->post('roomNumber', TRUE);
            $tableData = array(
                'day_title' => $this->db->escape_like_str($day),
                'subject' => $this->db->escape_like_str($subject),
                'subject_teacher' => $this->db->escape_like_str($teacher),
                'start_time' => $this->db->escape_like_str($startTime),
                'end_time' => $this->db->escape_like_str($endTime),
                'room_number' => $this->db->escape_like_str($roomNumber)
            );
            $this->db->where('id', $routinClassId);
            if ($this->db->update('class_routine', $tableData)) {
                $data['class_id'] = $class_id;
                $data['day'] = $this->common->getAllData('config_week_day');
                $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('viewRoutine', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['class_id'] = $class_id;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
            $data['previousRoutin'] = $this->common->getWhere('class_routine', 'id', $routinClassId);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('editRoutine', $data);
            $this->load->view('temp/footer');
        }
    }
    //By this function we can delet a class routine
    public function deleteRoutine() {
        $routinClassId = $this->input->get('id');
        $class_id = $this->input->get('class_id');
        if ($this->db->delete('class_routine', array('id' => $routinClassId))) {
            $data['class_id'] = $class_id;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $data['message'] = '<div class="alert alert-warning alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('clasc_10').'</strong> '.lang('clasc_11').'
							</div>';
            $this->load->view('temp/header');
            $this->load->view('viewRoutine', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will show student's and parent's own class routine
    public function ownClassRoutin() {
        $data = array();
        $userId = $this->input->get('uisd');
        $query = $this->db->query("SELECT class_id FROM parents_info WHERE user_id='$userId'");
        foreach ($query->result_array() as $row) {
            $class_id = $row['class_id'];
        }
        $data['class_id'] = $class_id;
        $data['day'] = $this->common->getAllData('config_week_day');
        $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
        $data['teacher'] = $this->common->getAllData('teachers_info');
        $this->load->view('temp/header');
        $this->load->view('viewRoutine', $data);
        $this->load->view('temp/footer');
    }
    //This function gives us class section and class info.
    public function ajaxpromotion() {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            $i = 0;
            foreach ($sectionArray as $se) {
                $i++;
            }
            for ($a = 1; $a <= $i; $a++) {
                echo '<div class="form-group">
                        <label class="col-md-3 control-label">'.lang('clasc_3').' ' . $a . '<span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section_' . $a . '" class="form-control" data-validation="required" data-validation-error-msg="">
                                <option value="">'.lang('select').'</option>';
                foreach ($sectionArray as $sec) {
                    echo '<option value="' . $sec . '">' . $sec . '</option>';
                }
                echo '</select></div></div>';
            }
            $b = $a - 1;
            echo '<input type="hidden" name="sectionAmount" value="' . $b . '">';
        } else {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>'.lang('clasc_5').'</strong> '.lang('clasc_6').'
                        </div></div></div>';
        }
    }
    //This function will work for promotion 
    public function promotion() {
        if ($this->input->post('submit', TRUE)) {
            $classId = $this->input->post('class', TRUE);
            if ($this->classmodel->chFiExRe($classId)) {
                $examId = $this->classmodel->chFiExRe($classId);
                $this->classmodel->meritList($examId);
                $nextClass_id = $this->input->post('nextClass', TRUE);
                $query = $this->db->query("SELECT student_id,status,maride_list FROM final_result WHERE exam_id='$examId'");
                $i = 1;
                $sm = 1;
                foreach ($query->result_array() as $row) {
                    $studentId = $row['student_id'];
                    $status = $row['status'];
                    $newRoll = $row['maride_list'];
                    //Here is chacking this student is pass the exam or not.
                    if ($status == 'Pass') {
                        $section = '';
                        $sectionCap = $this->classmodel->sectionCap($classId);
                        $sectionCap2 = $sectionCap * 2;
                        $sectionCap3 = $sectionCap * 3;
                        $sectionCap4 = $sectionCap * 4;
                        $sectionCap5 = $sectionCap * 5;
                        if ($i <= $sectionCap) {
                            $section = $this->input->post('section_1', TRUE);
                        } elseif ($i > $sectionCap && $i <= $sectionCap2) {
                            $section = $this->input->post('section_2', TRUE);
                        } elseif ($i > $sectionCap2 && $i <= $sectionCap3) {
                            $section = $this->input->post('section_3', TRUE);
                        } elseif ($i > $sectionCap3 && $i <= $sectionCap4) {
                            $section = $this->input->post('section_4', TRUE);
                        } elseif ($i > $sectionCap4 && $i <= $sectionCap5) {
                            $section = $this->input->post('section_5', TRUE);
                        }
                        $arrayClassStud = array(
                            'year' => $this->db->escape_like_str($this->input->post('nextYear', TRUE)),
                            'roll_number' => $this->db->escape_like_str($newRoll),
                            'class_id' => $this->db->escape_like_str($nextClass_id),
                            'class_title' => $this->db->escape_like_str($this->common->class_title($nextClass_id)),
                            'section' => $this->db->escape_like_str($section),
                            'attendance_percentices_daily' => $this->db->escape_like_str(0),
                        );
                        $this->db->where('student_id', $studentId);
                        if ($this->db->update('class_students', $arrayClassStud)) {
                            $arrayClassInfo = array(
                                'student_amount' => $this->db->escape_like_str($sm),
                                'attendance_percentices_daily' => $this->db->escape_like_str(0),
                                'attend_percentise_yearly' => $this->db->escape_like_str(0)
                            );
                            $this->db->where('id', $nextClass_id);
                            $this->db->update('class', $arrayClassInfo);

                            $arrayDormiBed = array(
                                'class' => $this->db->escape_like_str($nextClass_id),
                                'roll_number' => $this->db->escape_like_str($newRoll)
                            );
                            $this->db->where('class', $classTitle);
                            $this->db->update('dormitory_bed', $arrayDormiBed);
                            $arrayParentsInfo = array(
                                'class_id' => $this->db->escape_like_str($nextClass_id)
                            );
                            $this->db->where('student_id', $studentId);
                            $this->db->update('parents_info', $arrayParentsInfo);
                            $arrrayStudInfo = array(
                                'year' => $this->db->escape_like_str($this->input->post('nextYear', TRUE)),
                                'roll_number' => $this->db->escape_like_str($newRoll),
                                'class_id' => $this->db->escape_like_str($nextClass_id),
                            );
                            $this->db->where('student_id', $studentId);
                            $this->db->update('student_info', $arrrayStudInfo);
                        }
                        $sm++;
                    }
                    $i++;
                }
                $data['message'] = lang('clasc_12');
                $data['classTile'] = $this->common->getAllData('class');
                $this->load->view('temp/header');
                $this->load->view('promotion', $data);
                $this->load->view('temp/footer');
            } else {
                $data['message'] = lang('clasc_13');
                $data['classTile'] = $this->common->getAllData('class');
                $this->load->view('temp/header');
                $this->load->view('promotion', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['classTile'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('promotion', $data);
            $this->load->view('temp/footer');
        }
    }
}
