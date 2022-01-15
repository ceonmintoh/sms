<!-- Begin PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<!-- End PAGE STYLES -->
<!-- Begin CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('des_title'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('des_home'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        ?>
        <!-- BEGIN DASHBOARD-->
        <?php if ($this->common->user_access('das_top_info', $userId)) { ?>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $totalStudent; ?>
                            </div>
                            <div class="desc">
                                <?php echo lang('des_to_stu'); ?>
                            </div>
                        </div>
                        <div class="more dasTotalStudentTest">
                            <?php echo lang('des_th_sys'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <span class="icon-users totalTeacherSpan" aria-hidden="true"></span>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $totalTeacher; ?>
                            </div>
                            <div class="desc">
                                <?php echo lang('des_to_tea'); ?>
                            </div>
                        </div>
                        <div class="more dbilcss3">
                            <?php echo lang('des_th_sys'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $totalParents; ?>
                            </div>
                            <div class="desc">
                                <?php echo lang('des_to_pa'); ?>
                            </div>
                        </div>
                        <div class="more dbilcss3"> 
                            <?php echo lang('des_th_sys'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $totalAttendStudent; ?>
                            </div>
                            <div class="desc">
                                <?php echo lang('des_att_stu'); ?>
                            </div>
                        </div>
                        <div class="more dbilcss3">
                            <?php echo lang('des_to_att_stu'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php } if($this->ion_auth->is_accountant()){?>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn blue btn-block fee_button" onClick="javascript:return confirm('Are you sure you want to calculate all students fees for this month.')" href="index.php/home/end_stu_calcu" > Calculate Students Month End Fee </a>
                </div>
            </div>
        <?php } if ($this->common->user_access('das_grab_chart', $userId)) { ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bullhorn"></i><?php echo lang('des_c_a_a_p'); ?>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_activities_loading">
                                <img src="assets/admin/layout/img/loading.gif" alt="loading"/>
                            </div>
                            <div id="site_activities_content" class="display-none">
                                <div id="site_activities" class="dbilcss4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
            <div class="clearfix">
            </div>
        <?php } ?>
        <?php if ($this->ion_auth->is_student()) { ?>
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box green ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bars"></i><?php
                                $class_id;
                                echo $this->common->class_title($class_id);
                                ?> <?php echo lang('des_ful_rou'); ?>.
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="alert alert-warning">
                                <div class="portlet-body">
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
                                                $query = $this->common->getWhere22('class_routine', 'day_title', $dayTitle, 'class_id', $class_id);
                                                foreach ($query as $row4) {
                                                    ?>
                                                    <div class="">
                                                        <div class="col-sm-2 effect left_to_right dbilcss6">
                                                            <div class="backDiv subject">
                                                                <p class="dbilcss7"><?php echo $row4['subject']; ?></p>
                                                                <p class="dbilcss7"><?php echo $row4['subject_teacher']; ?></p>
                                                                <p class="dbilcss8"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                                <p class="dbilcss8">Rome: <?php echo $row4['room_number']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        <?php } ?>        
        <div class="row ">
            <?php if ($this->common->user_access('das_class_info', $userId)) { ?>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet purple box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i><?php echo lang('des_class_info'); ?>
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a class="reload" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller dbilcss9" data-always-visible="1" data-rail-visible="0">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    <?php echo lang('des_t_clas_name'); ?>
                                                </th>
                                                <th>
                                                    <?php echo lang('des_t_stu_amou'); ?>
                                                </th>
                                                <th>
                                                    <?php echo lang('des_daily_atten'); ?>%
                                                </th>
                                                <th>
                                                    <?php echo lang('des_yearly_atten'); ?>%
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($classInfo as $row) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['class_title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['student_amount']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['attendance_percentices_daily']; ?>%
                                                    </td>
                                                    <td>
                                                        <?php echo $row['attend_percentise_yearly']; ?>%
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="index.php/sclass/allClass"><?php echo lang('des_see_f_info'); ?></a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } if ($this->common->user_access('das_message', $userId)) { ?>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet box divHeaderCss tasks-widget">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-envelope-o"></i><?php echo lang('des_mess_b'); ?>
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a href="" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body messageHeight">
                            <div class="task-content">
                                <div class="scroller dbilcss10" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="feeds">
                                        <?php
                                        foreach ($massage as $row) {
                                            $senderId = $row['sender_id'];
                                            $query = $this->common->getWhere('users', 'id', $senderId);
                                            foreach ($query as $row1) {
                                                $senderName = $row1['username'];
                                            }
                                            ?>
                                            <li class="<?php
                                            if ($row['read_unread'] == 0) {
                                                echo 'unreadMassage';
                                            }
                                            ?>">
                                                <a href="index.php/message/readMassage?id=<?php echo $row['id']; ?>">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <?php echo lang('des_from'); ?> : <?php echo $senderName; ?> 
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc">
                                                                    <?php echo lang('des_subj'); ?> : <?php echo $row['subject']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date">
                                                            <?php echo date('h.mA - d/m/Y', $row['date']); ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="task-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="index.php/message/inbox"><?php echo lang('des_s_all_mess'); ?></a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } if ($this->common->user_access('das_employ_attend', $userId)) { ?>

                <div class="col-md-2 col-sm-2 margin-top-20">
                    <div class="col-md-12 teaBox">
                        <div class="teacInfoHead1"><?php echo lang('des_present'); ?><hr style="margin-top: 10px; margin-bottom: 10px;"><?php echo $presentEmploy; ?></div>
                    </div>
                    <div class="col-md-12 teaBox teaBoxMargin">
                        <div class="teacInfoHead2"><?php echo lang('des_absent'); ?><hr style="margin-top: 10px; margin-bottom: 10px;"><?php echo $absentEmploy; ?></div>
                    </div>
                    <div class="col-md-12 teaBox teaBoxMargin">
                        <div class="teacInfoHead3"><?php echo lang('des_leave'); ?><hr style="margin-top: 10px; margin-bottom: 10px;"><?php echo $leaveEmploy; ?></div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-5">
                    <div class="portlet box green-meadow tasks-widget">
                        <div class="portlet-title">
                            <div class="caption">
                                <?php echo lang('des_t_e_atte'); ?>
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a href="" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller dbilcss9" data-always-visible="1" data-rail-visible="0">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    <?php echo lang('des_teac_name'); ?>
                                                </th>
                                                <th>
                                                    <?php echo lang('des_stud'); ?>
                                                </th>
                                                <th>
                                                    <?php echo lang('des_in_time'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($teacherAttendance as $row) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['employ_title']; ?>
                                                    </td>
                                                    <td>                                                        
                                                        <?php
                                                        if ($row['present_or_absent'] == 'Present') {
                                                            echo '<span class="label label-sm label-success">' . $row['present_or_absent'] . '</span>';
                                                        } elseif ($row['present_or_absent'] == 'Absent') {
                                                            echo '<span class="label label-sm label-danger">' . $row['present_or_absent'] . '</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['attend_time']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <!--<a href="index.php/sclass/allClass">See Full Information</a>-->
                                    <!--<i class="icon-arrow-right"></i>-->
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->common->user_access('das_notice', $userId)) { ?>  
                <div class="col-md-5 col-sm-5">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bell-o"></i><?php echo lang('des_notice_board'); ?>
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a class="reload" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body dsb_notice_hi">
                            <div class="task-content">
                                <div class="scroller dbilcss11" data-always-visible="1" data-rail-visible1="1">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <?php echo lang('date'); ?>
                                                </th>
                                                <th class="nsubwid">
                                                    <?php echo lang('des_subject'); ?>
                                                </th>
    <!--                                                <th>
                                                    Massage
                                                </th>-->
                                                <th>
                                                    <?php echo lang('des_notic_follower'); ?>
                                                </th>
                                                <th>
                                                    <?php echo lang('des_vew_details'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($notice as $row) { ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <?php echo $row['date']; ?>
                                                    </td>
                                                    <td class="nsubwid">
                                                        <div id="ellipsis">
                                                            <p>
                                                                <?php echo $row['subject']; ?>
                                                            </p>
                                                        </div>
                                                    </td>
        <!--                                                    <td>
                                                    <?php echo $row['notice']; ?>
                                                    </td>-->
                                                    <td>
                                                        <span class="label label-sm label-success dbilcss2"> <?php echo $row['receiver']; ?> </span>
                                                    </td>
                                                    <td>
                                                        <a href="index.php/notice/noticeDetails?dfgdfg_hid=<?php echo $row['id']; ?>" class="btn btn-xs green"> <i class="fa fa-paper-plane-o"></i> View Details </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="task-footer">
                                    <div class="btn-arrow-link pull-right">
                                        <a href="index.php/notice/allNotice"><?php echo lang('des_s_all_no'); ?></a>
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
        <div class="row ">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet purple box calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php echo lang('des_calender'); ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="calendar" class="has-toolbar">
                                </div><br>
                                <div class="task-footer">

                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                        <!-- END CALENDAR PORTLET-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>

<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));

        if (!jQuery.plot) {
            return;
        }

        function showChartTooltip(x, y, xValue, yValue) {
            $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff'
            }).appendTo("body").fadeIn(200);
        }

        var data = [];
        var totalPoints = 250;

        if ($('#site_activities').size() !== 0) {
            //site activities
            var previousPoint2 = null;
            $('#site_activities_loading').hide();
            $('#site_activities_content').show();
            var data1 = [
<?php
foreach ($classAttendance as $cap) {
    echo "['" . $cap['class_title'] . "', " . $cap['attendance_percentices_daily'] . "],";
}
?>
            ];


            var plot_statistics = $.plot($("#site_activities"),
                    [{
                            data: data1,
                            lines: {
                                fill: 0.4,
                                lineWidth: 0
                            },
                            color: ['#BAD9F5']
                        }, {
                            data: data1,
                            points: {
                                show: true,
                                fill: true,
                                radius: 4,
                                fillColor: "#9ACAE6",
                                lineWidth: 2
                            },
                            color: '#9ACAE6',
                            shadowSize: 1
                        }, {
                            data: data1,
                            lines: {
                                show: true,
                                fill: false,
                                lineWidth: 3
                            },
                            color: '#9ACAE6',
                            shadowSize: 0
                        }],
                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 8,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

            $("#site_activities").bind("plothover", function (event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint2 !== item.dataIndex) {
                        previousPoint2 = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' %');
                    }
                }
            });
        }

    });
</script>


<script>

    jQuery(document).ready(function () {
        if (!jQuery().fullCalendar) {
            return;
        }
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var h = {};


        $('#calendar').fullCalendar('destroy'); // destroy the calendar
        $('#calendar').fullCalendar({//re-initialize the calendar
            header: h,
            defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
            slotMinutes: 15,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.className = $(this).attr("data-class");

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
<?php
foreach ($event as $eve) {
    $title = $eve['title'];
    $star_date = explode("-", $eve['start_date']);
    $s_d = $star_date[0];
    $s_m = $star_date[1] - 1;
    $s_y = $star_date[2];
    $end_date = explode("-", $eve['end_date']);
    $e_d = $end_date[0];
    $e_m = $end_date[1] - 1;
    $e_y = $end_date[2];
    $color = $eve['color'];
    $url = $eve['url'];
    echo '{title: "' . $eve['title'] . '",
                        start: new Date(' . $s_y . ',' . $s_m . ',' . $s_d . '),
                        end: new Date(' . $e_y . ',' . $e_m . ',' . $e_d . '),
                        backgroundColor: Metronic.getBrandColor("' . $color . '"),
                        url: "' . $url . '",},';
}
?>
            ]
        });
    });

    var $p = $('#ellipsis p');
    var divh = $('#ellipsis').height();
    while ($p.outerHeight() > divh) {
        $p.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
        });
    }
</script>
