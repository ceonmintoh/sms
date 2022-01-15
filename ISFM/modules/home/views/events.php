<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTAINER -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <?php if(!empty($message)){echo $message;}?>
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('cal_event'); ?>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i><?php echo lang('home');?>
                        
                    </li>
                    <li><?php echo lang('cal_calender'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('cal_add_new_eve'); ?>
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
                            <i class="fa fa-gift"></i><?php echo lang('cal_add_new_eve'); ?>
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
                        echo form_open('home/addEvent', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_title'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="title" size="10" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_start_date'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                            <input type="text" class="form-control" name="start_date" readonly data-validation="required" data-validation-error-msg="<?php echo lang('cal_p_s_d'); ?>">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('cal_end_date'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                            <input type="text" class="form-control" name="end_date" readonly data-validation="required" data-validation-error-msg="<?php echo lang('cal_p_e_d'); ?>">
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
                                                        <input type="radio" name="color" id="optionsRadios25" value="yellow"> <?php echo lang('cal_yello'); ?> </label>
                                                        <label class="radio-inline e_green">
                                                        <input type="radio" name="color" id="optionsRadios26" value="green"> <?php echo lang('cal_green'); ?> </label>                                                        
                                                        <label class="radio-inline e_red">
                                                        <input type="radio" name="color" id="optionsRadios25" value="red"> <?php echo lang('cal_red'); ?> </label>
                                                        <label class="radio-inline e_gray">
                                                        <input type="radio" name="color" id="optionsRadios26" value="grey"> <?php echo lang('cal_grey'); ?> </label>
                                                        <label class="radio-inline e_purple">
                                                        <input type="radio" name="color" id="optionsRadios26" value="purple" > <?php echo lang('cal_purple'); ?> </label>
                                                        
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('url'); ?></label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="url">
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn blue" type="submit" name="submit" value="submit"><?php echo lang('cal_up_botton'); ?></button>
                                            <button class="btn default" type="reset"><?php echo lang('cal_refresh'); ?></button>
                                        </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('cal_event_info'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('srno');?>
                                    </th>
                                    <th>
                                        <?php echo lang('cal_event'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('cal_start_date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('cal_end_date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('cal_url'); ?>
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($event as $row){?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['start_date']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['end_date']; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs default" href="index.php/home/edit_event?eve_id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                            <a class="btn btn-xs red" href="index.php/home/delete_event?eve_id=<?php echo $row['id']; ?>" onclick="javascript:return confirm('<?php echo lang('cal_conf_dele_eve'); ?>')"> <i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                    </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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

