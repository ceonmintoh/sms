<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add New Notice <small></small>
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
                        <?php echo lang('header_pub_not'); ?>
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
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('not_mynbap'); ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('notice/addNotice', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group last">
                                    <label class="control-label col-md-3"><?php echo lang('not_subject'); ?></label>
                                    <div class="col-md-9">
                                        <input class="form-control"  type="text" name="noticeSubject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('not_not_follo'); ?></label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="receiver">
                                            <option value="all"><?php echo lang('not_auser'); ?></option>
                                            <option value="teacher"><?php echo lang('not_all_teacher'); ?></option>
                                            <option value="student"><?php echo lang('All student'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3"> <?php echo lang('not_ice'); ?> </label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="noticeDetails" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-check"></i> <?php echo lang('not_publish'); ?> </button>
                                            <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                
                <!-- END EXTRAS PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
