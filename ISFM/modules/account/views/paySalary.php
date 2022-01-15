<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!--Start page level style-->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_employsalary'); ?><small></small>
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
                        <?php echo lang('header_pay_sala'); ?>
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
                <?php
                if (!empty($message)) {
                    echo '<br>' . $message;
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="portlet box purple margin-bottom-15">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_pes'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("account/paySalary", $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang(''); ?>Month  <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <select onchange="salaryInfo(this.value)" class="form-control" name="month" data-validation="required" data-validation-error-msg="You have to select month.">
                                        <option value=""><?php echo lang('select'); ?> </option>
                                        <option value="1"><?php echo lang('month_1'); ?></option>
                                        <option value="2"><?php echo lang('month_2'); ?></option>
                                        <option value="3"><?php echo lang('month_3'); ?></option>
                                        <option value="4"><?php echo lang('month_4'); ?></option>
                                        <option value="5"><?php echo lang('month_5'); ?></option>
                                        <option value="6"><?php echo lang('month_6'); ?></option>
                                        <option value="7"><?php echo lang('month_7'); ?></option>
                                        <option value="8"><?php echo lang('month_8'); ?></option>
                                        <option value="9"><?php echo lang('month_9'); ?></option>
                                        <option value="10"><?php echo lang('month_10'); ?></option>
                                        <option value="11"><?php echo lang('month_11'); ?></option>
                                        <option value="12"><?php echo lang('month_12'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div id="ajaxResult">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang(''); ?>Method  <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="method" data-validation="required" data-validation-error-msg="You have to select month.">
                                        <option value=""><?php echo lang('select'); ?> </option>
                                        <option value="Cash"><?php echo lang('acc_cash'); ?></option>
                                        <option value="Check"><?php echo lang('acc_check'); ?></option>
                                        <option value="Card"><?php echo lang('acc_card'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="submit" value="Update"><?php echo lang('acc_paysalary'); ?></button>
                                <button type="reset" class="btn red"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_psel'); ?>
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_paimont'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_emp_title'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_samount'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('acc_paymethod'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salary_list as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo date("d/m/Y", $row['date']) ?>
                                        </td>
                                        <td>
                                            <?php echo $row['month']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['employ_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['total_amount']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['method']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });

    function salaryInfo(str) {
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
        xmlhttp.open("GET", "index.php/account/ajaxEmployInfo?month=" + str, true);
        xmlhttp.send();
    }

    function salaryAmount(str) {
//        var sel = document.getElementById("salary_scale");
//        var val = sel.options[sel.selectedIndex].value;
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("ajaxResult_2").innerHTML = "";
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
                document.getElementById("ajaxResult_2").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/account/ajaxSalaryAmount?uId=" + str, true);
        xmlhttp.send();
    }

</script>