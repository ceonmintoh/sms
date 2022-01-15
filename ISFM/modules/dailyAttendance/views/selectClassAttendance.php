<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('att_scfa'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stu_paren'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_attendance'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_daily_attend'); ?>
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
                <div class="tab-content">
                    <div id="tab_0" class="tab-pane active">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('att_scasfa'); ?>
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;">
                                    </a>
                                    <a class="reload" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <?php
                                $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                echo form_open('dailyAttendance/attendance', $form_attributs);
                                ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('att_class'); ?></label>
                                        <div class="col-md-4">
                                            <select name="class_title" onchange="attendanceClassSection(this.value)" class="form-control">
                                                <option value=""> <?php echo lang('select'); ?> </option>
                                                <?php foreach ($s_class as $row) { ?> 
                                                    <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="ajaxResult">
                                    </div>
                                    <div class="form-actions bottom fluid ">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn green" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('att_submit'); ?>&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>                  
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END CONTENT -->
    <script>
        jQuery(document).ready(function () {
            //here is auto reload after 1 second for time and date in the top
            jQuery(setInterval(function () {
                jQuery("#result").load("index.php/home/iceTime");
            }, 1000));
        });

        function attendanceClassSection(str) {
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
            xmlhttp.open("GET", "index.php/dailyAttendance/ajaxClassAttendanceSection?q=" + str, true);
            xmlhttp.send();
        }
    </script>

