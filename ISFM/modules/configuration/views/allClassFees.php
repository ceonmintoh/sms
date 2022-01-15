<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!--Start page level style-->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($message)){
                    echo $message;
                }?>
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_set_fee'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_configu'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_set_st_fee'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
        <?php
        if (!empty($successMessage)) {
            ?>
            <div class="col-md-12">
                <?php echo $successMessage;?>
            </div>
        <?php }?>
            <div class="col-md-4">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            Add New Monthly Fee Item
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('configuration/setStuFee', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Class</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="class">
                                            <option value="">Select...</option>
                                            <?php foreach ($classTile as $row){?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['class_title']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Fee Title </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" placeholder="" class="form-control">
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label class="col-md-4 control-label">Time Period</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="time_priod">
                                            <option value="">Select...</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="amount" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div><div class="clearfix"></div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-8">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            All Fee Items
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Class</th>
                                    <th>Item Title</th>
                                    <th>Fee</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;foreach ($fee_item as $row1){?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $this->common->class_title($row1['class_id']); ?></td>
                                        <td><?php echo $row1['title']; ?></td>
                                        <td><?php echo $row1['amount']; ?></td>
                                        <td>
                                                <a class="btn btn-xs default" href="index.php/configuration/fee_item_edit?id=<?php echo $row1['id'];?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/configuration/delete_fee_item?id=<?php echo $row1['id'];?>" onclick="javascript:return confirm('<?php echo lang('lib_bdeconf'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            </td>
                                    </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
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
