
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('sub_set_optional'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                    </li>
                    <li>
                        <?php echo lang('sub_subject'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_ass_opt_sub'); ?>
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
                <?php if (!empty($success)) {
                    echo $success;
                } ?>
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-book"></i> <?php echo lang('sub_gtsidsop'); ?> 
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
                        echo form_open('subjects/set_optional', $form_attributs);
                        ?>
                            <div class="form-body">
                                <?php if(!empty($message)){echo $message;} ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('sub_stu_id'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" onkeyup="studentInfo(this.value)" name="student_id" class="form-control" placeholder="<?php echo lang('sub_stu_id_plash'); ?>" data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div id="ajaxResult"></div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Add Subject"><?php echo lang('sub_addsub_but'); ?></button>
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
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate(); </script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });

    function studentInfo(str) {
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
        };
        xmlhttp.open("GET", "index.php/subjects/studentInfoById?q=" + str, true);
        xmlhttp.send();
    }
    
    function optional_subject(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajax_result2").innerHTML = "";
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
                document.getElementById("ajax_result2").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/subjects/optional_subject?c_id=" + str, true);
        xmlhttp.send();
    }
</script>
