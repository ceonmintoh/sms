<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    My Dues & Pay  <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        
                    </li>
                    <li>
                        Account
                        
                    </li>
                    <li>
                        My Payments
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
                <?php
                if (!empty($message)) {
                    echo '<br>' . $message;
                }
                ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_stsl'); ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table id="sample_1" class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>
                                        S.N.
                                    </th>
                                    <th>
                                        Year
                                    </th>
                                    <th>
                                        Month
                                    </th>
                                    <th>
                                        Class
                                    </th>
                                    <th>
                                        Student ID
                                    </th>
                                    <th>
                                        Student Title
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Paid
                                    </th>
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($slips as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['year']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['month']; ?>
                                        </td>
                                        <td>
                                            <?php echo $this->common->class_title($row['class_id']); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $this->common->student_title($row['student_id']); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['total']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['paid']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['mathod']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($row['status']=='Unpaid'){
                                                echo '<span class="label label-sm label-danger">'. $row['status'] .'</span>';
                                            } elseif ($row['status']=='Not Clear'){
                                                echo '<span class="label label-sm label-warning">'. $row['status'] .'</span>';
                                            } else {
                                                echo '<span class="label label-sm label-success">'. $row['status'] .'</span>';
                                            }?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                    <button class="btn default" type="button">Action</button>
                                                    <button data-toggle="dropdown" class="btn default dropdown-toggle" type="button"><i class="fa fa-angle-down"></i></button>
                                                    <ul role="menu" class="dropdown-menu ac_bo_sh">
                                                        <?php if($row['status']=='Unpaid'||$row['status']=='Not Clear'){ ?>
                                                            <li class="ac_in_sty">
                                                                <a href="index.php/account/fee_pay?sid=<?php echo $row['id']; ?>"> Take Payment </a>
                                                            </li>
                                                        <?php }?>
                                                        <li class="ac_in_sty">
                                                            <a href="index.php/account/view_invoice?sid=<?php echo $row['id']; ?>"> View Invoice </a>
                                                        </li>
                                                        <li class="ac_in_sty">
                                                            <a href="index.php/account/edit_fee_pay?sid=<?php echo $row['id']; ?>"> Edit </a>
                                                        </li>
                                                        <li class="ac_in_sty">
                                                            <a href="#"> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
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
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

