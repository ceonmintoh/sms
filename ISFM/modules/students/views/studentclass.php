<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<?php $user = $this->ion_auth->user()->row();
$userId = $user->id; ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('stu_clas_pageTitle'); ?> <small></small>
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
                    <li>
                    <?php echo $this->common->class_title($class_id); ?> 
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->        
        <!-- BEGIN PAGE CONTENT-->        
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo $this->common->class_title($class_id) .' '. lang('stu_clas_table_title');
                            if (!empty($section)) {
                                echo $section;
                            }
                            ?>    
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('stu_clas_Student_ID'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Roll_No'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Photo'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Student_Name'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Phone_No'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Address'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_E-mail'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('stu_clas_Actions'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($studentInfo as $row) {
                                    //get student information from "user" table.
//                                    $class = $row['class_title'];
                                    $stuUserId = $row['user_id'];
                                    $query = $this->db->get_where('users', array('id' => $stuUserId));
                                    foreach ($query->result_array() as $row2) {
                                        $userdata = $row2;
                                    }
                                    $phoneNumber = $userdata['phone'];
                                    $email = $userdata['email'];

                                    //get student information from "student_info" table.
                                    $studentId = $row['student_id'];
                                    $qusry2 = $this->db->get_where('student_info', array('student_id' => $studentId));
                                    foreach ($qusry2->result_array() as $row3) {
                                        $userInfo = $row3;
                                    }
                                    $photo = $userInfo['student_photo'];
                                    $address = $userInfo['present_address'];
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['roll_number']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <img src="assets/uploads/<?php echo $photo; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $row['student_title']; ?>
                                        </td>
                                        <td>
                                            <?php echo $phoneNumber; ?>
                                        </td>
                                        <td>
                                            <?php echo $address ?>
                                        </td>
                                        <td>
                                            <?php echo $email; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green tableActionButtonMargin" href="index.php/students/students_details?id=<?php echo $row['id']; ?>&sid=<?php echo $studentId; ?>&userId=<?php echo $stuUserId; ?>"> <i class="fa fa-file-text-o"></i> <?php echo lang('stu_clas_Details'); ?> </a>
                                            <?php if($this->common->user_access('stud_edit_delete',$userId)){ ?>
                                                <a class="btn btn-xs default tableActionButtonMargin" href="index.php/students/editStudent?di=<?php echo $row['id']; ?>&sid=<?php echo $studentId; ?>&userId=<?php echo $stuUserId; ?>&class_id=<?php echo $class_id; ?>"> <i class="fa fa-pencil-square"></i> <?php echo lang('stu_clas_Edit'); ?> </a>
                                                <a class="btn btn-xs red tableActionButtonMargin" href="index.php/students/studentDelete?di=<?php echo $row['id']; ?>&sid=<?php echo $studentId; ?>&userId=<?php echo $stuUserId; ?>" onClick="javascript:return confirm('Are you sure you want to delete this student?')"> <i class="fa fa-trash-o"></i> <?php echo lang('stu_clas_Delete'); ?> </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
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


<!--Begin Page Level Script-->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<!--End Page Level Script-->
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
