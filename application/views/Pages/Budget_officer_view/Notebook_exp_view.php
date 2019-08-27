<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll" >
                <?php echo form_open('Budget_officer/ControlNotebook/Notebook_Exp/'.$dept_code); ?>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE CLASS:</label>
                        <select class="form-control" id="exp-class" name="ExC_id">
                            <option selected="">* * * CLICK HERE FIRST</option>
                            <?php foreach ($Exp_classes as $exclass) { ?>
                                <option value="<?php echo $exclass['EXPCLASS_ID']; ?>">
                                    <?php echo $exclass['EXPCLASS_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE:</label>
                        <select class="form-control" name="Exp_id">
                            <option selected="">* * * CLICK HERE THEN</option>
                            <?php foreach ($Exps as $ex) { ?>
                                <option class="hide idExC <?php echo $ex['EXPENDITURE_CLASS_EXPCLASS_ID']; ?>" value="<?php echo $ex['EXPENDITURE_id']; ?>">
                                    <?php echo $ex['EXP_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <button class="btn btn-warning" style="position: absolute; bottom:1px;" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;SEARCH
                        </button>                            
                    </div>
                </div>
                <?php echo form_close(); ?>

                <table class="table table-bordered table-sm forscroll" style="height:350px;">
                    <thead>
                        <tr class = "text-center bar">
                            <th scope="col" colspan = "7"><h4 style ="color: white;"><?php echo $exp_name['EXP_NAME']; ?></h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">date</th>
                            <th scope="col">Particulars</th>
                            <th scope="col">Appropriation Ctrl #</th>
                            <th scope="col">Actual Release</th>
                        </tr>
                        <?php $act_rel = 0; foreach ($records as $key) { ?>
                            <tr>
                                <th scope="row"><?php echo $key['OBR_APPROVED_DATE']; ?></th>
                                <td><?php echo $key['PART_PARTICULARS']; ?></th>
                                <td><?php echo $key['MBO_ID'].'-'.(date('Y')-2000); ?></th>
                                <td><?php echo '₱',number_format($key['PART_AMOUNT'], 2); ?></th>
                            </tr>
                        <?php $act_rel+=$key['PART_AMOUNT']; } ?>
                        <tr>
                            <th colspan="3" class="text-right"><?php echo 'Total Actual Release:'; ?></th>
                            <th><?php echo '₱',number_format($act_rel, 2); ?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="row clearfix progress-box">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="bg-white pd-5 box-shadow ntb-bar border-radius-5 height-100-p">
                            <div class="progress-box text-center">
                                <div style="display:inline;width:120px;height:120px;"><h6 style="font-weight:500; color:white;"><?php echo "₱".number_format($annualApprop['LBP_EXP_AMOUNT'],2); ?></h6></div>
                                <h6 class="text-blue padding-top-10 weight-500">Annual Appropriation</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="bg-white pd-5 box-shadow ntb-bar border-radius-5 height-100-p">
                            <div class="progress-box text-center">
                                <div style="display:inline;width:120px;height:120px;"><h6 style="font-weight:500; color:white;">
                                    <?php $allotRelease = ($annualApprop['LBP_EXP_AMOUNT']/4) * $quarter; echo "₱".number_format($allotRelease,2); ?></h6>
                                </div>
                                <h6 class="text-light-green padding-top-10 weight-500">Allotment Release</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="bg-white pd-5 box-shadow ntb-bar border-radius-5 height-100-p">
                            <div class="progress-box text-center">
                                <div style="display:inline;width:120px;height:120px;"><h6 style="font-weight:500; color:white;"><?php echo "₱".number_format($act_rel,2); ?></h6></div>
                                <h6 class="text-light-orange padding-top-10 weight-500">Actual Release</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="bg-white pd-5 box-shadow ntb-bar border-radius-5 height-100-p">
                            <div class="progress-box text-center">
                                <div style="display:inline;width:120px;height:120px;"><h6 style="font-weight:500; color:white;"><?php $balance = $allotRelease-$act_rel; echo "₱".number_format($balance,2); ?></h6></div>
                                <h6 class="text-light-purple padding-top-10 weight-500">Balance</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>