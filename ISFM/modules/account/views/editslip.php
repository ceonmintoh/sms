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
                            <?php echo lang('acc_eainfo'); ?>  
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
                        echo form_open("account/editSlip?id=$id", $form_attributs);
                        $slipNumber = $this->input->get('slipNumber', TRUE);
                        ?>
                        <?php foreach ($slipTrangaction as $row) { ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('acc_accotit'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="" name="accountTitle" value="<?php echo $row['account_title']; ?>" readonly="">
                                    </div>
                                </div>
                                <?php if ($row['account_title'] == 'Tution Fee') { ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> <?php echo lang('acc_mothrange'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <spen class="col-sm-4">
                                                <select class="form-control" name="TFRF">
                                                    <option value=""> <?php echo lang('app_from'); ?> </option>
                                                    <option value="Jan"><?php echo lang('month_1'); ?></option>
                                                    <option value="Feb"><?php echo lang('month_2'); ?></option>
                                                    <option value="Mar"><?php echo lang('month_3'); ?></option>
                                                    <option value="Apr"><?php echo lang('month_4'); ?></option>
                                                    <option value="May"><?php echo lang('month_5'); ?></option>
                                                    <option value="Jun"><?php echo lang('month_6'); ?></option>
                                                    <option value="Jul"><?php echo lang('month_7'); ?></option>
                                                    <option value="Aug"><?php echo lang('month_8'); ?></option>
                                                    <option value="Sep"><?php echo lang('month_9'); ?></option>
                                                    <option value="Oct"><?php echo lang('month_10'); ?></option>
                                                    <option value="Nov"><?php echo lang('month_11'); ?></option>
                                                    <option value="Dec"><?php echo lang('month_12'); ?></option>
                                                </select>
                                            </spen>
                                            <spen class="col-sm-4">
                                                <select class="form-control" name="TFRT">
                                                    <option value=""><?php echo lang('app_to'); ?></option>
                                                    <option value="Jan"><?php echo lang('month_1'); ?></option>
                                                    <option value="Feb"><?php echo lang('month_2'); ?></option>
                                                    <option value="Mar"><?php echo lang('month_3'); ?></option>
                                                    <option value="Apr"><?php echo lang('month_4'); ?></option>
                                                    <option value="May"><?php echo lang('month_5'); ?></option>
                                                    <option value="Jun"><?php echo lang('month_6'); ?></option>
                                                    <option value="Jul"><?php echo lang('month_7'); ?></option>
                                                    <option value="Aug"><?php echo lang('month_8'); ?></option>
                                                    <option value="Sep"><?php echo lang('month_9'); ?></option>
                                                    <option value="Oct"><?php echo lang('month_10'); ?></option>
                                                    <option value="Nov"><?php echo lang('month_11'); ?></option>
                                                    <option value="Dec"><?php echo lang('month_12'); ?></option>
                                                </select>
                                            </spen>

                                        </div>
                                    </div>

                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('acc_amount'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="" name="editAmount" value="<?php echo $row['amount']; ?>">
                                        <input class="form-control" type="hidden" placeholder="" name="amount" value="<?php echo $row['amount']; ?>">
                                        <input class="form-control" type="hidden" placeholder="" name="slipNumber" value="<?php echo $slipNumber; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Update"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn default" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
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
