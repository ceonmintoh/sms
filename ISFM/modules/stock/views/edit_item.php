<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
                    <?php echo lang('sto_eiv'); ?><small></small>
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
                        <?php echo lang('header_inve_item'); ?>
                    </li>
                    <li>
                        <?php echo lang('sto_ei'); ?>
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
                            <?php echo lang('sto_eii'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("stock/edit_item", $form_attributs);
                        foreach ($singel_item as $row3) {
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('sto_vendor'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <select onchange="classStuAndPar(this.value)" name="vendor_id" class="form-control select2me"  data-validation="required" data-validation-error-msg="<?php echo lang('sto_vrm'); ?>">
                                                <option value="<?php echo $row3['vendor_id']; ?>"><?php echo $this->stockmodel->vendoe_title($row3['vendor_id']); ?></option>
                                                <?php foreach ($vendors as $row) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['company_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> <?php echo lang('sto_category'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-cubes"></i>
                                                </span>
                                                <select name="category" class="form-control select2me" data-validation="required" data-validation-error-msg="<?php echo lang('sto_cem'); ?>">
                                                    <option value="<?php echo $row3['category']; ?>"><?php echo $this->stockmodel->category_title($row3['category']); ?></option>
                                                    <?php foreach ($category as $row1) { ?>
                                                        <option value="<?php echo $row1['id']; ?>"><?php echo $row1['category_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_ii'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="item" value="<?php echo $row3['item']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_gtiii'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_q'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input id="quantity" onkeyup="price2(this.value)" type="text" value="<?php echo $row3['quantity']; ?>" class="form-control" name="quantity" data-validation="required" data-validation-error-msg="<?php echo lang('sto_qem'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_rate'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input id="rate" type="text" onkeyup="price(this.value)" value="<?php echo $row3['rate']; ?>" class="form-control" name="rate" data-validation="required" data-validation-error-msg="<?php echo lang('sto_ipem'); ?>">
                                    </div>
                                </div>
                                <div id="ajaxResult">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_dis'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-6">
                                        <input type="text" onkeyup="final_price(this.value)" value="<?php echo $row3['discount']; ?>" class="form-control" name="discount">
                                    </div>
                                </div>
                                <div id="ajaxResult2">
                                </div>
                                <input type="hidden" name="item_id" value="<?php echo $row3['id']; ?>">
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
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
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
    function price(str) {
        var xmlhttp;
        var sel = document.getElementById("quantity").value;
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
        xmlhttp.open("GET", "index.php/stock/ajax_price?q=" + str + "&g=" + sel, true);
        xmlhttp.send();
    }
    function price2(str) {
        var xmlhttp;
        var sel = document.getElementById("rate").value;
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
        xmlhttp.open("GET", "index.php/stock/ajax_price?q=" + str + "&g=" + sel, true);
        xmlhttp.send();
    }
    function final_price(str) {
        var xmlhttp;
        var sel = document.getElementById("total").value;
        if (str.length === 0) {
            document.getElementById("ajaxResult2").innerHTML = "";
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
                document.getElementById("ajaxResult2").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/stock/ajax_final_price?q=" + str + "&g=" + sel, true);
        xmlhttp.send();
    }
</script>