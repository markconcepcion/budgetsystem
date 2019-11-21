<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <?php echo form_open('Budget_head/CNotebook/Notebook_Exp/'.$dept_id); ?>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE CLASS:</label>
                        <select class="form-control" id="exp-class" name="ExC_id" required>
                            <option selected="">* * * CLICK HERE FIRST</option>
                            <?php foreach ($Exp_classes as $ExC) { ?>
                                <option value="<?php echo $ExC['EXPCLASS_ID']; ?>">
                                    <?php echo $ExC['EXPCLASS_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE:</label>
                        <select class="form-control" name="Exp_id" required>
                            <option selected="">* * * CLICK HERE THEN</option>
                            <?php foreach ($Exps as $Ex) { ?>
                                <option class="hide idExC <?php echo $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']; ?>" value="<?php echo $Ex['EXPENDITURE_id']; ?>">
                                    <?php echo $Ex['EXP_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <button class="btn btn-warning float" style="bottom:1px;" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;SEARCH
                        </button>                            
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>