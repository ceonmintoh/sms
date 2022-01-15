<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('exa_scfmr'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_academic'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_examina'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_sub_result'); ?>
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
                            <i class="fa fa-bars"></i> <?php echo lang('exa_scfmr'); ?>
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
                        echo form_open('examination/makingResult', $form_attributs);
                        ?>
                            <?php $user = $this->ion_auth->user()->row(); ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">  <?php echo lang('exa_class'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select onchange="selectClass(this.value)" class="form-control" name="class_id" data-validation="required" data-validation-error-msg="">
                                            <option value=""><?php echo lang('select');?></option>
                                            <?php foreach ($s_class as $row) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['class_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div  id="ajaxResult"></div>
                                <input type="hidden" name="teacherUserId" value="<?php echo $user->id; ?>">
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit" value="Submit"><?php echo lang('exa_subm_res'); ?></button>
                                    <button class="btn default" type="reset"><?php echo lang('refresh'); ?></button>
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
    function selectClass(str) {
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
        xmlhttp.open("GET", "index.php/examination/ajaxClassResult?q=" + str, true);
        xmlhttp.send();
    }
    function examSubject(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult_2").innerHTML = "";
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
                document.getElementById("ajaxResult_2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/examination/ajaxExamSubject?erid=" + str, true);
        xmlhttp.send();
    }
    function examSubjectTitle(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult_3").innerHTML = "";
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
                document.getElementById("ajaxResult_3").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php/examination/ajaxExamSubTitle?erid=" + str, true);
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
