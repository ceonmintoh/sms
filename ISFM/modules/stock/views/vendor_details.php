<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!--Start page level style-->
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('sto_vd'); ?> <small> </small>
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
                        <?php echo lang('sto_vd'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <!---Start Left Site Content-->
            <div class="col-md-5">
                <div class="col-md-12 stuInfoTableBG">
                    <?php
                    foreach ($ven_details as $row) {
                        ?>
                        <h4><strong> <?php echo lang('sto_comi'); ?> </strong></h4>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_cn'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['company_name']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_cp'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['company_phone']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_ce'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['company_email']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_con'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['country']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_stat'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['state']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_city'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['city']; ?>
                            </div>
                        </div>
                        <h4><strong><?php echo lang('sto_docp'); ?></strong></h4>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_dcpn'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['cp_name']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_dcpa'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['cp_address']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_dcpp'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['cp_phone']; ?>
                            </div>
                        </div>
                        <h4><strong><?php echo lang('sto_bd'); ?></strong></h4>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_bn'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['bank_name']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_brachn'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['branch_name']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_accno'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['account_no']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-7 detailsEvent">
                                <?php echo lang('sto_ificcod'); ?>
                                <span>: </span>
                            </div>
                            <div class="col-sm-6 col-xs-6 detailsEvent">
                                <?php echo $row['ifsc_code']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!---End Left Site Content-->
            <!---Start Right Site Content-->
            <div class="col-md-7">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('sto_pol'); ?>
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
                                        <?php echo lang('sino'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sto_in'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sto_q'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sto_rate'); ?>
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($ven_pol as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['item']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['quantity']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['rate']; ?>
                                        </td>
                                        <td>
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
            <!---Start Rigth Site Content-->
        </div>
    </div>
</div>
<!-- END CONTENT -->]
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
