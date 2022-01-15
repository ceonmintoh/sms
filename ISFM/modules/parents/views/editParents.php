<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('par_epi'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_stu_paren'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_parent_info'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_give_pare_acc'); ?>
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
                            <i class="fa fa-bars"></i> <?php echo lang('par_gtppei'); ?>
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
                        $u_id = $this->input->get('UcsHeRnHdtfgrfGshId', TRUE);
                        $P_I_Id = $this->input->get('pdfdsfAjhgdfrRdfeNdsfdtSjdcfgdInfOdfgdfhIdnfd', TRUE);
                        ?>
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open("parents/editParentsInfo?painid=$P_I_Id&puid=$u_id", $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            foreach ($info as $row) {
                                $userId = $row['user_id'];
                                $data = array();
                                $query = $this->db->get_where('users', array('id' => $userId));
                                foreach ($query->result_array() as $row1) {
                                    $firstName = $row1['first_name'];
                                    $last_name = $row1['last_name'];
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_cla_tit'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="class_title" value="<?php echo $this->common->class_title($row['class_id']); ?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_stu_id'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="class_title" value="<?php echo $row['student_id']; ?>" readonly="">
                                    </div>
                                </div>
                                <div id="ajaxResult">

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_gafn'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $firstName; ?>" name="first_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_galn'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $last_name; ?>"  name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_rela'); ?> <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['relation']; ?>"  name="guardianRelation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_email'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="demo@demo.com" value="<?php echo $row['email']; ?>"  name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('par_pho_num'); ?><span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['phone']; ?>"  name="phone" >
                                    </div>
                                </div>
                            </div>
<?php } ?>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Submit"><?php echo lang('par_update'); ?></button>
                                <button type="reset" class="btn default" onclick="location.href = 'javascript:history.back()'"> <?php echo lang('back'); ?></button>
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
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

