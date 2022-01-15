<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Message extends MX_Controller {
    /**
     * This controller is using for controlling message 
     *
     * Maps to the following URL
     * 		http://example.com/index.php/message
     * 	- or -  
     * 		http://example.com/index.php/message/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('messagemodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    //This function can send message.
    public function sendMessage() {
        if ($this->input->post('submit', TRUE)) {
            $receiver = $this->input->post('receiver', TRUE);
            $group = $this->input->post('receiverGroup', TRUE);
            $day = date("m/d/Y h:i:s A");
            $date = strtotime($day);
            if ($group == 'Student') {
                //if this message's receipent will students then work here
                if ($receiver == 'AllStudentSchool') {
                    $query = $this->common->getAllData('student_info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        $this->db->insert('massage', $message);
                    }
                    $data['message'] = lang('mesc_1');
                    $this->load->view('temp/header');
                    $this->load->view('message', $data);
                    $this->load->view('temp/footer');
                } else {
                    $receiver_2 = $this->input->post('receiver_2', TRUE);
                    if ($receiver_2 == 'AllStudentsClass') {
                        $query = $this->common->getWhere('student_info', 'class_title', $receiver);
                        foreach ($query as $row) {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            $this->db->insert('massage', $message);
                        }
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    } else {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($receiver_2),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = lang('mesc_1');
                            $this->load->view('temp/header');
                            $this->load->view('message', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                }
            } elseif ($group == 'Teacher') {
                //if this message's receipent will Teacher then work here
                if ($receiver == 'AllTeacher') {
                    $query = $this->common->getAllData('teachers_info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        $this->db->insert('massage', $message);
                    }
                    $data['message'] = lang('mesc_1');
                    $this->load->view('temp/header');
                    $this->load->view('message', $data);
                    $this->load->view('temp/footer');
                } else {
                    $message = array(
                        'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                        'receiver_id' => $this->db->escape_like_str($receiver),
                        'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                        'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                        'read_unread' => $this->db->escape_like_str('0'),
                        'date' => $this->db->escape_like_str($date),
                        'sender_delete' => 1,
                        'receiver_delete' => 1
                    );
                    if ($this->db->insert('massage', $message)) {
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    }
                }
            } elseif ($group == 'Parents') {
                //if this message's receipent will Parents then work here
                if ($receiver == 'AllParentsSchool') {
                    $query = $this->common->getAllData('parents_info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        $this->db->insert('massage', $message);
                    }
                    $data['message'] = lang('mesc_1');
                    $this->load->view('temp/header');
                    $this->load->view('message', $data);
                    $this->load->view('temp/footer');
                } else {
                    $receiver_2 = $this->input->post('receiver_2', TRUE);
                    if ($receiver_2 == 'AllParentsClass') {
                        $query = $this->common->getWhere('parents_info', 'student_class', $receiver);
                        foreach ($query as $row) {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            $this->db->insert('massage', $message);
                        }
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    } else {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($receiver_2),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = lang('mesc_1');
                            $this->load->view('temp/header');
                            $this->load->view('message', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                }
            }
        } else {
            $data['message'] = lang('mesc_1');
            $this->load->view('temp/header');
            $this->load->view('message', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function can send message.
    public function sendMessage2() {
        $group = $this->input->post('receiverGroup', TRUE);
        $receiver = $this->input->post('receiver', TRUE);
        $receiver2 = $this->input->post('receiver_2', TRUE);
        $day = date("m/d/y h:i:s A");
        $date = strtotime($day);
        if ($this->input->post('submit', TRUE)) {
            if ($this->input->post('msgType') == 'smsapi') {
                $query = $this->db->query('SELECT msg_apai_email,msg_hash_number,msg_sender_title FROM configuration')->row();

                // Textlocal account details
                $username = $query->msg_apai_email;
                $hash = $query->msg_hash_number;

                // Message details
                $numbers = $this->messagemodel->studentNumber($group, $receiver, $receiver2);
                $sender = urlencode($query->msg_sender_title);
                $message = rawurlencode($query->msg_sender_title);

                $numbers = implode(',', $numbers);

                // Prepare data for POST request
                $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

                // Send the POST request with cURL
                $ch = curl_init('http://api.txtlocal.com/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Process your response here
                $json = json_decode($response);

                if ($json->status == 'success') {
                    $data['Success'] = lang('mesc_1');
                } else {
                    $data['Error'] = lang('mesc_2');
                }
                $this->load->view('temp/header');
                $this->load->view('message', $data);
                $this->load->view('temp/footer');
            } else {
                if ($group == 'Student') {
                    //if this message's receipent will students then work here
                    if ($receiver == 'AllStudentSchool') {
                        $query = $this->common->getAllData('student_info');
                        foreach ($query as $row) {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            $this->db->insert('massage', $message);
                        }
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    } else {
                        $receiver_2 = $this->input->post('receiver_2', TRUE);
                        if ($receiver_2 == 'AllStudentsClass') {
                            $query = $this->common->getWhere('student_info', 'class_id', $receiver);
                            foreach ($query as $row) {
                                $message = array(
                                    'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                    'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                    'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                    'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                    'read_unread' => $this->db->escape_like_str('0'),
                                    'date' => $this->db->escape_like_str($date),
                                    'sender_delete' => 1,
                                    'receiver_delete' => 1
                                );
                                $this->db->insert('massage', $message);
                            }
                            $data['message'] = lang('mesc_1');
                            $this->load->view('temp/header');
                            $this->load->view('message', $data);
                            $this->load->view('temp/footer');
                        } else {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($receiver_2),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            if ($this->db->insert('massage', $message)) {
                                $data['message'] = lang('mesc_1');
                                $this->load->view('temp/header');
                                $this->load->view('message', $data);
                                $this->load->view('temp/footer');
                            }
                        }
                    }
                } elseif ($group == 'Teacher') {
                    //if this message's receipent will Teacher then work here
                    if ($receiver == 'AllTeacher') {
                        $query = $this->common->getAllData('teachers_info');
                        foreach ($query as $row) {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            $this->db->insert('massage', $message);
                        }
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    } else {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                            'receiver_id' => $this->db->escape_like_str($receiver),
                            'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date),
                            'sender_delete' => 1,
                            'receiver_delete' => 1
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = lang('mesc_1');
                            $this->load->view('temp/header');
                            $this->load->view('message', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                } elseif ($group == 'Parents') {
                    //if this message's receipent will Parents then work here
                    if ($receiver == 'AllParentsSchool') {
                        $query = $this->common->getAllData('parents_info');
                        foreach ($query as $row) {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            $this->db->insert('massage', $message);
                        }
                        $data['message'] = lang('mesc_1');
                        $this->load->view('temp/header');
                        $this->load->view('message', $data);
                        $this->load->view('temp/footer');
                    } else {
                        $receiver_2 = $this->input->post('receiver_2', TRUE);
                        if ($receiver_2 == 'AllParentsClass') {
                            $query = $this->common->getWhere('parents_info', 'student_class', $receiver);
                            foreach ($query as $row) {
                                $message = array(
                                    'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                    'receiver_id' => $this->db->escape_like_str($row['user_id']),
                                    'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                    'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                    'read_unread' => $this->db->escape_like_str('0'),
                                    'date' => $this->db->escape_like_str($date),
                                    'sender_delete' => 1,
                                    'receiver_delete' => 1
                                );
                                $this->db->insert('massage', $message);
                            }
                            $data['message'] = lang('mesc_1');
                            $this->load->view('temp/header');
                            $this->load->view('message', $data);
                            $this->load->view('temp/footer');
                        } else {
                            $message = array(
                                'sender_id' => $this->db->escape_like_str($this->input->post('senderId', TRUE)),
                                'receiver_id' => $this->db->escape_like_str($receiver_2),
                                'subject' => $this->db->escape_like_str($this->input->post('subject', TRUE)),
                                'message' => $this->db->escape_like_str($this->input->post('message', TRUE)),
                                'read_unread' => $this->db->escape_like_str('0'),
                                'date' => $this->db->escape_like_str($date),
                                'sender_delete' => 1,
                                'receiver_delete' => 1
                            );
                            if ($this->db->insert('massage', $message)) {
                                $data['message'] = lang('mesc_1');
                                $this->load->view('temp/header');
                                $this->load->view('message', $data);
                                $this->load->view('temp/footer');
                            }
                        }
                    }
                }
            }
        } else {
            //If the massage is not set oe not submit it will load at first view for sending massage
            $data['message'] = lang('mesc_1');
            $this->load->view('temp/header');
            $this->load->view('message', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will return all receiver whene give/select any user group.
    public function ajaxSelectReciver() {
        $group = $this->input->get('q');
        if ($group == 'Student') {
            //If the student's groun was selected thene work here
            $query = $this->common->getAllData('class');
            echo '<option value="AllStudentSchool">' . lang('mesc_3') . '</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['class_title'] . ' </option>';
            }
        } elseif ($group == 'Teacher') {
            //If the teacher's groun was selected thene work here
            $query = $this->common->getAllData('teachers_info');
            echo '<option value="AllTeacher">' . lang('mesc_4') . '</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['fullname'] . '</option>';
            }
        } elseif ($group == 'Parents') {
            //If the parent's groun was selected thene work here
            $query = $this->common->getAllData('class');
            echo '<option value="AllParentsSchool">' . lang('mesc_5') . '</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['class_title'] . '</option>';
            }
        }
    }

    //This function will return all receiver whene give/select any user group.
    public function ajaxClassStuAndPar() {
        $group = $this->input->get('g');
        $recInfo = $this->input->get('p');
        if ($group == 'Student') {
            //If the student's groun was selected thene work here
            $query = $this->common->getWhere('student_info', 'class_id', $recInfo);
            echo '<option value="AllStudentsClass">' . lang('mesc_6') . ' </option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['student_id'] . '">' . $row['student_id'] . ' - ' . $row['student_nam'] . ' </option>';
            }
        } elseif ($group == 'Parents') {
            $query = $this->common->getWhere('parents_info', 'class_id', $recInfo);
            echo '<option value="AllParentsClass">' . lang('mesc_7') . ' </option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['parents_name'] . ' - StudentID : ' . $row['student_id'] . ' </option>';
            }
        }
    }

    //This function will return all inbox read and unread massage
    public function inbox() {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['massage'] = $this->common->getWhere22('massage', 'receiver_id', $id, 'receiver_delete', 1);
        $this->load->view('temp/header');
        $this->load->view('inbox', $data);
        $this->load->view('temp/footer');
    }

    //This function will return all inbox read and unread massage
    public function sentMessage() {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['massage'] = $this->common->getWhere22('massage', 'sender_id', $id, 'sender_delete', 1);
        $this->load->view('temp/header');
        $this->load->view('sent', $data);
        $this->load->view('temp/footer');
    }

    //This function can return unread massage in the inbox. 
    public function unreadMassage() {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['unreadMassage'] = $this->messagemodel->unReadMassage($id);
    }

    //user can read the message by this function
    public function readMassage() {
        $id = $this->input->get('id');
        $data['massage'] = $this->common->getWhere('massage', 'id', $id);
        $update = array(
            'read_unread' => $this->db->escape_like_str(1)
        );
        if ($this->db->update('massage', $update, array('id' => $this->db->escape_like_str($id)))) {
            $this->load->view('temp/header');
            $this->load->view('readmassage', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function can check at first thet is the sender want to delete it.
    //If the sender delete the message befor the receiver delte then this function can delete this message from databae.
    //Or remove this message only from the inbox item.
    public function deleteInboxMassage() {
        $id = $this->input->get('id');
        $query = $this->common->getWhere('massage', 'id', $id);
        foreach ($query as $row) {
            $senderDelete = $row['sender_delete'];
        }
        if ($senderDelete == '0') {
            if ($this->db->delete('massage', array('id' => $id))) {
                redirect('message/inbox', 'refresh');
            }
        } else {
            $this->db->where('id', $id);
            $data = array('receiver_delete' => 0);
            if ($this->db->update('massage', $data)) {
                redirect('message/inbox', 'refresh');
            }
        }
    }

    //This function can check at first thet is the receiver want to delete it.
    //If the receiver delete the message befor the sender delte then this function can delete this message from databae.
    //Or remove this message only from the sent message item.
    public function deleteSentMassage() {
        $id = $this->input->get('id');
        $query = $this->common->getWhere('massage', 'id', $id);
        foreach ($query as $row) {
            $receiverDelete = $row['receiver_delete'];
        }
        if ($receiverDelete == '0') {
            if ($this->db->delete('massage', array('id' => $id))) {
                redirect('message/inbox', 'refresh');
            }
        } else {
            $this->db->where('id', $id);
            $data = array('sender_delete' => 0);
            if ($this->db->update('massage', $data)) {
                redirect('message/sentMessage', 'refresh');
            }
        }
    }

}
