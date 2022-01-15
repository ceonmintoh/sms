<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<?php
$user = $this->ion_auth->user()->row();
$userId = $user->id;
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('lib_lbl'); ?> <small></small>
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
                            <?php echo lang('lib_abiah'); ?> 
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo lang('lib_ad'); ?>  
                                    </th>
                                    <th>
                                        <?php echo lang('lib_cp'); ?>  
                                    </th>
                                    <th>
                                        <?php echo lang('lib_bt'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_bidn'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_status'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_isbn_no'); ?> 
                                    </th>
                                    <th>
                                        <?php echo lang('lib_ba'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_be'); ?> 
                                    </th>
                                    <th>
                                        <?php echo lang('lib_lang'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_pages'); ?>
                                    </th>
                                    <th>
                                        <?php echo lang('lib_bul'); ?>
                                    </th>
                                    <?php if ($this->common->user_access('edit_delete_books', $userId)) { ?>
                                        <th>
                                            &nbsp;
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allBook as $book) { ?>
                                    <tr>
                                        <td>
                                            <?php echo date("d/m/Y", $book['date']) ?> 
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <img src="assets/uploads/cover_photo/<?php echo $book['cover_photo']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $book['books_title']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['book_no']; ?>
                                        </td>
                                        <td>
                                            <?php if($book['status'] == 'Available'){
                                                echo '<span class="label label-sm label-success">'.lang('lib_available').'</span>';
                                            }  else{
                                                echo '<span class="label label-sm label-danger">'.lang('lib_navailable').'</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <?php echo $book['isbn_no']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['authore']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['edition']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['language']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['pages']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['uploderTitle']; ?> 
                                        </td>
                                        <?php if ($this->common->user_access('edit_delete_books', $userId)) { ?>
                                            <td>
                                                <a class="btn btn-xs default" href="index.php/library/editBook?id=<?php echo $book['id']; ?>"> <i class="fa fa-pencil-square-o"></i> <?php echo lang('edit'); ?> </a>
                                                <a class="btn btn-xs red" href="index.php/library/deleteBook?id=<?php echo $book['id']; ?>" onclick="javascript:return confirm('<?php echo lang('lib_bdeconf'); ?>')"> <i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?> </a>
                                            </td>
                                        <?php } ?>

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


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script>
                                                    jQuery(document).ready(function () {
                                                        //here is auto reload after 1 second for time and date in the top
                                                        jQuery(setInterval(function () {
                                                            jQuery("#result").load("index.php/home/iceTime");
                                                        }, 1000));
                                                    });
</script>

