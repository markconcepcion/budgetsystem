<?php if($this->session->flashdata('edit_success')): ?>
    <div class="modal fade show" id="log_ok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content mod_design text-center">
                <div class="modal-body text-center" style="padding-left: 10%; padding-right: 10%">
                    <h5 style="color:white;"><?php echo $this->session->flashdata('submit_success') ?></h5>
                    <button type="button" id="close_log" class="close" data-dismiss="modal" style="margin-right:150px;" aria-hidden="true"><h6 class="closed">close</h6></button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('Department_head/Profile/changePass/'.$this->session->userdata('id')); ?>
                <div class="modal-header bar">
                    <img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
                    <h4 class="modal-title text-white mod_head" id="myLargeModalLabel">Change Password</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input class="form-control" placeholder="Click Here to Enter Your Old Password" name="old_pass" type="password" required="">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" placeholder="Click Here to Enter Your New Password" name="new_pass" type="password" required="">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input class="form-control" placeholder="Click Here to Enter Your New Password for Confirmation" name="new_passes" type="password" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
