<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stockmodel extends CI_Model {
    /**
     * This model is using into the Notice controller
     * Load : $this->load->model('noticemodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    //This function will return few vendors information
    public function vendors() {
        $data = array();
        $query = $this->db->query("SELECT id,company_name,cp_name FROM vendors");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return single vendors information
    public function vendordetails($v_id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM vendors WHERE id ='$v_id'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return vendor order list
    public function ven_pol($vid) {
        $data = array();
        $query = $this->db->query("SELECT * FROM inve_item WHERE vendor_id=$vid");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return single vendors information
    public function singel_vendors($v_id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM vendors WHERE id ='$v_id'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all inventory category information
    public function inv_category() {
        $data = array();
        $query = $this->db->query("SELECT * FROM inven_category");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all inventory item information
    public function inv_item() {
        $data = array();
        $query = $this->db->query("SELECT * FROM inve_item");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will showe vendor title by id
    public function vendoe_title($id) {
        $data = array();
        $query = $this->db->query("SELECT company_name FROM vendors WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data = $row['company_name'];
        }
        return $data;
    }

    //This function will showe inventory item category by id
    public function category_title($id) {
        $data = array();
        $query = $this->db->query("SELECT category_name FROM inven_category WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data = $row['category_name'];
        }
        return $data;
    }

    //This function will show full details 
    public function item_details($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM inve_item WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will show all Employee list
    public function employe() {
        $data = array();
        $query = $this->db->query("SELECT id,username FROM users WHERE user_status='Employee'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return all issued item 
    public function issu_item() {
        $data = array();
        $query = $this->db->query("SELECT * FROM issu_item");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return Inventory item issued user title by id
    public function issued_user($id) {
        $data = array();
        $query = $this->db->query("SELECT username FROM users WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data = $row['username'];
        }
        return $data;
    }

    //This function will return inventory item title
    public function item_title($id) {
        $data = array();
        $query = $this->db->query("SELECT item FROM inve_item WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data = $row['item'];
        }
        return $data;
    }

    //This function will show
    public function single_issu_item($id) {
        $data = array();
        $query = $this->db->query("SELECT * FROM issu_item WHERE id = $id");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will show item stock quantity
    public function item_stock($id) {
        $data = array();
        $query = $this->db->query("SELECT quantity FROM inve_item WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $data = $row['quantity'];
        }
        return $data;
    }

}
