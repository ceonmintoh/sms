<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
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
                    <li>
                        Edit
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
                            Edit Student Fee Item's Information
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('configuration/fee_item_edit', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($successMessage)) {
                                echo $successMessage;
                            }
                            foreach ($fee_item as $row){
                            ?>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Class</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="class">
                                            <option class="edit_value" value="<?php echo $row['class_id'];?>"><?php echo $this->common->class_title($row['class_id']);?></option>
                                            <?php foreach ($classTile as $row1){?>
                                            <option value="<?php echo $row1['id']?>"><?php echo $row1['class_title']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Fee Title </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control">
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label class="col-md-4 control-label">Time Period</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="time_priod">
                                            <option class="edit_value" value="<?php echo $row['t_priod']; ?>"><?php echo $row['t_priod']; ?></option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="amount" value="<?php echo $row['amount']; ?>" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                            </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('save'); ?></button>
                                <button class="btn default" onclick="javascript:history.back()" type="button">Go Back</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
