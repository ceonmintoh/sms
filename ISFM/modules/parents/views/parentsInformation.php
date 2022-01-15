<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<?php
$user = $this->ion_auth->user()->row();
$userId = $user->id;
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('header_parent_info'); ?> <small></small>
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
                        <?php echo lang('header_parent_info'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_parent_info'); ?>
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
                            <?php echo $classTitle . ' ' . lang('par_spib'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('par_stu_id'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('par_gar_name'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('par_rela'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('par_email'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('par_pho_num'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('par_gur_pho'); ?>
                                    </th>
                                    <?php if ($this->common->user_access('parents_edit_dlete', $userId)) { ?>
                                    <th>
                                        <?php echo lang('par_action'); ?>
                                    </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($parents as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['parents_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['relation']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <?php
                                                $puserid = $row['user_id'];
                                                $query = $this->db->get_where('users', array('id' => $puserid));
                                                foreach ($query->result_array() as $row1) { ?>
                                                    <img src="assets/uploads/<?php echo $row1['profile_image']; ?>" alt="">
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php if ($this->common->user_access('parents_edit_dlete', $userId)) { ?>
                                        <td>
                                                <a class="btn btn-xs default" href="index.php/parents/editParentsInfo?painid=<?php echo $row['id']; ?>&puid=<?php echo $userId; ?>"> <i class="fa fa-pencil-square"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/parents/deleteParents?painid=<?php echo $row['id']; ?>&painid=<?php echo $userId; ?>" onClick="javascript:return confirm('<?php echo lang('par_aysywtdtgp'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
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
                                                    jQuery(document).ready(function () {
                                                        //here is auto reload after 1 second for time and date in the top
                                                        jQuery(setInterval(function () {
                                                            jQuery("#result").load("index.php/home/iceTime");
                                                        }, 1000));
                                                    });
</script>
