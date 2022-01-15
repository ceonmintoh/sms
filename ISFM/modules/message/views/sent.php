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
                    <?php echo lang(''); ?>Inbox <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        
                    </li>
                    <li>
                        Message
                        
                    </li>
                    <li>
                        Sent Message
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
                            <?php echo lang('mes_ml'); ?>.
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('mes_from'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('mes_sub'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('mes_mas'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('mes_action'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($massage as $row) {
                                    $userId = $row['sender_id'];
                                    $query = $this->common->getWhere('users', 'id', $userId);
                                    foreach ($query as $row1) {
                                        $senderName = $row1['username'];
                                    }
                                    ?>
                                    <tr>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                                <?php echo $senderName; ?>
                                        </td>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                                <?php echo $row['subject']; ?>
                                        </td>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                                <?php echo $row['message']; ?>
                                        </td>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                                <?php echo date('h.mA - d/m/Y', $row['date']); ?>
                                        </td>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                            <a class="btn btn-xs green" href="index.php/message/readMassage?id=<?php echo $row['id']; ?>"> <i class="fa fa-paper-plane-o"></i> <?php echo lang('mes_vd'); ?> </a>
                                            <a class="btn btn-xs red" href="index.php/message/deleteSentMassage?id=<?php echo $row['id']; ?>" onclick="javascript:return confirm('<?php echo lang('mes_dsmc'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang(''); ?>Delete </a>
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
                                                function dconfirm() {
                                                    var confirm1 = confirm('Are you sure you want to delete this sent message?');
                                                    if (confirm1 === true) {
                                                        return confirm('You cannot delete the demo data without paid system.');
                                                    }
                                                    return false;
                                                }

                                                jQuery(document).ready(function () {
                                                    //here is auto reload after 1 second for time and date in the top
                                                    jQuery(setInterval(function () {
                                                        jQuery("#result").load("index.php/home/iceTime");
                                                    }, 1000));
                                                });
</script>
