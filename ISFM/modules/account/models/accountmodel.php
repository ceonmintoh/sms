<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AccountModel extends CI_Model {
    /**
     * This model is using into the students controller
     * Load : $this->load->model('account');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function will return all students paments information
    public function stud_payment() {
        $data = array();
        $query = $this->db->query("SELECT * FROM slip ORDER BY id DESC");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return full invoice information
    public function invoice($slipId) {
        $data = array();
        $query = $this->db->query("SELECT * FROM slip WHERE id=$slipId");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all income account title list
    public function inco_title() {
        $data = array();
        $query = $this->db->query("SELECT * FROM account_title WHERE category='Income'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all income account title list
    public function expa_title() {
        $data = array();
        $query = $this->db->query("SELECT * FROM account_title WHERE category='Expense'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return Total amount in a transuctio slip
    //This function was used in "paySalary()"
    public function pre_balence() {
        $data = array();
        $query = $this->db->query("SELECT * FROM transection ORDER BY id DESC LIMIT 1");
        foreach ($query->result_array() as $row) {
            $data[] = $row['balance'];
        }
        if (!empty($data)) {
            return $data[0];
        } else {
            return 0;
        }
    }

    //This function will reaturn only maximam slip_number
    function maxSlip() {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(slip_number) AS `maxid` FROM `slip_number`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }

    //This function will chack that is ther any tranjection submited today or not.
    public function tran_check($acco_id) {
        $d = date('d-m-Y');
        $date = strtotime($d);
        $data = array();
        $query = $this->db->query("SELECT id,amount FROM transection WHERE date = $date AND acco_id=$acco_id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            return $data;
        } else {
            return 'no_entry';
        }
    }

    //This function will return all employ who will get government salary
    public function salaryEmployList($month) {
        $data = array();
        $query = $this->db->query("SELECT employe_title,employ_user_id FROM set_salary WHERE month<'$month'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return one employ salary info
    public function ajaxSalaryAmount($uId) {
        $query = $this->db->query("SELECT total FROM set_salary WHERE employ_user_id='$uId'");
        foreach ($query->result_array() as $row) {
            $salary = $row['total'];
        }
        return $salary;
    }

    //This function will return all employ list which are paid from government
    public function employee_salary() {
        $data = array();
        $query = $this->db->query("SELECT * FROM salary");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return employ's previous advanced taken amount
    public function preAdvance($uid) {
        $data = array();
        $query = $this->db->query("SELECT advanced_taken FROM set_salary WHERE employ_user_id=$uid");
        foreach ($query->result_array() as $row) {
            $data = $row['advanced_taken'];
        }
        return $data;
    }

    //This function will show employe title
    public function semployTitle($uid) {
        $data = array();
        $query = $this->db->query("SELECT employe_title FROM set_salary WHERE employ_user_id=$uid");
        foreach ($query->result_array() as $row) {
            $data = $row['employe_title'];
        }
        return $data;
    }

    //This funtion will return all income's data from transection table
    public function income() {
        $data = array();
        $query = $this->db->query("SELECT * FROM transection WHERE category='Income' AND id !=1");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return account title by id
    public function acc_tit_id($acco_id) {
        $data = array();
        $query = $this->db->query("SELECT account_title FROM account_title WHERE id =$acco_id");
        foreach ($query->result_array() as $row) {
            $data = $row['account_title'];
        }
        return $data;
    }

    //This funtion will return all income's data from transection table
    public function expanse() {
        $data = array();
        $query = $this->db->query("SELECT * FROM transection WHERE category='Expense' AND id !=2");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return only one trangection information by trangection id
    public function single_tran($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM transection WHERE id='$id'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return only transection id list 
    public function id_list($id) {
        $data = array();
        $query = $this->db->query("SELECT id FROM transection WHERE id>'$id'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all class's id and title
    public function all_class() {
        $m = date('F');
        $data = array();
        $query = $this->db->query("SELECT id FROM class WHERE month_fee != '$m'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function will return total month fee end of the month
    public function total_fee($class_id) {
        $data = array();
        $year = date('Y');
        $query = $this->db->query("SELECT id,amount FROM fee_item WHERE year=$year AND class_id=$class_id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function will return all students id
    public function all_students($class_id) {
        $data = array();
        $query = $this->db->query("SELECT student_id FROM class_students WHERE class_id=$class_id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    //This function will return student's last month due amount
    public function dues($student_id) {
        $data = 0;
        $year = date('Y');
        $query = $this->db->query("SELECT balance FROM slip WHERE year=$year AND student_id=$student_id ORDER BY id DESC LIMIT 1");
        foreach ($query->result_array() as $row) {
            $data = $row['balance'];
        }
        if ($data < 0) {
            return $data;
        } else {
            $data = 0;
            return $data;
        }
    }

    //This function will return advanced paid amount for students fee
    public function advance($student_id) {
        $data = 0;
        $year = date('Y');
        $query = $this->db->query("SELECT balance FROM slip WHERE year=$year AND student_id=$student_id ORDER BY id DESC LIMIT 1");
        foreach ($query->result_array() as $row) {
            $data = $row['balance'];
        }
        if ($data > 0) {
            return $data;
        } else {
            $data = 0;
            return $data;
        }
        return $data;
    }

    //This function will return item title by item id
    public function item_title($item_id) {
        $query = $this->db->query("SELECT title FROM fee_item WHERE id=$item_id");
        foreach ($query->result_array() as $row) {
            $data = $row['title'];
        }return $data;
    }

    //This function will show item fee amount by item id
    public function item_amount($item_id) {
        $query = $this->db->query("SELECT amount FROM fee_item WHERE id=$item_id");
        foreach ($query->result_array() as $row) {
            $data = $row['amount'];
        }return $data;
    }

    //This function will return payment slip info
    public function s_slip_info($s_id) {
        $query = $this->db->query("SELECT total FROM slip WHERE id=$s_id");
        foreach ($query->result_array() as $row) {
            $data = $row['total'];
        }return $data;
    }

    //This function will return paid amount
    public function paid_amount($s_id) {
        $query = $this->db->query("SELECT paid FROM slip WHERE id=$s_id");
        foreach ($query->result_array() as $row) {
            $data = $row['paid'];
        }return $data;
    }

    //This function will return student's own slip
    public function own_slips($student_id) {
        $data = array();
        $year = date('Y');
        $query = $this->db->query("SELECT * FROM slip WHERE year=$year AND student_id=$student_id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

}
