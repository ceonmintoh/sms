<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Stock extends CI_Controller {

    /**
     * This controller is used for managing store in the school
     * 
     * Maps to the following URL
     * 		http://example.com/index.php/Notice
     * 	- or -  
     * 		http://example.com/index.php/notice/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->model('stockmodel');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    //This function will add vendore and show the vendors list
    public function vendors() {
        if ($this->input->post('submit', TRUE)) {
            $Info = array(
                'company_name' => $this->db->escape_like_str($this->input->post('coname', TRUE)),
                'company_phone' => $this->db->escape_like_str($this->input->post('cophone', TRUE)),
                'company_email' => $this->db->escape_like_str($this->input->post('coemail', TRUE)),
                'country' => $this->db->escape_like_str($this->input->post('country', TRUE)),
                'state' => $this->db->escape_like_str($this->input->post('state', TRUE)),
                'city' => $this->db->escape_like_str($this->input->post('city', TRUE)),
                'cp_name' => $this->db->escape_like_str($this->input->post('cpname', TRUE)),
                'cp_address' => $this->db->escape_like_str($this->input->post('cpaddress', TRUE)),
                'cp_phone' => $this->db->escape_like_str($this->input->post('cpphone', TRUE)),
                'bank_name' => $this->db->escape_like_str($this->input->post('bankname', TRUE)),
                'branch_name' => $this->db->escape_like_str($this->input->post('branchname', TRUE)),
                'account_no' => $this->db->escape_like_str($this->input->post('accountno', TRUE)),
                'ifsc_code' => $this->db->escape_like_str($this->input->post('ifsccode', TRUE)),
            );
            if ($this->db->insert('vendors', $Info)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_1').'
							</div>';
                $data['vendors'] = $this->stockmodel->vendors();
                $this->load->view('temp/header');
                $this->load->view('vendors', $data);
                $this->load->view('temp/footer');
            } else {
                $data['message'] = '<div class="alert alert-danger alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_2').'</strong> '.lang('stoc_3').'
							</div>';
                $data['vendors'] = $this->stockmodel->vendors();
                $this->load->view('temp/header');
                $this->load->view('vendors', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['vendors'] = $this->stockmodel->vendors();
            $this->load->view('temp/header');
            $this->load->view('vendors', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will show a vendors details 
    public function vendordetails() {
        $v_id = $this->input->get('id');
        $data['ven_details'] = $this->stockmodel->vendordetails($v_id);
        $data['ven_pol'] = $this->stockmodel->ven_pol($v_id);
        $this->load->view('temp/header');
        $this->load->view('vendor_details', $data);
        $this->load->view('temp/footer');
    }
    //This function will edit vendors informations
    public function vendoredit() {
        if ($this->input->post('submit', TRUE)) {
            $Info = array(
                'company_name' => $this->db->escape_like_str($this->input->post('coname', TRUE)),
                'company_phone' => $this->db->escape_like_str($this->input->post('cophone', TRUE)),
                'company_email' => $this->db->escape_like_str($this->input->post('coemail', TRUE)),
                'country' => $this->db->escape_like_str($this->input->post('country', TRUE)),
                'state' => $this->db->escape_like_str($this->input->post('state', TRUE)),
                'city' => $this->db->escape_like_str($this->input->post('city', TRUE)),
                'cp_name' => $this->db->escape_like_str($this->input->post('cpname', TRUE)),
                'cp_address' => $this->db->escape_like_str($this->input->post('cpaddress', TRUE)),
                'cp_phone' => $this->db->escape_like_str($this->input->post('cpphone', TRUE)),
                'bank_name' => $this->db->escape_like_str($this->input->post('bankname', TRUE)),
                'branch_name' => $this->db->escape_like_str($this->input->post('branchname', TRUE)),
                'account_no' => $this->db->escape_like_str($this->input->post('accountno', TRUE)),
                'ifsc_code' => $this->db->escape_like_str($this->input->post('ifsccode', TRUE)),
            );
            $id = $this->input->post('vendor_id', TRUE);
            $this->db->where('id', $id);
            if ($this->db->update('vendors', $Info)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> V'.lang('stoc_4').'
							</div>';
                $data['vendors'] = $this->stockmodel->vendors();
                $this->load->view('temp/header');
                $this->load->view('vendors', $data);
                $this->load->view('temp/footer');
            } else {
                $data['message'] = '<div class="alert alert-danger alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_2').'</strong> '.lang('stoc_5').'
							</div>';
                $data['vendors'] = $this->stockmodel->vendors();
                $this->load->view('temp/header');
                $this->load->view('vendors', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $v_id = $this->input->get('id');
            $data['single_ven'] = $this->stockmodel->singel_vendors($v_id);
            $this->load->view('temp/header');
            $this->load->view('edit_vendor', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will delete vendore
    public function deletevendors() {
        $id = $this->input->get('id');
        if ($this->db->delete('vendors', array('id' => $id))) {
            $data['message'] = '<div class="alert alert-danger alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_6').'
							</div>';
            $data['vendors'] = $this->stockmodel->vendors();
            $this->load->view('temp/header');
            $this->load->view('vendors', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will add inventory category and show all the category
    public function inven_category() {
        if ($this->input->post('submit', TRUE)) {
            $table_data = array(
                'category_name' => $this->db->escape_like_str($this->input->post('category', TRUE)),
                'details' => $this->db->escape_like_str($this->input->post('description', TRUE)),
            );
            if ($this->db->insert('inven_category', $table_data)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_7').'
							</div>';
                $data['category'] = $this->stockmodel->inv_category();
                $this->load->view('temp/header');
                $this->load->view('inven_category', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['category'] = $this->stockmodel->inv_category();
            $this->load->view('temp/header');
            $this->load->view('inven_category', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will delete inventory category
    public function delete_category() {
        $id = $this->input->get('id');
        if ($this->db->delete('inven_category', array('id' => $id))) {
            $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_8').'
							</div>';
            $data['category'] = $this->stockmodel->inv_category();
            $this->load->view('temp/header');
            $this->load->view('inven_category', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will add inventory item and show all item 
    public function inv_item() {
        if ($this->input->post('submit', TRUE)) {
            $quantity = $this->input->post('quantity', TRUE);
            $rate = $this->input->post('rate', TRUE);
            $total_price = $quantity * $rate;
            $discount = $this->input->post('discount', TRUE);
            $finale_price = $total_price - $discount;
            $table_data = array(
                'vendor_id' => $this->db->escape_like_str($this->input->post('vendor_id', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('category', TRUE)),
                'item' => $this->db->escape_like_str($this->input->post('item', TRUE)),
                'quantity' => $this->db->escape_like_str($quantity),
                'rate' => $this->db->escape_like_str($rate),
                'discount' => $this->db->escape_like_str($discount),
                'total_rate' => $this->db->escape_like_str($finale_price),
            );
            if ($this->db->insert('inve_item', $table_data)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_9').'
							</div>';
                $data['inv_item'] = $this->stockmodel->inv_item();
                $data['vendors'] = $this->stockmodel->vendors();
                $data['category'] = $this->stockmodel->inv_category();
                $this->load->view('temp/header');
                $this->load->view('inv_item', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['inv_item'] = $this->stockmodel->inv_item();
            $data['vendors'] = $this->stockmodel->vendors();
            $data['category'] = $this->stockmodel->inv_category();
            $this->load->view('temp/header');
            $this->load->view('inv_item', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will show inventory total price
    public function ajax_price() {
        $rate = $this->input->get('q');
        $quantity = $this->input->get('g');
        echo '<div class="form-group">
                <label class="col-md-3 control-label">'.lang('stoc_10').'  <span class="requiredStar"> </span></label>
                <div class="col-md-6">
                    <input id="total" type="text" class="form-control" name="total" value="' . $rate * $quantity . '" readonly>
                </div>
            </div>';
    }
    //This function will show inventory's final price 
    public function ajax_final_price() {
        $discount = $this->input->get('q');
        $total = $this->input->get('g');
        $amount = $total - $discount;
        echo '<div class="form-group">
                <label class="col-md-3 control-label">'.lang('stoc_11').' <span class="requiredStar"> </span></label>
                <div class="col-md-6">
                    <input id="total" type="text" class="form-control" name="total" value="' . $amount . '" readonly>
                </div>
            </div>';
    }
    //This function will edit item information
    public function edit_item() {
        if ($this->input->post('submit', TRUE)) {
            $quantity = $this->input->post('quantity', TRUE);
            $rate = $this->input->post('rate', TRUE);
            $total_price = $quantity * $rate;
            $discount = $this->input->post('discount', TRUE);
            $finale_price = $total_price - $discount;
            $table_data = array(
                'vendor_id' => $this->db->escape_like_str($this->input->post('vendor_id', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('category', TRUE)),
                'item' => $this->db->escape_like_str($this->input->post('item', TRUE)),
                'quantity' => $this->db->escape_like_str($quantity),
                'rate' => $this->db->escape_like_str($rate),
                'discount' => $this->db->escape_like_str($discount),
                'total_rate' => $this->db->escape_like_str($finale_price),
            );
            $id = $this->input->post('item_id', TRUE);
            $this->db->where('id', $id);
            if ($this->db->update('inve_item', $table_data)) {
                $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_12').'
							</div>';
                $data['inv_item'] = $this->stockmodel->inv_item();
                $data['vendors'] = $this->stockmodel->vendors();
                $data['category'] = $this->stockmodel->inv_category();
                $this->load->view('temp/header');
                $this->load->view('inv_item', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $id = $this->input->get('id');
            $data['singel_item'] = $this->stockmodel->item_details($id);
            $data['vendors'] = $this->stockmodel->vendors();
            $data['category'] = $this->stockmodel->inv_category();
            $this->load->view('temp/header');
            $this->load->view('edit_item', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will delete invemtory item
    public function delete_item() {
        $id = $this->input->get('id');
        if ($this->db->delete('inve_item', array('id' => $id))) {
            $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> '.lang('stoc_13').'
							</div>';
            $data['inv_item'] = $this->stockmodel->inv_item();
            $data['vendors'] = $this->stockmodel->vendors();
            $data['category'] = $this->stockmodel->inv_category();
            $this->load->view('temp/header');
            $this->load->view('inv_item', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will issu inventory items
    public function issu_item() {
        if ($this->input->post('submit', TRUE)) {
            $day = date("m/d/Y");
            $date = strtotime($day);
            if ($this->input->post('receiver_2', TRUE)) {
                $user_id = $this->input->post('receiver_2', TRUE);
            } else {
                $user_id = $this->input->post('receiver', TRUE);
            }
            $item_id = $this->input->post('item', TRUE);
            $quantity = $this->input->post('quantity', TRUE);
            $rate = $this->input->post('purchase_rate', TRUE);
            $total_price = $quantity * $rate;
            $table_data = array(
                'date' => $this->db->escape_like_str($date),
                'user_type' => $this->db->escape_like_str($this->input->post('user_type', TRUE)),
                'user_id' => $this->db->escape_like_str($user_id),
                'item_id' => $this->db->escape_like_str($item_id),
                'quantity' => $this->db->escape_like_str($quantity),
                'rate' => $this->db->escape_like_str($rate),
                'total_price' => $this->db->escape_like_str($total_price),
                'status' => $this->db->escape_like_str($this->input->post('pay_status', TRUE)),
            );
            $stock_quan = $this->input->post('stock_quan', TRUE);
            $final_stock = $stock_quan - $quantity;
            $item_data = array(
                'quantity' => $this->db->escape_like_str($final_stock)
            );
            if ($this->db->insert('issu_item', $table_data)) {
                $this->db->where('id', $item_id);
                if ($this->db->update('inve_item', $item_data)) {
                    $data['message'] = '<div class="alert alert-success alert-dismissable">
                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                                    <strong>'.lang('stoc_wow').'</strong> '.lang('stoc_14').'
                                                            </div>';
                    $data['item'] = $this->stockmodel->inv_item();
                    $this->load->view('temp/header');
                    $this->load->view('issu_item', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            $data['item'] = $this->stockmodel->inv_item();
            $data['issu_item'] = $this->stockmodel->issu_item();
            $this->load->view('temp/header');
            $this->load->view('issu_item', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will return all receiver whene give/select any user group.
    public function ajaxSelectReciver() {
        $group = $this->input->get('q');
        if ($group == 'Student') {
            //If the student's groun was selected thene work here
            $query = $this->common->getAllData('class');
            foreach ($query as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['class_title'] . ' </option>';
            }
        } elseif ($group == 'Employee') {
            //If the teacher's groun was selected thene work here
            $query = $this->stockmodel->employe();
            foreach ($query as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
            }
        } elseif ($group == 'Parents') {
            //If the parent's groun was selected thene work here
            $query = $this->common->getAllData('class');
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
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['student_id'] . ' - ' . $row['student_nam'] . ' </option>';
            }
        } elseif ($group == 'Parents') {
            $query = $this->common->getWhere('parents_info', 'class_id', $recInfo);
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['parents_name'] . ' - StudentID : ' . $row['student_id'] . ' </option>';
            }
        }
    }
    //This function will give selected item price 
    public function item_select() {
        $id = $this->input->get('q');
        $query = $this->db->query("SELECT quantity,rate FROM inve_item WHERE id=$id");
        foreach ($query->result_array() as $row) {
            $quantity = $row['quantity'];
            $rate = $row['rate'];
        }
        echo '<div class="form-group">
                    <label class="col-md-3 control-label">'.lang('stoc_15').'  <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="stock_quan" data-validation="required" value="' . $quantity . '" readonly data-validation-error-msg="Give inventory item information.">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">'.lang('stoc_16').'  <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="purchase_rate" value="' . $rate . '" readonly  data-validation="required" data-validation-error-msg="Give inventory item information.">
                    </div>
                </div>';
    }
    public function edit_issue() {
        if ($this->input->post('submit', TRUE)) {
            if ($this->input->post('receiver_2', TRUE)) {
                $user_id = $this->input->post('receiver_2', TRUE);
            } else {
                $user_id = $this->input->post('receiver', TRUE);
            }
            $id = $this->input->post('issue_id', TRUE);
            if ($this->input->post('prev_item_id', TRUE) == $this->input->post('item', TRUE)) {
                $item_id = $this->input->post('prev_item_id', TRUE);
                $pre_stock = $this->stockmodel->item_stock($item_id);
                if ($this->input->post('quantity', TRUE) < $this->input->post('prev_quantity', TRUE)) {
                    $quantity_dif = $this->input->post('prev_quantity', TRUE) - $this->input->post('quantity', TRUE);
                    $quantity = $this->input->post('quantity', TRUE);
                    $rate = $this->input->post('prev_rate', TRUE);
                    $total_price = $quantity * $rate;
                    $stock = $pre_stock + $quantity_dif;
                } elseif ($this->input->post('quantity', TRUE) > $this->input->post('prev_quantity', TRUE)) {
                    $quantity_dif = $this->input->post('quantity', TRUE) - $this->input->post('prev_quantity', TRUE);
                    $quantity = $this->input->post('quantity', TRUE);
                    $rate = $this->input->post('prev_rate', TRUE);
                    $total_price = $quantity * $rate;
                    $stock = $pre_stock - $quantity_dif;
                } else {
                    $quantity = $this->input->post('quantity', TRUE);
                    $rate = $this->input->post('prev_rate', TRUE);
                    $total_price = $quantity * $rate;
                    $stock = $pre_stock;
                }
            } else {
                $pre_item_id = $this->input->post('prev_item_id', TRUE);
                $item_id = $this->input->post('item', TRUE);
                $pre_stock = $this->stockmodel->item_stock($pre_item_id);
                $pre_quantity = $this->input->post('prev_quantity', TRUE);
                $pre_stock = $pre_quantity + $pre_stock;
                $pre_item_data = array(
                    'quantity' => $this->db->escape_like_str($pre_stock)
                );
                $this->db->where('id', $pre_item_id);
                $this->db->update('inve_item', $pre_item_data);
                $quantity = $this->input->post('quantity', TRUE);
                $rate = $this->input->post('purchase_rate', TRUE);
                $total_price = $quantity * $rate;
                $stock_quan = $this->input->post('stock_quan', TRUE);
                $stock = $stock_quan - $quantity;
            }
            $table_data = array(
                'user_type' => $this->db->escape_like_str($this->input->post('user_type', TRUE)),
                'user_id' => $this->db->escape_like_str($user_id),
                'item_id' => $this->db->escape_like_str($item_id),
                'quantity' => $this->db->escape_like_str($quantity),
                'rate' => $this->db->escape_like_str($rate),
                'total_price' => $this->db->escape_like_str($total_price),
                'status' => $this->db->escape_like_str($this->input->post('pay_status', TRUE)),
            );
            $item_data = array(
                'quantity' => $this->db->escape_like_str($stock)
            );
            $this->db->where('id', $id);
            if ($this->db->update('issu_item', $table_data)) {
                $this->db->where('id', $item_id);
                if ($this->db->update('inve_item', $item_data)) {
                    $data['message'] = '<div class="alert alert-success alert-dismissable">
                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                                    <strong>'.lang('stoc_wow').'</strong> Inventory item Issued information updated successfully.
                                                            </div>';
                    $data['item'] = $this->stockmodel->inv_item();
                    $data['issu_item'] = $this->stockmodel->issu_item();
                    $this->load->view('temp/header');
                    $this->load->view('issu_item', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            $id = $this->input->get('id');
            $data['item'] = $this->stockmodel->inv_item();
            $data['sin_issu_item'] = $this->stockmodel->single_issu_item($id);
            $this->load->view('temp/header');
            $this->load->view('edit_issue', $data);
            $this->load->view('temp/footer');
        }
    }
    //This function will delete invemtory issued item
    public function delete_issue() {
        $id = $this->input->get('id');
        if ($this->db->delete('issu_item', array('id' => $id))) {
            $data['message'] = '<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>'.lang('stoc_wow').'</strong> Inventory Issued item deleted successfully.
							</div>';
            $data['item'] = $this->stockmodel->inv_item();
            $data['issu_item'] = $this->stockmodel->issu_item();
            $this->load->view('temp/header');
            $this->load->view('issu_item', $data);
            $this->load->view('temp/footer');
        }
    }
}
