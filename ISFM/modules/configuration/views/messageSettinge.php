<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_mess_sett'); ?> <small></small>
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
                        <?php echo lang('con_mess_sett'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 margin-bottom-20">
                <?php
                if (!empty($Message)) {
                    echo $Message;
                }
                ?>
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('con_syms'); ?>
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
                        echo form_open_multipart('configuration/messageSettings', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('con_api_unam'); ?></label>
                                <div class="col-md-5">
                                    <input class="form-control"  type="text" name="username" data-validation="required email" data-validation-error-msg="<?php echo lang('con_requ_api_unam'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('con_hash'); ?></label>
                                <div class="col-md-5">
                                    <input class="form-control"  type="text" name="hash" data-validation="required" data-validation-error-msg="<?php echo lang('con_required_hash'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('con_sender_title'); ?></label>
                                <div class="col-md-5">
                                    <input class="form-control"  type="text" name="senderSmsTitle"  data-validation="required" data-validation-error-msg="<?php echo lang(con_requ_der_tit); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn green" type="submit" name="submit" value="submit"><?php echo lang('con_set_sms_api'); ?></button>
                                <button class="btn default" type="reset"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('con_smsapira'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"></a>
                            <a href="" class="reload"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p class="iframeStyleP">
                            <?php echo lang('con_hi'); ?><br><br>
                            <?php echo lang('con_mess_tex1'); ?> <a href='http://www.textlocal.com/'><?php echo lang('con_mess_tex2'); ?></a>.
                            <?php echo lang('con_mess_tex3'); ?>
                            <br><br>
                        <?php echo lang('con_thanks'); ?><br><hr><br><br>
                        </p>
                        <iframe class="iframeStyle" src="http://www.textlocal.com/"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> 
    $.validate();
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

