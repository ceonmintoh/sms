<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller {

    /**
     * This controller is using for add new users (New Student,Teacher and Parents) in this system 
     *
     * Maps to the following URL
     * 		http://example.com/index.php/users
     * 	- or -  
     * 		http://example.com/index.php/users/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function is using for add new student
    function admission() {
        $class_id = $this->db->escape_like_str($this->input->post('class', TRUE));
        if ($this->input->post('submit', TRUE)) {
            $tables = $this->config->item('tables', 'ion_auth');
            $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $email = strtolower($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
            //Here is uploading the student's photo.
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();
            $phone = $this->input->post('phoneCode', TRUE) . '' . $this->input->post('phone', TRUE);
            //This array information's are sending to "user" table as a core information as a user this system
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
                'phone' => $this->db->escape_like_str($phone),
                'profile_image' => $uploadFileInfo['file_name'],
            );
            $group_ids = array('group_id' => 3);
            $class_id = $this->db->escape_like_str($this->input->post('class', TRUE));
            $class_title = $this->common->class_title($class_id);
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
                $userid = $this->common->usersId();
                //This array information's are sending to "student_info" table.
                $studentsInfo = array(
                    'year' => date('Y'),
                    'user_id' => $this->db->escape_like_str($userid),
                    'student_id' => $this->db->escape_like_str($this->input->post('student_id', TRUE)),
                    'roll_number' => $this->db->escape_like_str($this->input->post('roll_number', TRUE)),
                    'class_id' => $this->db->escape_like_str($class_id),
                    'student_nam' => $this->db->escape_like_str($username),
                    'farther_name' => $this->db->escape_like_str($this->input->post('father_name', TRUE)),
                    'mother_name' => $this->db->escape_like_str($this->input->post('mother_name', TRUE)),
                    'birth_date' => $this->db->escape_like_str($this->input->post('birthdate', TRUE)),
                    'sex' => $this->db->escape_like_str($this->input->post('sex', TRUE)),
                    'present_address' => $this->db->escape_like_str($this->input->post('present_address', TRUE)),
                    'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address', TRUE)),
                    'phone' => $this->db->escape_like_str($phone),
                    'father_occupation' => $this->db->escape_like_str($this->input->post('father_occupation', TRUE)),
                    'father_incom_range' => $this->db->escape_like_str($this->input->post('father_incom_range', TRUE)),
                    'mother_occupation' => $this->db->escape_like_str($this->input->post('mother_occupation', TRUE)),
                    'student_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                    'last_class_certificate' => $this->db->escape_like_str($this->input->post('previous_certificate', TRUE)),
                    't_c' => $this->db->escape_like_str($this->input->post('tc', TRUE)),
                    'academic_transcription' => $this->db->escape_like_str($this->input->post('at', TRUE)),
                    'national_birth_certificate' => $this->db->escape_like_str($this->input->post('nbc', TRUE)),
                    'testimonial' => $this->db->escape_like_str($this->input->post('testmonial', TRUE)),
                    'documents_info' => $this->db->escape_like_str($this->input->post('submit_file_information', TRUE)),
                    'blood' => $this->db->escape_like_str($this->input->post('blood', TRUE)),
                    'starting_year' => $this->db->escape_like_str(date('Y')),
                );
//                $feeTableInfo = array(
//                    'student_id' => $this->db->escape_like_str($this->input->post('student_id', TRUE)),
//                    'year' => date('Y'),
//                    'class_title' => $this->db->escape_like_str($class_title),
//                    'admission' => $this->db->escape_like_str($this->input->post('admission', TRUE)),
//                );
//                $this->db->insert('student_fee_coll', $feeTableInfo);
                //Inserting here "student_info" table's data
                if ($this->db->insert('student_info', $studentsInfo)) {
                    $student_info_id = $this->db->insert_id();
                    $additionalData3 = array(
                        'year' => $this->db->escape_like_str(date('Y')),
                        'user_id' => $this->db->escape_like_str($userid),
                        'roll_number' => $this->db->escape_like_str($this->input->post('roll_number', TRUE)),
                        'student_id' => $this->db->escape_like_str($this->input->post('student_id', TRUE)),
                        'class_title' => $this->db->escape_like_str($class_title),
                        'class_id' => $this->db->escape_like_str($class_id),
                        'section' => $this->db->escape_like_str($this->input->post('section', TRUE)),
                        'student_title' => $this->db->escape_like_str($username),
                    );

                    if ($this->db->insert('class_students', $additionalData3)) {
                        $studentAmount = $this->common->classStudentAmount($class_id);
                        $clas_info = array(
                            'student_amount' => $this->db->escape_like_str($studentAmount)
                        );
                        $this->db->where('id', $class_id);
                        if ($this->db->update('class', $clas_info)) {
                            $student_access = array(
                                'user_id' => $this->db->escape_like_str($userid),
                                'group_id' => $this->db->escape_like_str(3),
                                'das_top_info' => $this->db->escape_like_str(0),
                                'das_grab_chart' => $this->db->escape_like_str(0),
                                'das_class_info' => $this->db->escape_like_str(0),
                                'das_message' => $this->db->escape_like_str(1),
                                'das_employ_attend' => $this->db->escape_like_str(0),
                                'das_notice' => $this->db->escape_like_str(1),
                                'das_calender' => $this->db->escape_like_str(1),
                                'admission' => $this->db->escape_like_str(0),
                                'all_student_info' => $this->db->escape_like_str(0),
                                'stud_edit_delete' => $this->db->escape_like_str(0),
                                'stu_own_info' => $this->db->escape_like_str(1),
                                'teacher_info' => $this->db->escape_like_str(1),
                                'add_teacher' => $this->db->escape_like_str(0),
                                'teacher_details' => $this->db->escape_like_str(0),
                                'teacher_edit_delete' => $this->db->escape_like_str(0),
                                'all_parents_info' => $this->db->escape_like_str(0),
                                'own_parents_info' => $this->db->escape_like_str(1),
                                'make_parents_id' => $this->db->escape_like_str(0),
                                'parents_edit_dlete' => $this->db->escape_like_str(0),
                                'add_new_class' => $this->db->escape_like_str(0),
                                'all_class_info' => $this->db->escape_like_str(0),
                                'class_details' => $this->db->escape_like_str(0),
                                'class_delete' => $this->db->escape_like_str(0),
                                'class_promotion' => $this->db->escape_like_str(0),
                                'assin_optio_sub' => $this->db->escape_like_str(0),
                                'add_class_routine' => $this->db->escape_like_str(0),
                                'own_class_routine' => $this->db->escape_like_str(1),
                                'all_class_routine' => $this->db->escape_like_str(0),
                                'rutin_edit_delete' => $this->db->escape_like_str(0),
                                'attendance_preview' => $this->db->escape_like_str(0),
                                'take_studence_atten' => $this->db->escape_like_str(0),
                                'edit_student_atten' => $this->db->escape_like_str(0),
                                'add_employee' => $this->db->escape_like_str(0),
                                'employee_list' => $this->db->escape_like_str(0),
                                'employ_attendance' => $this->db->escape_like_str(0),
                                'empl_atte_view' => $this->db->escape_like_str(0),
                                'add_subject' => $this->db->escape_like_str(0),
                                'all_subject' => $this->db->escape_like_str(0),
                                'make_suggestion' => $this->db->escape_like_str(0),
                                'all_suggestion' => $this->db->escape_like_str(0),
                                'own_suggestion' => $this->db->escape_like_str(1),
                                'add_exam_gread' => $this->db->escape_like_str(0),
                                'exam_gread' => $this->db->escape_like_str(0),
                                'add_exam_routin' => $this->db->escape_like_str(0),
                                'all_exam_routine' => $this->db->escape_like_str(0),
                                'own_exam_routine' => $this->db->escape_like_str(1),
                                'exam_attend_preview' => $this->db->escape_like_str(0),
                                'approve_result' => $this->db->escape_like_str(0),
                                'view_result' => $this->db->escape_like_str(1),
                                'all_mark_sheet' => $this->db->escape_like_str(0),
                                'own_mark_sheet' => $this->db->escape_like_str(1),
                                'take_exam_attend' => $this->db->escape_like_str(0),
                                'change_exam_attendance' => $this->db->escape_like_str(0),
                                'make_result' => $this->db->escape_like_str(0),
                                'add_category' => $this->db->escape_like_str(0),
                                'all_category' => $this->db->escape_like_str(1),
                                'edit_delete_category' => $this->db->escape_like_str(0),
                                'add_books' => $this->db->escape_like_str(0),
                                'all_books' => $this->db->escape_like_str(1),
                                'edit_delete_books' => $this->db->escape_like_str(0),
                                'add_library_mem' => $this->db->escape_like_str(0),
                                'memb_list' => $this->db->escape_like_str(0),
                                'issu_return' => $this->db->escape_like_str(0),
                                'add_dormitories' => $this->db->escape_like_str(0),
                                'add_set_dormi' => $this->db->escape_like_str(0),
                                'set_member_bed' => $this->db->escape_like_str(0),
                                'dormi_report' => $this->db->escape_like_str(1),
                                'add_transport' => $this->db->escape_like_str(0),
                                'all_transport' => $this->db->escape_like_str(1),
                                'transport_edit_dele' => $this->db->escape_like_str(0),
                                'add_account_title' => $this->db->escape_like_str(0),
                                'edit_dele_acco' => $this->db->escape_like_str(0),
                                'trensection' => $this->db->escape_like_str(0),
                                'fee_collection' => $this->db->escape_like_str(0),
                                'all_slips' => $this->db->escape_like_str(0),
                                'own_slip' => $this->db->escape_like_str(1),
                                'slip_edit_delete' => $this->db->escape_like_str(0),
                                'pay_salary' => $this->db->escape_like_str(0),
                                'creat_notice' => $this->db->escape_like_str(0),
                                'send_message' => $this->db->escape_like_str(0),
                                'vendor' => $this->db->escape_like_str(0),
                                'delet_vendor' => $this->db->escape_like_str(0),
                                'add_inv_cat' => $this->db->escape_like_str(0),
                                'inve_item' => $this->db->escape_like_str(0),
                                'delete_inve_ite' => $this->db->escape_like_str(0),
                                'delete_inv_cat' => $this->db->escape_like_str(0),
                                'inve_issu' => $this->db->escape_like_str(0),
                                'delete_inven_issu' => $this->db->escape_like_str(0),
                                'check_leav_appli' => $this->db->escape_like_str(0),
                                'setting_manage_user' => $this->db->escape_like_str(0),
                                'setting_accounts' => $this->db->escape_like_str(0),
                                'other_setting' => $this->db->escape_like_str(0),
                                'front_setings' => $this->db->escape_like_str(0),
                            );
                            if ($this->db->insert('role_based_access', $student_access)) {
                                $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                                    <strong>Success!</strong> The student admitted successfully.
                                                            </div>';
                                //Load the admission form again for new student. 
                                $data['s_class'] = $this->common->getAllData('class');
                                $this->load->view('temp/header');
                                $this->load->view('add_new_student', $data);
                                $this->load->view('temp/footer');
                            }
                        }
                    }
                }
            }
        } else {
            $query = $this->common->countryPhoneCode();
            $data['countryPhoneCode'] = $query->countryPhonCode;
            $data['s_class'] = $this->common->getAllData('class');
            //display the create user form
            $this->load->view('temp/header');
            $this->load->view('add_new_student', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function add teacher in this function
    function addTeacher() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }
        if ($this->input->post('submit', TRUE)) {
            $this->load->database();
            $tables = $this->config->item('tables', 'ion_auth');
            $edu_1 = '';
            $edu_2 = '';
            $edu_3 = '';
            $edu_4 = '';
            $edu_5 = '';
            $dd_1 = $this->input->post('dd_1', TRUE);
            if (!empty($dd_1)) {
                $this->form_validation->set_rules('scu_1', 'School/College/University 1st fild', 'required');
                $this->form_validation->set_rules('result_1', 'Result  1st fild', 'required');
                $this->form_validation->set_rules('paYear_1', 'Passing year 1st fild', 'required');
                $edu_1 = $this->input->post('dd_1', TRUE) . ',' . $this->input->post('scu_1', TRUE) . ',' . $this->input->post('result_1', TRUE) . ',' . $this->input->post('paYear_1', TRUE);
            }

            $dd_2 = $this->input->post('dd_2', TRUE);
            if (!empty($dd_2)) {
                $this->form_validation->set_rules('scu_2', 'School/College/University 2st fild', 'required');
                $this->form_validation->set_rules('result_2', 'Result  2st fild', 'required');
                $this->form_validation->set_rules('paYear_2', 'Passing year 2st fild', 'required');
                $edu_2 = $this->input->post('dd_2', TRUE) . ',' . $this->input->post('scu_2', TRUE) . ',' . $this->input->post('result_2', TRUE) . ',' . $this->input->post('paYear_2', TRUE);
            }

            $dd_3 = $this->input->post('dd_3', TRUE);
            if (!empty($dd_3)) {
                $this->form_validation->set_rules('scu_3', 'School/College/University 3st fild', 'required');
                $this->form_validation->set_rules('result_3', 'Result  3st fild', 'required');
                $this->form_validation->set_rules('paYear_3', 'Passing year 3st fild', 'required');
                $edu_3 = $this->input->post('dd_3', TRUE) . ',' . $this->input->post('scu_3', TRUE) . ',' . $this->input->post('result_3', TRUE) . ',' . $this->input->post('paYear_3', TRUE);
            }

            $dd_4 = $this->input->post('dd_4', TRUE);
            if (!empty($dd_4)) {
                $this->form_validation->set_rules('scu_4', 'School/College/University 4st fild', 'required');
                $this->form_validation->set_rules('result_4', 'Result  4st fild', 'required');
                $this->form_validation->set_rules('paYear_4', 'Passing year 4st fild', 'required');
                $edu_4 = $this->input->post('dd_4', TRUE) . ',' . $this->input->post('scu_4', TRUE) . ',' . $this->input->post('result_4', TRUE) . ',' . $this->input->post('paYear_4', TRUE);
            }

            $dd_5 = $this->input->post('dd_5', TRUE);
            if (!empty($dd_5)) {
                $this->form_validation->set_rules('scu_5', 'School/College/University 5st fild', 'required');
                $this->form_validation->set_rules('result_5', 'Result  5st fild', 'required');
                $this->form_validation->set_rules('paYear_5', 'Passing year 5st fild', 'required');
                $edu_5 = $this->input->post('dd_5', TRUE) . ',' . $this->input->post('scu_5', TRUE) . ',' . $this->input->post('result_5', TRUE) . ',' . $this->input->post('paYear_5', TRUE);
            }

            $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $email = strtolower($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
            $phone = $this->input->post('phoneCode', TRUE) . '' . $this->input->post('phone', TRUE);

            //here is upload the teacher's photo.
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();

            //This array information's are sending to "user" table as a core information as a user this system.
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
                'phone' => $this->db->escape_like_str($phone),
                'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                'leave_status' => $this->db->escape_like_str('Available'),
                'user_status' => $this->db->escape_like_str('Employee')
            );

            $group_ids = array(
                'group_id' => $this->db->escape_like_str(4)
            );
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
                //This the next user id in users table. If we " -1 " from it we can get current user id 
                $userid = $this->common->usersId();
                //This array information's are sending to "teachers_info" table.
                $teachersInfo = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'fullname' => $this->db->escape_like_str($username),
                    'farther_name' => $this->db->escape_like_str($this->input->post('father_name', TRUE)),
                    'mother_name' => $this->db->escape_like_str($this->input->post('mother_name', TRUE)),
                    'birth_date' => $this->db->escape_like_str($this->input->post('birthdate', TRUE)),
                    'sex' => $this->db->escape_like_str($this->input->post('sex', TRUE)),
                    'present_address' => $this->db->escape_like_str($this->input->post('present_address', TRUE)),
                    'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address', TRUE)),
                    'subject' => $this->db->escape_like_str($this->input->post('facultiesSubject', TRUE)),
                    'position' => $this->db->escape_like_str($this->input->post('position', TRUE)),
                    'index_no' => $this->db->escape_like_str($this->input->post('indexNo', TRUE)),
                    'working_hour' => $this->db->escape_like_str($this->input->post('workingHoure', TRUE)),
                    'educational_qualification_1' => $this->db->escape_like_str($edu_1),
                    'educational_qualification_2' => $this->db->escape_like_str($edu_2),
                    'educational_qualification_3' => $this->db->escape_like_str($edu_3),
                    'educational_qualification_4' => $this->db->escape_like_str($edu_4),
                    'educational_qualification_5' => $this->db->escape_like_str($edu_5),
                    'teachers_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                    'cv' => $this->db->escape_like_str($this->input->post('cv', TRUE)),
                    'educational_certificat' => $this->db->escape_like_str($this->input->post('educational_certificat', TRUE)),
                    'exprieance_certificatte' => $this->db->escape_like_str($this->input->post('exc', TRUE)),
                    'files_info' => $this->db->escape_like_str($this->input->post('submited_info', TRUE)),
                    'phone' => $this->db->escape_like_str($phone),
                );

                $teacher_access = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'group_id' => $this->db->escape_like_str(4),
                    'das_top_info' => $this->db->escape_like_str(1),
                    'das_grab_chart' => $this->db->escape_like_str(0),
                    'das_class_info' => $this->db->escape_like_str(1),
                    'das_message' => $this->db->escape_like_str(1),
                    'das_employ_attend' => $this->db->escape_like_str(0),
                    'das_notice' => $this->db->escape_like_str(1),
                    'das_calender' => $this->db->escape_like_str(1),
                    'admission' => $this->db->escape_like_str(0),
                    'all_student_info' => $this->db->escape_like_str(1),
                    'stud_edit_delete' => $this->db->escape_like_str(0),
                    'stu_own_info' => $this->db->escape_like_str(0),
                    'teacher_info' => $this->db->escape_like_str(0),
                    'add_teacher' => $this->db->escape_like_str(0),
                    'teacher_details' => $this->db->escape_like_str(0),
                    'teacher_edit_delete' => $this->db->escape_like_str(0),
                    'all_parents_info' => $this->db->escape_like_str(1),
                    'own_parents_info' => $this->db->escape_like_str(0),
                    'make_parents_id' => $this->db->escape_like_str(0),
                    'parents_edit_dlete' => $this->db->escape_like_str(0),
                    'add_new_class' => $this->db->escape_like_str(0),
                    'all_class_info' => $this->db->escape_like_str(1),
                    'class_details' => $this->db->escape_like_str(1),
                    'class_delete' => $this->db->escape_like_str(0),
                    'class_promotion' => $this->db->escape_like_str(0),
                    'assin_optio_sub' => $this->db->escape_like_str(0),
                    'add_class_routine' => $this->db->escape_like_str(0),
                    'own_class_routine' => $this->db->escape_like_str(0),
                    'all_class_routine' => $this->db->escape_like_str(1),
                    'rutin_edit_delete' => $this->db->escape_like_str(0),
                    'attendance_preview' => $this->db->escape_like_str(1),
                    'take_studence_atten' => $this->db->escape_like_str(1),
                    'edit_student_atten' => $this->db->escape_like_str(0),
                    'add_employee' => $this->db->escape_like_str(0),
                    'employee_list' => $this->db->escape_like_str(0),
                    'employ_attendance' => $this->db->escape_like_str(0),
                    'empl_atte_view' => $this->db->escape_like_str(0),
                    'add_subject' => $this->db->escape_like_str(0),
                    'all_subject' => $this->db->escape_like_str(1),
                    'make_suggestion' => $this->db->escape_like_str(1),
                    'all_suggestion' => $this->db->escape_like_str(1),
                    'own_suggestion' => $this->db->escape_like_str(0),
                    'add_exam_gread' => $this->db->escape_like_str(0),
                    'exam_gread' => $this->db->escape_like_str(1),
                    'add_exam_routin' => $this->db->escape_like_str(0),
                    'all_exam_routine' => $this->db->escape_like_str(1),
                    'own_exam_routine' => $this->db->escape_like_str(0),
                    'exam_attend_preview' => $this->db->escape_like_str(1),
                    'approve_result' => $this->db->escape_like_str(0),
                    'view_result' => $this->db->escape_like_str(1),
                    'all_mark_sheet' => $this->db->escape_like_str(1),
                    'own_mark_sheet' => $this->db->escape_like_str(0),
                    'take_exam_attend' => $this->db->escape_like_str(1),
                    'change_exam_attendance' => $this->db->escape_like_str(0),
                    'make_result' => $this->db->escape_like_str(1),
                    'add_category' => $this->db->escape_like_str(0),
                    'all_category' => $this->db->escape_like_str(1),
                    'edit_delete_category' => $this->db->escape_like_str(0),
                    'add_books' => $this->db->escape_like_str(0),
                    'all_books' => $this->db->escape_like_str(1),
                    'edit_delete_books' => $this->db->escape_like_str(0),
                    'add_library_mem' => $this->db->escape_like_str(0),
                    'memb_list' => $this->db->escape_like_str(0),
                    'issu_return' => $this->db->escape_like_str(0),
                    'add_dormitories' => $this->db->escape_like_str(0),
                    'add_set_dormi' => $this->db->escape_like_str(0),
                    'set_member_bed' => $this->db->escape_like_str(0),
                    'dormi_report' => $this->db->escape_like_str(1),
                    'add_transport' => $this->db->escape_like_str(0),
                    'all_transport' => $this->db->escape_like_str(1),
                    'transport_edit_dele' => $this->db->escape_like_str(0),
                    'add_account_title' => $this->db->escape_like_str(0),
                    'edit_dele_acco' => $this->db->escape_like_str(0),
                    'trensection' => $this->db->escape_like_str(0),
                    'fee_collection' => $this->db->escape_like_str(1),
                    'all_slips' => $this->db->escape_like_str(1),
                    'own_slip' => $this->db->escape_like_str(0),
                    'slip_edit_delete' => $this->db->escape_like_str(0),
                    'pay_salary' => $this->db->escape_like_str(0),
                    'creat_notice' => $this->db->escape_like_str(0),
                    'send_message' => $this->db->escape_like_str(1),
                    'vendor' => $this->db->escape_like_str(0),
                    'delet_vendor' => $this->db->escape_like_str(0),
                    'add_inv_cat' => $this->db->escape_like_str(0),
                    'inve_item' => $this->db->escape_like_str(0),
                    'delete_inve_ite' => $this->db->escape_like_str(0),
                    'delete_inv_cat' => $this->db->escape_like_str(0),
                    'inve_issu' => $this->db->escape_like_str(0),
                    'delete_inven_issu' => $this->db->escape_like_str(0),
                    'check_leav_appli' => $this->db->escape_like_str(0),
                    'setting_manage_user' => $this->db->escape_like_str(0),
                    'setting_accounts' => $this->db->escape_like_str(0),
                    'other_setting' => $this->db->escape_like_str(0),
                    'front_setings' => $this->db->escape_like_str(0),
                );

                $this->db->insert('teachers_info', $teachersInfo);
                if ($this->db->insert('role_based_access', $teacher_access)) {
                    //Load the Teachers Information's page after Add New Teacher.
                    redirect('teachers/allTeachers', 'refresh');
                }
            } else {
                $query = $this->common->countryPhoneCode();
                $data['countryPhoneCode'] = $query->countryPhonCode;
                //display the create user form
                $this->load->view('temp/header');
                $this->load->view('add_new_teacher', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $query = $this->common->countryPhoneCode();
            $data['countryPhoneCode'] = $query->countryPhonCode;
            //display the create user form
            $this->load->view('temp/header');
            $this->load->view('add_new_teacher', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function is returning student id and roll number by class title , runing year
    public function student_info() {
        $Class_id = $this->input->get('q', TRUE);
        $query = $this->common->getWhere('class', 'id', $Class_id);
        foreach ($query as $row) {
            $data = $row;
        }
        $Class_code = $data['classCode'];

        //making here Class Section fild.
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);

            echo '<div class="form-group">
                        <label class="col-md-3 control-label">session <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section" class="form-control">
                                <option value="">Select one</option>';
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

        //making here StudentID Unick number.
        if (strlen($Class_code) == 1) {
            $classId = '0' . $Class_code;
        } elseif (strlen($Class_code) == 2) {
            $classId = $Class_code;
        }
        $roll = $this->common->rollNumber($Class_id);
        if (strlen($roll) == 1) {
            $rollNumber = '00' . $roll;
        } elseif (strlen($roll) == 2) {
            $rollNumber = '0' . $roll;
        } elseif (strlen($roll) == 3) {
            $rollNumber = $roll;
        }
        $finalStudentId = date("Y") . $classId . $rollNumber;

        echo '<div class="form-group">
                    <label class="col-md-3 control-label">Student\'s ID <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" name="student_id" class="form-control" value="' . $finalStudentId . '" readonly>
                    </div>
                </div>';


        //making here Class Roll Number fild.
        echo '<div class="form-group">
                    <label class="col-md-3 control-label">Roll Number <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" name="roll_number" class="form-control" value="' . $rollNumber . '" readonly>
                    </div>
                </div>';
    }

    //This function is using for add new parents
    function addParents() {
        if ($this->input->post('submit', TRUE)) {
            $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $email = strtolower($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
            //Here is uploading the student's photo.
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();
            $this->upload->display_errors('<p>', '</p>');

            $phone = $this->input->post('phoneCode', TRUE) . '' . $this->input->post('phone', TRUE);
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
                'phone' => $this->db->escape_like_str($phone),
                'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
            );
            $group_ids = array(
                'group_id' => $this->db->escape_like_str(5)
            );
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
                //This the next user id in users table. If we " -1 " from it we can get current user id 
                $userid = $this->common->usersId();
                $additionalData1 = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'student_id' => $this->db->escape_like_str($this->input->post('studentId', TRUE)),
                    'class_id' => $this->db->escape_like_str($this->input->post('class_id', TRUE)),
                    'parents_name' => $this->db->escape_like_str($username),
                    'relation' => $this->db->escape_like_str($this->input->post('guardianRelation', TRUE)),
                    'email' => $this->db->escape_like_str($this->input->post('email', TRUE)),
                    'phone' => $this->db->escape_like_str($phone)
                );
                $this->db->insert('parents_info', $additionalData1);
                $parents_access = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'group_id' => $this->db->escape_like_str(5),
                    'das_top_info' => $this->db->escape_like_str(0),
                    'das_grab_chart' => $this->db->escape_like_str(0),
                    'das_class_info' => $this->db->escape_like_str(0),
                    'das_message' => $this->db->escape_like_str(1),
                    'das_employ_attend' => $this->db->escape_like_str(0),
                    'das_notice' => $this->db->escape_like_str(1),
                    'das_calender' => $this->db->escape_like_str(1),
                    'admission' => $this->db->escape_like_str(0),
                    'all_student_info' => $this->db->escape_like_str(0),
                    'stud_edit_delete' => $this->db->escape_like_str(0),
                    'stu_own_info' => $this->db->escape_like_str(1),
                    'teacher_info' => $this->db->escape_like_str(1),
                    'add_teacher' => $this->db->escape_like_str(0),
                    'teacher_details' => $this->db->escape_like_str(0),
                    'teacher_edit_delete' => $this->db->escape_like_str(0),
                    'all_parents_info' => $this->db->escape_like_str(0),
                    'own_parents_info' => $this->db->escape_like_str(1),
                    'make_parents_id' => $this->db->escape_like_str(0),
                    'parents_edit_dlete' => $this->db->escape_like_str(0),
                    'add_new_class' => $this->db->escape_like_str(0),
                    'all_class_info' => $this->db->escape_like_str(0),
                    'class_details' => $this->db->escape_like_str(0),
                    'class_delete' => $this->db->escape_like_str(0),
                    'class_promotion' => $this->db->escape_like_str(0),
                    'assin_optio_sub' => $this->db->escape_like_str(0),
                    'add_class_routine' => $this->db->escape_like_str(0),
                    'own_class_routine' => $this->db->escape_like_str(1),
                    'all_class_routine' => $this->db->escape_like_str(0),
                    'rutin_edit_delete' => $this->db->escape_like_str(0),
                    'attendance_preview' => $this->db->escape_like_str(0),
                    'take_studence_atten' => $this->db->escape_like_str(0),
                    'edit_student_atten' => $this->db->escape_like_str(0),
                    'add_employee' => $this->db->escape_like_str(0),
                    'employee_list' => $this->db->escape_like_str(0),
                    'employ_attendance' => $this->db->escape_like_str(0),
                    'empl_atte_view' => $this->db->escape_like_str(0),
                    'add_subject' => $this->db->escape_like_str(0),
                    'all_subject' => $this->db->escape_like_str(0),
                    'make_suggestion' => $this->db->escape_like_str(0),
                    'all_suggestion' => $this->db->escape_like_str(0),
                    'own_suggestion' => $this->db->escape_like_str(1),
                    'add_exam_gread' => $this->db->escape_like_str(0),
                    'exam_gread' => $this->db->escape_like_str(0),
                    'add_exam_routin' => $this->db->escape_like_str(0),
                    'all_exam_routine' => $this->db->escape_like_str(0),
                    'own_exam_routine' => $this->db->escape_like_str(1),
                    'exam_attend_preview' => $this->db->escape_like_str(0),
                    'approve_result' => $this->db->escape_like_str(0),
                    'view_result' => $this->db->escape_like_str(1),
                    'all_mark_sheet' => $this->db->escape_like_str(0),
                    'own_mark_sheet' => $this->db->escape_like_str(1),
                    'take_exam_attend' => $this->db->escape_like_str(0),
                    'change_exam_attendance' => $this->db->escape_like_str(0),
                    'make_result' => $this->db->escape_like_str(0),
                    'add_category' => $this->db->escape_like_str(0),
                    'all_category' => $this->db->escape_like_str(1),
                    'edit_delete_category' => $this->db->escape_like_str(0),
                    'add_books' => $this->db->escape_like_str(0),
                    'all_books' => $this->db->escape_like_str(1),
                    'edit_delete_books' => $this->db->escape_like_str(0),
                    'add_library_mem' => $this->db->escape_like_str(0),
                    'memb_list' => $this->db->escape_like_str(0),
                    'issu_return' => $this->db->escape_like_str(0),
                    'add_dormitories' => $this->db->escape_like_str(0),
                    'add_set_dormi' => $this->db->escape_like_str(0),
                    'set_member_bed' => $this->db->escape_like_str(0),
                    'dormi_report' => $this->db->escape_like_str(1),
                    'add_transport' => $this->db->escape_like_str(0),
                    'all_transport' => $this->db->escape_like_str(1),
                    'transport_edit_dele' => $this->db->escape_like_str(0),
                    'add_account_title' => $this->db->escape_like_str(0),
                    'edit_dele_acco' => $this->db->escape_like_str(0),
                    'trensection' => $this->db->escape_like_str(0),
                    'fee_collection' => $this->db->escape_like_str(0),
                    'all_slips' => $this->db->escape_like_str(0),
                    'own_slip' => $this->db->escape_like_str(1),
                    'slip_edit_delete' => $this->db->escape_like_str(0),
                    'pay_salary' => $this->db->escape_like_str(0),
                    'creat_notice' => $this->db->escape_like_str(0),
                    'send_message' => $this->db->escape_like_str(0),
                    'vendor' => $this->db->escape_like_str(0),
                    'delet_vendor' => $this->db->escape_like_str(0),
                    'add_inv_cat' => $this->db->escape_like_str(0),
                    'inve_item' => $this->db->escape_like_str(0),
                    'delete_inve_ite' => $this->db->escape_like_str(0),
                    'delete_inv_cat' => $this->db->escape_like_str(0),
                    'inve_issu' => $this->db->escape_like_str(0),
                    'delete_inven_issu' => $this->db->escape_like_str(0),
                    'check_leav_appli' => $this->db->escape_like_str(0),
                    'setting_manage_user' => $this->db->escape_like_str(0),
                    'setting_accounts' => $this->db->escape_like_str(0),
                    'other_setting' => $this->db->escape_like_str(0),
                    'front_setings' => $this->db->escape_like_str(0),
                );
                if ($this->db->insert('role_based_access', $parents_access)) {
                    //check to see if we are creating the user
                    //redirect them back to the admin page
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

                    //redirect("parents/parentsInformation", 'refresh');

                    $data['s_class'] = $this->common->getAllData('class');
                    $data['success'] = '<div class="col-md-12"><div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                        <strong>Success!</strong> The parents profile made successfully.
                                                </div></div>';
                    $this->load->view('temp/header');
                    $this->load->view('parents', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            $query = $this->common->countryPhoneCode();
            $data['countryPhoneCode'] = $query->countryPhonCode;
            $data['s_class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('makeProfile', $data);
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
                            <strong>Info:</strong> This student ID <strong>' . $studentId . '</strong> is not matching in our student\'s list.
                    </div></div></div>';
        } else {
            echo '<div class="col-md-9 col-md-offset-1 stuInfoIdBox">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Student\'s Name <span class="requiredStar">  </span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="studentName" value="' . $query->student_nam . '" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Class <span class="requiredStar">  </span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="class_title" value="' . $this->common->class_title($query->class_id) . '" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="class_id" value="' . $query->class_id . '">
                    </div>
                    <div class="col-md-2">
                        <img src="assets/uploads/' . $query->student_photo . '" class="img-responsive" alt=""><br>
                    </div>
                </div>';
        }
    }

    //Whene give the student id from the frontend input file.
    //Then this function return student information
//    public function ajaxStudentInfo() {
//        $classTitle = $this->input->get('q', TRUE);
//        $query = $this->common->getWhere('student_info', 'class', $classTitle);
//        foreach ($query as $row) {
//            $data[] = $row;
//        }
//        if (!empty($data)) {
//            echo '<div class="form-group">
//                        <label class="col-md-3 control-label"></label>
//                        <div class="col-md-6">
//                            <select name="studentID" class="form-control">
//                                <option value="all">Select Student ID</option>';
//            foreach ($data as $sec) {
//                echo '<option value="' . $sec['student_id'] . '">' . $sec['student_nam'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ID - <span>' . $sec['student_id'] . '</span></option>';
//            }
//            echo '</select></div>
//                    </div>';
//        } else {
//            echo '<div class="form-group">
//                    <label class="col-md-3 control-label"></label>
//                        <div class="col-md-6">
//                        <div class="alert alert-danger">
//                            <strong>Info:</strong> This Class has no student.
//                    </div></div></div>';
//        }
//    }
    //This function will add new users in this system as Accountent,Libreament &Drivers etc
    public function addNewUsers() {
        if ($this->input->post('submit', TRUE)) {
            $this->load->database();
            $tables = $this->config->item('tables', 'ion_auth');
            $edu_1 = '';
            $edu_2 = '';
            $edu_3 = '';
            $edu_4 = '';
            $edu_5 = '';
            $dd_1 = $this->input->post('dd_1', TRUE);
            if (!empty($dd_1)) {
                $this->form_validation->set_rules('scu_1', 'School/College/University 1st fild', 'required');
                $this->form_validation->set_rules('result_1', 'Result  1st fild', 'required');
                $this->form_validation->set_rules('paYear_1', 'Passing year 1st fild', 'required');
                $edu_1 = $this->input->post('dd_1', TRUE) . ',' . $this->input->post('scu_1', TRUE) . ',' . $this->input->post('result_1', TRUE) . ',' . $this->input->post('paYear_1', TRUE);
            }

            $dd_2 = $this->input->post('dd_2', TRUE);
            if (!empty($dd_2)) {
                $this->form_validation->set_rules('scu_2', 'School/College/University 2st fild', 'required');
                $this->form_validation->set_rules('result_2', 'Result  2st fild', 'required');
                $this->form_validation->set_rules('paYear_2', 'Passing year 2st fild', 'required');
                $edu_2 = $this->input->post('dd_2', TRUE) . ',' . $this->input->post('scu_2', TRUE) . ',' . $this->input->post('result_2', TRUE) . ',' . $this->input->post('paYear_2', TRUE);
            }

            $dd_3 = $this->input->post('dd_3', TRUE);
            if (!empty($dd_3)) {
                $this->form_validation->set_rules('scu_3', 'School/College/University 3st fild', 'required');
                $this->form_validation->set_rules('result_3', 'Result  3st fild', 'required');
                $this->form_validation->set_rules('paYear_3', 'Passing year 3st fild', 'required');
                $edu_3 = $this->input->post('dd_3', TRUE) . ',' . $this->input->post('scu_3', TRUE) . ',' . $this->input->post('result_3', TRUE) . ',' . $this->input->post('paYear_3', TRUE);
            }

            $dd_4 = $this->input->post('dd_4', TRUE);
            if (!empty($dd_4)) {
                $this->form_validation->set_rules('scu_4', 'School/College/University 4st fild', 'required');
                $this->form_validation->set_rules('result_4', 'Result  4st fild', 'required');
                $this->form_validation->set_rules('paYear_4', 'Passing year 4st fild', 'required');
                $edu_4 = $this->input->post('dd_4', TRUE) . ',' . $this->input->post('scu_4', TRUE) . ',' . $this->input->post('result_4', TRUE) . ',' . $this->input->post('paYear_4', TRUE);
            }

            $dd_5 = $this->input->post('dd_5', TRUE);
            if (!empty($dd_5)) {
                $this->form_validation->set_rules('scu_5', 'School/College/University 5st fild', 'required');
                $this->form_validation->set_rules('result_5', 'Result  5st fild', 'required');
                $this->form_validation->set_rules('paYear_5', 'Passing year 5st fild', 'required');
                $edu_5 = $this->input->post('dd_5', TRUE) . ',' . $this->input->post('scu_5', TRUE) . ',' . $this->input->post('result_5', TRUE) . ',' . $this->input->post('paYear_5', TRUE);
            }

            $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $email = strtolower($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
            $phone = $this->input->post('phoneCode', TRUE) . '' . $this->input->post('phone', TRUE);

            //here is upload the teacher's photo.
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();

            //This array information's are sending to "user" table as a core information as a user this system.
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
                'phone' => $this->db->escape_like_str($phone),
                'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                'leave_status' => $this->db->escape_like_str('Available'),
                'user_status' => $this->db->escape_like_str('Employee')
            );

            $group_ids = array(
                'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE))
            );
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
                //This the next user id in users table. If we " -1 " from it we can get current user id 
                $userid = $this->common->usersId();
                //This array information's are sending to "teachers_info" table.
                $additional_data2 = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'full_name' => $this->db->escape_like_str($username),
                    'farther_name' => $this->db->escape_like_str($this->input->post('father_name', TRUE)),
                    'mother_name' => $this->db->escape_like_str($this->input->post('mother_name', TRUE)),
                    'birth_date' => $this->db->escape_like_str($this->input->post('birthdate', TRUE)),
                    'sex' => $this->db->escape_like_str($this->input->post('sex', TRUE)),
                    'present_address' => $this->db->escape_like_str($this->input->post('present_address', TRUE)),
                    'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address', TRUE)),
                    'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE)),
                    'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE)),
                    'working_hour' => $this->db->escape_like_str($this->input->post('workingHoure', TRUE)),
                    'educational_qualification_1' => $this->db->escape_like_str($edu_1),
                    'educational_qualification_2' => $this->db->escape_like_str($edu_2),
                    'educational_qualification_3' => $this->db->escape_like_str($edu_3),
                    'educational_qualification_4' => $this->db->escape_like_str($edu_4),
                    'educational_qualification_5' => $this->db->escape_like_str($edu_5),
                    'users_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                    'cv' => $this->db->escape_like_str($this->input->post('cv', TRUE)),
                    'educational_certificat' => $this->db->escape_like_str($this->input->post('educational_certificat', TRUE)),
                    'exprieance_certificatte' => $this->db->escape_like_str($this->input->post('exc', TRUE)),
                    'files_info' => $this->db->escape_like_str($this->input->post('submited_info', TRUE)),
                    'phone' => $this->db->escape_like_str($phone)
                );
                $user_access = array(
                    'user_id' => $this->db->escape_like_str($userid),
                    'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE)),
                    'das_top_info' => $this->db->escape_like_str(0),
                    'das_grab_chart' => $this->db->escape_like_str(0),
                    'das_class_info' => $this->db->escape_like_str(0),
                    'das_message' => $this->db->escape_like_str(0),
                    'das_employ_attend' => $this->db->escape_like_str(0),
                    'das_notice' => $this->db->escape_like_str(0),
                    'das_calender' => $this->db->escape_like_str(0),
                    'admission' => $this->db->escape_like_str(0),
                    'all_student_info' => $this->db->escape_like_str(0),
                    'stud_edit_delete' => $this->db->escape_like_str(0),
                    'stu_own_info' => $this->db->escape_like_str(0),
                    'teacher_info' => $this->db->escape_like_str(0),
                    'add_teacher' => $this->db->escape_like_str(0),
                    'teacher_details' => $this->db->escape_like_str(0),
                    'teacher_edit_delete' => $this->db->escape_like_str(0),
                    'all_parents_info' => $this->db->escape_like_str(0),
                    'own_parents_info' => $this->db->escape_like_str(0),
                    'make_parents_id' => $this->db->escape_like_str(0),
                    'parents_edit_dlete' => $this->db->escape_like_str(0),
                    'add_new_class' => $this->db->escape_like_str(0),
                    'all_class_info' => $this->db->escape_like_str(0),
                    'class_details' => $this->db->escape_like_str(0),
                    'class_delete' => $this->db->escape_like_str(0),
                    'class_promotion' => $this->db->escape_like_str(0),
                    'assin_optio_sub' => $this->db->escape_like_str(0),
                    'add_class_routine' => $this->db->escape_like_str(0),
                    'own_class_routine' => $this->db->escape_like_str(0),
                    'all_class_routine' => $this->db->escape_like_str(0),
                    'rutin_edit_delete' => $this->db->escape_like_str(0),
                    'attendance_preview' => $this->db->escape_like_str(0),
                    'take_studence_atten' => $this->db->escape_like_str(0),
                    'edit_student_atten' => $this->db->escape_like_str(0),
                    'add_employee' => $this->db->escape_like_str(0),
                    'employee_list' => $this->db->escape_like_str(0),
                    'employ_attendance' => $this->db->escape_like_str(0),
                    'empl_atte_view' => $this->db->escape_like_str(0),
                    'add_subject' => $this->db->escape_like_str(0),
                    'all_subject' => $this->db->escape_like_str(0),
                    'make_suggestion' => $this->db->escape_like_str(0),
                    'all_suggestion' => $this->db->escape_like_str(0),
                    'own_suggestion' => $this->db->escape_like_str(0),
                    'add_exam_gread' => $this->db->escape_like_str(0),
                    'exam_gread' => $this->db->escape_like_str(0),
                    'add_exam_routin' => $this->db->escape_like_str(0),
                    'all_exam_routine' => $this->db->escape_like_str(0),
                    'own_exam_routine' => $this->db->escape_like_str(0),
                    'exam_attend_preview' => $this->db->escape_like_str(0),
                    'approve_result' => $this->db->escape_like_str(0),
                    'view_result' => $this->db->escape_like_str(0),
                    'all_mark_sheet' => $this->db->escape_like_str(0),
                    'own_mark_sheet' => $this->db->escape_like_str(0),
                    'take_exam_attend' => $this->db->escape_like_str(0),
                    'change_exam_attendance' => $this->db->escape_like_str(0),
                    'make_result' => $this->db->escape_like_str(0),
                    'add_category' => $this->db->escape_like_str(0),
                    'all_category' => $this->db->escape_like_str(0),
                    'edit_delete_category' => $this->db->escape_like_str(0),
                    'add_books' => $this->db->escape_like_str(0),
                    'all_books' => $this->db->escape_like_str(0),
                    'edit_delete_books' => $this->db->escape_like_str(0),
                    'add_library_mem' => $this->db->escape_like_str(0),
                    'memb_list' => $this->db->escape_like_str(0),
                    'issu_return' => $this->db->escape_like_str(0),
                    'add_dormitories' => $this->db->escape_like_str(0),
                    'add_set_dormi' => $this->db->escape_like_str(0),
                    'set_member_bed' => $this->db->escape_like_str(0),
                    'dormi_report' => $this->db->escape_like_str(0),
                    'add_transport' => $this->db->escape_like_str(0),
                    'all_transport' => $this->db->escape_like_str(0),
                    'transport_edit_dele' => $this->db->escape_like_str(0),
                    'add_account_title' => $this->db->escape_like_str(0),
                    'edit_dele_acco' => $this->db->escape_like_str(0),
                    'trensection' => $this->db->escape_like_str(0),
                    'fee_collection' => $this->db->escape_like_str(0),
                    'all_slips' => $this->db->escape_like_str(0),
                    'own_slip' => $this->db->escape_like_str(0),
                    'slip_edit_delete' => $this->db->escape_like_str(0),
                    'pay_salary' => $this->db->escape_like_str(0),
                    'creat_notice' => $this->db->escape_like_str(0),
                    'send_message' => $this->db->escape_like_str(0),
                    'vendor' => $this->db->escape_like_str(0),
                    'delet_vendor' => $this->db->escape_like_str(0),
                    'add_inv_cat' => $this->db->escape_like_str(0),
                    'inve_item' => $this->db->escape_like_str(0),
                    'delete_inve_ite' => $this->db->escape_like_str(0),
                    'delete_inv_cat' => $this->db->escape_like_str(0),
                    'inve_issu' => $this->db->escape_like_str(0),
                    'delete_inven_issu' => $this->db->escape_like_str(0),
                    'check_leav_appli' => $this->db->escape_like_str(0),
                    'setting_manage_user' => $this->db->escape_like_str(0),
                    'setting_accounts' => $this->db->escape_like_str(0),
                    'other_setting' => $this->db->escape_like_str(0),
                    'front_setings' => $this->db->escape_like_str(0),
                );
                $this->db->insert('userinfo', $additional_data2);
                if ($this->db->insert('role_based_access', $user_access)) {
                    //Load the Teachers Information's page after Add New Teacher.
                    redirect('users/allUserInafo', 'refresh');
                }
            } else {
                $query = $this->common->countryPhoneCode();
                $data['countryPhoneCode'] = $query->countryPhonCode;
                //display the create user form
                $this->load->view('temp/header');
                $this->load->view('addNewUser', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $query = $this->common->countryPhoneCode();
            $data['countryPhoneCode'] = $query->countryPhonCode;
            //display the create user form
            $this->load->view('temp/header');
            $this->load->view('addNewUser', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will return user group id & title for adding new user.
    public function newUserGrope() {
        $groupId = $this->input->get('q', TRUE);
        if ($groupId == '6') {
            echo '<input type="hidden" name="group" value="6">';
            echo '<input type="hidden" name="groupTitle" value="Accountant">';
        } elseif ($groupId == '7') {
            echo '<input type="hidden" name="group" value="7">';
            echo '<input type="hidden" name="groupTitle" value="Library Man">';
        } elseif ($groupId == '8') {
            echo '<input type="hidden" name="group" value="8">';
            echo '<input type="hidden" name="groupTitle" value="Car Driver">';
        } elseif ($groupId == '9') {
            echo '<input type="hidden" name="group" value="9">';
            echo '<input type="hidden" name="groupTitle" value="4th Class Employee">';
        }
    }

    //This function returan all user's informations
    public function allUserInafo() {
        $data = array();
        $data['usersInfo'] = $this->common->getAllData('userinfo');
        $this->load->view('temp/header');
        $this->load->view('allUserInfo', $data);
        $this->load->view('temp/footer');
    }

    //This function returan all user's informations detalis
    public function allUserInafoDetails() {
        $id = $this->input->get('id');
        $userId = $this->input->get('uid');
        $data['userinfo'] = $this->common->getWhere('userinfo', 'id', $id);
        $data['user'] = $this->common->getWhere('users', 'id', $userId);
        $this->load->view('temp/header');
        $this->load->view('allUserInafoDetails', $data);
        $this->load->view('temp/footer');
    }

    //This function is using for editing a teacher informations
    //And admin an select group  
    function edit_user() {
        $userId = $this->input->get('uid');
        $userInfoId = $this->input->get('id');
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
            $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');

            $phone = $this->input->post('phone', TRUE);
//            $additional_data = array(
//                'username' => $this->db->escape_like_str($username),
//                'email' => $this->db->escape_like_str($this->input->post('email', TRUE)),
//                'first_name' => $this->db->escape_like_str($this->input->post('first_name', TRUE)),
//                'last_name' => $this->db->escape_like_str($this->input->post('last_name', TRUE)),
//                'phone' => $this->db->escape_like_str($phone),
//            );
//
//            $this->db->where('id', $userId);
//            $this->db->update('users', $additional_data);

            $additional_data2 = array(
                'full_name' => $this->db->escape_like_str($username),
                'farther_name' => $this->db->escape_like_str($this->input->post('father_name', TRUE)),
                'mother_name' => $this->db->escape_like_str($this->input->post('mother_name', TRUE)),
                'birth_date' => $this->db->escape_like_str($this->input->post('birthdate', TRUE)),
                'sex' => $this->db->escape_like_str($this->input->post('sex', TRUE)),
                'present_address' => $this->db->escape_like_str($this->input->post('present_address', TRUE)),
                'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address', TRUE)),
                'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE)),
                'group_id' => $this->db->escape_like_str($this->input->post('group', TRUE)),
                'working_hour' => $this->db->escape_like_str($this->input->post('workingHoure', TRUE)),
                'educational_qualification_1' => $this->db->escape_like_str($edu_1),
                'educational_qualification_2' => $this->db->escape_like_str($edu_2),
                'educational_qualification_3' => $this->db->escape_like_str($edu_3),
                'educational_qualification_4' => $this->db->escape_like_str($edu_4),
                'educational_qualification_5' => $this->db->escape_like_str($edu_5),
//                'users_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                'cv' => $this->db->escape_like_str($this->input->post('cv', TRUE)),
                'educational_certificat' => $this->db->escape_like_str($this->input->post('educational_certificat', TRUE)),
                'exprieance_certificatte' => $this->db->escape_like_str($this->input->post('exc', TRUE)),
                'files_info' => $this->db->escape_like_str($this->input->post('submited_info', TRUE)),
                'phone' => $this->db->escape_like_str($phone)
            );
            $this->db->where('id', $userInfoId);
            $this->db->update('userinfo', $additional_data2);
            redirect('users/allUserInafo', 'refresh');
        } else {
            //get all data about this teacher from the "user" table
            $data['userInfo'] = $this->common->getWhere('users', 'id', $userId);
            $data['teacherInfo'] = $this->common->getWhere('userinfo', 'id', $userInfoId);

            //get all groupe information and current group information to view file by "$data" array.
            $data['groups'] = $this->ion_auth->groups()->result_array();
            $data['currentGroups'] = $this->ion_auth->get_users_groups($userId)->result();

            $this->load->view('temp/header');
            $this->load->view('editUserInfo', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function is useing for delete a user.
    public function teacherDelete() {
        $userId = $this->input->get('uid');
        $userInfoId = $this->input->get('id');

        $this->db->delete('userinfo', array('id' => $userInfoId));
        $this->db->delete('users', array('id' => $userId));

        redirect('users/allUserInafo', 'refresh');
    }

    function test() {
        $a = $this->common->usersId();
        echo '<pre>';
        echo $a;
        echo '</pre>';
    }

}
