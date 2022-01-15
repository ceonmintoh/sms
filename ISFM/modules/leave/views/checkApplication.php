<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('app_checkapp'); ?><small></small>
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
                        <?php echo lang('app_checkapp'); ?>
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
                        echo form_open('leave/ap_or_di', $form_attributs);
                        foreach ($application as $row) {
                            ?>
                            <div class="form-body">
                                <?php echo date('jS F, Y', $row['application_date']); ?>
                                <?php echo lang('app_to'); ?>,<br>

                                <?php echo lang('app_heamas'); ?>,<br>

                                <?php echo $schoolTitle->school_name; ?>,<br>

                                <?php echo $schoolTitle->address; ?>,<br>

                                <b><?php echo lang('app_spfloa'); ?></b><br><br>

                                <?php echo lang('app_dsir'); ?><br><br>
                                <?php echo lang('app_imca'); ?> <?php echo $row['jobtype']; ?>

                                <?php echo lang('app_tta'); ?><?php echo $schoolTitle->school_name; ?>, <?php echo lang('app_ahboae'); ?> <?php echo $row['reason']; ?> 
                                <?php echo lang('app_leavefrom'); ?> <b><?php echo date('d-m-y', $row['leave_start']); ?></b> <?php echo lang('app_until'); ?> <b><?php echo date('d-m-y', $row['leave_end']); ?></b>  <?php echo lang('app_shgmltamdas'); ?>
                                <br><br><br>
                                <?php echo lang('app_ikrytgm'); ?><br><br>

                                <?php echo lang('app_thyo'); ?><br>

                                <?php echo lang('app_ysin'); ?><br>
                                <?php echo $row['sender_title']; ?><br>
                                <input type="hidden" name="appId" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="appcantId" value="<?php echo $row['sender_id']; ?>">
                                <input type="hidden" name="startDate" value="<?php echo $row['leave_start']; ?>">
                                <input type="hidden" name="endDate" value="<?php echo $row['leave_end']; ?>">   
                                <input type="hidden" name="chackerTitle" value="<?php
                                $user = $this->ion_auth->user()->row();
                                echo $user->username;
                                ?>">
                                       <?php if ($row['status'] == 'Pending') { ?>
                                    <div class="form-actions fluid">
                                        <div class="col-sm-offset-3 col-md-9">
                                            <button class="btn blue" type="submit" name="Accept" value="Accept"><?php echo lang('app_accept'); ?></button>
                                            <button class="btn red" type="submit" name="deny" value="deny"><?php echo lang('app_deny'); ?></button>
                                        </div><div class="clearfix"></div>
                                    </div>
                                <?php } elseif ($row['status'] == 'Approved' || $row['status'] == 'Compleated') { ?>
                                    <div class="form-actions fluid">
                                        <div class="col-sm-offset-3 col-md-4" style="text-align: center; background-color: #45B6AF; padding-bottom: 10px; padding-top: 10px; font-size: 25px;">
                                            <?php echo $row['status']; ?>
                                        </div>
                                        <?php if ($row['leave_end'] < strtotime(date('d-m-Y'))) { ?>
                                            <button class="btn red" type="submit" name="end" value="end"style="height: 55px; margin-left: 15px;"><?php echo lang('app_leave_ended'); ?></button>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php } ?>
                            </div><?php } ?>
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
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
