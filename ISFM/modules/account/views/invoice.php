<?php $user = $this->ion_auth->user()->row(); $userId = $user->id;?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('acc_slipdetails'); ?><small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_account'); ?>
                    </li>
                    <li>
                        <?php // echo lang('header_teansec'); ?>
                        Student's Payments
                    </li>
                    <li>
                        <?php // echo lang('acc_slipdetails'); ?>
                        Invoice
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12" >
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('acc_stsdetails'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" id="print">
                        <div class="col-md-12 btn-group floatRight">
                            <button class="btn green-meadow  prin-link" onclick="jQuery('#print').print()" type="button"><i class="fa fa-print"></i> Print </button>
                        </div>
                        <?php foreach ($invoice as $row){?>
                            <div class="form-body textAlignCenter">
                                <h2><?php echo $schoolName; ?></h2>
                                <h4><?php echo lang('acc_clastitle'); ?> : <?php echo $this->common->class_title($row['class_id']); ?></h4>
                                <p>
                                    <strong> <?php echo lang('acc_stuname'); ?> : <?php echo $this->common->student_title($row['student_id']); ?></strong><br>
                                    <?php echo lang('acc_sid'); ?> : <?php echo $row['student_id']; ?><br>
                                    <?php echo lang('date'); ?> : <?php if(!empty($row['date'])){echo date("d-m-Y", $row['date']); }else {echo 'Bill Not Paid';}?> 
                                </p>
                                <?php echo lang('acc_traslipno'); ?> : &nbsp;<strong><?php echo $row['id']; ?></strong>
                            </div>
                        <?php $slip_text = $row['item_id']; $items = explode( ',', $slip_text); }?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box actionSlipBorder ">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo lang('srno'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('acc_accotit'); ?>
                                                    </th>
                                                    <th class="textAlignCenter">
                                                        <?php echo lang('acc_amount'); ?> <i class="<?php echo $currency; ?>"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($items as $row1){?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <?php echo $this->accountmodel->item_title($row1[0]);?>
                                                    </td>
                                                    <td class="text_right"><?php echo $this->accountmodel->item_amount($row1[0]);?></td>
                                                </tr>
                                                <?php $i++; }?>
                                                <tr>
                                                    <td colspan="2" class="totalBalencetd">
                                                        Sub Total
                                                    </td>
                                                    <td class="totalBalenceamount">
                                                        &nbsp;  <?php echo $row['amount']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                        <div class="col-md-12 <?php if ($row['status'] == 'Paid') {echo 'paid_box';} else {echo 'unpaid_box';} ?> ">
                            <div class="in_ta_voice">
                                <table class="table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                                Amount <i class="<?php echo $currency; ?>"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                Sub Total
                                            </td>
                                            <td>
                                                <?php echo $row['amount']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                (+) Dues
                                            </td>
                                            <td>
                                                <?php echo $row['dues']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                (-) Advance
                                            </td>
                                            <td>
                                                <?php echo $row['advance']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total
                                            </td>
                                            <td>
                                                <?php echo $row['total']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Paid
                                            </td>
                                            <td>
                                                <?php echo $row['paid']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Balance
                                            </td>
                                            <td>
                                                <?php echo $row['balance']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
				<div class="clearfix"></div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <?php if ($row['status'] != 'Paid') { ?>
                                    <button class="btn green" onclick="location.href = 'index.php/account/fee_pay?sid=<?php echo $row['id']; ?>'"> Take Payment </button>
                                <?php } ?>
                                <button class="btn red" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script type="text/javascript" src="assets/admin/layout/scripts/jQuery.print.js"></script>
<script>
    jQuery(document).ready(function () {
    //here is auto reload after 1 second for time and date in the top

        $("#print").find('.print-link').on('click', function () {
            //Print print with default options
            $.print("#print");
        });
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 5000));
    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

