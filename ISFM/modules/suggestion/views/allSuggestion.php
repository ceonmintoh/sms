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
                    <?php echo lang('header_all_sugges'); ?> <small></small>
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
                        <?php echo lang('header_suggestion'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_all_sugges'); ?>
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
                            <?php echo lang('sug_list'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('sug_class'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sug_title'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sug_auth_name'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('sug_action'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($suggestion as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                                <?php echo $row['class']; ?>
                                        </td>
                                        <td>
                                                <?php echo date('d/m/Y', $row['date']); ?>
                                        </td>
                                        <td>
                                                <?php echo $row['suggestion_title']; ?>
                                        </td>
                                        <td>
                                                <?php echo $row['author_name']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php/suggestion/suggestionDetails?id=<?php echo $row['id']; ?>"> <i class="fa fa-paper-plane-o"></i> <?php echo lang('sug_vdet'); ?> </a>
                                            <?php $user = $this->ion_auth->user()->row();
                                            if($row['author_name'] == $user->username){?>
                                                <a class="btn btn-xs red"  onClick="javascript:return confirm('<?php echo lang('sug_aysywtdts'); ?>');" href="index.php/suggestion/deleteSuggestion?id=<?php echo $row['id']; ?>"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            <?php }?>
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
jQuery(document).ready(function() {
    //here is auto reload after 1 second for time and date in the top
    jQuery(setInterval(function() {
        jQuery("#result").load("index.php/home/iceTime");
    }, 1000));
});
</script>
