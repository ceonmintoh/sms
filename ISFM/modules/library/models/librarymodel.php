<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LibraryModel extends CI_Model {
    /**
     * This model is using into the Library controller
     * Load : $this->load->model('studentmodel');
     */
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }
    
    //This function will return books amount
    public function booksAmount() {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(books_amount) AS `maxid` FROM `books`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
    }
    
    //This function will return books amount
    public function books_id() {
        $y = date('Y');
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(books_amount) AS `maxid` FROM `books`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        $s = $maxid + 1;
        return $y . $s;
    }

    //This function will select all libreary member list
    public function member_list() {
        $data = array();
        $query = $this->db->query("SELECT * FROM library_member");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //This function will return issued book amount for a member
    public function issued_book_amount($member_number) {
        $data = array();
        $query = $this->db->query("SELECT id FROM books WHERE issu_member_no='$member_number'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return count($data);
    }
}
