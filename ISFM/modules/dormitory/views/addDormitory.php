<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('dor_ad'); ?> <small></small>
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
                        <?php echo lang('header_add_dormito'); ?>
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
                            <?php echo lang('dor_gtndi'); ?> 
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
                        echo form_open('dormitory/addDormitory', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('dor_dn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="dormitoryName" data-validation="required" data-validation-error-msg="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('dor_df'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="dormitoryFor" class="form-control" data-validation="required" data-validation-error-msg="">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <option value="Only for male"><?php echo lang('dor_ofm'); ?></option>
                                        <option value="Only for female"><?php echo lang('dor_off'); ?></option>
                                        <option value="Only for teachers (Male Teacher)"><?php echo lang('dor_oft'); ?></option>
                                        <option value="Only for madams (Female Teacher)"><?php echo lang('dor_ofm'); ?></option>
                                        <option value="None teaching staff"><?php echo lang('dor_nts'); ?></option>
                                        <option value="Open for all"><?php echo lang('dor_ofa'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('dor_ra'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" name="roomAmount" class="form-control" placeholder="<?php echo lang('dor_gtrahe'); ?>"  data-validation="required" data-validation-error-msg="">
                                    <span id="ajaxResult" class="classCodeCheck"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" name="submit" class="btn green" value="Add Class"><?php echo lang('dor_adb'); ?></button>
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
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>