<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('tea_td'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_teacher'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_tea_info'); ?>
                    </li>
                    <li>
                        <?php echo lang('details'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-3">
                <?php
                $photo = $this->input->get('photo');
                $teacherID = $this->input->get('id');
                $userId = $this->input->get('uid');
                ?>
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="detailsPicture">
                        <img alt="" class="img-responsive" src="assets/uploads/<?php echo $photo; ?>">
                    </li>
                    <li>
                        <a href="javascript:history.back()">
                            <i class="fa fa-mail-reply-all"></i> <?php echo lang('back'); ?></a>

                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8 profile-info datilsBodyMB">
                        <?php
                        foreach ($teacher as $row) {
                            $subject = $row['subject'];
                            $position = $row['position'];
                            $workingHour = $row['working_hour'];
                            $dateOfBirth = $row['birth_date'];
                            $sex = $row['sex'];
                            $fatherName = $row['farther_name'];
                            $motherName = $row['mother_name'];
                            $presentAddress = $row['present_address'];
                            $permanentAddress = $row['permanent_address'];
                            $documentsInfo = $row['files_info'];
                            foreach ($user as $row1) {
                                $userName = $row1['username'];
                                $email = $row1['email'];
                                $phoneNumber = $row1['phone'];
                            }
                            ?>

                            <h1 class="teacherTitleFont"><?php echo $userName; ?></h1>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <span>: </span>
                                    <?php echo lang('tea_subj'); ?>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['subject']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_posi'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $position; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_wh'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $workingHour; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_email'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $email; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_pn'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $phoneNumber; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_dob'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php
                                    echo $dateOfBirth;
                                    ;
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_sex'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $sex; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_fn'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $fatherName; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_mn'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $motherName; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_prea'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $presentAddress; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_per_add'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $permanentAddress ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('tea_docinfo'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $documentsInfo; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!--end col-md-8-->
                    <div class="col-md-4">
                        <div class="portlet sale-summary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('tea_tede'); ?>
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="alert alert-success marginBottomNone">
                                            <strong><?php echo $position; ?></strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="alert alert-info marginBottomNone">
                                            <strong><?php echo $workingHour; ?></strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
                <div class="tabbable tabbable-custom tabbable-custom-profile">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#tab_1_11">
                                <?php echo lang('tea_eq'); ?> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_1_11" class="tab-pane active">
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo lang('tea_dd'); ?>
                                            </th>
                                            <th class="hidden-xs">
                                                <?php echo lang('tea_scu'); ?>
                                            </th>
                                            <th>
                                                <?php echo lang('tea_result'); ?>
                                            </th>
                                            <th>
                                                <?php echo lang('tea_py'); ?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($row['educational_qualification_1'])) {
                                            $edu_1 = $row['educational_qualification_1'];
                                            $education_1 = array_map('trim', explode(",", $edu_1));
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $education_1['0']; ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?php echo $education_1['1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_1['2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_1['3']; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        if (!empty($row['educational_qualification_2'])) {
                                            $edu_2 = $row['educational_qualification_2'];
                                            $education_2 = array_map('trim', explode(",", $edu_2));
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $education_2['0']; ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?php echo $education_2['1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_2['2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_2['3']; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        if (!empty($row['educational_qualification_3'])) {
                                            $edu_3 = $row['educational_qualification_3'];
                                            $education_3 = array_map('trim', explode(",", $edu_3));
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $education_3['0']; ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?php echo $education_3['1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_3['2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_3['3']; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        if (!empty($row['educational_qualification_4'])) {
                                            $edu_4 = $row['educational_qualification_4'];
                                            $education_4 = array_map('trim', explode(",", $edu_4));
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $education_4['0']; ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?php echo $education_4['1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_4['2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_4['3']; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        if (!empty($row['educational_qualification_5'])) {
                                            $edu_5 = $row['educational_qualification_5'];
                                            $education_5 = array_map('trim', explode(",", $edu_5));
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $education_5['0']; ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?php echo $education_5['1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_5['2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $education_5['3']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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