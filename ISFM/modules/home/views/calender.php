<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('cal_calender'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                        
                    </li>
                    <li>
                        <?php echo lang('cal_calender'); ?>
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
                <div class="portlet box green-meadow calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php echo lang('cal_calender'); ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="calendar" class="has-toolbar">
                                </div>
                            </div>
                        </div>
                        <!-- END CALENDAR PORTLET-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<!--<script src="assets/admin/pages/scripts/calendar.js"></script>-->
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    
    jQuery(document).ready(function() {
            if (!jQuery().fullCalendar) {
                return;
            }
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};


            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
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
                    foreach ($event as $eve){
                        $title = $eve['title'];
                        $star_date = explode("-",$eve['start_date']);
                        $s_d = $star_date[0];
                        $s_m = $star_date[1]-1;
                        $s_y = $star_date[2];
                        $end_date =  explode("-",$eve['end_date']);
                        $e_d = $end_date[0];
                        $e_m = $end_date[1]-1;
                        $e_y = $end_date[2];
                        $color = $eve['color'];
                        $url = $eve['url'];
                    echo '{title: "'.$eve['title'].'",
                        start: new Date('.$s_y.','.$s_m.','. $s_d.'),
                        end: new Date('.$e_y.','.$e_m.','. $e_d.'),
                        backgroundColor: Metronic.getBrandColor("'.$color.'"),
                        url: "'.$url.'",},';
                    }
                    ?>
                ]
            });
    });
</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
