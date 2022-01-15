<div class="page-content-wrapper">
    <div class="page-content">
        <!--BEGIN PAGE Content-->
        <div class="row text_div">
            <?php foreach ($suggestion as $row) { ?>
                <div class="col-md-12">
                    <div class="inbox-content">
                        <div class="alert alert-success">
                            <strong><?php echo lang('sug_title'); ?> : </strong> <?php echo $row['suggestion_title']; ?>
                        </div>
                        <div class="alert alert-info">
                            <strong><?php echo lang('sug_class'); ?> : </strong> <?php echo $row['class']; ?><br>
                            <strong><?php echo lang('sug_auth_name'); ?> : </strong> <?php echo $row['author_name']; ?><br>
                            <strong><?php echo lang('date'); ?> : </strong> <?php echo date('d/m/Y', $row['date']); ?>
                            <hr>
                            <p><?php echo $row['suggestion']; ?></p>
                            <hr>

                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button onclick="location.href = 'javascript:history.back()'" class="btn green"> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo lang('back'); ?> &nbsp;&nbsp;&nbsp;&nbsp; </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!--End PAGE Content-->
    </div>
</div>