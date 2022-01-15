<?php $user = $this->ion_auth->user()->row(); $userId = $user->id;?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_aat'); ?>  <small></small>
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
                        <?php echo lang('header_add_acco_tit'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <?php
                if (!empty($message)) {
                    echo '<br>' . $message;
                }
                ?>
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_anatfa'); ?> 
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
                        echo form_open('account/addAccountTitle', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('acc_accotit'); ?>  <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="" name="accountTitle" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('acc_type'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select  class="form-control" name="type" required="">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <option value="Income"><?php echo lang('acc_incomtype'); ?></option>
                                        <option value="Expense"><?php echo lang('acc_exp_type'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('acc_descrip'); ?> <span class="requiredStar">  </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('acc_add'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>

            <div class="col-md-12">
                <!-- BEGIN All account list-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_loat'); ?> 
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('srno'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_accotit'); ?> 
                                    </th>
                                    <th>
                                        <?php echo lang('acc_type'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_descrip'); ?>
                                    </th>
                                    <?php if($this->common->user_access('edit_dele_acco',$userId)){ ?>
                                        <th>

                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($allAccount as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['account_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['category']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['description']; ?>
                                        </td>
                                        <?php if($this->common->user_access('edit_dele_acco',$userId)){ ?>
                                            <td>
                                                <a class="btn btn-xs default" href="index.php/account/editAccountInfo?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/account/deleteAccount?id=<?php echo $row['id']; ?>" onclick="javascript:return confirm('<?php echo lang('acc_atdcm'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>                                            </td>
                                            <?php } ?>
                                    </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END All account list-->
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

