<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i> <?php echo lang('not_details'); ?> 
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="alert alert-success alert-dismissable">
                            <?php foreach ($details as $row) { ?>
                                <strong class="noticeSubject"> <?php echo $row['subject']; ?> </strong> <span class="noticeSubjectDate"><?php echo $row['date']; ?></span> <hr>
                                <br>
                                <p>  <?php echo $row['notice']; ?> </p><hr>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue" onclick="location.href = 'javascript:history.back()'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo lang('back'); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->