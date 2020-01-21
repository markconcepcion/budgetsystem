<div class="modal fade" id="edit_dept" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('Superuser/Department/editDept'); ?>
                <div class="modal-header bar">
                    <img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
                    <h4 class="modal-title text-white mod_head" id="myLargeModalLabel">EDIT DEPARTMENT</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body box shadow">
                    <!-- <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label">Department Code</label>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control editable" type="number" id="dept-code" name="dept-code" value="" required="">
                        </div>
                    </div> -->
                    <input type="hidden" id="dept-id" name="dept-id" value="">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label">Department Name</label>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control editable" type="text" id="dept-name" name="dept-name" value="" required="">
                        </div>
                    </div>
                    <div class="form-group text-right" style="margin: 10px 0 0 0;">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Save changes</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>