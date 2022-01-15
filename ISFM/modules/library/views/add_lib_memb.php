<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN THEME STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                     <?php echo lang('lib_alm'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_library'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_add_libr_mem'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('lib_gtnmib'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('library/add_library_member', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_mt'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select onchange="member_info(this.value)" class="form-control" name="type" data-validation="required" data-validation-error-msg="You have to select member type first.">
                                            <option value=""><?php echo lang('select'); ?></option>
                                            <option value="Student"><?php echo lang('lib_stu'); ?></option>
                                            <option value="Employee"><?php echo lang('lib_emp'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_smem'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select id="ajaxResult" onchange="user_info(this.value)" class="form-control select2me" name="user_id" data-validation="required" data-validation-error-msg="<?php echo lang('lib_yhtsmtf'); ?>">
                                        </select>
                                    </div>
                                </div>
                                <div id="ajaxResult2">
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('lib_am'); ?> </button>
                                    <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
    function member_info(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/library/member_info?utp=" + str, true);
        xmlhttp.send();
    }
    function user_info(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult2").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/library/user_info?uid=" + str, true);
        xmlhttp.send();
    }
</script>
