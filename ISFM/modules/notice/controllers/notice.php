<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Notice extends CI_Controller {
    /**
     * This controller is using for declare notice in this system
     * 
     * Maps to the following URL
     * 		http://example.com/index.php/Notice
     * 	- or -  
     * 		http://example.com/index.php/notice/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->model('noticemodel');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    //This function is using for view all notice.
    //At first get all the data from databae and 
    public function allNotice() {
        //Show the notice by chacking the user lable
        if ($this->ion_auth->is_admin()) {
            //If this user have the admin previlize only he can view all notice.
            $data['notice'] = $this->common->getAllData('notice_board');
            $this->load->view('temp/header');
            $this->load->view('notisBoard', $data);
            $this->load->view('temp/footer');
        } elseif ($this->ion_auth->is_teacher()) {
            //If this user have teacher's previlize, he can view only that notice whice notice is created for only teacher.
            $data['notice'] = $this->noticemodel->getTeacherNotice();
            $this->load->view('temp/header');
            $this->load->view('notisBoard', $data);
            $this->load->view('temp/footer');
        } elseif ($this->ion_auth->is_student() || $this->ion_auth->is_parents()) {
            //Whice notice is created for student these notice can see both students and parents.
            $data['notice'] = $this->noticemodel->getStudentNotice();
            $this->load->view('temp/header');
            $this->load->view('notisBoard', $data);
            $this->load->view('temp/footer');
        } else {
            //all employe and accountent in this school can view this notice.
            $data['notice'] = $this->noticemodel->getEANotice();
            $this->load->view('temp/header');
            $this->load->view('notisBoard', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function is useing for make a new notice.
    public function addNotice() {
        if ($this->input->post('submit', TRUE)) {
            $user = $this->ion_auth->user()->row();
            $sender = $user->username;
            $date = date('d/m/Y');
            //grape the data from Add new notice view form.
            $subject = $this->input->post('noticeSubject');
            $notice = $this->input->post('noticeDetails');
            $receiver = $this->input->post('receiver');
            $noticeArray = array(
                'date' => $this->db->escape_like_str($date),
                'sender' => $this->db->escape_like_str($sender),
                'subject' => $this->db->escape_like_str($subject),
                'notice' => $this->db->escape_like_str($notice),
                'receiver' => $this->db->escape_like_str($receiver)
            );
            //now sening the array information to database.
            if ($this->db->insert('notice_board', $noticeArray)) {
                redirect('notice/allNotice', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('addNotice');
            $this->load->view('temp/footer');
        }
    }
    //This function lode full details a notice in noticebord
    public function noticeDetails() {
        $id = $this->input->get('dfgdfg_hid');
        $data['details'] = $this->common->getWhere('notice_board', 'id', $id);
        $this->load->view('temp/header');
        $this->load->view('noticeDetails', $data);
        $this->load->view('temp/footer');
    }
    //This function can edit class notice
    public function deleteNotice() {
        $id = $this->input->get('id');
        if ($this->db->delete('notice_board', array('id' => $id))) {
            redirect('notice/allNotice', 'refresh');
        }
    }
}
