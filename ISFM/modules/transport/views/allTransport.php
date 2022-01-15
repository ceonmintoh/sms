<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<?php $user = $this->ion_auth->user()->row(); $userId = $user->id;?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('tra_at'); ?> <small></small>
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
                        <?php echo lang('header_all_transpo'); ?>
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
                            <?php echo lang('tra_ti'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('tra_rt'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('tra_rsae'); ?>
                                    </th>
                                    <th>
                                       <?php echo lang('tra_va'); ?> 
                                    </th>
                                    <th>
                                        <?php echo lang('tra_des'); ?>
                                    </th>
                                    <?php if($this->common->user_access('transport_edit_dele',$userId)){?>
                                        <th>
                                            &nbsp;
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transport as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['rout_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['start_end']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['vicles_amount']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['descriptions']; ?>
                                        </td>
                                        <?php if($this->common->user_access('transport_edit_dele',$userId)){?>
                                            <td>
                                                <a class="btn btn-xs default" href="index.php/transport/editTransport?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/transport/deleteTransport?id=<?php echo $row['id']; ?>" onclick="javascript:return confirm('<?php echo lang('tra_rdcon'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            </td>
                                        <?php } ?>
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
    });
</script>


