<!-- BEGIN PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_re_aua'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_manage_user'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_re_aua'); ?>
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
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('con_reset_access'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="col-md-12 margin-bottom-15 ">
                            <div class="col-md-12">
                                <br>
                                <?php
                                if (!empty($message)) {
                                    echo $message;
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-4 col-md-offset-4 margin-top-20">
                                    <a class="btn default btn-block accessButton" href="index.php/configuration/resetRole"  onclick="javascript:return confirm('<?php echo lang('con_confirm_udaset'); ?>')"  value="Default"><?php echo lang('con_udaset'); ?></a>
                                </div>
                            </div>
                        </div><div class="clearfix"></div>
                        <div id="ajaxResult"><!--Ajax Start-->
                        </div><!--Ajax End-->
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
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
    
    function accessSet(str) {
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/configuration/ajaxAccessSetup?usertype=" + str, true);
        xmlhttp.send();
    }
</script>
