<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<?php $user = $this->ion_auth->user()->row();
$userId = $user->id; ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('app_ala'); ?><small></small>
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
                        <?php echo lang('header_all_leav_app'); ?>
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
                <?php if(!empty($message)){echo $message;} ?>
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('app_aplilist'); ?>
                        </div>
                        <div class="tools">
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
                                       <?php echo lang('date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('app_subject'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('app_sentitle'); ?>
                                    </th>
                                    <th><?php echo lang('app_status'); ?></th>
                                    <th><?php echo lang('app_checksts'); ?></th>
                                    <th>
                                        <?php echo lang('app_action'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($application as $row) {?>

                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d-m-Y', $row['application_date']); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['subject']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['sender_title']; ?>
                                        </td>
                                        <td>
                                            <?php if($row['status'] == 'Pending'){echo '<span class="label label-sm label-warning">'.$row['status'].'</span>';}
                                                  elseif($row['status'] == 'Approved'){echo '<span class="label label-sm label-success">'.$row['status'].'</span>';}
                                                  elseif($row['status'] == 'Compleated'){echo '<span class="label label-sm label-info">'.$row['status'].'</span>';}
                                                  else {echo '<span class="label label-sm label-danger">'.$row['status'].'</span>';}
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['cheack_statuse']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green tableActionButtonMargin" href="index.php/leave/checkApplication?appId=<?php echo $row['id']; ?>"> <i class="fa fa-file-text-o"></i> <?php echo lang('details'); ?> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
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
<!--Begin Page Level Script-->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<!--End Page Level Script-->
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
