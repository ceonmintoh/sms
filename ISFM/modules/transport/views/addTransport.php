
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('tra_ant'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_transpo'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_add_trnspo'); ?>
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
                            <?php echo lang('tra_gtifnt'); ?>
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
                        echo form_open('transport/addTransport', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('tra_rt'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="routeTitle" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('tra_rsae'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="startEnd" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('tra_va'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="vehiclesAmount" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('tra_des'); ?><span class="requiredStar"></span></label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('save'); ?></button>
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
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
