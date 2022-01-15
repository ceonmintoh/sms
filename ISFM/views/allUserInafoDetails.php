<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('hrm_emd'); ?> <small></small>
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
                        <?php echo lang('hrm_details'); ?>
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
                    <?php if ($this->ion_auth->is_admin()) { ?>
                        <li>

                            <a href="index.php/users/edit_user?id=<?php echo $teacherID; ?>&uid=<?php echo $userId; ?>">
                                <i class="fa fa-cog"></i> <?php echo lang('hrm_edit_info'); ?> </a>
                            <span class="after">
                            </span>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:history.back()">
                            <i class="fa fa-mail-reply-all"></i><?php echo lang('back'); ?> </a>

                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8 profile-info datilsBodyMB">
                        <?php
                        foreach ($userinfo as $row) {
                            foreach ($user as $row1) {
                                $userName = $row1['username'];
                                $email = $row1['email'];
                                $phoneNumber = $row1['phone'];
                            }
                            ?>

                            <h1 class="teacherTitleFont"><?php echo $userName; ?></h1>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_fathname'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['farther_name']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_mothname'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['mother_name']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_email'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $email; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_phonum'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $phoneNumber; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_daofbi'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['birth_date']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_sex'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['sex']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_present_add'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['present_address']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_permant_add'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['permanent_address'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_dinfo'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['files_info']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <?php echo lang('hrm_workinghour'); ?>
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
                                    <?php echo $row['working_hour']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!--end col-md-8-->
                    <div class="col-md-4">
                        <div class="portlet sale-summary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo lang('hrm_empdes'); ?>
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
                                            <strong><?php echo $this->common->group_name($row['group_id']); ?></strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="alert alert-info marginBottomNone">
                                            <strong><?php echo $row['working_hour']; ?></strong>
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
                                <?php echo lang('hrm_edu_qua'); ?> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_1_11" class="tab-pane active">
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo lang('hrm_degdip'); ?>
                                            </th>
                                            <th class="hidden-xs">
                                                <?php echo lang('hrm_scu'); ?>
                                            </th>
                                            <th>
                                                <?php echo lang('hrm_result'); ?>
                                            </th>
                                            <th>
                                                <?php echo lang('hrm_pass_year'); ?>
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
                                            $edu_3 = $row['educational_qualification_2'];
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
                                            $edu_4 = $row['educational_qualification_2'];
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
                                            $edu_5 = $row['educational_qualification_2'];
                                            $education_5 = array_map('trim', explode(",", $edu_6));
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