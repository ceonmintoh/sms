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
                    <?php echo lang('dor_sdi'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_dormat'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_add_dormito'); ?>
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
                            <?php echo lang('dor_dsami'); ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php foreach ($details as $row) { ?>
                            <div class="alert alert-success">
                                <div class="col-md-8 profile-info">
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <span>: </span>
                                            <?php echo lang('dor_dormitories'); ?>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['dormitory_name']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_rn'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['room_number']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_sn'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['bed_number']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_stuid'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['student_id']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_stuname'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['student_name']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_class'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $this->common->class_title($row['class']); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-6 detailsEvent">
                                            <?php echo lang('dor_rno'); ?>
                                            <span>: </span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 detailsEvent">
                                            <?php echo $row['roll_number']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-offset-3 col-md-6">
                                    <a href="javascript:history.back()" class="btn blue btn-block classDetailsFont">
                                        <i class="fa fa-mail-reply-all"></i> <?php echo lang('back'); ?></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
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
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script>
    function dormitorysRoomAmount(str) {
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
        xmlhttp.open("GET", "index.php/dormitory/ajaxDormitoryRoom?q=" + str, true);
        xmlhttp.send();
    }

//
//    function dormitorysRoomSeat(str) {
//        var sel = document.getElementById("dormitories");
//        var val = sel.options[sel.selectedIndex].text;
//        var xmlhttp;
//        if (str.length === 0) {
//            document.getElementById("ajaxResult_2").innerHTML = "";
//            return;
//        }
//        if (window.XMLHttpRequest) {
//            // code for IE7+, Firefox, Chrome, Opera, Safari
//            xmlhttp = new XMLHttpRequest();
//        }
//        else {
//            // code for IE6, IE5
//            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//        }
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
//                document.getElementById("ajaxResult_2").innerHTML = xmlhttp.responseText;
//            }
//        };
//        xmlhttp.open("GET", "index.php/dormitory/ajaxSeatAmount?q=" + str + "&g=" + val, true);
//        xmlhttp.send();
//    }

</script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>


