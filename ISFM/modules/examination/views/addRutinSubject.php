<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <?php
        foreach ($examInfo as $row) {
            $examID = $row['id'];
            $examTitle = $row['exam_title'];
            $startDate = $row['start_date'];
        }
        ?>
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i>  <?php echo lang('exa_mr_1') . ' ' . $examTitle . lang('exa_mr_1'); ?>
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
                        echo form_open('examination/completExamRoutin', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($successMessage)) {
                                echo $successMessage;
                            }
                            ?> 
                            <div class="alert alert-info">
                                <div class="form-group">
                                    <div id="div_scents">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" value="<?php echo $examID; ?>" name="examId">
                                                <h3 class="arpl"><?php echo lang('exa_exam'); ?> 1</h3>
                                                <input type="hidden" class="form-control" name="examSunjectFild" value="run">
                                                <div class="col-md-2 classGroupInput">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_ddmmyy'); ?>" value="<?php echo $startDate; ?>" name="examDate" readonly="" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <select class="form-control" name="day" data-validation="required" data-validation-error-msg="">
                                                        <option value=""><?php echo lang('exa_sd'); ?></option>
                                                        <?php foreach ($weeklyDay as $row2) { ?>
                                                            <option class="<?php echo $row2['status']; ?>" value="<?php echo $row2['day_name']; ?>"><?php echo $row2['day_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <select class="form-control" name="subject" data-validation="required" data-validation-error-msg="">
                                                        <option><?php echo lang('exa_ss'); ?></option>
                                                        <?php foreach ($subject as $row1) { ?>
                                                            <option value="<?php echo $row1['subject_title']; ?>"><?php echo $row1['subject_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_sub_code'); ?>" name="subjectCode" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_rnih'); ?>" name="romeNo" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_start_time'); ?>" name="starTima" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <input type="text" class="form-control" placeholder="<?php echo lang('exa_end_time'); ?>" name="endTima" data-validation="required" data-validation-error-msg="">
                                                </div>
                                                <div class="col-md-2 classGroupInput">
                                                    <select class="form-control" name="examShift">
                                                        <option><?php echo lang('exa_sele_shi'); ?></option>
                                                        <option><?php echo lang('exa_morn_shi'); ?></option>
                                                        <option><?php echo lang('exa_even_shi'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="addRoutineSubject col-md-12">
                                    <a id="addGroup" class="floatRight btn green">
                                        <i class="fa fa-plus"></i> <?php echo lang('exa_nexar'); ?>
                                    </a>
                                </div><div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('save'); ?></button>
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
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    $(function () {
        var maxFild = 15;
        var scntDiv = $('#div_scents');
        var i = $('#div_scents').size() + 1;

        var x = 1;
        $('#addGroup').live('click', function () {
            if (x < maxFild) {
                x++;
                $('<div id="remove" class="classGroupInput" ><hr><h3 class="arpl"><?php echo lang('exa_exam'); ?> ' + i + '</h3><input type="hidden" class="form-control" name="examSunjectFild_' + i + '" value="run"><div class="row"><div class="col-md-12"><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="<?php echo lang('exa_ddmmyy'); ?>" name="examDate_' + i + '" data-validation="required" data-validation-error-msg=""></div>\n\<div class="col-md-2 classGroupInput"><select class="form-control" name="day_' + i + '"><option><?php echo lang('exa_sd'); ?></option><?php foreach ($weeklyDay as $row2) { ?><option class="<?php echo $row2['status']; ?>"  value="<?php echo $row2["day_name"]; ?>"><?php echo $row2["day_name"]; ?></option><?php } ?></select></div><div class="col-md-2 classGroupInput"><select class="form-control" name="subject_' + i + '"><option><?php echo lang('exa_ss'); ?></option><?php foreach ($subject as $row1) { ?><option value="<?php echo $row1["subject_title"]; ?>"><?php echo $row1["subject_title"]; ?></option><?php } ?></select></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="<?php echo lang('exa_sub_code'); ?>" name="subjectCode_' + i + '" data-validation="required" data-validation-error-msg=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="<?php echo lang('exa_rnih'); ?>" name="romeNo_' + i + '" data-validation="required" data-validation-error-msg=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="<?php echo lang('exa_start_time'); ?>" name="starTima_' + i + '" data-validation="required" data-validation-error-msg=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="<?php echo lang('exa_end_time'); ?>" name="endTima_' + i + '" data-validation="required" data-validation-error-msg=""></div><div class="col-md-2 classGroupInput"><select class="form-control" name="examShift_' + i + '"><option><?php echo lang('exa_sele_shi'); ?></option><option><?php echo lang('exa_morn_shi'); ?></option><option><?php echo lang('exa_even_shi'); ?></option></select></div></div></div><a href="#" id="remGroup" class="arplremove">Remove</a></div>').appendTo(scntDiv);
                i++;
                return false;
            }
        });

        $('#remGroup').live('click', function () {
            if (i > 2) {
                $(this).parents('#remove').remove();
                i--;
                x--;
            }
            return false;
        });
    });
</script>
