<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> <?php echo lang('exa_eprngap'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        $id = $this->input->get('id');
                        echo form_open("examination/editResult&id=$id", $form_attributs);
                        ?>
                        <?php $user = $this->ion_auth->user()->row(); ?>
                        <div class="form-body">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <?php echo lang('exa_gtnagp'); ?>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="reload"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo lang('exa_ct_role'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_sn'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_sid'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_result'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_grade'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_point'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo lang('exa_ct_toma'); ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($previousResult as $row) {
                                                    ?>
                                                    <tr>
                                                        <td>    <?php echo $row['roll_number']; ?>
                                                        </td>
                                                        <td>    <?php echo $row['student_name']; ?>
                                                        </td>
                                                        <td>    <?php echo $row['student_id']; ?>
                                                        </td>
                                                        <td>
                                                            <select class="form-control editresultSelect" name="result"  data-validation="required" data-validation-error-msg="">
                                                                <option value="<?php echo $row['result']; ?>"><?php echo $row['result']; ?></option>
                                                                <option value="Pass"> <?php echo lang('exa_pass'); ?> </option>
                                                                <option value="Fail"> <?php echo lang('exa_fail'); ?> </option>
                                                                <option value="Absent"> <?php echo lang('exa_absent'); ?> </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control editresultSelect" name="gread"  data-validation="required" data-validation-error-msg="">
                                                                <option value="<?php echo $row['grade']; ?>"><?php echo $row['grade']; ?></option>
                                                                <?php foreach ($gread as $row1) { ?>
                                                                    <option value="<?php echo $row1['grade_name']; ?>"> <?php echo $row1['grade_name']; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control editresultSelect" name="point"   data-validation="required" data-validation-error-msg="">
                                                                <option value="<?php echo $row['point']; ?>"><?php echo $row['point']; ?></option>
                                                                <?php foreach ($gread as $row1) { ?>
                                                                    <option value="<?php echo $row1['point']; ?>"> <?php echo $row1['point']; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="mark" placeholder="<?php echo lang('exa_mark'); ?>" value="<?php echo $row['mark']; ?>"  data-validation="required" data-validation-error-msg="">
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <input class="form-control" type="hidden" name="ivalue" value="<?php echo $i; ?>"/>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" name="Update" value="Update"><?php echo lang('exa_up_result'); ?></button>
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
<script src="assets/global/plugins/jquery.form-validator.min.js" type="text/javascript"></script>
<script> $.validate();</script>
