<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_indivi_ur'); ?> <small></small>
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
                        <?php echo lang('con_ur_ro_set'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_gurs'); ?>
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
                            <?php echo lang('con_sel_user_gro'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="col-md-12">
                            <br>
                            <?php if (!empty($message)) { echo $message; }  ?>
                        </div>
                        <?php
                        $form_attributs = array("class" => "form-horizontal", "role" => "form");
                        echo form_open("configuration/groupRole", $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('con_sele_group'); ?></label>
                                <div class="col-md-6">
                                    <select id="reseverGroup" onchange="selectReceiver(this.value)" class="form-control" name="group" required>
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <?php foreach ($group as $row) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>                                 
                            <div id="ajaxResult"></div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Save"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
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
            xmlhttp.open("GET", "index.php/configuration/ajaxGroupRole?usGro=" + str, true);
            xmlhttp.send();
        }
    </script>