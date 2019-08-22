<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <h5 class="weight-500 mb-20">PROFILE ACCOUNT</h5>
                <?php echo form_open('Budget_head/Profile/editProfile/'.$this->session->userdata('id')); ?>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control editable" type="text" name="fname" value="<?php echo $uprofile['USR_FNAME']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Middle Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control editable" type="text" name="mname" value="<?php echo $uprofile['USR_MNAME']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control editable" type="text" name="lname" value="<?php echo $uprofile['USR_LNAME']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control editable" type="text" name="uname" value="<?php echo $uprofile['USR_USERNAME']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Position</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo $uprofile['USR_POST']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-warning hide" id="submit_changes">Submit Changes</button>
                        <button type="button" class="btn btn-secondary" id="edit_profile">Edit Profile</button>
                        <button data-toggle="modal" data-target="#change_pass" type="button" class="btn btn-warning" id="change_password">Change Password</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>