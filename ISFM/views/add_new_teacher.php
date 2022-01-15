<!-- BEGIN PAGE LEVEL STYLES -->
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
                    <?php echo lang('tea_ant'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_teacher'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_a_nteac'); ?>
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
                            <?php echo lang('tea_gtifnt'); ?>
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
                        echo form_open_multipart('users/addTeacher', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($success)) {
                                echo $success;
                            }
                            ?>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_fn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_ln'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_fn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="father_name"  placeholder=""  data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_mn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mother_name"  placeholder=""  data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('tea_dob'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" name="birthdate" id="mask_date2" type="text"  data-validation="required" data-validation-error-msg="">
                                    <span class="help-block"><?php echo lang('tea_dformet'); ?> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_sex'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6 marginLeftSex">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios4" value="Male" data-validation="required" data-validation-error-msg=""><?php echo lang('tea_male'); ?></label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios5" value="Female" data-validation="required" data-validation-error-msg=""> <?php echo lang('tea_female'); ?> </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios6" value="Other" data-validation="required" data-validation-error-msg=""> <?php echo lang('tea_other'); ?> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_prea'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="present_address" rows="3"  data-validation="required" data-validation-error-msg=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_per_add'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="permanent_address" rows="3"  data-validation="required" data-validation-error-msg=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_pn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name="phoneCode" placeholder="+880"  data-validation="required" data-validation-error-msg="" value="<?php
                                    if (!empty($countryPhoneCode)) {
                                        echo $countryPhoneCode;
                                    }
                                    ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="phone" placeholder=""  data-validation="required" data-validation-error-msg="">
                                    <span class="help-block"><?php echo lang('tea_1600'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_email'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" onkeyup="checkEmail(this.value)" placeholder="demo@demo.com"name="email" placeholder=""  data-validation="required" data-validation-error-msg="">
                                    <div id="checkEmail" class="col-md-12"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('tea_pass'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder=""  data-validation="required" data-validation-error-msg="">
                                    <span class="help-block"><?php echo lang('tea_ph8_20'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_con_pass'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirm" placeholder="" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_pp'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select class="form-control" name="position" data-validation="required" data-validation-error-msg="You have to select anyone.">
                                        <option value=""><?php echo lang('select'); ?> </option>
                                        <option value="Headmaster"> <?php echo lang('tea_hm'); ?> </option>
                                        <option value="Assistant Headmaster"> <?php echo lang('tea_ahm'); ?> </option>
                                        <option value="Senior Teacher"> <?php echo lang('tea_st'); ?> </option>
                                        <option value="Teacher"> <?php echo lang('tea_teacher'); ?> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_in'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="indexNo" placeholder="" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_fs'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="facultiesSubject" placeholder="" data-validation="required" data-validation-error-msg="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_wh'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="workingHoure" class="form-control" data-validation="required" data-validation-error-msg="">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <option value="Part time"><?php echo lang('tea_pt'); ?></option>
                                        <option value="Full time"><?php echo lang('tea_ft'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_eq'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle"><?php echo lang('tea_dd'); ?></H4>
                                    <input class="form-control eduForm" name="dd_1" type="text" placeholder="" data-validation="required" data-validation-error-msg="">
                                    <input class="form-control eduForm" name="dd_2" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="dd_3" type="text" placeholder="" >
                                    <input class="form-control" name="dd_4" type="text" placeholder="" >
                                    <input class="form-control" name="dd_5" type="text" placeholder="" >
                                </div>
                                <div class="col-md-3">
                                    <H4 class="eduFormTitle"><?php echo lang('tea_scu'); ?></H4>
                                    <input class="form-control eduForm" name="scu_1" type="text" placeholder="" data-validation="required" data-validation-error-msg="">
                                    <input class="form-control eduForm" name="scu_2" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="scu_3" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="scu_4" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="scu_5" type="text" placeholder="" >
                                </div>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle"><?php echo lang('tea_result'); ?></H4>
                                    <input class="form-control eduForm" name="result_1" type="text" placeholder="" data-validation="required" data-validation-error-msg="">
                                    <input class="form-control eduForm" name="result_2" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="result_3" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="result_4" type="text" placeholder="" >
                                    <input class="form-control eduForm" name="result_5" type="text" placeholder="" >
                                </div>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle"><?php echo lang('tea_py'); ?></H4>
                                    <input class="form-control eduForm" name="paYear_1" type="text" placeholder="YYYY" data-validation="required" data-validation-error-msg="">
                                    <input class="form-control eduForm" name="paYear_2" type="text" placeholder="YYYY" >
                                    <input class="form-control eduForm" name="paYear_3" type="text" placeholder="YYYY" >
                                    <input class="form-control eduForm" name="paYear_4" type="text" placeholder="YYYY" >
                                    <input class="form-control eduForm" name="paYear_5" type="text" placeholder="YYYY" >
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="control-label col-md-3"><?php echo lang('tea_photo'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail uploadImagePreview">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"><?php echo lang('tea_si'); ?> </span>
                                                <span class="fileinput-exists"><?php echo lang('tea_change'); ?> </span>
                                                <input type="file" name="userfile" data-validation="required" data-validation-error-msg="">
                                            </span>
                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput"><?php echo lang('tea_remove'); ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success">
                                <strong><?php echo lang('tea_note'); ?> :</strong> <?php echo lang('tea_sadi'); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-9">
                                    <div class="checkbox-list">
                                        <label>
                                            <input name="cv" value="submited" type="checkbox"> <?php echo lang('tea_cv'); ?></label>
                                        <label>
                                            <input name="educational_certificat" value="submited" type="checkbox"> <?php echo lang('tea_ec'); ?> </label>
                                        <label>
                                            <input name="exc" value="submited" type="checkbox"> <?php echo lang('tea_exc'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('tea_sfi'); ?> <span class="requiredStar">  </span></label>
                                <div class="col-md-6">
                                    <input type="text" name="submited_info" class="form-control" placeholder="<?php echo lang('tea_fntaoi'); ?>" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="submit"><?php echo lang('tea_si'); ?></button>
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
<!-- BEGIN PAGE LEVEL script -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
            ComponentsFormTools.init();
        });
        function checkEmail(str) {
            var xmlhttp;
            if (str.length === 0) {
                document.getElementById("checkEmail").innerHTML = "";
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
                    document.getElementById("checkEmail").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "index.php/commonController/checkEmail?val=" + str, true);
            xmlhttp.send();
        }

    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
<script type="text/javascript">
    var RecaptchaOptions = {
        theme: 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };
</script>
<!-- END PAGE LEVEL script -->