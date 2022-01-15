<?php $user = $this->ion_auth->user()->row(); $userId = $user->id;?>
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Students Details <small> Information</small>
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
                        <?php echo lang('header_stude'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_stu_info'); ?>

                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->


        <div class="row">
            <!---Start Left Site Content-->
            <div class="col-md-8">
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                        <li class="detailsPicture">
                            <img alt="" class="img-responsive" src="assets/uploads/<?php echo $photo; ?>">
                        </li>
                        <?php if($this->common->user_access('stud_edit_delete',$userId)){ ?>
                            <li>
                                <?php
                                $studentClassId = $this->input->get('di');
                                $studentInfoId = $this->input->get('sid');
                                $stuUserId = $this->input->get('userId');
                                $class = $this->input->get('class');
                                ?>
                                <a href="index.php/students/editStudent?di=<?php echo $studentClassId; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $stuUserId; ?>&class=<?php echo $class; ?>">
                                    <i class="fa fa-cog"></i> <?php echo lang('stu_edit_info'); ?> </a>
                                <span class="after">
                                </span>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="javascript:history.back()">
                                <i class="fa fa-mail-reply-all"></i> <?php echo lang('back'); ?> </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 stuInfoTableBG">
                    <div class="row">
                        <div class="col-md-12 profile-info">
                            <?php
                            foreach ($studentInfo as $row) {
                                $stuUserId = $row['user_id'];
                                $studentId = $row['student_id'];
                                $studentPercentise = $row['attendance_percentices_daily'];
                                $query = $this->db->get_where('users', array('id' => $stuUserId));
                                foreach ($query->result_array() as $row1) {
                                    $data = $row1;
                                }
                                $first_name = $data['first_name'];
                                $last_name = $data['last_name'];
                                $email = $data['email'];
                                $phone = $data['phone'];

                                $query2 = $this->db->get_where('student_info', array('student_id' => $studentId));
                                foreach ($query2->result_array() as $row2) {
                                    $data2 = $row2;
                                }
                                $sex = $data2['sex'];
                                $dateOfBireth = $data2['birth_date'];
                                $fartherName = $data2['farther_name'];
                                $motherName = $data2['mother_name'];
                                $presentAddress = $data2['present_address'];
                                $permanentAddress = $data2['permanent_address'];
                                $fatherOccupation = $data2['father_occupation'];
                                $fatherIncomRange = $data2['father_incom_range'];
                                $motherOccupation = $data2['mother_occupation'];
                                $documentsInfo = $data2['documents_info'];
                                ?>
                                <h1 class="teacherTitleFont"><?php echo $first_name . ' ' . $last_name; ?></h1>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <span>: </span>
                                        <?php echo lang('stu_d_class'); ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $row['class_title']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_rn'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $row['roll_number']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_sid'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $row['student_id']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_section'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $row['section']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_email'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $email; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_pn'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $phone; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_db'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $dateOfBireth; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_sex'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $sex; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_fn'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $fartherName; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_mn'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $motherName; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_pad'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $presentAddress; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_pera'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $permanentAddress; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_fo'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $fatherOccupation; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_fir'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $fatherIncomRange; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_moc'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $motherOccupation; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 detailsEvent">
                                        <?php echo lang('stu_d_din'); ?>
                                        <span>: </span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 detailsEvent">
                                        <?php echo $documentsInfo; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!---End Left Site Content-->
            <!---Start Right Site Content-->
            <div class="col-md-4">
                <div class="col-md-12 stuInfoTableBG">
                    <div class="portlet sale-summary">
                        <div class="portlet-title">
                            <div class="caption">
                                <?php echo lang('stu_d_ai'); ?>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="sale-info">
                                        <?php echo lang('stu_d_atten'); ?> % <i class="fa fa-img-up"></i>
                                    </span>
                                    <span class="sale-num">
                                        <?php echo $studentPercentise; ?> % </span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-xs-6 detailsEvent">
                                <?php echo lang('stu_d_addy'); ?> <span>: </span>
                            </div>
                            <div class="col-sm-7 col-xs-6 detailsEvent">
                                <?php echo $data2['starting_year']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---Start Rigth Site Content-->
        </div>
        <!-- BEGIN TAB PORTLET-->
        <div class="portlet box stuDentDetails tabbable">
            <div class="portlet-title">
                <div class="caption">
                    <?php echo lang('stu_d_ems'); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class=" portlet-tabs">
                    <ul class="nav nav-tabs" onp>
                        <?php
                        $exTitle = array();
                        //Here is checked exam by class title
                        $class_id = $row['class_id'];
                        $yearR = date('Y');
                        $query3 = $this->db->query("SELECT id,exam_title FROM add_exam WHERE class_id=$class_id AND year=$yearR");
                        $i = 1;
                        foreach ($query3->result_array() as $row3) {
                            ?>
                            <li class="<?php
                            if ($i == 1) {
                                echo 'active';
                            }
                            ?>">
                                <a href="#portlet_tab2_<?php echo $i; ?>" data-toggle="tab">
                                    <?php echo $row3['exam_title']; ?> </a>
                            </li>
                            <?php
                            $exTitle[] = $row3;
                            $i++;
                        }
                        ?>
                    </ul>

                    <div class="tab-content">
                        <?php
                        $c = 1;
                        foreach ($exTitle as $exex) {
//                                    echo $exex['id'].'<br>';
                            $markSheet = $this->studentmodel->markshit($exex['exam_title'], $class_id, $row['student_id']);
                            ?>
                            <div class="tab-pane <?php
                            if ($c == 1) {
                                echo 'active';
                            }
                            ?>" id="portlet_tab2_<?php echo $c; ?>">

                                <div class="row">
                                    <div class="col-md-12" id="print">
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <?php
                                                    echo lang('stu_d_emso');
                                                    echo $exex['exam_title'];
                                                    ?> 
                                                </div>
                                                <div class="tools">
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <br>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <?php echo lang('stu_d_sub'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('stu_d_mar'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('stu_d_grad'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('stu_d_point'); ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo lang('stu_d_result'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($markSheet as $MarShee) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $MarShee['exam_subject']; ?> 
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $MarShee['mark']; ?> 
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $MarShee['grade']; ?> 
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $MarShee['point']; ?> 
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $MarShee['result']; ?> 
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div><div style="clear:both;"></div>
                                                <?php
                                                $query4 = $this->db->query("SELECT total_mark,final_grade,point,fail_amount FROM final_result Where student_id='$studentId'");
                                                foreach ($query4->result_array() as $row5) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-3">
                                                                <div class="resultBox_a">
                                                                    <h4><?php echo lang('stu_d_tm'); ?></h4><?php echo $row5['total_mark']; ?></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="resultBox_b">
                                                                    <h4><?php echo lang('stu_d_grad'); ?></h4><?php echo $row5['final_grade']; ?></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="resultBox_c">
                                                                    <h4><?php echo lang('stu_d_point'); ?></h4><?php echo $row5['point']; ?></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="resultBox_d">
                                                                    <h4><?php echo lang('stu_d_fsa'); ?></h4><?php echo $row5['fail_amount']; ?></div>
                                                            </div>
                                                        </div></div>
                                                <?php } ?>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $c++;
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- END TAB PORTLET-->

    </div>
</div>
<!-- END CONTENT -->]

<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
