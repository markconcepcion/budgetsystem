<div class="modal fade" id="augment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;  margin-left:10%" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bar">
                <img src="http://localhost/BASystem/assets/jimage/LGUBO.png" class="logo mCS_img_loaded">
                <h4 class="modal-title text-white mod_head" id="myLargeModalLabel">Augmentation Form</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?php echo form_open('BH/augment'); ?>
            <div class="modal-body">
                <div class="form-group text-center">
                    <label><b>Date: <?php echo date('D').', '.date('M-d-Y')?></b></label>
                </div>
                <div class="form-group">
                    <label>Augment From:</label>
                    <select class="form-control select_class" name="class_id" required>
                        <option selected></option>
                        <?php foreach ($name as $class) { ?>
                            <option value="<?php echo $class['EXPCLASS_ID']; ?>"><?php echo ucwords(strtolower($class['EXPCLASS_NAME'])); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Augment To:</label>
                    <select class="form-control select_exp" name="exp_id" required>
                        <option selected></option>
                        <?php foreach ($exps as $exp) { ?>
                            <option class="expenditure class<?php echo $exp['EXPENDITURE_CLASS_EXPCLASS_ID']; ?>" value="<?php echo $exp['EXPENDITURE_id']; ?>"><?php echo ucwords(strtolower($exp['EXP_NAME'])); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deparment</label>
                    <select class="form-control select_dept" name="dept_id" required>
                        <option selected></option>
                        <?php foreach ($depts as $dept) { ?>
                            <option value="<?php echo $dept['DPT_ID']; ?>"><?php echo ucwords(strtolower($dept['DPT_NAME'])); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amount of Augmentation</label>
                    <input class="form-control" id="augment_amt" type="text" name="amount" required>
                </div>
            </div>
            <div class="modal-footer">
                <span class="float" style="left:18px;">₱</span>
                <span class="float" style="left:38px;" id="amt">0</span>
                <input type="text" id="limit_amt" value="" name="limit_amt" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="check-aug-btn" class="btn btn-warning text-white">Augment</button>
                <button type="submit" id="augment-btn" hidden>Augment</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>