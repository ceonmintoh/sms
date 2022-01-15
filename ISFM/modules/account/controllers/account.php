<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends MX_Controller {
    /**
     * This controller is using for controlling account and tranjection
     *
     * Maps to the following URL
     * 		http://example.com/index.php/account
     * 	- or -  
     * 		http://example.com/index.php/account/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->model('accountmodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function is adding now account title
    public function addAccountTitle() {
        if ($this->input->post('submit', TRUE)) {
            $accuntInfo = array(
                'account_title' => $this->db->escape_like_str($this->input->post('accountTitle', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('type', TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description', TRUE))
            );
            if ($this->db->insert('account_title', $accuntInfo)) {
                $data['allAccount'] = $this->common->getAllData('account_title');
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>Success ! </strong> Account title added successfully. 
							</div>';
                $this->load->view('temp/header');
                $this->load->view('addAccountTitle', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['allAccount'] = $this->common->getAllData('account_title');
            $this->load->view('temp/header');
            $this->load->view('addAccountTitle', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function is using for show all account title view
    public function allAccount() {
        $this->load->view('temp/header');
        $this->load->view('allAccount', $data);
        $this->load->view('temp/footer');
    }

    //This function will edit Account title information here.
    public function editAccountInfo() {
        $id = $this->input->get('id', TRUE);
        if ($this->input->post('submit', TRUE)) {
            $accuntInfo = array(
                'account_title' => $this->db->escape_like_str($this->input->post('accountTitle', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('type', TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description', TRUE))
            );
            $this->db->where('id', $id);
            if ($this->db->update('account_title', $accuntInfo)) {
                $data['allAccount'] = $this->common->getAllData('account_title');
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>Success ! </strong>  Account title\'s information updated successfully. 
							</div>';
                $this->load->view('temp/header');
                $this->load->view('addAccountTitle', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['accountInfo'] = $this->common->getWhere('account_title', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editAccount', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will delete Account Title.
    public function deleteAccount() {
        $id = $this->input->get('id', TRUE);
        $this->db->delete('account_title', array('id' => $id));
        //After deleteing the account lode all Account info.
        $data['allAccount'] = $this->common->getAllData('account_title');
        $data['message'] = '<div class="alert alert-success alert-dismissable">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                        <strong>Success ! </strong>  Account title deleted successfully. 
                                                </div>';
        $this->load->view('temp/header');
        $this->load->view('addAccountTitle', $data);
        $this->load->view('temp/footer');
    }

    //This function will show students own due and pay
    public function due_pay() {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $student_id = $this->common->student_id($user_id);
        $data['slips'] = $this->accountmodel->own_slips($student_id);
        $this->load->view('temp/header');
        $this->load->view('due_pay', $data);
        $this->load->view('temp/footer');
    }

    //This function will load all students trangections slips
    public function allSlips() {
        $data['slips'] = $this->accountmodel->stud_payment();
        $this->load->view('temp/header');
        $this->load->view('allSlips', $data);
        $this->load->view('temp/footer');
    }

    //Show invioce or students tranjection slips details
    public function view_invoice() {
        $slipId = $this->input->get('sid', TRUE);
        $data['invoice'] = $this->accountmodel->invoice($slipId);
        $data['schoolName'] = $this->common->schoolName();
        $data['currency'] = $this->common->currencyClass();
        $this->load->view('temp/header');
        $this->load->view('invoice', $data);
        $this->load->view('temp/footer');
    }

    //This function will pay students fees
    public function fee_pay() {
        if ($this->input->post('submit', TRUE)) {
            $sid = $this->input->get('sid');
            $total = $this->input->post('total', TRUE);
            $paid = $this->input->post('paid_amount', TRUE);
            if ($paid > $total || $paid == $total) {
                $due = 0;
                $balance = $paid - $total;
                $status = 'Paid';
                echo 'a';
            } elseif ($paid < $total) {
                $balance = 0;
                $due = $total - $paid;
                $status = 'Not Clear';
                echo 'b';
            }
            $slip_data = array(
                'dues' => $this->db->escape_like_str($due),
                'total' => $this->db->escape_like_str($total),
                'paid' => $this->db->escape_like_str($paid),
                'balance' => $this->db->escape_like_str($balance),
                'status' => $this->db->escape_like_str($status),
                'mathod' => $this->db->escape_like_str($this->input->post('method', TRUE)),
            );
            $this->db->where('id', $sid);
            if ($this->db->update('slip', $slip_data)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>WOW!</strong> Your transaction was successfully processed.
							</div>';
                $data['slips'] = $this->accountmodel->stud_payment();
                $this->load->view('temp/header');
                $this->load->view('allSlips', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $sid = $this->input->get('sid');
            $data['total'] = $this->accountmodel->s_slip_info($sid);
            $data['slip_id'] = $sid;
            $this->load->view('temp/header');
            $this->load->view('fee_pay', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will edit student payment information
    public function edit_fee_pay() {
        if ($this->input->post('submit', TRUE)) {
            $sid = $this->input->get('sid');
            $total = $this->input->post('total', TRUE);
            $paid = $this->input->post('paid_amount', TRUE);
            if ($paid > $total || $paid == $total) {
                $due = 0;
                $balance = $paid - $total;
                $status = 'Paid';
                echo 'a';
            } elseif ($paid < $total) {
                $balance = 0;
                $due = $total - $paid;
                $status = 'Not Clear';
                echo 'b';
            }
            $slip_data = array(
                'dues' => $this->db->escape_like_str($due),
                'total' => $this->db->escape_like_str($total),
                'paid' => $this->db->escape_like_str($paid),
                'balance' => $this->db->escape_like_str($balance),
                'status' => $this->db->escape_like_str($status),
                'mathod' => $this->db->escape_like_str($this->input->post('method', TRUE)),
            );
            $this->db->where('id', $sid);
            if ($this->db->update('slip', $slip_data)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>WOW!</strong> Your transaction was successfully processed.
							</div>';
                $data['slips'] = $this->accountmodel->stud_payment();
                $this->load->view('temp/header');
                $this->load->view('allSlips', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $sid = $this->input->get('sid');
            $data['paid_amount'] = $this->accountmodel->paid_amount($sid);
            $data['total'] = $this->accountmodel->s_slip_info($sid);
            $data['slip_id'] = $sid;
            $this->load->view('temp/header');
            $this->load->view('edit_fee_pay', $data);
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
                            <strong>' . lang('tea_info') . ':</strong> ' . lang('teac_1') . ' <strong>' . $studentId . '</strong>' . lang('teac_2') . '
                    </div></div></div>';
        } else {
            echo '<div class="row"><div class="col-md-offset-2 col-md-7 stuInfoIdBox">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-md-4 control-label">' . lang('teac_3') . ' <span class="requiredStar">  </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="studentName" value="' . $query->student_nam . '" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">' . lang('teac_4') . ' <span class="requiredStar">  </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="class" value="' . $this->common->class_title($query->class_id) . '" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="assets/uploads/' . $query->student_photo . '" class="img-responsive" alt=""><br>
                    </div>
                </div></div>';
        }
    }

    //This function will work to pay salary to employes
    public function paySalary() {
        if ($this->input->post('submit', TRUE)) {
            $pre_balence = $this->accountmodel->pre_balence();
            $total_amount = $this->input->post('totalSalary', TRUE);
            if ($pre_balence >= $total_amount) {
                $balence = $pre_balence - $total_amount;
                $employId = $this->input->post('employId', TRUE);
                if ($this->input->post('month', TRUE) == 1) {
                    $month = 'January';
                } elseif ($this->input->post('month', TRUE) == 2) {
                    $month = 'February';
                } elseif ($this->input->post('month', TRUE) == 3) {
                    $month = 'March';
                } elseif ($this->input->post('month', TRUE) == 4) {
                    $month = 'April';
                } elseif ($this->input->post('month', TRUE) == 5) {
                    $month = 'May';
                } elseif ($this->input->post('month', TRUE) == 6) {
                    $month = 'Jun';
                } elseif ($this->input->post('month', TRUE) == 7) {
                    $month = 'July';
                } elseif ($this->input->post('month', TRUE) == 8) {
                    $month = 'August';
                } elseif ($this->input->post('month', TRUE) == 9) {
                    $month = 'Septembore';
                } elseif ($this->input->post('month', TRUE) == 10) {
                    $month = 'October';
                } elseif ($this->input->post('month', TRUE) == 11) {
                    $month = 'November';
                } elseif ($this->input->post('month', TRUE) == 12) {
                    $month = 'December';
                }
                $salary = array(
                    'year' => $this->db->escape_like_str(date('Y')),
                    'date' => $this->db->escape_like_str(strtotime(date('d-m-Y'))),
                    'month' => $this->db->escape_like_str($month),
                    'total_amount' => $this->db->escape_like_str($total_amount),
                    'method' => $this->db->escape_like_str($this->input->post('method', TRUE)),
                    'user_id' => $this->db->escape_like_str($employId),
                    'employ_title' => $this->db->escape_like_str($this->input->post('employ_title', TRUE))
                );
                if ($this->db->insert('salary', $salary)) {
                    $entry_info = $this->accountmodel->tran_check(2);
                    if ($entry_info == 'no_entry') {
                        $inco_data = array(
                            'date' => $this->db->escape_like_str(strtotime(date('d-m-Y'))),
                            'acco_id' => $this->db->escape_like_str(2),
                            'category' => $this->db->escape_like_str('Expense'),
                            'amount' => $this->db->escape_like_str($total_amount),
                            'balance' => $this->db->escape_like_str($balence)
                        );
                        $this->db->insert('transection', $inco_data);
                    } else {
                        $inco_data = array(
                            'date' => $this->db->escape_like_str(strtotime(date('d-m-Y'))),
                            'acco_id' => $this->db->escape_like_str(2),
                            'category' => $this->db->escape_like_str('Expense'),
                            'amount' => $this->db->escape_like_str($total_amount + $entry_info[0]['amount']),
                            'balance' => $this->db->escape_like_str($balence)
                        );
                        $row_id = $entry_info[0]['id'];
                        $this->db->where('id', $row_id);
                        $this->db->update('transection', $inco_data);
                    }
                }
                $satSalaryInfo = array(
                    'month' => $this->db->escape_like_str($this->input->post('month', TRUE)),
                );
                $this->db->where('employ_user_id', $employId);
                if ($this->db->update('set_salary', $satSalaryInfo)) {
                    redirect('account/paySalary', 'refresh');
                }
            } else {
                $data['message'] = '<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close" type="button"></button>
                                    <h4 class="alert-heading">' . lang('error') . '</h4> ' . lang('teac_5') . '
                            </div>';
                $data['salary_list'] = $this->accountmodel->employee_salary();
                $this->load->view('temp/header');
                $this->load->view('paySalary', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['salary_list'] = $this->accountmodel->employee_salary();
            $this->load->view('temp/header');
            $this->load->view('paySalary', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will show the employ who will get Government salary
    public function ajaxEmployInfo() {
        $month = $this->input->get('month');
        $query = $this->accountmodel->salaryEmployList($month);
        echo '<div class="form-group">
            <label class="col-md-3 control-label">' . lang('teac_6') . ' <span class="requiredStar"> * </span></label>
            <div class="col-md-9">
                <select onchange="salaryAmount(this.value)" class="form-control" name="employId" data-validation="required" data-validation-error-msg="' . lang('teac_11') . '">
                    <option value="">' . lang('select') . '</option>';
        foreach ($query as $row) {
            echo '<option value="' . $row['employ_user_id'] . '">' . $row['employe_title'] . '</option>';
        }
        echo '</select>
            </div>
        </div>
        <div id="ajaxResult_2"></div>';
    }

    //This function will return one employe sallary amount
    public function ajaxSalaryAmount() {
        $uId = $this->input->get('uId');
        $query = $this->accountmodel->ajaxSalaryAmount($uId);
        echo '<div class="form-group">
            <label class="col-md-3 control-label"> ' . lang('teac_7') . ' <span class="requiredStar">  </span></label>
            <div class="col-md-9">
                <input type="text" readonly="" placeholder="Readonly" class="form-control" name="totalSalary" value="' . $query . '">
            </div>
        </div><input type="hidden" name="employ_title" value="' . $this->accountmodel->semployTitle($uId) . '">';
    }

    //this function will return employ title via user id
    public function SchEmploTItle() {
        $uId = $this->input->get('uId');
        echo '<input type="hidden" name="employ_title" value="' . $this->accountmodel->semployTitle($uId) . '">';
    }

    //This function will make transection
    public function transection() {
        $date = strtotime(date('d-m-Y'));
        if ($this->input->post('expense', TRUE)) {
            $account_id = $this->input->post('account_id', TRUE);
            $amount = $this->input->post('amount', TRUE);
            $pre_balence = $this->accountmodel->pre_balence();
            if ($pre_balence >= $amount) {
                $balence = $pre_balence - $amount;
                $entry_info = $this->accountmodel->tran_check($account_id);
                if ($entry_info == 'no_entry') {
                    $inco_data = array(
                        'date' => $this->db->escape_like_str($date),
                        'acco_id' => $this->db->escape_like_str($account_id),
                        'category' => $this->db->escape_like_str('Expense'),
                        'amount' => $this->db->escape_like_str($amount),
                        'balance' => $this->db->escape_like_str($balence)
                    );
                    if ($this->db->insert('transection', $inco_data)) {
                        $data['message'] = '<div class="alert alert-block alert-success fade in">
                                            <button data-dismiss="alert" class="close" type="button"></button>
                                            <h4 class="alert-heading">' . lang('success') . ' </h4> ' . lang('teac_8') . ' 
                                    </div>';
                        $data['income'] = $this->accountmodel->income();
                        $data['expanse'] = $this->accountmodel->expanse();
                        $data['inco_title'] = $this->accountmodel->inco_title();
                        $data['expa_title'] = $this->accountmodel->expa_title();
                        $this->load->view('temp/header');
                        $this->load->view('transection', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $inco_data = array(
                        'date' => $this->db->escape_like_str($date),
                        'acco_id' => $this->db->escape_like_str($account_id),
                        'category' => $this->db->escape_like_str('Expense'),
                        'amount' => $this->db->escape_like_str($amount + $entry_info[0]['amount']),
                        'balance' => $this->db->escape_like_str($balence)
                    );
                    $row_id = $entry_info[0]['id'];
                    $this->db->where('id', $row_id);
                    if ($this->db->update('transection', $inco_data)) {
                        $data['message'] = '<div class="alert alert-block alert-success fade in">
                                            <button data-dismiss="alert" class="close" type="button"></button>
                                            <h4 class="alert-heading">' . lang('success') . ' </h4> ' . lang('teac_8') . '
                                    </div>';
                        $data['income'] = $this->accountmodel->income();
                        $data['expanse'] = $this->accountmodel->expanse();
                        $data['inco_title'] = $this->accountmodel->inco_title();
                        $data['expa_title'] = $this->accountmodel->expa_title();
                        $this->load->view('temp/header');
                        $this->load->view('transection', $data);
                        $this->load->view('temp/footer');
                    }
                }
            } else {
                $data['message'] = '<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close" type="button"></button>
                                    <h4 class="alert-heading">' . lang('error') . '</h4> ' . lang('teac_9') . '
                            </div>';
                $data['income'] = $this->accountmodel->income();
                $data['expanse'] = $this->accountmodel->expanse();
                $data['inco_title'] = $this->accountmodel->inco_title();
                $data['expa_title'] = $this->accountmodel->expa_title();
                $this->load->view('temp/header');
                $this->load->view('transection', $data);
                $this->load->view('temp/footer');
            }
        } elseif ($this->input->post('income', TRUE)) {
            $account_id = $this->input->post('account_id', TRUE);
            $amount = $this->input->post('amount', TRUE);
            $pre_balence = $this->accountmodel->pre_balence();
            $balence = $pre_balence + $amount;
            $entry_info = $this->accountmodel->tran_check($account_id);
            if ($entry_info == 'no_entry') {
                $inco_data = array(
                    'date' => $this->db->escape_like_str($date),
                    'acco_id' => $this->db->escape_like_str($account_id),
                    'category' => $this->db->escape_like_str('Income'),
                    'amount' => $this->db->escape_like_str($amount),
                    'balance' => $this->db->escape_like_str($balence)
                );
                if ($this->db->insert('transection', $inco_data)) {
                    $data['message_2'] = '<div class="alert alert-block alert-success fade in">
                                            <button data-dismiss="alert" class="close" type="button"></button>
                                            <h4 class="alert-heading">' . lang('success') . ' </h4> ' . lang('teac_10') . '
                                    </div>';
                    $data['income'] = $this->accountmodel->income();
                    $data['expanse'] = $this->accountmodel->expanse();
                    $data['inco_title'] = $this->accountmodel->inco_title();
                    $data['expa_title'] = $this->accountmodel->expa_title();
                    $this->load->view('temp/header');
                    $this->load->view('transection', $data);
                    $this->load->view('temp/footer');
                }
            } else {
                $inco_data = array(
                    'date' => $this->db->escape_like_str($date),
                    'acco_id' => $this->db->escape_like_str($account_id),
                    'category' => $this->db->escape_like_str('Income'),
                    'amount' => $this->db->escape_like_str($amount + $entry_info[0]['amount']),
                    'balance' => $this->db->escape_like_str($balence)
                );
                $row_id = $entry_info[0]['id'];
                $this->db->where('id', $row_id);
                if ($this->db->update('transection', $inco_data)) {
                    $data['message_2'] = '<div class="alert alert-block alert-success fade in">
                                            <button data-dismiss="alert" class="close" type="button"></button>
                                            <h4 class="alert-heading">' . lang('success') . ' </h4> ' . lang('teac_10') . '
                                    </div>';
                    $data['income'] = $this->accountmodel->income();
                    $data['expanse'] = $this->accountmodel->expanse();
                    $data['inco_title'] = $this->accountmodel->inco_title();
                    $data['expa_title'] = $this->accountmodel->expa_title();
                    $this->load->view('temp/header');
                    $this->load->view('transection', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            $data['income'] = $this->accountmodel->income();
            $data['expanse'] = $this->accountmodel->expanse();
            $data['inco_title'] = $this->accountmodel->inco_title();
            $data['expa_title'] = $this->accountmodel->expa_title();
            $this->load->view('temp/header');
            $this->load->view('transection', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will show expanse list by date range 
    public function exp_list_da_ra() {
        $rngstrt = strtotime($this->input->post('rngstrt', TRUE));
        $rngfin = strtotime($this->input->post('rngfin', TRUE));
        $query = $this->db->query("SELECT * FROM transection WHERE date >='$rngstrt' AND date <= '$rngfin' AND category='Expense'");
        $i = 1;
        foreach ($query->result_array() as $row) {
            echo '<tr>
                    <td>
                        ' . $i . '
                    </td>
                    <td>
                        ' . date("d-m-Y", $row['date']) . '
                    </td>
                    <td>
                        ' . $this->accountmodel->acc_tit_id($row['acco_id']) . '
                    </td>
                    <td>
                        ' . $row['amount'] . '
                    </td>
                    <td>
                        ' . $row['balance'] . '
                    </td>
                </tr>';
            $i++;
        }
    }

    //This function will show expanse list by date range 
    public function inc_list_da_ra() {
        $rngstrt = strtotime($this->input->post('rngstrt', TRUE));
        $rngfin = strtotime($this->input->post('rngfin', TRUE));
        $query = $this->db->query("SELECT * FROM transection WHERE date >='$rngstrt' AND date <= '$rngfin' AND category='Income'");
        $i = 1;
        foreach ($query->result_array() as $row) {
            echo '<tr>
                    <td>
                        ' . $i . '
                    </td>
                    <td>
                        ' . date("d-m-Y", $row['date']) . '
                    </td>
                    <td>
                        ' . $this->accountmodel->acc_tit_id($row['acco_id']) . '
                    </td>
                    <td>
                        ' . $row['amount'] . '
                    </td>
                    <td>
                        ' . $row['balance'] . '
                    </td>
                </tr>';
            $i++;
        }
    }

    //This function will make students month end slip by auto calculation
    public function end_stu_calcu() {
        $class = $this->accountmodel->all_class();
        foreach ($class as $row) {
            $class_id = $row['id'];
            $m_t_fee = $this->accountmodel->total_fee($class_id);
            if (!empty($m_t_fee)) {
                foreach ($m_t_fee as $row1) {
                    $item_id[] = $row1['id'];
                    $money[] = $row1['amount'];
                }
                $id_text = implode(",", $item_id);
                $amount = array_sum($money);
                $all_student = $this->accountmodel->all_students($class_id);
                foreach ($all_student as $row2) {
                    $student_id = $row2['student_id'];
                    $dues = $this->accountmodel->dues($student_id);
                    if ($dues != 0) {
                        $total = $amount + $dues;
                    } else {
                        $total = $amount;
                    }
                    $advance = $this->accountmodel->advance($student_id);
                    $status = 'Unpaid';
                    $paid = 0;
                    $balanec = 0;
                    if ($advance != 0) {
                        if ($total > $advance) {
                            $total -= $advance;
                        } elseif ($advance == $total) {
                            $balanec = 0;
                            $paid = $total;
                            $status = 'Paid';
                        } elseif ($total < $advance) {
                            $paid = $total;
                            $balanec = $advance - $total;
                            $status = 'Paid';
                        }
                    }
                    $data = array(
                        'year' => $this->db->escape_like_str(date('Y')),
                        'month' => $this->db->escape_like_str(date('F')),
                        'class_id' => $this->db->escape_like_str($class_id),
                        'student_id' => $this->db->escape_like_str($student_id),
                        'item_id' => $this->db->escape_like_str($id_text),
                        'amount' => $this->db->escape_like_str($amount),
                        'dues' => $this->db->escape_like_str($dues),
                        'advance' => $this->db->escape_like_str($advance),
                        'total' => $this->db->escape_like_str($total),
                        'paid' => $this->db->escape_like_str($paid),
                        'balance' => $this->db->escape_like_str($balanec),
                        'status' => $this->db->escape_like_str($status),
                    );
                    $this->db->insert('slip', $data);
                }
                $item_id = array();
                $money = array();
                $class_com = array(
                    'month_fee' => $this->db->escape_like_str(date('F'))
                );
                $this->db->where('id', $class_id);
                $this->db->update('class', $class_com);
            }
        }
    }

}
