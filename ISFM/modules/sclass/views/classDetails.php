<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Class Details <small> Information</small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        
                    </li>
                    <li>
                        Class
                        
                    </li>
                    <li>
                        All Class
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php foreach ($class as $row){
            $class_id = $row['id'];
            $classTile = $row['class_title'];
            $totalStudent = $row['student_amount'];
        }?>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="portlet sale-summary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo $classTile; ?>  Information
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
                                            Total Students
                                        </span>
                                        <span class="sale-num">
                                            <?php echo $totalStudent; ?> </span>
                                    </li>
                                    <li>
                                        <span class="sale-info">
                                            Section <i class="fa fa-img-down"></i>
                                        </span>
                                        <span class="sale-num">
                                            <?php echo $classSection; ?> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9 profile-info datilsBodyMB">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo $classTile; ?> Subjects And Teachers
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Subject Title
                                                </th>
                                                <th>
                                                    Subject Teacher
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach($subject as $row){?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['subject_title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['subject_teacher']; ?>
                                                </td>

                                            </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
                <div class="row">

                    <div class="col-md-12 profile-info datilsBodyMB">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo $classTile; ?> Weekly Class Routine
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body classDetailsColor">
                                <?php
                                foreach ($day as $row3) {
                                    $dayTitle = $row3['day_name'];
                                    $dayStatus = $row3['status'];
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 dbilcss5">
                                            <div class="col-sm-2 day <?php echo $dayStatus; ?>">
                                                <?php echo $dayTitle; ?>
                                            </div>
                                            <?php
                                            //$query = array();
                                            $query = $this->classmodel->getWhere('class_routine', 'day_title', $dayTitle, 'class_id', $class_id);
                                            foreach ($query as $row4) {
                                                ?>
                                                <div class="col-sm-2 subject dbilcss6">

                                                    <p class="dbilcss7"><?php echo $row4['subject']; ?></p>
                                                    <p class="dbilcss7"><?php echo $row4['subject_teacher']; ?></p>
                                                    <p class="dbilcss8"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                    <p class="dbilcss8">Rome: <?php echo $row4['room_number']; ?></p>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </div>
                        <div class="col-md-offset-3 col-md-6">
                            <a class="btn blue btn-block classDetailsFont" href="javascript:history.back()">
                                <i class="fa fa-mail-reply-all"></i> Go Back </a>
                        </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
