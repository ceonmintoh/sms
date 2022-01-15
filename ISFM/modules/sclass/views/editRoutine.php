<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('clas_edi_cla_rout'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_routin'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('header_stu_timble'); ?>
                    </li>
                    <li>
                        <?php echo lang('clas_edit_routin'); ?>
                    </li>

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
                            <i class="fa fa-bars"></i> <?php echo lang('clas_edi_rou_for');
                            $class_id = $this->input->get('class');
                            echo $this->common->class_title($class_id);
                            ?>
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
                        $id = $this->input->get('id');
                        echo form_open("sclass/editRoutine?id=$id&class=$class_id", $form_attributs);
                        ?>

                        <div class="form-body">
                            <div class="alert alert-info marginBottomNone">
                                <div class="form-group marginBottomNone">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            if (!empty($message)) {
                                                echo $message;
                                            }
                                            ?>
                                            <?php foreach ($previousRoutin as $routin) { ?>
                                                <input type="hidden" name="class" value="<?php
                                            echo $this->common->class_title($class_id);
                                            ?>">
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="day" required="">
                                                        <option value="<?php echo $routin['day_title']; ?>" class="editRoutineSelectColor"><?php echo $routin['day_title']; ?></option>
    <?php foreach ($day as $row) { ?>
                                                            <option class="<?php echo $row['status']; ?>"><?php echo $row['day_name']; ?></option>
    <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="subject" required="">
                                                        <option value="<?php echo $routin['subject']; ?>" class="editRoutineSelectColor"><?php echo $routin['subject']; ?></option>
    <?php foreach ($subject as $row1) { ?>
                                                            <option><?php echo $row1['subject_title'] ?></option>
    <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="teacher" required="">
                                                        <option value="<?php echo $routin['subject_teacher']; ?>" class="editRoutineSelectColor"><?php echo $routin['subject_teacher']; ?></option>
    <?php foreach ($teacher as $row2) { ?>
                                                            <option><?php echo $row2['fullname'] ?></option>
    <?php } ?>
                                                        <option>Sunday</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="Start Time" value="<?php echo $routin['start_time']; ?>" name="startTime" required="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="End Time" value="<?php echo $routin['end_time']; ?>" name="endTime" required="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="Rome No" value="<?php echo $routin['room_number']; ?>" name="roomNumber" required="">
                                                </div>
<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid marginTopNone">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn blue" type="submit" name="update" value="Update"><?php echo lang('clas_up_button'); ?></button>

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
</div>
