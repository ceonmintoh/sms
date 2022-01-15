<div class="page-content-wrapper">
    <div class="page-content">
        <!--BEGIN PAGE Content-->
        <div class="row">
            <?php
            foreach ($massage as $row) {
                $userId = $row['sender_id'];
                $query = $this->common->getWhere('users', 'id', $userId);
                foreach ($query as $row1) {
                    $senderName = $row1['username'];
                }
                ?>
                <div class="col-md-12">
                    <div class="inbox-content">
                        <div class="alert alert-success">
                            <strong><?php echo lang('mes_from'); ?> : </strong> <?php echo $senderName; ?><br> <?php echo date('h.mA - d/m/Y', $row['date']); ?>
                        </div>
                        <div class="alert alert-info">
                            <strong><?php echo lang('mes_sub'); ?> : </strong> <?php echo $row['subject']; ?>
                            <hr>
                            <p><?php echo $row['message']; ?></p>
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