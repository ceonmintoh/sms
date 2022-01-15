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
                    <?php echo lang('con_edit_emp_sala'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_configu'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_employee_salary'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_edit_emp_sala'); ?>
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
                            <?php echo lang('con_sala_set_che_u'); ?>
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
                        echo form_open_multipart('configuration/editEmploySalary', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php foreach ($sInfo as $row) { ?>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo lang('con_employee'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select onchange="eployInfo(this.value)" class="form-control" name="emplyId" data-validation="required" data-validation-error-msg="<?php echo lang('con_yhtsao'); ?>" readonly>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['employe_title'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="employe_title" value="<?php echo $row['employe_title'] ?>">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo lang('con_job_post'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="job_post" data-validation="required" data-validation-error-msg="<?php echo lang('con_yhtsao'); ?>">
                                            <option value="<?php echo $row['job_post'] ?>"><?php echo $row['job_post'] ?></option>
                                            <option value="Headmaster"> <?php echo lang('headmaster'); ?> </option>
                                            <option value="Assistant Headmaster"> <?php echo lang('asis_headmaster'); ?></option>
                                            <option value="Senior Teacher"> <?php echo lang('senior_teacher'); ?></option>
                                            <option value="Teacher"> <?php echo lang('teacher'); ?> </option>
                                            <option value="Accountant"> <?php echo lang('accountant'); ?> </option>
                                            <option value="Librarian"> <?php echo lang('librarian'); ?> </option>
                                            <option value="Driver"> <?php echo lang('driver'); ?> </option>
                                            <option value="Clerk"> <?php echo lang('clerk'); ?> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo lang('con_basic_pay'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['basic'] ?>" name="basic_pay" data-validation="required" data-validation-error-msg="<?php echo lang('con_ple_gtbsa'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> <?php echo lang('con_hou_rent'); ?> <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="For 1 month" value="<?php echo $row['treatment'] ?>" name="treatment">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo lang('con_increased'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['increased'] ?>" name="increased">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo lang('con_other'); ?> <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['others'] ?>" name="others">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Save"><?php echo lang('con_save_salary_set'); ?></button>
                                <button type="reset" class="btn purple"><?php echo lang('refresh'); ?></button>
                                <button type="reset" class="btn red" onclick="javascript:history.back()"> <i class="fa fa-mail-reply-all"></i> <?php echo lang('back'); ?></button>
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
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>