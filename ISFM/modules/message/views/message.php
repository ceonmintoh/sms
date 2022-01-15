<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN THEME STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('header_sent_message'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_message'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_sent_message'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="col-md-12">
            <?php if (!empty($Success)) { ?>
                <div class="alert alert-success">
                    <h1><strong><?php echo lang('success'); ?></strong> <?php echo $Success; ?></h1>
                </div>
                <?php
            }
            if (!empty($Error)) {
                ?>
                <div class="alert alert-danger">
                    <h1><strong><?php echo lang('error'); ?></strong> <?php echo $Error; ?></h1>
                </div>
            <?php } ?>
        </div>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('mes_sym'); ?>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('message/sendMessage2', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3"><div class="alert alert-success">
                                        <strong><?php echo lang('mes_symt'); ?></strong> 
                                    </div></label>
                                <div class="col-md-6">
                                    <div class="checkbox-list">
                                        <label>
                                            <input type="radio" checked="" name="msgType" value="internal"> <?php echo lang('mes_ims'); ?>  </label>
                                        <label>
                                            <input type="radio" name="msgType" value="smsapi"> <?php echo lang('mes_bss'); ?> </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('mes_sg'); ?></label>
                                <div class="col-md-6">
                                    <select id="reseverGroup" onchange="selectReceiver(this.value)" class="form-control" name="receiverGroup" required>
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <option value="Student"><?php echo lang('mes_stu'); ?></option>
                                        <option value="Teacher"><?php echo lang('mes_tea'); ?></option>
                                        <option value="Parents"><?php echo lang('mes_par'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <?php $user = $this->ion_auth->user()->row(); ?>
                            <input type="hidden" name="senderId" value="<?php echo $user->id; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('mes_rece'); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-cubes"></i>
                                        </span>
                                        <select id="ajaxResult" onchange="classStuAndPar(this.value)" name="receiver" class="form-control select2me" data-placeholder="<?php echo lang('select'); ?>" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"> </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <select id="ajaxStuAndPar" name="receiver_2" class="form-control select2me" data-placeholder="<?php echo lang('select'); ?>">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('mes_sub'); ?></label>
                                <div class="col-md-6">
                                    <input class="form-control"  type="text" name="subject" required>
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="control-label col-md-3"><?php echo lang('mes_mas'); ?></label>
                                <div class="col-md-9">
                                    <textarea class="ckeditor form-control" name="message" rows="6" required></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-send"></i> &nbsp;&nbsp;<?php echo lang('mes_senbutt'); ?> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXTRAS PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
    function selectReceiver(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("ajaxResult").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/message/ajaxSelectReciver?q=" + str, true);
        xmlhttp.send();
    }
    function classStuAndPar(str) {
        var xmlhttp;
        var sel = document.getElementById("reseverGroup");
        var val = sel.options[sel.selectedIndex].text;
        if (str.length === 0) {
            document.getElementById("ajaxStuAndPar").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxStuAndPar").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/message/ajaxClassStuAndPar?p=" + str + "&g=" + val, true);
        xmlhttp.send();
    }
                                            
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

