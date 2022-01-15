<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Welcome TO School Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="Md. Omar Faruq"/>
        <!--Base tag start-->
        <base href="<?php echo $this->config->base_url(); ?>">
        <!--Base tag end-->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
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
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-quick-sidebar-over-content ">
        <!-- BEGIN CONTAINER -->
        <div class="page-container pageContainerMargin">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content pageContentWrapperMargin">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 installerFileHeading">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h1>Ice Advanced School Management System </h1>
                            <h3>Installer File</h3>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="portlet box blue" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Giving the install's information - <span class="step-title">
                                            Step 1 of 3 </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?php
                                    $form_attributs = array('class' => 'form-horizontal', 'id' => 'submit_form', 'role' => 'form');
                                    echo form_open('install/index', $form_attributs);
                                    ?>
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <div class="tab-content">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Host Name <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="hostName"/>
                                                            <span class="help-block">
                                                                Provide your server host name </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">User Name <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="userName"/>
                                                            <span class="help-block">
                                                                Provide your database user name </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Password <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="password" id="submit_form_password"/>
                                                            <span class="help-block">
                                                                Provide your database user password. </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Confirm Password <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="rpassword"/>
                                                            <span class="help-block">
                                                                Confirm your password </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Database Name <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="databaseName"/>
                                                            <span class="help-block">
                                                                Provide your database name </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Base URL <span class="required">
                                                                * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="baseUrl"/>
                                                            <span class="help-block">
                                                                Base url :  "http://localhost/folderName/" or "http://dominname.com/" </span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input class="btn green" type="submit" name="submit" value="submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                2014 &copy; Metronic by keenthemes.
            </div>
            <div class="page-footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->
    </body>
    <!-- END BODY -->
</html>