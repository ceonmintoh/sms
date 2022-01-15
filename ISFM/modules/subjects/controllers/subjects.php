<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Subjects extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('subject_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    //THis function add new subject in a class
    public function addSubject() {
        if ($this->input->post('submit', TRUE)) {
            $class_id = $this->input->post('class_id', TRUE);
            $subject_1_a = $this->input->post('subject_title_1', TRUE);
            $edition = $this->input->post('edition', TRUE);
            $writer_name = $this->input->post('writer_name', TRUE);
            $tableData = array(
                'class_id' => $this->db->escape_like_str($class_id),
                'year' => $this->db->escape_like_str(date('Y')),
                'subject_title' => $this->db->escape_like_str($subject_1_a),
                'edition' => $this->db->escape_like_str($edition),
                'writer_name' => $this->db->escape_like_str($writer_name),
                'optional' => $this->db->escape_like_str($this->input->post('optionalSubject', TRUE))
            );
            if ($this->db->insert('class_subject', $tableData)) {
                $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                            <strong>'.lang('success').'</strong> '.lang('sub_1').' "' . $subject_1_a . '" '.lang('sub_2').'
                                    </div>';
                $data['class'] = $this->common->getAllData('class');
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('addSubject', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['class'] = $this->common->getAllData('class');
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('addSubject', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function load all subject with class
    public function allSubject() {
        $data['SubjectInfo'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('subjectInformation', $data);
        $this->load->view('temp/footer');
    }
    //This function view subject deatils by class title
    public function classSubjectDetails() {
        $class_id = $this->input->get('c_id');
        $data['SubjectInfo'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
        $this->load->view('temp/header');
        $this->load->view('classSubjectDetails', $data);
        $this->load->view('temp/footer');
    }
    //This function will set students optional subject
    public function set_optional() {
        if ($this->input->post('submit', TRUE)) {
            $stu_id = $this->input->post('student_id', TRUE);
            $upload_data = array(
                'optional_sub' => $this->db->escape_like_str($this->input->post('op_sub', TRUE))
            );
            $this->db->where('student_id', $stu_id);
            if ($this->db->update('class_students', $upload_data)) {
                $data['class'] = $this->common->getAllData('class');
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('success').'</strong> '.lang('sub_3').'
							</div>';
                $this->load->view('temp/header');
                $this->load->view('set_optional', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('set_optional', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will give the student information from studentID
    public function studentInfoById() {
        $studentId = $this->input->get('q', TRUE);
        $query = $this->common->stuInfoId($studentId);
        if (empty($query)) {
            echo '<div class="form-group">
                    <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>'.lang('sub_4').'</strong> '.lang('sub_5').' <strong>' . $studentId . '</strong> '.lang('sub_6').'
                    </div></div></div>';
        } else {
            $class_id = $query->class_id;
            $class_title = $this->common->class_title($class_id);
            echo '<div class="row"><div class="col-md-offset-2 col-md-7 stuInfoIdBox">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-md-4 control-label">'.lang('sub_7').' <span class="requiredStar">  </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="studentName" value="' . $query->student_nam . '" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">'.lang('sub_8').' <span class="requiredStar">  </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="class_title" value="' . $class_title . '" readonly>
                            </div>
                        </div>
                        <div id="ajax_result2">
                            <div  class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn purple btn-block" onclick="optional_subject(this.value)" value="' . $class_id . '">'.lang('sub_10').'</button><br>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="class_id" value="' . $class_id . '">
                    <div class="col-md-2">
                        <img src="assets/uploads/' . $query->student_photo . '" class="img-responsive" alt=""><br>
                    </div>
                </div></div>';
        }
    }
    //This function will return class optional subject
    public function optional_subject() {
        $class_id = $this->input->get('c_id', TRUE);
        $subject = $this->subject_model->class_op_sub($class_id);
        echo '<div class="form-group">
                    <label class="col-md-4 control-label">'.lang('sub_9').' <span class="requiredStar"> * </span></label>
                    <div class="col-md-8">
                        <select class="form-control" name="op_sub" data-validation="required">
                            <option value="">'.lang('select').'</option>';
        foreach ($subject as $row) {
            echo '<option value="' . $row['subject_title'] . '">' . $row['subject_title'] . '</option>';
        }
        echo '</select>
                    </div>
                </div>';
    }
}