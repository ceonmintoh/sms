<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('lib_biar'); ?> <small></small>
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
                        <?php echo lang('header_iss_return'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-6 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('lib_ib'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('library/issue', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($message_1)) {
                                echo $message_1;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('lib_sb'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" onkeyup="ajax_issue_book(this.value)" name="book_id" placeholder="<?php echo lang('lib_bidn'); ?>" data-validation="required" data-validation-error-msg="<?php echo lang('lib_sbrm'); ?>">
                                </div>
                            </div>
                            <div id='ajaxResult' class="col-md-12"></div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('lib_retd'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-5">
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                        <input type="text" class="form-control" name="renue_date" readonly data-validation="required" data-validation-error-msg="<?php echo lang('lib_retdrm'); ?>">
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('lib_selemem'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" onkeyup="member_info(this.value)" name="member_id" placeholder="<?php echo lang('lib_lmidn'); ?>" data-validation="required" data-validation-error-msg="<?php echo lang('lib_selememrm'); ?>">
                                </div>
                            </div>
                            <div id='ajaxResult3' class="col-md-12"></div>
                            <div class='clearfix'></div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-7">
                                <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('lib_issubook'); ?></button>
                                <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>

            <div class="col-md-6 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box purple ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('lib_rebook'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('library/return_book', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($message_2)) {
                                echo $message_2;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('lib_sb'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" onkeyup="ajax_return_book(this.value)" name="book_id" placeholder="<?php echo lang('lib_bidn'); ?>">
                                </div>
                            </div>
                            <div id='ajaxResult2' class="col-md-12">

                            </div>
                            <div class='clearfix'></div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-7">
                                <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('lib_recom'); ?></button>
                                <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
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
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>

<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    });

    function ajax_issue_book(str) {
        var xmlhttp;
        if (str.length == 0) {
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
        }
        xmlhttp.open("GET", "index.php/library/ajax_issue_book?bon=" + str, true);
        xmlhttp.send();
    }
    function ajax_return_book(str) {
        var xmlhttp;
        if (str.length == 0) {
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
        }
        xmlhttp.open("GET", "index.php/library/ajax_return_book?rbid=" + str, true);
        xmlhttp.send();
    }

    function member_info(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult3").innerHTML = "";
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
                document.getElementById("ajaxResult3").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/library/ajax_member_info?lmi=" + str, true);
        xmlhttp.send();
    }
</script>
