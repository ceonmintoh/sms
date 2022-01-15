<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('clas_add_routine'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_routin'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_set_time'); ?>
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
                            <i class="fa fa-bars"></i> <?php echo lang('clas_rout_for'); ?> <?php echo $classTile; ?>
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
                        echo form_open('sclass/addClassRoutin', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="alert alert-info marginBottomNone">
                                    <div class="form-group marginBottomNone">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="class" value="<?php echo $class_id; ?>">
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="day" data-validation="required" data-validation-error-msg="">
                                                        <option value=""><?php echo lang('clas_select_day'); ?></option>
                                                        <?php foreach ($day as $row) { ?>
                                                            <option class="<?php echo $row['status']; ?>"><?php echo $row['day_name']; ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="subject" data-validation="required" data-validation-error-msg="">
                                                        <option value=""><?php echo lang('clas_select_subject'); ?></option>
                                                        <?php foreach ($subject as $row1) { ?>
                                                            <option><?php echo $row1['subject_title'] ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="teacher" data-validation="required" data-validation-error-msg="">
                                                        <option value=""><?php echo lang('clas_select_teacher'); ?></option>
                                                        <?php foreach ($teacher as $row2) { ?>
                                                            <option><?php echo $row2['fullname'] ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('clas_start_time_plas'); ?>" name="startTime" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('clas_end_time_plas'); ?>" name="endTime" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('clas_roon_no_plas'); ?>" name="roomNumber" data-validation="required" data-validation-error-msg="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid marginTopNone">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit2" value="Add Routine Subject"><?php echo lang('clas_add_button'); ?></button>
                                    <button class="btn default" type="reset"><?php echo lang('clas_add_button'); ?></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>

                        <div class="alert alert-warning">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <?php echo $classTile;?> <?php echo lang('clas_routine'); ?>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <?php
                                    foreach ($day as $row3) {
                                        $dayTitle = $row3['day_name'];
                                        $dayStatus = $row3['status'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-2 day <?php echo $dayStatus; ?>">
                                                <?php echo $dayTitle; ?>
                                                </div>
                                                <?php
                                                //$query = array();
                                                $query = $this->classmodel->getWhere('class_routine', 'day_title', $dayTitle, 'class_id', $class_id);
                                                foreach ($query as $row4) {
                                                    ?>
                                                    <div class="col-sm-2 subject">
                                                        <p><?php echo $row4['subject']; ?></p>
                                                        <p><?php echo $row4['subject_teacher']; ?></p>
                                                        <p class="pFontSize"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                        <p class="pFontSize">Rome: <?php echo $row4['room_number']; ?></p>
                                                    </div>
                                        <?php } ?>
                                            </div>
                                        </div>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate(); </script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>