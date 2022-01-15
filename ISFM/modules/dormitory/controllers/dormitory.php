<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dormitory extends MX_Controller {
    /**
     * This controller is using for managing full dormitory in this school
     *
     * Maps to the following URL
     * 		http://example.com/index.php/dormitory
     * 	- or -  
     * 		http://example.com/index.php/dormitory/<method_name>
     */
    function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    
    //This function is using to add new dormitory in this school
    public function addDormitory() {
        if ($this->input->post('submit', TRUE)) {
            $dormitoriesName = $this->input->post('dormitoryName', TRUE);
            $dormitoriesRoom = $this->input->post('roomAmount', TRUE);
            $dormitoryInfo = array(
                'dormitory_name' => $this->db->escape_like_str($dormitoriesName),
                'dormitory_for' => $this->db->escape_like_str($this->input->post('dormitoryFor', TRUE)),
                'room_amount' => $this->db->escape_like_str($dormitoriesRoom),
            );
            if ($this->db->insert('dormitory', $dormitoryInfo)) {
                $nuid = $this->db->insert_id();
                $userid = $nuid - 1;
                for ($i = 1; $i <= $dormitoriesRoom; $i++) {
                    $dormitoryInfo_2 = array(
                        'dormitory_id' => $nuid,
                        'dormitory_name' => $this->db->escape_like_str($dormitoriesName),
                        'room' => $this->db->escape_like_str('Room No: ' . $i)
                    );
                    $this->db->insert('dormitory_room', $dormitoryInfo_2);
                }
                redirect('dormitory/dormitoryReport', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('addDormitory');
            $this->load->view('temp/footer');
        }
    }

    //This function is using to add new dormitory in this school
    public function addBed() {
        if ($this->input->post('submit', TRUE)) {
            $dormitoriesId = $this->input->post('dormitories', TRUE);
            $query = $this->common->getWhere('dormitory', 'id', $dormitoriesId);
            $room = $this->input->post('room', TRUE);
            foreach ($query as $row) {
                $dormitory_name = $row['dormitory_name'];
            }
            $bed_number = $this->input->post('Seat', TRUE);
            for ($i = 1; $i <= $bed_number; $i++) {
                $tableData = array(
                    'dormitory_id' => $this->db->escape_like_str($dormitoriesId),
                    'dormitory_name' => $this->db->escape_like_str($dormitory_name),
                    'room_number' => $this->db->escape_like_str($room),
                    'bed_number' => $this->db->escape_like_str('Seat No: ' . $i),
                );
                $this->db->insert('dormitory_bed', $tableData);
            }
            $tableData_2 = array(
                'bed_amount' => $bed_number,
                'free_seat' => $bed_number
            );
            if ($this->db->update('dormitory_room', $tableData_2, array('dormitory_id' => $dormitoriesId, 'room' => $room))) {
                redirect('dormitory/dormitoryReport', 'refresh');
            }
        } else {
            $data['dormitory'] = $this->common->getAllData('dormitory');
            $this->load->view('temp/header');
            $this->load->view('addBed', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function give the room amount in a dormitories and send the value by ajax
    public function ajaxDormitoryRoom() {
        $id = $this->input->get('q');
        $query = $this->common->getWhere('dormitory', 'id', $id);
        foreach ($query as $row) {
            $roomAmount = $row['room_amount'];
        }
        echo '<option value="">' . lang('dorc_1') . '</option>';
        for ($i = 1; $i <= $roomAmount; $i++) {
            echo '<option value="Room No: ' . $i . '">Room No: ' . $i . ' </option>';
        }
    }

    //This function give the full dormitory report
    public function dormitoryReport() {
        $data['dormitory'] = $this->common->getAllData('dormitory');
        $data['dormitoryRoom'] = $this->common->getAllData('dormitory_room');
        $data['dormitory_bed'] = $this->common->getAllData('dormitory_bed');
        $this->load->view('temp/header');
        $this->load->view('dormitoryReport', $data);
        $this->load->view('temp/footer');
    }

    //This function will select men  for the seat
    public function selectMember() {
        $data['dormitories'] = $this->common->getAllData('dormitory');
        $this->load->view('temp/header');
        $this->load->view('selectMember', $data);
        $this->load->view('temp/footer');
    }

    //This function return seat in a room
    public function ajaxSeatAmount() {
        $dormitories = $this->input->get('g');
        $room = $this->input->get('q');
        $query = $this->common->getWhere22('dormitory_bed', 'dormitory_name', $dormitories, 'room_number', $room);
        if (!empty($query)) {
            $i = 1;
            foreach ($query as $row) {
                if (!empty($row['student_id'])) {
                    echo '<div class="alert alert-success">
                                                <strong>' . $row['bed_number'] . '</strong>' . $row['student_name'] . '
                                                <a href="index.php/dormitory/removeSeatMember?id=' . $row['id'] . '" onClick="javascript:return dconfirm();" class="btn dorButton red"> ' . lang('dorc_2') . '</a>
                                        </div>';
                } else {
                    echo '<div class="alert alert-success">
                                                <strong>' . $row['bed_number'] . '</strong> &nbsp;&nbsp; Blank seat
                                                <a href="index.php/dormitory/seatBooking?id=' . $row['id'] . '" class="btn dorButton green-meadow"> ' . lang('dorc_3') . ' </a>
                                        </div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger">
                            <strong>' . lang('dorc_4') . ' </strong> ' . lang('dorc_5') . '
                    </div>';
        }
    }

    //This function can book a seat
    public function seatBooking() {
        $id = $this->input->get('id');
        if ($this->input->post('submit', TRUE)) {
            $tdata = array(
                'student_id' => $this->db->escape_like_str($this->input->post('studentId', TRUE)),
                'student_name' => $this->db->escape_like_str($this->input->post('sudentName', TRUE)),
                'class' => $this->db->escape_like_str($this->input->post('class_id', TRUE)),
                'roll_number' => $this->db->escape_like_str($this->input->post('roll', TRUE))
            );
            $this->db->where('id', $id);
            if ($this->db->update('dormitory_bed', $tdata)) {
                redirect('dormitory/dormitoryReport', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('seatBook');
            $this->load->view('temp/footer');
        }
    }

    //This function give the student informations
    public function ajaxStudentInfo() {
        $studentId = $this->input->get('q');
        $query = $this->common->getWhere('student_info', 'student_id', $studentId);
        if (!empty($query)) {
            foreach ($query as $row) {
                echo '<div class="form-group">
                            <label class="control-label col-md-3">' . lang('dorc_6') . '</label>
                            <div class="col-md-8">
                                <input type="text" readonly="" placeholder="' . $row['student_nam'] . '" class="form-control" name="sudentName" value="' . $row['student_nam'] . '">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">' . lang('dorc_7') . '</label>
                            <div class="col-md-8">
                                <input type="text" readonly="" placeholder="" class="form-control" name="class" value="' . $this->common->class_title($row['class_id']) . '">
                            </div>
                        </div>
                        <input type="hidden" name="class_id" value="' . $row['class_id'] . '">
                        <div class="form-group">
                            <label class="control-label col-md-3">' . lang('dorc_8') . '</label>
                            <div class="col-md-8">
                                <input type="text" readonly="" placeholder="' . $row['roll_number'] . '" class="form-control" name="roll" value="' . $row['roll_number'] . '">
                            </div>
                        </div>';
            }
        } else {
            echo '<div class="alert alert-danger">
                            <strong>' . lang('dorc_9') . '</strong> ' . lang('dorc_10') . ' 
                    </div>';
        }
    }

    //This function can remove any seat member's information
    public function removeSeatMember() {
        $id = $this->input->get('id');
        $tdata = array(
            'student_id' => '',
            'student_name' => '',
            'class' => '',
            'roll_number' => ''
        );
        $this->db->where('id', $id);
        if ($this->db->update('dormitory_bed', $tdata)) {
            redirect('dormitory/dormitoryReport', 'refresh');
        }
    }

    //This function can show tha full details about dormitories
    public function showDeatails() {
        $id = $this->input->get('id');
        $data['details'] = $this->common->getWhere('dormitory_bed', 'id', $id);
        $this->load->view('temp/header');
        $this->load->view('dormitoriesDetails', $data);
        $this->load->view('temp/footer');
    }

}
