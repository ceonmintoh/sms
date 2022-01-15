<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class leave extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('leavemodel');
    }
    //This function will use for make leave application
    function applicationForLeave() {
        if ($this->input->post('submit', TRUE)) {
            $year = date('Y');
            $insertData = array(
                'year' => $this->db->escape_like_str($year),
                'sender_id' => $this->db->escape_like_str($this->input->post('sendrId', TRUE)),
                'sender_title' => $this->db->escape_like_str($this->input->post('sendrTitle', TRUE)),
                'subject' => $this->db->escape_like_str('Prayer for leave of absence.'),
                'jobtype' => $this->db->escape_like_str($this->input->post('jobType', TRUE)),
                'leave_start' => $this->db->escape_like_str(strtotime($this->input->post('startDate', TRUE))),
                'leave_end' => $this->db->escape_like_str(strtotime($this->input->post('endDate', TRUE))),
                'application_date' => $this->db->escape_like_str(strtotime($this->input->post('date', TRUE))),
                'reason' => $this->db->escape_like_str($this->input->post('reason', TRUE)),
                'status' => $this->db->escape_like_str('Pending'),
                'cheack_statuse' => 'Not Checked'
            );
            if ($this->db->insert('leave_application', $insertData)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>' . lang('appc_1') . '</strong> ' . lang('appc_2') . '
							</div>';
                $data['application'] = $this->leavemodel->allLeaveApplication();
                $this->load->view('temp/header');
                $this->load->view('allAppliction', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['schoolTitle'] = $this->db->query('SELECT school_name,address FROM configuration')->row();
            $this->load->view('temp/header');
            $this->load->view('applicationForLeave', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will return
    public function allAppliction() {
        $data['application'] = $this->leavemodel->allLeaveApplication();
        $this->load->view('temp/header');
        $this->load->view('allAppliction', $data);
        $this->load->view('temp/footer');
    }
    //This function can show the application for check
    public function checkApplication() {
        $applicationId = $this->input->get('appId');
        $upData = array(
            'cheack_statuse' => 'Checked'
        );
        $this->db->where('id', $applicationId);
        if ($this->db->update('leave_application', $upData)) {
            $data['application'] = $this->leavemodel->checkApplication($applicationId);
            $data['schoolTitle'] = $this->db->query('SELECT school_name,address FROM configuration')->row();
            $this->load->view('temp/header');
            $this->load->view('checkApplication', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will can accept or denye the application.
    public function ap_or_di() {
        $appId = $this->input->post('appId', TRUE);
        if ($this->input->post('Accept', TRUE)) {
            $data = array(
                'cheack_by' => $this->input->post('chackerTitle', TRUE),
                'status' => 'Approved',
                'cheack_statuse' => 'Checked',
            );
            $applicantId = $this->input->post('appcantId', TRUE);
            $leaveInfo = array(
                'leave_status' => $this->db->escape_like_str('Leave'),
                'leave_start' => $this->db->escape_like_str($this->input->post('startDate', TRUE)),
                'leave_end' => $this->db->escape_like_str($this->input->post('endDate', TRUE))
            );
            $this->db->where('id', $applicantId);
            $this->db->update('users', $leaveInfo);
            $this->db->where('id', $appId);
            if ($this->db->update('leave_application', $data)) {
                $data['application'] = $this->leavemodel->allLeaveApplication();
                $this->load->view('temp/header');
                $this->load->view('allAppliction', $data);
                $this->load->view('temp/footer');
            }
        } elseif ($this->input->post('deny', TRUE)) {
            $data = array(
                'cheack_by' => $this->input->post('chackerTitle', TRUE),
                'status' => 'Not Approved',
                'cheack_statuse' => 'Checked',
            );
            $this->db->where('id', $appId);
            if ($this->db->update('leave_application', $data)) {
                $data['application'] = $this->leavemodel->allLeaveApplication();
                $this->load->view('temp/header');
                $this->load->view('allAppliction', $data);
                $this->load->view('temp/footer');
            }
        } elseif ($this->input->post('end', TRUE)) {
            $data = array(
                'status' => 'Compleated',
            );
            $applicantId = $this->input->post('appcantId', TRUE);
            $leaveInfo = array(
                'leave_status' => $this->db->escape_like_str('Available')
            );
            $this->db->where('id', $applicantId);
            $this->db->update('users', $leaveInfo);
            $this->db->where('id', $appId);
            if ($this->db->update('leave_application', $data)) {
                $data['application'] = $this->leavemodel->allLeaveApplication();
                $this->load->view('temp/header');
                $this->load->view('allAppliction', $data);
                $this->load->view('temp/footer');
            }
        }
    }
    
    //This function will compleate the tast as teacher Available
    public function endLeave() {
        
    }

}
