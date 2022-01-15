<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Teachers extends MX_Controller {

    /**
     * This controller is using for control teachers work
     * 
     * Maps to the following URL
     * 		http://example.com/index.php/teachers
     * 	- or -  
     * 		http://example.com/index.php/teachers/<method_name>
     */
    function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->model('teachermodel');
    }

    //This function gives all teacher's short informattion in a table view
    public function allTeachers() {
        $data['teacher'] = $this->teachermodel->allTeachers();
        $this->load->view('temp/header');
        $this->load->view('teachers', $data);
        $this->load->view('temp/footer');
    }

    //This function gives all details about any teacher
    public function teacherDetails() {
        $id = $this->input->get('id');
        $userId = $this->input->get('uid');
        $data['teacher'] = $this->common->getWhere('teachers_info', 'id', $id);
        $data['user'] = $this->common->getWhere('users', 'id', $userId);
        $this->load->view('temp/header');
        $this->load->view('teacherDetails', $data);
        $this->load->view('temp/footer');
    }
    //This function is using for editing a teacher informations
    //And admin an select group  
    function edit_teacher() {
        $userId = $this->input->get('uid');
        $teacherId = $this->input->get('id');
        if ($this->input->post('submit', TRUE)) {
            $edu_1 = '';
            $edu_2 = '';
            $edu_3 = '';
            $edu_4 = '';
            $edu_5 = '';
            if ($this->input->post('dd_1', TRUE)) {
                $edu_1 = $this->input->post('dd_1') . ',' . $this->input->post('scu_1', TRUE) . ',' . $this->input->post('result_1', TRUE) . ',' . $this->input->post('paYear_1', TRUE);
            }
            if ($this->input->post('dd_2', TRUE)) {
                $edu_2 = $this->input->post('dd_2') . ',' . $this->input->post('scu_2', TRUE) . ',' . $this->input->post('result_2', TRUE) . ',' . $this->input->post('paYear_2', TRUE);
            }
            if ($this->input->post('dd_3', TRUE)) {
                $edu_3 = $this->input->post('dd_3') . ',' . $this->input->post('scu_3', TRUE) . ',' . $this->input->post('result_3', TRUE) . ',' . $this->input->post('paYear_3', TRUE);
            }
            if ($this->input->post('dd_4', TRUE)) {
                $edu_4 = $this->input->post('dd_4') . ',' . $this->input->post('scu_4', TRUE) . ',' . $this->input->post('result_4', TRUE) . ',' . $this->input->post('paYear_4', TRUE);
            }
            if ($this->input->post('dd_5', TRUE)) {
                $edu_5 = $this->input->post('dd_5') . ',' . $this->input->post('scu_5', TRUE) . ',' . $this->input->post('result_5', TRUE) . ',' . $this->input->post('paYear_5');
            }
            $username = strtolower($this->input->post('first_name', TRUE)) . ' ' . strtolower($this->input->post('last_name', TRUE));
            $additional_data = array(
                'username' => $this->db->escape_like_str($username),
                'email' => $this->db->escape_like_str($this->input->post('email', TRUE)),
                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
                'phone' => $this->db->escape_like_str($this->input->post('phone', TRUE)),
            );
            $this->db->where('id', $userId);
            $this->db->update('users', $additional_data);
            $teachersInfo = array(
                'fullname' => $this->db->escape_like_str($username),
                'farther_name' => $this->db->escape_like_str($this->input->post('father_name', TRUE)),
                'mother_name' => $this->db->escape_like_str($this->input->post('mother_name', TRUE)),
                'birth_date' => $this->db->escape_like_str($this->input->post('birthdate', TRUE)),
                'sex' => $this->db->escape_like_str($this->input->post('sex', TRUE)),
                'present_address' => $this->db->escape_like_str($this->input->post('present_address', TRUE)),
                'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address', TRUE)),
                'position' => $this->db->escape_like_str($this->input->post('position', TRUE)),
                'working_hour' => $this->db->escape_like_str($this->input->post('workingHoure', TRUE)),
                'educational_qualification_1' => $this->db->escape_like_str($edu_1),
                'educational_qualification_2' => $this->db->escape_like_str($edu_2),
                'educational_qualification_3' => $this->db->escape_like_str($edu_3),
                'educational_qualification_4' => $this->db->escape_like_str($edu_4),
                'educational_qualification_5' => $this->db->escape_like_str($edu_5),
                'cv' => $this->db->escape_like_str($this->input->post('cv', TRUE)),
                'educational_certificat' => $this->db->escape_like_str($this->input->post('educational_certificat', TRUE)),
                'exprieance_certificatte' => $this->db->escape_like_str($this->input->post('exc', TRUE)),
                'files_info' => $this->db->escape_like_str($this->input->post('submited_info', TRUE))
            );
            $this->db->where('id', $teacherId);
            $this->db->update('teachers_info', $teachersInfo);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('teachers', $data);
            $this->load->view('temp/footer');
        } else {
            //get all data about this teacher from the "user" table
            $data['userInfo'] = $this->common->getWhere('users', 'id', $userId);
            $data['teacherInfo'] = $this->common->getWhere('teachers_info', 'id', $teacherId);
            //get all groupe information and current group information to view file by "$data" array.
            $data['groups'] = $this->ion_auth->groups()->result_array();
            $data['currentGroups'] = $this->ion_auth->get_users_groups($userId)->result();
            $this->load->view('temp/header');
            $this->load->view('editTeacher', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function is use for delete a teacher.
    public function teacherDelete() {
        $teacherId = $this->input->get('id');
        $userId = $this->input->get('uid');
        $this->db->delete('teachers_info', array('id' => $teacherId));
        $this->db->delete('users', array('id' => $userId));
        redirect('teachers/allTeachers', 'refresh');
    }
}
