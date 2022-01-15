<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_eai'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        $id = $this->input->get('id');
                        echo form_open("account/editAccountInfo?id=$id", $form_attributs);
                        ?>
                        <?php foreach ($accountInfo as $row) { ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('acc_accotit'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="" name="accountTitle" value="<?php echo $row['account_title']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('acc_type'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select  class="form-control" name="type">
                                            <option value="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?></option>
                                            <option value=""><?php echo lang('select'); ?></option>
                                            <option value="Income"><?php echo lang('acc_incomtype'); ?></option>
                                            <option value="Expense"><?php echo lang('acc_exp_type'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('acc_descrip'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="3" name="description"><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Update"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>


        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
