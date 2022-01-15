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
                    <?php echo lang('sug_cresugg'); ?> <small></small>
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
                        <?php echo lang('header_suggestion'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_giv_suggest'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php echo lang('sug_mansfs'); ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('suggestion/makeSuggestion', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('sug_sel_clas'); ?></label>
                                    <div class="col-md-6">
                                        <select id="reseverGroup" onchange="ajaxClassSubject(this.value)" class="form-control" name="class" data-validation="required" data-validation-error-msg="">
                                            <option value=""><?php echo lang('select'); ?></option>
                                            <?php foreach($class as $row){?>
                                            <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php $user = $this->ion_auth->user()->row(); ?>
                                <input type="hidden" name="senderId" value="<?php echo $user->id; ?>">
                                <div id="ajaxResult" class="form-group">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo lang('sug_title'); ?></label>
                                    <div class="col-md-6">
                                        <input class="form-control"  type="text" name="suggestionTitle"  data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3"><?php echo lang('sug_full_sugges'); ?></label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="fullSuggestion" rows="6"  data-validation="required"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-check"></i> <?php echo lang('sug_pub_sugg');?> </button>
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
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate(); </script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
    function ajaxClassSubject(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("ajaxResult").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/suggestion/ajaxClassSubject?cla=" + str, true);
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
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxStuAndPar").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/message/ajaxClassStuAndPar?p=" + str + "&g=" + val, true);
        xmlhttp.send();
    }
</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

