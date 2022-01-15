<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!--Start page level style-->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('sto_eiii'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stor_manage'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_inve_issue'); ?>
                    </li>
                    <li>
                        <?php echo lang('sto_eiinfo'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <?php
                if (!empty($message)) {
                    echo '<br>' . $message;
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="portlet box purple margin-bottom-15">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('sto_eiii'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("stock/edit_issue", $form_attributs);
                        foreach ($sin_issu_item as $row1) {
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_ut'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select id="reseverGroup" onchange="selectReceiver(this.value)" class="form-control" name="user_type" data-validation="required">
                                            <option value="<?php echo $row1['user_type']; ?>"><?php echo $row1['user_type']; ?></option>
                                            <option value="Student"><?php echo lang('gr_student'); ?></option>
                                            <option value="Employee"><?php echo lang('sto_emp'); ?></option>
                                            <option value="Parents"><?php echo lang('gr_parents'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('sto_un'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-cubes"></i>
                                            </span>
                                            <select id="ajaxResult" onchange="classStuAndPar(this.value)" name="receiver" class="form-control select2me" data-placeholder="<?php echo lang('select'); ?>" data-validation="required">
                                                <option value="<?php echo $row1['user_id']; ?>"><?php echo $this->stockmodel->issued_user($row1['user_id']); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> <?php echo lang('sto_aopn'); ?><span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <select id="ajaxStuAndPar" name="receiver_2" class="form-control select2me" data-placeholder="<?php echo lang('select'); ?>">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('sto_ii'); ?></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <select name="item" onchange="item_select(this.value)" class="form-control select2me" data-placeholder="<?php echo lang(''); ?>Select..." data-validation="required">
                                                <option value="<?php echo $row1['item_id']; ?>"><?php echo $this->stockmodel->item_title($row1['item_id']); ?></option>
                                                <?php foreach ($item as $row) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['item']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="issue_id" value="<?php echo $row1['id']; ?>">
                                <input type="hidden" name="prev_item_id" value="<?php echo $row1['item_id']; ?>">
                                <div id="ajaxitem"></div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_q'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input id="quantity" onkeyup="price2(this.value)" value="<?php echo $row1['quantity']; ?>" type="text" class="form-control" name="quantity" data-validation="required" data-validation-error-msg="Please give item quantity.">
                                    </div>
                                </div>
                                <input type="hidden" name="prev_quantity" value="<?php echo $row1['quantity']; ?>">
                                <input type="hidden" name="prev_rate" value="<?php echo $row1['rate']; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> <?php echo lang('sto_ps'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <select id="ajaxStuAndPar" name="pay_status" class="form-control select2me" data-placeholder="Select..."  data-validation="required">
                                                <option value="<?php echo $row1['status']; ?>"><?php echo $row1['status']; ?></option>
                                                <option value="Cash"><?php echo lang('sto_cash'); ?></option>
                                                <option value="Check"><?php echo lang('sto_check'); ?></option>
                                                <option value="Card"><?php echo lang('sto_card'); ?></option>
                                                <option value="Due"><?php echo lang('sto_due'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="submit" value="submit"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });

    function selectReceiver(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("ajaxResult").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/stock/ajaxSelectReciver?q=" + str, true);
        xmlhttp.send();
    }


    function classStuAndPar(str) {
        var xmlhttp;
        var sel = document.getElementById("reseverGroup");
        var val = sel.options[sel.selectedIndex].text;
        if (str.length === 0) {
            document.getElementById("ajaxStuAndPar").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxStuAndPar").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/stock/ajaxClassStuAndPar?p=" + str + "&g=" + val, true);
        xmlhttp.send();
    }
    function item_select(str) {
        var xmlhttp;
        var sel = document.getElementById("quantity").value;
        if (str.length === 0) {
            document.getElementById("ajaxitem").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxitem").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/stock/item_select?q=" + str + "&g=" + sel, true);
        xmlhttp.send();
    }
</script>