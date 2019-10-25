<div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('Budget_head/Profile/changePass/'.$this->session->userdata('id')); ?>
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

<div class="modal fade" id="approve-lbp2-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white">Approve LBP2?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <button type="button" id="confirm-modal-lbp2-btn" class="btn btn-warning border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="obr-status-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white" id="obr-status-h4"></h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <button type="button" id="obr-status-btn" class="btn btn-warning border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alert-popup" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bar box-shadow">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 text-white" id="alert-popup-h4"></h4>
                <div class="padding-bottom-30 text-center" style="max-width: 170px; margin: 0 auto;">
                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
