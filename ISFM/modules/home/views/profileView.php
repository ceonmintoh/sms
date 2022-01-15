<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('pro_u_profile'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                       <?php echo lang('home'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('pro_profile'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row profile">
            <div class="col-md-12">
                <!--BEGIN TABS-->
                <div class="tabbable tabbable-custom tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"><?php echo lang('pro_over'); ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab"><?php echo lang('pro_account'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <?php $user = $this->ion_auth->user()->row(); ?>
                                            <img src="assets/uploads/<?php echo $user->profile_image; ?>" class="img-responsive" alt=""/>

                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <?php echo lang('pro_u_profile'); ?>
                                                    </div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">

                                                    <?php
//                                                                                                            $user = $this->ion_auth->user()->row();
//                                                                                                                if($this->session->userdata('username') == $user->username){
                                                    foreach ($userprofile as $row) {
                                                        ?>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?php echo lang('pro_first_name'); ?> <i class="fa fa-img-up"></i>
                                                                </span>
                                                                <span class="sale-num"><?php echo $row['first_name'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?php echo lang('pro_last_name'); ?> <i class="fa fa-img-down"></i>
                                                                </span>
                                                                <span class="sale-num"><?php echo $row['last_name'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?php echo lang('pro_user_name'); ?> <i class="fa fa-img-down"></i>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['username'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?php echo lang('pro_mobile_name'); ?> </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['phone'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?php echo lang('pro_email'); ?> </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['email'] ?> </span>
                                                            </li>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-4-->
                                    </div>
                                    <!--end row-->



                                </div>
                            </div>
                        </div>
                        <!--tab_1_2-->
                        <div class="tab-pane" id="tab_1_3">
                            <div class="row profile-account">
                                <div class="col-md-3">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1-1">
                                                <i class="fa fa-cog"></i><?php echo lang('pro_edit_per_inf'); ?> </a>
                                            <span class="after">
                                            </span>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2-2">
                                                <i class="fa fa-picture-o"></i> <?php echo lang('pro_chan_pic'); ?> </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3-3">
                                                <i class="fa fa-lock"></i> <?php echo lang('pro_chan_pass'); ?> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <?php foreach ($userprofile as $row1) { 
                                                $firstName = $row1['first_name'];
                                                $lastName = $row1['last_name'];
                                                $userName = $row1['username'];
                                                $mobileNumber = $row1['phone'];
                                                $email = $row1['email'];
                                                ?>
                                                <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                                    echo form_open('home/profileView', $form_attributs);
                                                  ?>
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo lang('pro_first_name'); ?></label>
                                                        <input name="firstName" type="text" class="form-control" value="<?php echo $firstName; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo lang('pro_last_name'); ?></label>
                                                        <input name="lastName" type="text" class="form-control" value="<?php echo $lastName; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo lang('pro_user_name'); ?></label>
                                                        <input name="userName" type="text" class="form-control" value="<?php echo $userName; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo lang('pro_mobile_name'); ?></label>
                                                        <input name="mobileNumber" type="text" class="form-control" value="<?php echo $mobileNumber; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo lang('pro_email'); ?></label>
                                                        <input name="email" type="text" class="form-control" value="<?php echo $email; ?>"/>
                                                    </div>
                                                    <div class="margiv-top-10">

                                                        <button type="submit" name="submit" class="btn green" value="Save Changes"><?php echo lang('pro_save'); ?></button>
                                                        <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                                                    </div>
                                                <?php echo form_close(); ?>
                                            <?php } ?>
                                        </div>
                                        <div id="tab_2-2" class="tab-pane">

                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                            echo form_open_multipart('home/profileImage', $form_attributs);
                                            ?>
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail uploadImagePreview">
                                                        <img src="assets/uploads/<?php echo $user->profile_image; ?>" alt=""/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail uploadImagePreview">
                                                    </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">
                                                                <?php echo lang('pro_select_image'); ?> </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="userfile">
                                                        </span>
                                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                            <?php echo lang('pro_remove'); ?> </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                        <div class="alert alert-danger">
                                                            <strong>Note:</strong> At first you have to check you file name because you can not use these character <b> ~!@#$%^&()_+}{ </b> in your file name. You have to use fresh file name example: <b>abcd.png</b> and you don't use like this <b>ab_c#d.png</b> .If you use that character It will make an error and donot show your picture.  
							</div>
                                                </div>
                                            </div>
                                            <div class="margiv-top-10">

                                                <button type="submit" name="submit" class="btn green"><?php echo lang('pro_chan_pic'); ?></button>
                                                <button type="reset" class="btn default"><?php echo lang('cancel'); ?></button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div id="tab_3-3" class="tab-pane">
                                            <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                            echo form_open('auth/change_password', $form_attributs);
                                            ?>
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo lang('pro_curr_pass'); ?></label>
                                                    <input type="password" class="form-control" name="old"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo lang('pro_new_pass'); ?></label>
                                                    <input type="password" class="form-control" name="new"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo lang('pro_r_new_pass'); ?></label>
                                                    <input type="password" class="form-control" name="new_confirm"/>
                                                </div>
                                                <div class="margiv-top-10">								
                                                    <button type="submit" name="submit" class="btn green">Change Now</button>
                                                    <button type="reset" class="btn default">Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?>
                                        </div>

                                    </div>
                                </div>
                                <!--end col-md-9-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TABS-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

