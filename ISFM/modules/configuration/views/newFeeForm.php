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
                    <?php echo lang('con_new_class_fee'); ?> <small></small>
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
                        <?php echo lang('con_set_st_fee'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_new_class_fee'); ?>
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
                            <?php echo lang('con_givetafafam'); ?>
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
                        echo form_open_multipart('configuration/configClassFee', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_class'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <select class="form-control" name="Class_title">
                                        <option <?php
                                        if (!empty($row['Class_title'])) {
                                            echo 'selected';
                                        }
                                        ?>><?php
                                                if (!empty($row['Class_title'])) {
                                                    echo $row['Class_title'];
                                                } else {
                                                    echo 'Select one';
                                                }
                                                ?></option>
                                        <?php foreach ($classTile as $row1) { ?>
                                            <option value="<?php echo $row1['class_title']; ?>"><?php echo $row1['class_title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_n_af'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="admission" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"><?php echo lang('con_add_feefot'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_re_adtc'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="re_admission" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"><?php echo lang('con_read_feot'); ?>  </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_tution_fee'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="For 1 month" value="" name="tuition" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"> <?php echo lang('con_for_vm'); ?> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_contri'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="contributions" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"> <?php echo lang('con_f2tioy'); ?> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_game'); ?> <span class="requiredStar">  </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - -" value="" name="game" data-validation="" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"> <?php echo lang('con_fotiay'); ?> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_lmf'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="For 1 year" value="" name="library_member_fee" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                    <span class="help-block"><?php echo lang('con_mffoy'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_la_ca'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="For 1 year" value="" name="laboratory_charges" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_rece_book'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="receipt" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_sgg'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="square_girls_guide" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_electri'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="electricity" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_por_fund'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="poor_fund" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_deve_che'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="development_charge" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_religion'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="religion" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_exam_fee'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="For one Exam (1st, 2nd, 3rd examination fee) " value="" name="examination_fee" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_twf'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="- - - - - - " value="" name="teacher_welfare_fund" data-validation="required" data-validation-error-msg="<?php echo lang('con_pl_gta'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Save"><?php echo lang('con_sav_f_se'); ?></button>
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