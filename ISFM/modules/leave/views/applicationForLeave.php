<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('app_afl'); ?> <small></small>
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
                        <?php echo lang('header_leave_mana'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_leav_appli'); ?>
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
                            <?php echo lang('app_manafl'); ?>
                        </div>
                    </div>
                    <div class="portlet-body form leaveApplicationForm" style="font-size: 18px">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('leave/applicationForLeave', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" placeholder="dd-mm-yyyy" name="date" data-validation="required" data-validation-error-message="<?php echo lang('app_gtad'); ?>"/>
                                </div>
                            </div>

                            <?php echo lang('app_to'); ?>,<br>

                            <?php echo lang('app_heamas'); ?>,<br>

                            <?php echo $schoolTitle->school_name; ?>,<br>

                            <?php echo $schoolTitle->address; ?>,<br>

                            <b><?php echo lang('app_spfloa'); ?></b><br><br>

                            <?php echo lang('app_dsir'); ?><br><br>
                            <div style="min-width: 125px; float: left;"><?php echo lang('app_imca'); ?> </div> 
                            <div  style="min-width: 117px; float: left; padding-left: 10px; padding-right: 10px; height: 37px;"><select class="form-control" name="jobType" data-validation="required" data-validation-error-message="<?php echo lang('app_sao'); ?>"><option value=""></option><option value="part"><?php echo lang('app_ful'); ?></option><option value="full"> <?php echo lang('app_part'); ?></option></select></div>
                            <div  style="min-width: 117px; float: left; padding-left: 10px; padding-right: 10px; height: 37px;"> <?php echo lang('app_tta'); ?><b><?php echo $schoolTitle->school_name; ?></b>, <?php echo lang('app_ahboae'); ?></div> 
                            <div  style="min-width: 133px; float: left; padding-left: 10px; padding-right: 10px; height: 37px;"><input class="form-control" type="text" name="reason" placeholder="leave reason" data-validation="required" data-validation-error-message="<?php echo lang('app_gtrfl'); ?>"></div>
                            <div  style="min-width: 117px; float: left; padding-left: 10px; padding-right: 10px; height: 37px;"><?php echo lang('app_leavefrom'); ?></div>
                            <div  style="width: 115px; float: left; height: 37px;"><input class="form-control" type="text" name="startDate" placeholder="dd-mm-yyyy" data-validation="required date" data-validation-format="dd-mm-yyyy" data-validation-error-message="<?php echo lang('app_gtlsd'); ?>"></div>
                            <div  style="min-width: 50px; float: left; padding-left: 10px; padding-right: 10px; height: 37px;"> <?php echo lang('app_until'); ?></div>
                            <div  style="width: 117px; float: left;height: 37px;"><input class="form-control" type="text" name="endDate" placeholder="dd-mm-yyyy" data-validation="required date" data-validation-format="dd-mm-yyyy" data-validation-error-message="<?php echo lang('app_gtled'); ?>"></div>.
                            <div  style="min-width: 50px; float: left; padding-left: 10px; padding-right: 10px;"> <?php echo lang('app_shgmltamdas'); ?></div><div> </div>
                            <br><br><br>
                            <?php echo lang('app_ikrytgm'); ?><br><br>

                            <?php echo lang('app_thyo'); ?><br>

                            <?php echo lang('app_ysin'); ?><br>
                            <?php
                            $user = $this->ion_auth->user()->row();
                            echo $user->username;
                            ?><br>
                            <input type="hidden" name="sendrId" value="<?php echo $user->id; ?>">
                            <input type="hidden" name="sendrTitle" value="<?php echo $user->username; ?>">
                            <div class="form-actions fluid">
                                <div class="col-sm-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit" value="Submit"><?php echo lang('app_submit_app'); ?></button>
                                    <button class="btn red" type="reset"><?php echo lang('refresh'); ?></button>
                                </div><div class="clearfix"></div>
                            </div>
                        </div>
<?php echo form_close(); ?>
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
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.form-validator.min.js"></script>
<script>
    $.validate();

    jQuery(document).ready(function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
