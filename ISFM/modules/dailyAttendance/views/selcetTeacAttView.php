<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('att_teatt'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_hrm'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_employ_atten'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_tak_emplo_atte'); ?>
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
                            <?php echo lang('att_gteasp'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('dailyAttendance/t_a_s_p', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php if (!empty($message)) { echo $message; } ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('att_secpass'); ?></label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control" name="password" required="">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-sm-offset-3 col-md-9">
                                <button class="btn blue" type="submit" name="submit" value="Submit"><?php echo lang('att_start'); ?></button>
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
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
