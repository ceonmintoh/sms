<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_edittran'); ?>  <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_account'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_teansec'); ?>
                    </li>
                    <li>
                        <?php echo lang('acc_edittran'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($transection as $row) { ?>

                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <?php echo $row['category']; ?> <?php echo lang('acc_tte'); ?>
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('account/edit_transection', $form_attributs);
                            ?>
                            <div class="form-body">
                                <?php
                                if (!empty($message)) {
                                    echo '<br>' . $message;
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo lang('acc_accotit'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" name="account_id" readonly="" value="<?php echo $this->accountmodel->acc_tit_id($row['acco_id']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('acc_giveamount'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $row['amount']; ?>" name="amount" data-validation="required" data-validation-error-msg="<?php echo lang('acc_pgtamount'); ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="pre_amount" value="<?php echo $row['amount']; ?>">
                                <input type="hidden" name="tran_id" value="<?php echo $row['id']; ?>">
                                <div class="form-actions bottom fluid ">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn green" name="submit" type="submit" value="Submit"><?php echo lang('submit'); ?></button>
                                        <button class="btn red" type="reset"><?php echo lang('refresh'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- END FORM-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>