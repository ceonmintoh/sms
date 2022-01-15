<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('header_stu_mark_shee'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_academic'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_examina'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stu_mark_shee'); ?>
                    </li>                        
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        ?>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="tab_0" class="tab-pane active">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('exa_scasfms'); ?>
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;">
                                    </a>
                                    <a class="reload" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <?php
                                $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                echo form_open('examination/sel_ow_ma', $form_attributs);
                                ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> <?php echo lang('exa_class'); ?> </label>
                                        <div class="col-md-4">
                                            <select onchange="classSection(this.value)"  class="form-control" name="class_id" data-validation="required" data-validation-error-msg="">
                                                <option value=""><?php echo lang('select'); ?></option>
                                                <?php foreach ($class as $row) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['class_title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input id="user_id" type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                    <div id="ajaxResult">
                                    </div>
                                </div>
                                <div class="form-actions bottom fluid ">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn green" name="submit" type="submit" value="Submit"><?php echo lang('exa_gms'); ?></button>
                                        <button class="btn default" type="reset"><?php echo lang('refresh'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    function classSection(str) {
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
        xmlhttp.open("GET", "index.php/examination/ajax_ow_ma?q=" + str, true);
        xmlhttp.send();
    }
</script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 5000));
    });
</script>