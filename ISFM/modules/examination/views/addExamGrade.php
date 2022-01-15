<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('exa_add_grade'); ?> <small></small>
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
                        <?php echo lang('exa_add_grade'); ?>
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
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php echo lang('exa_gtgi'); ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('examination/addExamGread', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('exa_gra_name'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_gra_name_plase'); ?>" name="gradeName" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('exa_gra_point'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_gra_point_plase'); ?>" name="gradePoint" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('exa_grad_nf'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_gnasnl81s'); ?>" name="numberFrom" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('exa_gra_nt'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_gra_nt_plase'); ?>" name="nameTo" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue" name="submit" value="Submit"><?php echo lang('exa_add_grbutt'); ?></button>
                                <button class="btn purple" type="reset"><?php echo lang('refresh'); ?></button>
                                <button type="button" class="btn default" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
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
