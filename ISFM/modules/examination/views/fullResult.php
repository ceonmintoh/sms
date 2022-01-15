<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
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
                    <?php echo lang('exa_result'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_academic'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_examina'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_exam_resu'); ?>
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
                            "<?php echo $class; ?>" <?php echo $examTitle; ?> <?php echo lang('exa_frsheet'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('exa_sid'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_stna'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_grade'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_point'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_ct_toma'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_ct_result'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['student_id']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['student_name']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['final_grade']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['point']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['total_mark']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['status']; ?> 
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <div class="col-md-offset-3 col-md-6 margin-top-10">
                    <button class="btn btn-lg green" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
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

