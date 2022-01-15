<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!--Start page level style-->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('header_vendor'); ?><small></small>
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
            <div class="col-md-5">
                <div class="portlet box purple margin-bottom-15">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('sto_av'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("stock/vendors", $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_cn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="coname" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcn'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_cp'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="cophone" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcp'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_ce'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="coemail" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emce'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_con'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="country" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcountry'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_stat'); ?>  <span class="requiredStar"></span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="state">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_city'); ?>  <span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="city">
                                </div>
                            </div>
                            <h4><strong> <?php echo lang('sto_docp'); ?></strong></h4>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_dcpn'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="cpname" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcpn'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_dcpa'); ?> <span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="cpaddress">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_dcpp'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="cpphone" data-validation="required" data-validation-error-msg="<?php echo lang('sto_emcpp'); ?>">
                                </div>
                            </div>
                            <h4><strong> <?php echo lang('sto_bd'); ?></strong></h4>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_bn'); ?>  <span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="bankname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_brachn'); ?><span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="branchname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_accno'); ?>  <span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="accountno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('sto_ificcod'); ?>  <span class="requiredStar"> </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="ifsccode">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="submit" value="submit"><?php echo lang('sto_addv'); ?></button>
                                <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('sto_avl'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('srno'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sto_cn'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sto_cper'); ?>
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($vendors as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['company_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['cp_name']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php/stock/vendordetails?id=<?php echo $row['id']; ?>"> <i class="fa fa-send-o"></i> <?php echo lang('details'); ?> </a>
                                            <a class="btn btn-xs default" href="index.php/stock/vendoredit?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                            <a class="btn btn-xs red" href="index.php/stock/deletevendors?id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('<?php echo lang('sto_vdcon'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>