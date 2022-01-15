<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title><?php echo lang('system_title'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="<?php echo $this->config->base_url(); ?>">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/global/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/formValidation.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="assets/admin/layout/img/smlogo.png" alt="logo" class="logo-default"/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <div id="infoMessage"><?php echo $message; ?></div>
            <!-- BEGIN LOGIN FORM -->
            <?php
            $attributes = array('class' => 'login-form');
            echo form_open("auth/login", $attributes);
            ?>
            <h3 class="form-title"><?php echo lang('login_heading'); ?></h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span><?php echo lang('login_validation_message'); ?> </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" data-validation="email" data-validation-error-msg="Email/Username field is required." placeholder="<?php echo lang('login_identity_label'); ?>" name="identity"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" data-validation="required" data-validation-error-msg="Password field is required." placeholder="<?php echo lang('login_password_label'); ?>" name="password"/>
                </div>
            </div>
            <div class="form-actions">
                <label class="checkbox">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                    <?php echo lang('login_remember_label'); ?></label>
                <button id="submit" type="submit" name="submit" class="btn green pull-right">
                    <?php echo lang('login_submit_btn'); ?> <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
            <div class="forget-password">
                <h4><?php echo lang('login_forgot_password'); ?> <a href="index.php/auth/forgot_password" id="forget-password"><?php echo lang('login_forgot_password_a'); ?> </a></h4>
            </div>
            <?php echo form_close(); ?>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            <center>Download free scripts, visit: <a href="https://daviruzsystems.com" target="_blank">Da-viruz Systems</a></center>
        </div>
        <!-- END COPYRIGHT -->
        <!--Start form validation script-->
        <script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
        <script>
            $.validate({modules: 'location, date, security, file'});
        </script>
        <!---End form validation script-->
    </body>
    <!-- END BODY -->
</html>