<!--Start page level style-->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_set_em_sa'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?> 
                    </li>
                    <li>
                        <?php echo lang('con_configu'); ?> 
                    </li>
                    <li>
                        <?php echo lang('con_acco_sett'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_set_n_e_sa'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-5 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('con_s_emp_sfom'); ?>
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
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open_multipart('configuration/employSalary', $form_attributs);
                        ?>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_employee'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-7">
                                    <select onchange="eployInfo(this.value)" class="form-control" name="emplyId" data-validation="required" data-validation-error-msg="<?php echo lang('con_yhtsao'); ?>">
                                        <option value=""> <?php echo lang('select'); ?> </option>
                                        <?php
                                        foreach ($emplaye as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="ajaxResult"> </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_job_post'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-7">
                                    <select class="form-control" name="job_post" data-validation="required" data-validation-error-msg="<?php echo lang('con_yhtsao'); ?>">
                                        <option value=""><?php echo lang('select'); ?> </option>
                                        <option value="Headmaster"> <?php echo lang('headmaster'); ?> </option>
                                        <option value="Assistant Headmaster"> <?php echo lang('asis_headmaster'); ?> </option>
                                        <option value="Senior Teacher"> <?php echo lang('senior_teacher'); ?> </option>
                                        <option value="Teacher"> <?php echo lang('teacher'); ?> </option>
                                        <option value="Accountant"> <?php echo lang('accountant'); ?> </option>
                                        <option value="Librarian"> <?php echo lang('librarian'); ?> </option>
                                        <option value="Driver"> <?php echo lang('driver'); ?> </option>
                                        <option value="Clerk"> <?php echo lang('clerk'); ?> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_basic_pay'); ?><span class="requiredStar"> * </span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="" value="" name="basic_pay" data-validation="required" data-validation-error-msg="<?php echo lang('con_ple_gtbsa'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_hou_rent'); ?> <span class="requiredStar">  </span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="For 1 month" value="" name="treatment">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo lang('con_increased'); ?><span class="requiredStar">  </span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="" value="" name="increased">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> <?php echo lang('con_other'); ?> <span class="requiredStar">  </span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="" value="" name="others">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-1 col-md-10">
                                <button type="submit" class="btn green" name="submit" value="Save"><?php echo lang('con_save_salary_set'); ?></button>
                                <button type="reset" class="btn purple"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <div class="col-md-7">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('con_sch_emp_sala'); ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('slno'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_emp_title'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_job_post'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_basic_pay'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_hou_rent'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_increased'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_other'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('con_total_salary'); ?>
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php $i = 1; foreach ($salaryInfo as $row1) { ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <?php echo $row1['employe_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['job_post']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['basic']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['treatment']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['increased']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['others']; ?>                                            
                                        </td>
                                        <td>
                                            <?php echo $row1['total']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php/configuration/editEmploySalary?rId=<?php echo $row1['id']; ?>"> <i class="fa fa-send-o"></i> <?php echo lang('edit'); ?> </a>
                                            <a class="btn btn-xs red" href="index.php/configuration/setEmployDelete?rId=<?php echo $row1['id']; ?>&uId=<?php echo $row1['employ_user_id']; ?>" onClick="javascript:return confirm('<?php echo lang('con_con_dele_sala_sett'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                        </td>
                                    </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });   
    
    function eployInfo(str) {
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
        xmlhttp.open("GET", "index.php/configuration/ajaxEmployInfo?uId=" + str, true);
        xmlhttp.send();
    }
</script>