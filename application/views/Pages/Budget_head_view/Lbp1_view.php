<style>
    .table-bordered td{ padding: 2px; font-size: 15px ! important; }
    .t-align{ text-align:right; }
</style>
<style type="text/css" media="screen"></style>
<style type="text/css" media="print">
    /* @page {size:landscape}  */ 
    @media print {
        @page {size: Legal landscape;max-height:100%; max-width:100%}
        body{ width:100%; height:100%; }    
        .toHide, .toHide * {display:none !important;}
        .delBorder, .delBorder * {border:0; margin:0 !important;}
        .header-right, .left-side-bar {display:none !important;}
        #mCSB_2_scrollbar_vertical, #mCSB_2_scrollbar_vertical * {display:none !important;}
        .backbtn, .backbtn * {display:none !important;}
        .main-container {padding:0 !important;}
    }
</style>

<?php $val1 = 0; $val2 = 0; $val3 = 0; ?>
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 delBorder">
                    <div class="text-right toHide" style="height:auto;">
                        <button type="button" class="btn btn-warning" id="print-btn"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
                    </div>
                    <h6> Consolidated LBP 1</h6><br />
                    <h5 class = "text-center">PROGRAM APPROPRIATION AND OBLIGATION BY OBJECT OF EXPENDITURE</h5><br />
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Office Department</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: Consolidated LBP 1</h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Function</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: Direction & Control</h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Project/Activity</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: Administer, execute and marage municipal affairs</h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Fund</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: General Fund</h6>
                        </div>
                    </div>

                    <table class = "table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan = "2">Object of Expenditure</th>
                                <th rowspan = "2" class = "text-center">Account<br />Code</th>
                                <th rowspan = "2" class = "text-center">Past Year<br /><?php echo (date('Y')-1); ?><br />(Actual)</th>
                                <th rowspan = "1" colspan = "3" class = "text-center">Current Year <?php echo date('Y'); ?></th>
                                <th rowspan = "2" class = "text-center">Budget<br />Year <?php echo (date('Y')+1); ?><br />Estimate</th>
                            </tr>
                            <tr>
                                <th rowspan = "1">1st Semester<br />(Actual)</th>
                                <th rowspan = "1">2st Semester<br />(Estimated)</th>
                                <th rowspan = "1">(Total)</th>
                            </tr>
                            <tr>
                                <th>PERSONAL SERVICES</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 1) { ?>
                                <tr >
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td><td></td><td></td><td></td>
                                    <td id="amt<?php echo $key['EXPENDITURE_id']; ?>" class="t-align">
                                        <?php foreach ($lbp_exp as $val) { 
                                            if ($val['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                                $val1 += $val['LBP_EXP_AMOUNT'];
                                                echo '₱',number_format($val['LBP_EXP_AMOUNT'], 2);
                                            } 
                                        } ?>
                                    </td>
                                </tr>
                            <?php } } ?>
                            
                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th><?php echo '₱',number_format($val1, 2); ?></th>
                            </tr>
                            
                            <tr>
                                <th>MAINTENANCE AND OTHER<br />OPERATING EXPENSES:</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>

                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 2) { ?>
                                <tr>
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td id="amt<?php echo $key['EXPENDITURE_id']; ?>" class="t-align">
                                        <?php foreach ($lbp_exp as $val) { 
                                            if ($val['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                                $val2 += $val['LBP_EXP_AMOUNT'];
                                                echo '₱',number_format($val['LBP_EXP_AMOUNT'], 2);
                                            } 
                                        } ?>
                                    </td>
                                </tr>
                            <?php } } ?>

                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th><?php echo '₱',number_format($val2, 2); ?></th>
                            </tr>
                            
                            <tr>
                                <th>MAINTENANCE AND OTHER<br />OPERATING EXPENSES:</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>

                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 3) { ?>
                                <tr>
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td><td></td><td></td><td></td>
                                    <td id="amt<?php echo $key['EXPENDITURE_id']; ?>" class="t-align">
                                        <?php foreach ($lbp_exp as $val) { 
                                            if ($val['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                                $val3 += $val['LBP_EXP_AMOUNT'];
                                                echo '₱',number_format($val['LBP_EXP_AMOUNT'], 2);
                                            } 
                                        } ?>
                                    </td>
                                </tr>
                            <?php } } ?>

                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th><?php echo '₱',number_format($val3, 2); ?></th>
                            </tr>
                            
                            <tr>
                                <th>GRAND-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th><?php $total = $val1+$val2+$val3; echo '₱',number_format($total, 2); ?></th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Prepared by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center">HON. ANTONIO H. BACULIO</h5>
                                <h6 class = "text-center">Municipal Mayor</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Reviewed by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center">MARIELYD A. FERRER, CPA</h5>
                                <h6 class = "text-center">Mun. Budget Officer</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Approved by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center">HON. ANTONIO H. BACULIO</h5>
                                <h6 class = "text-center">Municipal Mayor</h6>
                            </div>
                        </div>
                    </div>
            </div>
        </div>