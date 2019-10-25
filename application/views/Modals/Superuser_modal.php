<div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('Superuser/Profile/changePass/'.$this->session->userdata('id')); ?>
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
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label">Department Code</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="hidden" id="dept-id" name="dept-id" value="">
                            <input class="form-control editable" type="number" id="dept-code" name="dept-code" value="" required="">
                        </div>
                    </div>
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

<div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white">Are you sure you want to Logout?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <a href="<?php echo base_url('Login/Logout'); ?>" ><button type="button" class="btn btn-warning border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button></a>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deact-dept-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white">Are you sure you want to Deactivate?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <?php echo form_open('Superuser/Department/deactDept'); ?>
                            <input name="dept_id" id="deact-dept-id" value="" hidden="">
                            <button type="submit" class="btn btn-warning border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button></a>
                            YES
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deact-user-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white">Are you sure you want to Deactivate?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <?php echo form_open('Superuser/Account/deactAcct'); ?>
                            <input name="user_id" id="deact-user-id" value="" hidden="">
                            <button type="submit" class="btn btn-warning border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button></a>
                            YES
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('edit_success')): ?>
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content box-shadow bar">
                <div class="modal-body text-center font-18">
                    <div class="mb-15 text-center"><img src="<?php echo base_url('assets/jimage/success.png'); ?>" class="logo" style="position: unset;"></div>
                    <h3 class="mb-10 text-white"><?php echo $this->session->flashdata('edit_success') ?></h3>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('edit_failed')): ?>
    <div class="modal fade" id="editf-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content box-shadow bar">
                <div class="modal-body text-center font-18">
                    <div class="mb-15 text-center"><img src="<?php echo base_url('assets/jimage/cancel.png'); ?>" class="logo" style="position: unset;"></div>
                    <h3 class="mb-10 text-white"><?php echo $this->session->flashdata('edit_failed') ?></h3>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>