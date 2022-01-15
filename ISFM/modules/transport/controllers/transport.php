<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Transport extends CI_Controller {

    /**
     * This controller is using for control transport
     *
     * Maps to the following URL
     * 		http://example.com/index.php/transport
     * 	- or -  
     * 		http://example.com/index.php/transport/<method_name>
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function is using for adding transport and it's informations.
    public function addTransport() {
        if ($this->input->post('submit', TRUE)) {
            $routeInfoInsert = array(
                'rout_title' => $this->db->escape_like_str($this->input->post('routeTitle', TRUE)),
                'start_end' => $this->db->escape_like_str($this->input->post('startEnd', TRUE)),
                'vicles_amount' => $this->db->escape_like_str($this->input->post('vehiclesAmount', TRUE)),
                'descriptions' => $this->db->escape_like_str($this->input->post('description', TRUE)),
            );
            //now submit data into database and load view.
            if ($this->db->insert('transport', $routeInfoInsert)) {
                redirect('transport/allTransport', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('addTransport');
            $this->load->view('temp/footer');
        }
    }

    // This function is showing all transport
    public function allTransport() {
        $data['transport'] = $this->common->getAllData('transport');
        $this->load->view('temp/header');
        $this->load->view('allTransport', $data);
        $this->load->view('temp/footer');
    }

    //Here edit or update the previos information whisch 
    public function editTransport() {
        $id = $this->input->get('id');
        if ($this->input->post('submit', TRUE)) {
            $routeInfoInsert = array(
                'rout_title' => $this->db->escape_like_str($this->input->post('routeTitle', TRUE)),
                'start_end' => $this->db->escape_like_str($this->input->post('startEnd', TRUE)),
                'vicles_amount' => $this->db->escape_like_str($this->input->post('vehiclesAmount', TRUE)),
                'descriptions' => $this->db->escape_like_str($this->input->post('description', TRUE)),
            );
            //now submit data into database and load view.
            $this->db->where('id', $id);
            if ($this->db->update('transport', $routeInfoInsert)) {
                redirect('transport/allTransport', 'refresh');
            }
        } else {
            $data['transport'] = $this->common->getWhere('transport', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editTransport', $data);
            $this->load->view('temp/footer');
        }
    }

    //THis function is using to delete Transport
    public function deleteTransport() {
        $id = $this->input->get('id');
        if ($this->db->delete('transport', array('id' => $id))) {
            redirect('transport/allTransport', 'refresh');
        }
    }

}
