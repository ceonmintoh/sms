<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    All Notice <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_academic'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_notic'); ?>

                    </li>
                    <li>
                        <?php echo lang('header_all_notice'); ?>
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
                            <i class="fa fa-globe"></i><?php echo lang('not_nligb'); ?>  
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="table-checkbox">
                                    </th>
                                    <th>
                                        <?php echo lang('date'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('not_subject'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('not_mess'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('not_notfol'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('not_action'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($notice as $row) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>
                                        <td>
                                            <a href="index.php/notice/noticeDetails?dfgdfg_hid=<?php echo $row['id']; ?>"> <?php echo $row['subject']; ?> </a>
                                        </td>
                                        <td>
                                            <div id="ellipsis">
                                                    <?php echo $row['notice']; ?>
                                                </div>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-success noticeFlower">
                                                <?php echo $row['receiver']; ?> </span>
                                        </td>
                                        <td>
                                            <?php if ($this->ion_auth->is_admin()) { ?>
                                                <a class="btn btn-xs red" onClick="javascript:return confirm('Are you sure you want to delete this notice?')" href="#"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            <?php } ?>
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
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script>
    jQuery(document).ready(function () {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });

    var $p = $('#ellipsis p');
    var divh = $('#ellipsis').height();
    while ($p.outerHeight() > divh) {
        $p.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
        });
    }
</script>
