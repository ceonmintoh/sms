<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit User's Info <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_hrm'); ?> 
                    </li>
                    <li>
                        <?php echo lang('header_employ_manage'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_employ_list'); ?>
                    </li>
                    <li>
                        <?php echo lang('hrm_esit_user'); ?>
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
                            <i class="fa fa-bars"></i> <?php echo lang('hrm_eyib'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <?php
                    $T_id = $this->input->get('id');
                    $u_Id = $this->input->get('uid');
                    ?>
                    <?php
                    foreach ($userInfo as $row) {
                        $first_name = $row['first_name'];
                        $lest_name = $row['last_name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                    }
                    foreach ($teacherInfo as $row1) {
                        $farther_name = $row1['farther_name'];
                        $mother_name = $row1['mother_name'];
                        $birth_date = $row1['birth_date'];
                        $sex = $row1['sex'];
                        $present_address = $row1['present_address'];
                        $permanent_address = $row1['permanent_address'];
//                        $position = $row1['position'];
//                        $subject  = $row1['subject'];
                        $working_hour = $row1['working_hour'];
                        if (!empty($row1['educational_qualification_1'])) {
                            $edu_1 = $row1['educational_qualification_1'];
                            $education_1 = array_map('trim', explode(",", $edu_1));
                        }
                        if (!empty($row1['educational_qualification_2'])) {
                            $edu_2 = $row1['educational_qualification_2'];
                            $education_2 = array_map('trim', explode(",", $edu_2));
                        }
                        if (!empty($row1['educational_qualification_3'])) {
                            $edu_3 = $row1['educational_qualification_3'];
                            $education_3 = array_map('trim', explode(",", $edu_3));
                        }
                        if (!empty($row1['educational_qualification_4'])) {
                            $edu_4 = $row1['educational_qualification_4'];
                            $education_4 = array_map('trim', explode(",", $edu_4));
                        }
                        if (!empty($row1['educational_qualification_5'])) {
                            $edu_5 = $row1['educational_qualification_5'];
                            $education_5 = array_map('trim', explode(",", $edu_5));
                        }
                        $cv = $row1['cv'];
                        $educational_certificat = $row1['educational_certificat'];
                        $exprieance_certificatte = $row1['exprieance_certificatte'];
                        $files_info = $row1['files_info'];
                    }
                    ?>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("users/edit_user?id=$T_id&uid=$u_Id", $form_attributs);
                        ?>
                        <div class="form-group atFormTop">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_fn'); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_ln'); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="<?php echo $lest_name; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_fathname'); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="father_name" class="form-control" value="<?php echo $farther_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_mothname'); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="mother_name" class="form-control" value="<?php echo $mother_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo lang('hrm_daofbi'); ?><span class="requiredStar"> * </span></label>
                            <div class="col-md-4">
                                <input class="form-control" name="birthdate" value="<?php echo $birth_date; ?>" id="mask_date2" type="text"/>
                                <span class="help-block"><?php echo lang('hrm_datetype'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> <?php echo lang('hrm_sex'); ?> <span class="requiredStar"> * </span></label>
                            <div class="col-md-6 marginLeftSex">
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" id="optionsRadios4" <?php
                                        if ($sex == 'Male') {
                                            echo 'checked';
                                        }
                                        ?>><?php echo lang('hrm_male'); ?></label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" id="optionsRadios5"  <?php
                                        if ($sex == 'Female') {
                                            echo 'checked';
                                        }
                                        ?>><?php echo lang('hrm_female'); ?> </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other" id="optionsRadios6"  <?php
                                        if ($sex == 'Other') {
                                            echo 'checked';
                                        }
                                        ?>><?php echo lang('hrm_other'); ?> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_present_add'); ?></label>
                            <div class="col-md-6">
                                <textarea rows="3" name="present_address" class="form-control"><?php echo $present_address; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_permant_add'); ?></label>
                            <div class="col-md-6">
                                <textarea rows="3" name="permanent_address" class="form-control"><?php echo $permanent_address; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_email'); ?></label>
                            <div class="col-md-6">
                                <div class="input-group col-md-12">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_phonum'); ?></label>
                            <div class="col-md-6">
                                <div class="input-group col-md-12">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_workinghour'); ?> <span class="requiredStar"> * </span></label>
                            <div class="col-md-6">
                                <select name="workingHoure" class="form-control">
                                    <option value="<?php echo $working_hour; ?>"><?php echo $working_hour; ?></option>
                                    <option value="Part time"><?php echo lang('hrm_pt'); ?></option>
                                    <option value="Full time"><?php echo lang('hrm_futi'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_edu_qua'); ?><span class="requiredStar"> * </span></label>
                            <div class="col-md-2">
                                <H4 class="eduFormTitle"><?php echo lang('hrm_degdip'); ?></H4>
                                <input class="form-control eduForm" name="dd_1" type="text" value="<?php
                                if (!empty($education_1['0'])) {
                                    echo $education_1['0'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="dd_2" type="text" value="<?php
                                if (!empty($education_2['0'])) {
                                    echo $education_2['0'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="dd_3" type="text" value="<?php
                                if (!empty($education_3['0'])) {
                                    echo $education_3['0'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="dd_4" type="text" value="<?php
                                if (!empty($education_4['0'])) {
                                    echo $education_4['0'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="dd_5" type="text" value="<?php
                                if (!empty($education_5['0'])) {
                                    echo $education_5['0'];
                                }
                                ?>">
                            </div>
                            <div class="col-md-3">
                                <H4 class="eduFormTitle"><?php echo lang('hrm_scu'); ?></H4>
                                <input class="form-control eduForm" name="scu_1" type="text" value="<?php
                                if (!empty($education_1['1'])) {
                                    echo $education_1['1'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="scu_2" type="text" value="<?php
                                if (!empty($education_2['1'])) {
                                    echo $education_2['1'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="scu_3" type="text" value="<?php
                                if (!empty($education_3['1'])) {
                                    echo $education_3['1'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="scu_4" type="text" value="<?php
                                if (!empty($education_4['1'])) {
                                    echo $education_4['1'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="scu_5" type="text" value="<?php
                                if (!empty($education_5['1'])) {
                                    echo $education_5['1'];
                                }
                                ?>">
                            </div>
                            <div class="col-md-2">
                                <H4 class="eduFormTitle"><?php echo lang('hrm_result'); ?></H4>
                                <input class="form-control eduForm" name="result_1" type="text" value="<?php
                                if (!empty($education_1['2'])) {
                                    echo $education_1['2'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="result_2" type="text" value="<?php
                                if (!empty($education_2['2'])) {
                                    echo $education_2['2'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="result_3" type="text" value="<?php
                                if (!empty($education_3['2'])) {
                                    echo $education_3['2'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="result_4" type="text" value="<?php
                                if (!empty($education_4['2'])) {
                                    echo $education_4['2'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="result_5" type="text" value="<?php
                                if (!empty($education_5['2'])) {
                                    echo $education_5['2'];
                                }
                                ?>">
                            </div>
                            <div class="col-md-2">
                                <H4 class="eduFormTitle"><?php echo lang('hrm_pass_year'); ?></H4>
                                <input class="form-control eduForm" name="paYear_1" type="text" value="<?php
                                if (!empty($education_1['3'])) {
                                    echo $education_1['3'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="paYear_2" type="text" value="<?php
                                if (!empty($education_2['3'])) {
                                    echo $education_2['3'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="paYear_3" type="text" value="<?php
                                if (!empty($education_3['3'])) {
                                    echo $education_3['3'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="paYear_4" type="text" value="<?php
                                if (!empty($education_4['3'])) {
                                    echo $education_4['3'];
                                }
                                ?>">
                                <input class="form-control eduForm" name="paYear_5" type="text" value="<?php
                                if (!empty($education_5['3'])) {
                                    echo $education_5['3'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="alert alert-success">
                            <strong><?php echo lang('hrm_note'); ?>:</strong> <?php echo lang('hrm_sadi'); ?>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> </label>
                            <div class="col-md-9">
                                <div class="checkbox-list">
                                    <label>
                                        <input type="checkbox" name="cv" <?php
                                        if (!empty($cv)) {
                                            echo 'checked value="submited"';
                                        }
                                        ?>> <?php echo lang('hrm_cvpcv'); ?> </label>
                                    <label>
                                        <input type="checkbox" name="educational_certificat"  <?php
                                        if (!empty($educational_certificat)) {
                                            echo 'checked value="submited"';
                                        }
                                        ?>> <?php echo lang('hrm_ec'); ?></label>
                                    <label>
                                        <input type="checkbox" name="exc" <?php
                                        if (!empty($exprieance_certificatte)) {
                                            echo 'checked value="submited"';
                                        }
                                        ?>> <?php echo lang('hrm_excer'); ?> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang('hrm_sfi'); ?><span class="requiredStar">  </span></label>
                            <div class="col-md-6">
                                <input type="text" name="submited_info" class="form-control" placeholder="<?php echo lang('hrm_sfi_plase'); ?>" value="<?php
                                if (!empty($files_info)) {
                                    echo $files_info;
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Update"><?php echo lang('hrm_updateButton'); ?></button>
                                <button type="button" onclick="javascript:history.back()" class="btn default"> <?php echo lang('back'); ?></button>
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

<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
//            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
