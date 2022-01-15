<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Promotion <small>Students class auto promotion.</small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        
                    </li>
                    <li>
                        Promotion
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            Select Class For Yearly Promotion.
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
                        if(!empty($message)){
                            echo '<br><div class="col-md-12"><div class="alert alert-danger">
                                    <strong>Message </strong> '.$message.'
                            </div></div>';
                        }
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('sclass/promotion', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select onchange="classSection(this.value)" class="form-control" name="class" data-validation="required" data-validation-error-msg="This field is required field.">
                                            <option value="">Select one</option>
                                            <?php foreach ($classTile as $row) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['class_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div  id="ajaxResult">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Promotion Next Class <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="nextClass" data-validation="required" data-validation-error-msg="This field is required field.">
                                            <option value="">Select one</option>
                                            <?php foreach ($classTile as $row) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['class_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Select Next Year <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="nextYear" data-validation="required" data-validation-error-msg="This field is required field.">
                                            <option value="">Select Year</option>
                                            <?php for($y=date('Y'); $y<=2050; $y++) { ?>
                                                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue" name="submit" type="submit" value="Start">Start Promotion</button>
                                    <button class="btn default" type="reset">Cancel</button>
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
    function classSection(str) {
        var xmlhttp;
        if (str.length === 0) {
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
        xmlhttp.open("GET", "index.php/sclass/ajaxpromotion?q=" + str, true);
        xmlhttp.send();
    }
</script>

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>