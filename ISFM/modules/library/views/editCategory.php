<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('lib_edit_cate'); ?>  <small></small>
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
                        <?php echo lang('header_all_boobk_cate'); ?>
                    </li>
                    <li>
                        <?php echo lang('lib_edit_cate'); ?>
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
                            <?php echo lang('lib_ecinfo'); ?>
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
                        echo form_open("library/editCategory?id=$id", $form_attributs);
                        ?>
                            <div class="form-body">
                                <?php foreach ($books as $row) { ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_ct'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="category" placeholder="" value="<?php echo $row['category_title'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_mc'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="parent_category">
                                                <?php if (!empty($row['parent_category'])) { ?>
                                                    <option value="<?php echo $row['parent_category']; ?>"><?php echo $row['parent_category']; ?></option>
                                                <?php } else { ?>
                                                    <option value=""> </option>
                                                    <?php
                                                }
                                                foreach ($category as $row1) {
                                                    ?>
                                                    <option value="<?php echo $row1['category_title']; ?>"><?php echo $row1['category_title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo lang('lib_description'); ?> <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" rows="3"><?php echo $row['description'] ?></textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit"><?php echo lang('save'); ?> </button>
                                    <button type="reset" onclick="location.href = 'javascript:history.back()'" class="btn default"><?php echo lang('back'); ?> </button>
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
