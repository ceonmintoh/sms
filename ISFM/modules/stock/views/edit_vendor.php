<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('sto_editv'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stor_manage'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_vendor'); ?>
                    </li>
                    <li>
                        <?php echo lang('sto_editv'); ?>
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
                <?php
                if (!empty($message)) {
                    echo '<br>' . $message;
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="portlet box purple margin-bottom-15">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('sto_evinfo'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("stock/vendoredit", $form_attributs);
                        foreach ($single_ven as $row) {
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('sto_cn'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="coname" value="<?php echo $row['company_name']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcn'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('sto_cp'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="cophone" value="<?php echo $row['company_phone']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcp'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('sto_ce'); ?>  <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <input type="email" class="form-control" name="coemail" value="<?php echo $row['company_email']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emce'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_con'); ?>  <span class="requiredStar">  </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="country" value="<?php echo $row['country']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcountry'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_stat'); ?>  <span class="requiredStar"></span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="state" value="<?php echo $row['state']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_city'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>">
                                    </div>
                                </div>
                                <h4><strong> <?php echo lang('sto_docp'); ?></strong></h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_dcpn'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="cpname" value="<?php echo $row['cp_name']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcpn'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_dcpa'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="cpaddress" value="<?php echo $row['cp_address']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_dcpp'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="cpphone" value="<?php echo $row['cp_phone']; ?>" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcpp'); ?>">
                                    </div>
                                </div>
                                <h4><strong> <?php echo lang('sto_bd'); ?></strong></h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_bn'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="bankname" value="<?php echo $row['bank_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_brachn'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="branchname" value="<?php echo $row['branch_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_accno'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="accountno" value="<?php echo $row['account_no']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sto_ificcod'); ?>  <span class="requiredStar"> </span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="ifsccode" value="<?php echo $row['ifsc_code']; ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="vendor_id" value="<?php echo $row['id']; ?>">
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" value="submit"><?php echo lang('save'); ?></button>
                                    <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
                                </div>
                            </div>
                        <?php } echo form_close(); ?>
                    </div>
                </div>
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