<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_tfs'); ?><small></small>
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
                        <?php echo lang('header_cre_stu_pay'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_gtift'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        if (!empty($success)) {
                            echo $success;
                        }
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('account/studentTranjection', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('acc_stud_id'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" name="studentId"  onkeyup="studentInfo(this.value)" placeholder="" data-validation="required" data-validation-error-msg="<?php echo lang('acc_stud_id_rmes'); ?>">
                                </div>
                            </div>

                            <div id="ajaxResult">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('date'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-5">
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d">
                                        <input type="text" class="form-control" name="date" readonly data-validation="required" data-validation-error-msg="<?php echo lang('acc_datermes'); ?>">
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                    <span class="help-block"><?php echo lang('acc_iiimf'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box actionSlipBorder">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo lang('srno'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('acc_descrip'); ?>
                                                    </th>
                                                    <th>
                                                        <i class="<?php echo $currency; ?>"></i> &nbsp;<?php echo lang('acc_amount'); ?>  
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        01
                                                    </td>
                                                    <td>
                                                        <?php echo lang('acc_addmission'); ?>
                                            <spen class="col-sm-6 floatRight">
                                                <select class="form-control" name="admitionType">
                                                    <option value=""> </option>
                                                    <option value="Admission Fee"><?php echo lang('acc_addmfee'); ?></option>
                                                    <option value="Re-Admission Fee"><?php echo lang('acc_readfee'); ?></option>
                                                    <option value="T/C Fee"><?php echo lang('acc_tcfee'); ?></option>
                                                </select>
                                            </spen>
                                            </td>
                                            <td>
                                                <input class="col-xs-2 form-control" type="text" name="admitionFeeAmount" placeholder="   - - - - -">
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    02
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_tutionfee'); ?>
                                            <spen class="col-sm-3 floatRight">
                                                <select class="form-control" name="TFRT">
                                                    <option value=""><?php echo lang('acc_to'); ?></option>
                                                    <option value="Jan"><?php echo lang('month_1'); ?></option>
                                                    <option value="Feb"><?php echo lang('month_2'); ?></option>
                                                    <option value="Mar"><?php echo lang('month_3'); ?></option>
                                                    <option value="Apr"><?php echo lang('month_4'); ?></option>
                                                    <option value="May"><?php echo lang('month_5'); ?></option>
                                                    <option value="Jun"><?php echo lang('month_6'); ?></option>
                                                    <option value="Jul"><?php echo lang('month_7'); ?></option>
                                                    <option value="Aug"><?php echo lang('month_8'); ?></option>
                                                    <option value="Sep"><?php echo lang('month_9'); ?></option>
                                                    <option value="Oct"><?php echo lang('month_10'); ?></option>
                                                    <option value="Nov"><?php echo lang('month_11'); ?></option>
                                                    <option value="Dec"><?php echo lang('month_12'); ?></option>
                                                </select>
                                            </spen>
                                            <spen class="col-sm-3 floatRight">
                                                <select class="form-control" name="TFRF">
                                                    <option value=""><?php echo lang('acc_from'); ?> </option>
                                                    <option value="Jan"><?php echo lang('month_1'); ?></option>
                                                    <option value="Feb"><?php echo lang('month_2'); ?></option>
                                                    <option value="Mar"><?php echo lang('month_3'); ?></option>
                                                    <option value="Apr"><?php echo lang('month_4'); ?></option>
                                                    <option value="May"><?php echo lang('month_5'); ?></option>
                                                    <option value="Jun"><?php echo lang('month_6'); ?></option>
                                                    <option value="Jul"><?php echo lang('month_7'); ?></option>
                                                    <option value="Aug"><?php echo lang('month_8'); ?></option>
                                                    <option value="Sep"><?php echo lang('month_9'); ?></option>
                                                    <option value="Oct"><?php echo lang('month_10'); ?></option>
                                                    <option value="Nov"><?php echo lang('month_11'); ?></option>
                                                    <option value="Dec"><?php echo lang('month_12'); ?></option>
                                                </select>
                                            </spen>
                                            </td>
                                            <td>
                                                <input class="col-xs-2 form-control"type="text" name="tutionFeeAmount" placeholder="   - - - - -">
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    03
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_fine'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control" type="text" name="fine" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    04
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_contri'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="Contributions" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    05
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_gamefee'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="game" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    06
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_libraryfee'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="library" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    07
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_labfee'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="laboratory" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    08
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_recept'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="receipt" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    09
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_sagg'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="square_girls_guide" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_electri'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="electricity" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    11
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_porfund'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="poor_fund" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    12
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_devecharge'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="development_charge" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    13
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_religion'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="religion" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    14
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_examfee'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="examination_fee" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    15
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_twf'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="teacher_welfare_fund" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    16
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_duepay'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="duePay" placeholder="   - - - - -">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    17
                                                </td>
                                                <td>
                                                    <?php echo lang('acc_others'); ?>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="OthersAmount" placeholder="   - - - - -">
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('submit'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    function studentInfo(str) {
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
        xmlhttp.open("GET", "index.php/account/studentInfoById?q=" + str, true);
        xmlhttp.send();
    }
</script>

<script>
    jQuery(document).ready(function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    });
</script>
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

