<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/home
     * 	- or -  
     * 		http://example.com/index.php/home/index
     */
    function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('homeModel');
        $this->load->helper('file');
        $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function will show the users dashboard
    public function index() {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['massage'] = $this->common->getWhere('massage', 'receiver_id', $id);
        $data['totalStudent'] = $this->common->totalStudent();
        $data['totalTeacher'] = $this->common->totalTeacher();
        $data['totalParents'] = $this->common->totalParents();
        $data['totalAttendStudent'] = $this->common->totalAttendStudent();
        $data['teacherAttendance'] = $this->common->teacherAttendance();
        $data['presentEmploy'] = $this->homeModel->presentEmploy();
        $data['absentEmploy'] = $this->homeModel->absentEmploy();
        $data['leaveEmploy'] = $this->homeModel->leaveEmploy();
        $data['event'] = $this->homeModel->all_event($id);
            $data['notice'] = $this->common->getAllData('notice_board');
            $data['classAttendance'] = $this->homeModel->atten_chart();
            $data['classInfo'] = $this->common->classInfo();
            if ($this->ion_auth->is_student()) {
            //Whice notice is created for student these notice can see both students and parents.
            $query = $this->common->getWhere('student_info', 'user_id', $id);
            foreach ($query as $row) {
                $class_id = $row['class_id'];
            }
            $data['class_id'] = $class_id;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
            $data['teacher'] = $this->common->getAllData('teachers_info');
        }
        $this->load->view('temp/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('temp/footer');
    }

//    public function index() {
//        $user = $this->ion_auth->user()->row();
//        $id = $user->id;
//        $data['massage'] = $this->common->getWhere('massage', 'receiver_id', $id);
//        $data['totalStudent'] = $this->common->totalStudent();
//        $data['totalTeacher'] = $this->common->totalTeacher();
//        $data['totalParents'] = $this->common->totalParents();
//        $data['totalAttendStudent'] = $this->common->totalAttendStudent();
//        $data['teacherAttendance'] = $this->common->teacherAttendance();
//        $data['presentEmploy'] = $this->homeModel->presentEmploy();
//        $data['absentEmploy'] = $this->homeModel->absentEmploy();
//        $data['leaveEmploy'] = $this->homeModel->leaveEmploy();
//        $data['event'] = $this->homeModel->all_event($id);
//        if ($this->ion_auth->is_admin()) {
//            $data['notice'] = $this->common->getAllData('notice_board');
//            $data['classAttendance'] = $this->homeModel->atten_chart();
//            $data['classInfo'] = $this->common->classInfo();
//        } elseif ($this->ion_auth->is_teacher()) {
//            //If this user have teacher's previlize, he can view only that notice whice notice is created for only teacher.
//            $data['notice'] = $this->common->getTeacherNotice();
//            $data['classInfo'] = $this->common->classInfo();
//        } elseif ($this->ion_auth->is_student()) {
//            //Whice notice is created for student these notice can see both students and parents.
//            $data['notice'] = $this->common->getStudentNotice();
//            $query = $this->common->getWhere('student_info', 'user_id', $id);
//            foreach ($query as $row) {
//                $class_id = $row['class_id'];
//            }
//            $data['class_id'] = $class_id;
//            $data['day'] = $this->common->getAllData('config_week_day');
//            $data['subject'] = $this->common->getWhere('class_subject', 'class_id', $class_id);
//            $data['teacher'] = $this->common->getAllData('teachers_info');
//        } elseif ($this->ion_auth->is_parents()) {
//            //Whice notice is created for student these notice can see both students and parents.
//            $data['notice'] = $this->common->getStudentNotice();
//        }
//        $this->load->view('temp/header', $data);
//        $this->load->view('dashboard', $data);
//        $this->load->view('temp/footer');
//    }
//    
    public function profileView() {
        $user = $this->ion_auth->user()->row();
        $data['userprofile'] = $this->common->getWhere('users', 'id', $user->id);
        if ($this->input->post('submit', TRUE)) {
            $data_up = array(
                'first_name' => $this->db->escape_like_str($this->input->post('firstName', TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('lastName', TRUE)),
                'username' => $this->db->escape_like_str($this->input->post('userName', TRUE)),
                'phone' => $this->db->escape_like_str($this->input->post('mobileNumber', TRUE)),
                'email' => $this->db->escape_like_str($this->input->post('email', TRUE)),
            );
            $this->db->where('id', $user->id);
            if ($this->db->update('users', $data_up)) {
                redirect('home/profileView', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('profileView', $data);
            $this->load->view('temp/footer');
        }
    }

    public function profileImage() {
        $user = $this->ion_auth->user()->row();
        if ($this->ion_auth->is_admin()) {
            if (empty($user->profile_image)) {
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
                $data_update = array(
                    'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                );
                $this->db->where('id', $user->id);
                if ($this->db->update('users', $data_update)) {
                    redirect('home/profileView', 'refresh');
                }
            } else {
                $path = 'assets/uploads/' . $user->profile_image;
                //$userprofile = $this->common->getWhere('users', 'id',$user->id);
                if (unlink($path)) {
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
                    $data_update = array(
                        'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                    );

                    $this->db->where('id', $user->id);
                    if ($this->db->update('users', $data_update)) {
                        redirect('home/profileView', 'refresh');
                    }
                } else {
                    echo lang('desc_1');
                }
            }
        } elseif ($this->ion_auth->is_teacher()) {
            if (empty($user->profile_image)) {
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
                $data_update = array(
                    'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                );
                $this->db->where('id', $user->id);
                if ($this->db->update('users', $data_update)) {
                    redirect('home/profileView', 'refresh');
                }
            } else {
                $path = 'assets/uploads/' . $user->profile_image;
                //$userprofile = $this->common->getWhere('users', 'id',$user->id);
                if (unlink($path)) {
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
                    $data_update = array(
                        'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                    );
                    $this->db->where('id', $user->id);
                    if ($this->db->update('users', $data_update)) {
                        $data_update_2 = array(
                            'teachers_photo' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                        );
                        $this->db->where('user_id', $user->id);
                        if ($this->db->update('teachers_info', $data_update_2)) {
                            redirect('home/profileView', 'refresh');
                        }
                    }
                } else {
                    echo lang('desc_1');
                }
            }
        } elseif ($this->ion_auth->is_student()) {
            if (empty($user->profile_image)) {
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
                $data_update = array(
                    'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                );
                $this->db->where('id', $user->id);
                if ($this->db->update('users', $data_update)) {
                    redirect('home/profileView', 'refresh');
                }
            } else {
                $path = 'assets/uploads/' . $user->profile_image;
                //$userprofile = $this->common->getWhere('users', 'id',$user->id);
                if (unlink($path)) {
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
                    $data_update = array(
                        'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                    );
                    $this->db->where('id', $user->id);
                    if ($this->db->update('users', $data_update)) {
                        $data_update_3 = array(
                            'student_photo' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                        );
                        $this->db->where('user_id', $user->id);
                        if ($this->db->update('student_info', $data_update_3)) {
                            redirect('home/profileView', 'refresh');
                        }
                    }
                } else {
                    echo lang('desc_1');
                }
            }
        } elseif ($this->ion_auth->is_parents()) {
            if (empty($user->profile_image)) {
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
                $data_update = array(
                    'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                );
                $this->db->where('id', $user->id);
                if ($this->db->update('users', $data_update)) {
                    redirect('home/profileView', 'refresh');
                }
            } else {
                $path = 'assets/uploads/' . $user->profile_image;
                //$userprofile = $this->common->getWhere('users', 'id',$user->id);
                if (unlink($path)) {
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
                    $data_update = array(
                        'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                    );
                    $this->db->where('id', $user->id);
                    if ($this->db->update('users', $data_update)) {
                        redirect('home/profileView', 'refresh');
                    }
                } else {
                    echo lang('desc_1');
                }
            }
        }
    }

    //Thid function will show the calender with event
    public function calender() {
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        if ($this->input->post('submit', TRUE)) {
            $title = $this->input->post('title', TRUE);
            $start_date = $this->input->post('start_date', TRUE);
            $end_date = $this->input->post('end_date', TRUE);
            $color = $this->input->post('color', TRUE);
            $url = $this->input->post('url', TRUE);
            $event_info = array(
                'title' => $this->db->escape_like_str($title),
                'start_date' => $this->db->escape_like_str($start_date),
                'end_date' => $this->db->escape_like_str($end_date),
                'color' => $this->db->escape_like_str($color),
                'url' => $this->db->escape_like_str($url),
                'user_id' => $userId
            );
            if ($this->db->insert('calender_events', $event_info)) {
                redirect('home/calender', 'refresh');
            }
        } else {
            $data['event'] = $this->homeModel->all_event($userId);
            $this->load->view('temp/header');
            $this->load->view('calender', $data);
            $this->load->view('temp/footer');
        }
    }

    public function addEvent() {
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        if ($this->input->post('submit', TRUE)) {
            $title = $this->input->post('title', TRUE);
            $start_date = $this->input->post('start_date', TRUE);
            $end_date = $this->input->post('end_date', TRUE);
            $color = $this->input->post('color', TRUE);
            $url = $this->input->post('url', TRUE);
            $user = $this->ion_auth->user()->row();
            $userId = $user->id;
            $event_info = array(
                'title' => $this->db->escape_like_str($title),
                'start_date' => $this->db->escape_like_str($start_date),
                'end_date' => $this->db->escape_like_str($end_date),
                'color' => $this->db->escape_like_str($color),
                'url' => $this->db->escape_like_str($url),
                'user_id' => $this->db->escape_like_str($userId)
            );
            if ($this->db->insert('calender_events', $event_info)) {
                redirect('home/addEvent', 'refresh');
            }
        } else {
            $data['event'] = $this->homeModel->all_event($userId);
            $this->load->view('temp/header');
            $this->load->view('events', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will edit events information
    public function edit_event() {
        if ($this->input->post('submit', TRUE)) {
            $eve_id = $this->input->post('eve_id', TRUE);
            $title = $this->input->post('title', TRUE);
            $start_date = $this->input->post('start_date', TRUE);
            $end_date = $this->input->post('end_date', TRUE);
            $color = $this->input->post('color', TRUE);
            $url = $this->input->post('url', TRUE);
            $user = $this->ion_auth->user()->row();
            $userId = $user->id;
            $event_info = array(
                'title' => $this->db->escape_like_str($title),
                'start_date' => $this->db->escape_like_str($start_date),
                'end_date' => $this->db->escape_like_str($end_date),
                'color' => $this->db->escape_like_str($color),
                'url' => $this->db->escape_like_str($url),
                'user_id' => $this->db->escape_like_str($userId)
            );
            $this->db->where('id', $eve_id);
            if ($this->db->update('calender_events', $event_info)) {
                redirect('home/addEvent', 'refresh');
            }
        } else {
            $event_id = $this->input->get('eve_id');
            $data['event'] = $this->homeModel->single_event($event_id);
            $this->load->view('temp/header');
            $this->load->view('edit_event', $data);
            $this->load->view('temp/footer');
        }
    }

    public function iceTime() {
        $time = $this->common->iceTime();
    }
    //This function will delete clender event
    public function delete_event() {
        $id = $this->input->get('eve_id');
        
        if ($this->db->delete('calender_events', array('id' => $id))) {
            $data['event'] = $this->homeModel->all_event($userId);
            $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Success!</strong> The event was deleted successfully.
							</div>';
            $this->load->view('temp/header');
            $this->load->view('events', $data);
            $this->load->view('temp/footer');
        }
    }
}
