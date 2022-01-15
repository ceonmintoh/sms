<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class CommonController extends CI_Controller
    {

    /**
     * This controller is using as a common controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/commonController
     * 	- or -  
     * 		http://example.com/index.php/commonController/<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        }

    //This function will return class section by class title.
    //If thst class do not have any class section then return a message "This class has no section."
    public function ajaxClassInfo()
        {
        $classTitle = $this->input->get('q',TRUE);
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Section <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section" class="form-control">
                                <option value="all">All Section</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no section.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }
        
    //This function will update class student into the next class if he/she pass in the final exam
    public function upStudentClass(){
        //At first Check the date && date('d') <= '06'
        if(date('m') == '11'){
            if(date('d') >= '05' && date('d') <= '09'){
                //Now start the main action of the function
                //Get the class list first
                $classList = $this->common->classList();
                foreach($classList as $row){
                    
                }
                
//                echo '<pre>';
//                print_r($classList);
//                echo '</pre>';
                
            }  else {
                echo 'This function will run into 25 December to 31 December Only. Thank You. ';
            }
        }else {
            echo 'This month is not the month at the year. You are not permited to use this system now. You can use this system at the December. Thank you.';
        }
    }
    
    //This function will check email which is have into database or not
    public function checkEmail(){
        $value = $this->input->get('val');
        $query = $this->db->query("SELECT email FROM users WHERE email='$value'");
        foreach($query->result_array() as $row){
            $email = $row['email'];
        }
        if(!empty($email)){
            echo '<div class="row"><div class="alert alert-danger">
                    <strong>Notic: </strong> This email <b>'.$value.'</b> have in our database from past. One email account you can not use for two time.
                </div></div>';
        }
    }
    
}
