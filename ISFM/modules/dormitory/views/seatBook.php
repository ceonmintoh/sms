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
                    <?php echo lang('dor_sb'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_dormat'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_dorme_reop'); ?>
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
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('Give the student Informations'); ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        $id = $this->input->get('id');
                        echo form_open("dormitory/seatBooking?id=$id", $form_attributs);
                        ?><br>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo lang('dor_stuid'); ?></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" onkeyup="studentInfo(this.value)" name="studentId">
                            </div>
                        </div>
                        <div id="resultStudentInfo">
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-send"></i> &nbsp;&nbsp;<?php echo lang('dor_sbnb'); ?> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXTRAS PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script>
                                        function studentInfo(str) {
                                            var xmlhttp;
                                            if (str.length === 0) {
                                                document.getElementById("resultStudentInfo").innerHTML = "";
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
                                                    document.getElementById("resultStudentInfo").innerHTML = xmlhttp.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "index.php/dormitory/ajaxStudentInfo?q=" + str, true);
                                            xmlhttp.send();
                                        }
</script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>


