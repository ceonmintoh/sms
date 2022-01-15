<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('lib_editbinfo'); ?> <small></small>
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
                        <?php echo lang('header_book_list'); ?>
                    </li>
                    <li>
                         <?php echo lang('lib_editbinfo'); ?>
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo lang('lib_ebib'); ?>
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
                        $id = $this->input->get('id');
                        echo form_open("library/editBook?id=$id", $form_attributs);
                        ?>
                            <?php foreach ($Book as $row) { ?>    
                                <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('lib_isbn_no'); ?> <span class="requiredStar">*</span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="isbn_no"  value="<?php echo $row['isbn_no']; ?>">                                        
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_bt'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookTitle" value="<?php echo $row['books_title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_be'); ?> <span class="requiredStar"> </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookEdition" placeholder="Books Editions"  value="<?php echo $row['edition']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_ba'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookAuthor" placeholder="Book's Author" value="<?php echo $row['authore']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_cate'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="booksCategory">
                                                <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?> </option>
                                                <?php foreach ($category as $row1) { ?>
                                                    <option value="<?php echo $row1['category_title']; ?>"> <?php echo $row1['category_title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_pages'); ?><span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="pages" placeholder="Page Amount" value="<?php echo $row['pages']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_lang'); ?> <span class="requiredStar">*</span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="language" value="<?php echo $row['language']; ?>">                                       
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('save'); ?></button>
                                    <button type="reset" class="btn default" onclick="location.href = 'javascript:history.back()'"><?php echo lang('back'); ?></button>
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
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>
