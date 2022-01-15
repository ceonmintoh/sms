<?php
$user = $this->ion_auth->user()->row();
$userId = $user->id;
?>
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
                    <?php echo lang('exa_che_ea'); ?> <small></small>
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
                        <?php echo lang('exa_che_ea'); ?>
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
                            <?php echo $classTitle; ?> <?php echo lang('exa_stuea'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('exa_etit'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_ct_sid'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_ct_role'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_ct_sn'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_subject'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('exa_atten'); ?>
                                    </th>
                                    <?php if ($this->common->user_access('change_exam_attendance', $userId)) { ?>
                                        <th>
                                            <?php echo lang('exa_action'); ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($previerAttendance as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['exam_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['roll_no']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['student_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['exam_subject']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $p = $row['attendance'];
                                            if ($p == 'P') {
                                                echo 'Present';
                                            } else {
                                                echo 'Absent';
                                            }
                                            ?>
                                        </td>
                                        <?php if ($this->common->user_access('change_exam_attendance', $userId)) { ?>
                                            <td>
                                                <a class="btn btn-xs default tableActionButtonMargin" href="index.php/examination/editExamAttendance?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square"></i> <?php echo lang('edit'); ?> </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table><hr>
                        <div class="veagb">
                            <button class="btn blue" type="button" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
                        </div>
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
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
