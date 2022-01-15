<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTAINER -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('cal_edit_even'); ?>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i><?php echo lang('home');?>
                        
                    </li>
                    <li><?php echo lang('cal_calender'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('cal_edit_even'); ?>
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
                <!-- BEGIN PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php echo lang('cal_edit_even'); ?>
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
                        <?php $form_attributs = array('name'=>'myForm','class' => 'form-horizontal', 'role' => 'form','onsubmit'=>'return validateForm()');
                        echo form_open('home/edit_event', $form_attributs);
                        foreach ($event as $row){
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_title'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="title" size="10" value="<?php echo $row['title']; ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_start_date'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                            <input type="text" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" readonly data-validation="required" data-validation-error-msg="<?php echo lang('cal_p_s_d'); ?>">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"> <?php echo lang('cal_end_date'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                            <input type="text" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" readonly data-validation="required" data-validation-error-msg="<?php echo lang('cal_p_e_d'); ?>">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('cal_event_color'); ?></label>
                                        <div class="col-md-9">
                                                <div class="radio-list">
                    <label class="radio-inline e_yellow">
                    <input type="radio" name="color" id="optionsRadios25" value="yellow" <?php if($row['color'] == 'yellow'){echo 'checked';} ?>> <?php echo lang('cal_yello'); ?> </label>
                    <label class="radio-inline e_green">
                    <input type="radio" name="color" id="optionsRadios26" value="green" <?php if($row['color'] == 'green'){echo 'checked';}?>> <?php echo lang('cal_green'); ?> </label>                                                        
                    <label class="radio-inline e_red">
                    <input type="radio" name="color" id="optionsRadios25" value="red" <?php if($row['color'] == 'red'){echo 'checked';}?>> <?php  echo lang('cal_red'); ?> </label>
                    <label class="radio-inline e_gray">
                    <input type="radio" name="color" id="optionsRadios26" value="grey" <?php if($row['color'] == 'grey'){echo 'checked';} ?>> <?php echo lang('cal_grey'); ?> </label>
                    <label class="radio-inline e_purple">
                    <input type="radio" name="color" id="optionsRadios26" value="purple" <?php if($row['color'] == 'purple'){echo 'checked';} ?>> <?php echo lang('cal_purple'); ?> </label>

                                                </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_url'); ?></label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="url" value="<?php echo $row['url']; ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="eve_id" value="<?php echo $row['id']; ?>">
                                <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn blue" type="submit" name="submit" value="submit">&nbsp;&nbsp; <?php echo lang('cal_up_botton'); ?> &nbsp;&nbsp;</button>
                                            <!--<button class="btn default" type="reset">Refresh</button>-->
                                        </div>
                                </div>
                            </div>
                        <?php } echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/admin/pages/scripts/components-pickers.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
        
    if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
        }
    });
    
    function validateForm() {
        var x = document.forms["myForm"]["start_date"].value;
        if (x === null || x === "") {
            alert("Event \"Start Dates\" fild is required. Please date first.");
            return false;
        }
    }
</script>

