<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_createtran'); ?>  <small></small>
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
                        <?php echo lang('header_teansec'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('acc_trarea'); ?>
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="col-md-6">
                                    <div class="portlet box purple margin-bottom-15">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <?php echo lang('acc_extran'); ?>
                                            </div>
                                            <div class="tools">
                                                <a class="collapse" href="javascript:;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                            echo form_open('account/transection', $form_attributs);
                                            ?>
                                            <div class="form-body">
                                                <?php
                                                if (!empty($message)) {
                                                    echo '<br>' . $message;
                                                }
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> <?php echo lang('acc_accotit'); ?><span class="requiredStar"> * </span></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="account_id" data-validation="required" data-validation-error-msg="<?php echo lang('acc_psaaf'); ?>">
                                                            <option value=""><?php echo lang('select'); ?></option>
                                                            <?php foreach ($expa_title as $row) { ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['account_title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo lang('acc_giveamount'); ?> <span class="requiredStar"> * </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" value="" name="amount" data-validation="required" data-validation-error-msg="<?php echo lang(''); ?>Please give the amount.">
                                                    </div>
                                                </div>
                                                <div class="form-actions bottom fluid ">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button class="btn green" name="expense" type="submit" value="Submit"><?php echo lang(''); ?>Submit</button>
                                                        <button class="btn red" type="reset"><?php echo lang('refresh'); ?></button>
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="portlet box blue  margin-bottom-15">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <?php echo lang(''); ?>Income Transection
                                            </div>
                                            <div class="tools">
                                                <a class="collapse" href="javascript:;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                            echo form_open('account/transection', $form_attributs);
                                            ?>
                                            <div class="form-body">
                                                <?php
                                                if (!empty($message_2)) {
                                                    echo '<br>' . $message_2;
                                                }
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> <?php echo lang('acc_accotit'); ?> <span class="requiredStar"> * </span></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="account_id" data-validation="required" data-validation-error-msg="<?php echo lang('acc_psaaf'); ?>">
                                                            <option value=""><?php echo lang('select'); ?></option>
                                                            <?php foreach ($inco_title as $row_2) { ?>
                                                                <option value="<?php echo $row_2['id']; ?>"><?php echo $row_2['account_title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo lang('acc_giveamount'); ?><span class="requiredStar"> * </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" value="" name="amount" data-validation="required" data-validation-error-msg="<?php echo lang('acc_pgtamount'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-actions bottom fluid ">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button class="btn green" name="income" type="submit" value="Submit"><?php echo lang('submit'); ?></button>
                                                        <button class="btn red" type="reset"><?php echo lang('refresh'); ?></button>
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green-haze">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('acc_tra'); ?>
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'form', 'name' => 'form');
                                            echo form_open('', $form_attributs);
                                            ?>
                                            <div class="form-group">
                                                <br>
                                                <div class="col-md-8 col-md-offset-1">
                                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                        <input id="date0ne" type="text" class="form-control" name="from">
                                                        <span class="input-group-addon">
                                                            <?php echo lang('acc_to'); ?> </span>
                                                        <input id="datetwo" type="text" class="form-control" name="to">
                                                    </div>

                                                    <!-- /input-group -->
                                                    <span class="help-block"><?php echo lang('acc_seledr'); ?></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <input id="submit" class="btn default" onclick="expanse()" type="button" value="Search">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet box red-intense">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <?php echo lang('acc_explist'); ?>
                                                    </div>
                                                    <div class="tools">
                                                    </div>
                                                </div>
                                                <div class="portlet-body">

                                                    <table class="table table-striped table-bordered table-hover" id="sample_1">

                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <?php echo lang('srno'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('date'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_expanpur'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_amount'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_balanse'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody  id="ajaxresult">
                                                            <?php
                                                            $i = 1;
                                                            foreach ($expanse as $row4) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $i; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo date("d-m-Y", $row4['date']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $this->accountmodel->acc_tit_id($row4['acco_id']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row4['amount'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row4['balance'] ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'form', 'name' => 'form');
                                            echo form_open('', $form_attributs);
                                            ?>
                                            <div class="form-group">
                                                <br>
                                                <div class="col-md-8 col-md-offset-1">
                                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                        <input id="incdate0ne" type="text" class="form-control" name="from">
                                                        <span class="input-group-addon">
                                                            <?php echo lang('acc_to'); ?> </span>
                                                        <input id="incdatetwo" type="text" class="form-control" name="to">
                                                    </div>
                                                    <!-- /input-group -->
                                                    <span class="help-block"><?php echo lang('acc_seledr'); ?> </span>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <input id="submit" class="btn default" onclick="income()" type="button" value="Search">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div> 
                                        <div class="col-md-12">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet box blue-madison">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <?php echo lang('acc_incom_list'); ?>
                                                    </div>
                                                    <div class="tools">
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <?php echo lang('srno'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('date'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_incomporpose'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_amount'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('acc_balanse'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="incajaxresult">
                                                            <?php
                                                            $i = 1;
                                                            foreach ($income as $row3) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $i; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo date("d-m-Y", $row3['date']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $this->accountmodel->acc_tit_id($row3['acco_id']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row3['amount'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row3['balance'] ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                    </div></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/admin/pages/scripts/components-pickers.js"></script>
    <script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="assets/admin/pages/scripts/table-advanced.js"></script>
    <script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
    <script> $.validate();</script>
    <script>
        function expanse() {
            var dateone = document.getElementById("date0ne").value;
            var dateTwo = document.getElementById("datetwo").value;
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'rngstrt=' + dateone + '&rngfin=' + dateTwo;
            if (dateone == '' || dateTwo == '') {
                alert("Please select Expanse date range first.");
            } else {
                // AJAX code to submit form.
                $.ajax({
                    type: "POST",
                    url: "index.php/account/exp_list_da_ra",
                    data: dataString,
                    cache: false,
                    success: function (html) {
//            alert(html);
                        $("#ajaxresult").html(html);
                    }
                });
            }
            return false;
        }

        function income() {
            var dateone = document.getElementById("incdate0ne").value;
            var dateTwo = document.getElementById("incdatetwo").value;
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'rngstrt=' + dateone + '&rngfin=' + dateTwo;
            if (dateone == '' || dateTwo == '') {
                alert("Please select Income date range first.");
            } else {
                // AJAX code to submit form.
                $.ajax({
                    type: "POST",
                    url: "index.php/account/inc_list_da_ra",
                    data: dataString,
                    cache: false,
                    success: function (html) {
//            alert(html);
                        $("#incajaxresult").html(html);
                    }
                });
            }
            return false;
        }

        jQuery(document).ready(function () {

            //here is auto reload after 1 second for time and date in the top
            jQuery(setInterval(function () {
                jQuery("#result").load("index.php/home/iceTime");
            }, 1000));
            ComponentsPickers.init();
        });

    </script>

