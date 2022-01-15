<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('lib_anb'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_library'); ?>
                    </li>
                    <li>
                        <?php echo lang('header_add_book'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('lib_gtnbib'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open_multipart('library/addBook', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_bt'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="bookTitle" placeholder="" data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_isbn_no'); ?> <span class="requiredStar"></span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="isbn_no" placeholder="" >                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_be'); ?> <span class="requiredStar"> </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="bookEdition" placeholder="" data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_ba'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="bookAuthor" placeholder="" data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_cate'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="booksCategory" data-validation="required" data-validation-error-msg="">
                                            <option value="" ><?php echo lang('select'); ?> </option>
                                            <?php foreach ($category as $row) { ?>
                                                <option value="<?php echo $row['category_title']; ?>"> <?php echo $row['category_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_lang'); ?> <span class="requiredStar">*</span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="language" placeholder="" data-validation="required" data-validation-error-msg="">                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_pages'); ?><span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="pages" placeholder="" data-validation="required" data-validation-error-msg="">
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3"><?php echo lang('lib_bcp'); ?> <span class="requiredStar"> * </span></label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail uploadImagePreview">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                        <?php echo lang('lib_si'); ?> </span>
                                                    <span class="fileinput-exists">
                                                        <?php echo lang('lib_change'); ?> </span>
                                                    <input type="file" name="userfile" data-validation="required" data-validation-error-msg="">
                                                </span>
                                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    <?php echo lang('lib_remove'); ?> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('lib_abb'); ?></button>
                                    <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
