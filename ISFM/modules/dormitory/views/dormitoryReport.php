<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('dor_dr'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_dormat'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_dorme_reop'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-6">
                <div class="portlet box purple">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('dor_di'); ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body nimHeight">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <?php echo lang('Dormitories name'); ?>
                                        </th>
                                        <th scope="col">
                                            <?php echo lang('dor_df'); ?>
                                        </th>
                                        <th scope="col">
                                            <?php echo lang('dor_ra'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dormitory as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['dormitory_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['dormitory_for']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['room_amount']; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('dor_dri'); ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('dor_dormitories'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_room'); ?> 
                                    </th>
                                    <th>
                                        <?php echo lang('dor_sa'); ?>
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dormitoryRoom as $row1) { ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $row1['dormitory_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['room']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['bed_amount']; ?>
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
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('dor_dsami'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('dor_dormitories'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_room'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_seat'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_stuid'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_stuname'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_class'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_rno'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('dor_action'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dormitory_bed as $row2) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row2['dormitory_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['room_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['bed_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['student_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['class']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['roll_number']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php/dormitory/showDeatails?id=<?php echo $row2['id']; ?>"> <i class="fa fa-paper-plane-o"></i> <?php echo lang('dor_vd'); ?> </a>
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
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
