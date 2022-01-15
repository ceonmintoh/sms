      
<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Welcome To School Management</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="http://asms.educaredl.com/">

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

            <!-- BEGIN FORGOT PASSWORD FORM -->
            <?php $attributes = array('class' => 'forget-form');
            echo form_open("auth/forgot_password", $attributes); ?>
            <h3>Forget Password ?</h3>
            <p>
                Enter your e-mail address below to reset your password.
            </p>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn" onclick="location.href = 'index.php/auth/login'">
                    <i class="m-icon-swapleft"></i> Back </button>
                <button type="submit" class="btn green pull-right">
                    Submit <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
        <?php echo form_close(); ?>
        <!-- END FORGOT PASSWORD FORM -->


    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2015 &copy; IseSoftbd Ltd. All Rights Reserved.
    </div>
    <!-- END COPYRIGHT -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->

    <script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
                            jQuery(document).ready(function() {
                                Metronic.init(); // init metronic core components
                                Layout.init(); // init current layout
                                QuickSidebar.init() // init quick sidebar
                                Login.init();
                            });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>