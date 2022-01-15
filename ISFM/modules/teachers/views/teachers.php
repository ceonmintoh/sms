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
                    <?php echo lang('header_tea_info'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_teacher'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_tea_info'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        
        
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('tea_tl'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('tea_idno'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('tea_photo'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('tea_tn'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('tea_add'); ?>
                                    </th>
                                    <th>
                                       <?php echo lang('tea_stat'); ?> 
                                    </th>

                                    <th>
                                       <?php echo lang('tea_action'); ?> 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teacher as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <img src="assets/uploads/<?php echo $row['teachers_photo']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $row['fullname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['present_address']; ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-success"><?php echo $row['position']; ?></span>

                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php/teachers/teacherDetails?id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>&photo=<?php echo $row['teachers_photo']; ?>"> <i class="fa fa-file-text-o"></i> <?php echo lang('details'); ?> </a>
                                            <?php if($this->common->user_access('teacher_edit_delete',$userId)){ ?>
                                                <a class="btn btn-xs default" href="index.php/teachers/edit_teacher?id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>"> <i class="fa fa-pencil-square"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/teachers/teacherDelete?id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>"  onClick="javascript:return confirm('<?php echo lang('tea_tdecon'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            <?php } ?>
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