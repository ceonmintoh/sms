<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<?php $user = $this->ion_auth->user()->row(); $userId = $user->id; ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('att_av'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stu_paren'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_attendance'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_atten_view'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo lang('att_aiah'); ?>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <?php echo lang('date'); ?>
                                </th>
                                <th>
                                    <?php echo lang('att_role'); ?>
                                </th>
                                <th>
                                    <?php echo lang('att_stu_tit'); ?>
                                </th>
                                <th>
                                    <?php echo lang('att_att_sta'); ?>
                                </th>
                                <th>
                                    <?php echo lang('att_att'); ?>
                                </th>
                                <?php if ($this->common->user_access('edit_student_atten', $userId)) { ?>
                                    <th>
                                        <?php echo lang('att_act'); ?>
                                    </th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $row) { ?>
                                <tr>
                                    <td>
                                        <?php echo date("d/m/Y", $row['date']) ?>
                                    </td>
                                    <td>
                                        <?php echo $row['roll_no'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['student_title']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $present = $row['present_or_absent'];
                                        if ($present == 'P') {
                                            echo 'Present';
                                        } else {
                                            echo 'Absent';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['percentise_month']; ?> %
                                    </td>
                                    <?php if ($this->common->user_access('edit_student_atten', $userId)) { ?>
                                        <td>
                                            <button class="btn green btn-xs" type="button" onclick="location.href = 'index.php/dailyAttendance/editAttendance?ghtnidjdfjkid=<?php echo $row['id']; ?>'"><i class="fa fa-pencil-square"></i> <?php echo lang('edit'); ?></button>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
