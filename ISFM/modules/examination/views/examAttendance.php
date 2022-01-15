<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('exa_ta_ex_att'); ?> <small></small>
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
                        <?php echo lang('exa_ta_ex_att'); ?>
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo $examTitle . ' Subject [ ' . $examSubject . ' ] For "' . $classTitle . '"'; ?> <?php echo lang('exa_atten'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("examination/examAttendance?id=$examId", $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-2">
                                    <input type="text" placeholder="<?php echo lang('exa_rnd'); ?>" class="form-control" disabled="">  
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="<?php echo lang('exa_snd'); ?>" class="form-control" disabled="">  
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="<?php echo lang('exa_actd'); ?>" class="form-control" disabled="">  
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 1;
                        foreach ($students as $row) {
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-2">
                                        <input type="text" name="roll_<?php echo $i; ?>" value="<?php echo $row['roll_number'] ?>" class="form-control" readonly="">  
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="studentName_<?php echo $i; ?>" value="<?php echo $row['student_title']; ?>" class="form-control" readonly="">  
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="action_<?php echo $i; ?>" data-validation="required" data-validation-error-msg="">
                                            <option value=""><?php echo lang('select'); ?></option>
                                            <option value="P"><?php echo lang('exa_present'); ?></option>
                                            <option value="A"><?php echo lang('exa_absent'); ?></option>
                                        </select> 
                                    </div>

                                    <input type=hidden name="userId_<?php echo $i; ?>" value="<?php echo $row['user_id']; ?>">
                                    <input type="hidden" name="studentInfoId_<?php echo $i; ?>" value="<?php echo $row['student_id'] ?>">
                                    <input type=hidden name="class_id" value="<?php echo $row['class_id']; ?>">
                                    <input type="hidden" name="section_<?php echo $i; ?>" value="<?php echo $row['section'] ?>">
                                    <input type=hidden name="in_velu" value="<?php echo $i; ?>">
                                </div>
                            </div>
                            <?php $i++; } ?>
                            <div class="form-actions fluid">
                                <div class="col-sm-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit" value="Submit"><?php echo lang('exa_com_atte'); ?></button>
                                    <button class="btn default" type="reset"><?php echo lang('refresh'); ?></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
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
