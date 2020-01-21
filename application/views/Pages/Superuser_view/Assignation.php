<div class="main-container">
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
    <div class="min-height-200px">
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
            <?php echo form_open('Superuser/Assignation/changeAssign'); ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-3 col-form-label">Municipal Mayor:</label>
                    <div class="col-sm-12 col-md-6">
                        <input class="form-control" id="mayor-input" type="text" name="newAssign" value="<?php echo $assign['signApproved']; ?>" readonly="">
                        <input type="text" name="post" value="signApproved" hidden="">
                    </div>
                    <button type="button" class="col-sm-12 col-md-2 btn btn-secondary" id="edit-mayor">Change</button>
                    <button type="submit" class="col-sm-12 col-md-2 btn btn-warning hide" id="sub-mayor">Submit Changes</button>
                </div>
            <?php echo form_close(); ?>
            <?php echo form_open('Superuser/Assignation/changeAssign'); ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-3 col-form-label">Municipal Budget Head:</label>
                    <div class="col-sm-12 col-md-6">
                        <input class="form-control" id="bhead-input" type="text" name="newAssign" value="<?php echo $assign['signReviewed']; ?>" readonly="">
                        <input type="text" name="post" value="signReviewed" hidden="">
                    </div>
                    <button type="button" class="col-sm-12 col-md-2 btn btn-secondary" id="edit-bhead">Change</button>
                    <button type="submit" class="col-sm-12 col-md-2 btn btn-warning hide" id="sub-bhead">Submit Changes</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>