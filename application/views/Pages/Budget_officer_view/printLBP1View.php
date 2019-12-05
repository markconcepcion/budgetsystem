<style>
    .table-bordered td{ padding: 2px; font-size: 15px ! important; }
    .t-align{ text-align:right; }
    .btn-warning { background-color: #ff9900; border-color: #ff9900; border-radius:0; }
    .bar {
        width: 100%; height: 10%;
        border: 1px solid #080808;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        color: white;
    }
    table.lbpHeader th {
        border: 0px;
    }
</style>
<style type="text/css" media="screen"></style>
<style type="text/css" media="print">
    /* @page {size:landscape}  */ 
    @media print {
        @page {size: Legal portrait;max-height:100%; max-width:100%; margin: .5in .5in .5in .5in;}
        body{ width:100%; height:100%; }    
        .toHide, .toHide * {display:none !important;}
    }
</style>

<?php $val1 = 0; $val2 = 0; $val3 = 0; ?>
<body>
    <div class="bar text-right toHide" style="height:auto;">
        <a href="<?php echo base_url('budget_officer/Lbp'); ?>"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
        <a href="<?php echo base_url(); ?>"><button class="btn btn-warning"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</button></a>
        <button type="button" class="btn btn-warning" id="print-btn"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
    </div>
    
    <div class="container">
        <table class="table table-sm lbp-head lbpHeader">
            <thead>
                <tr> <th colspan="2"><b>Consolidated LBP 1</b></th> </tr>
                <tr><th class="text-center" colspan="2"><h5>PROGRAM APPROPRIATION AND OBLIGATION BY OBJECT OF EXPENDITURE</h5></th> </tr>
                <tr>
                    <th class="title">Office Department</th>
                    <th><?php echo ': Consolidated LBP 1'; ?></th>
                </tr>
                <tr>
                    <th class="title">Function</th>
                    <th>: Direction & Control</th>
                </tr>
                <tr>
                    <th class="title">Project/Activity</th>
                    <th>: Administer, execute and marage municipal affairs</th>
                </tr>
                <tr>
                    <th class="title">Fund</th>
                    <th>: General Fund</th>
                </tr>
            </thead>
        </table>

        <table class = "table table-bordered table-sm">
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
                        <td id="amt<?php echo $key['EXPENDITURE_id']; ?>" class="text-left">
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
                        
                        <td class="t-align">
                            <?php foreach ($prev_year as $py) { 
                                if ($py['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                    echo '₱',number_format($py['LBP_EXP_AMOUNT'], 2);
                                } 
                            } ?>
                        </td>
                        
                        <td></td>

                        <td id="amt<?php echo $key['EXPENDITURE_id']; ?>" class="t-align">
                            <?php foreach ($lbp_exp as $val) { 
                                if ($val['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                    $val2 += $val['LBP_EXP_AMOUNT'];
                                    echo '₱',number_format($val['LBP_EXP_AMOUNT'], 2);
                                } 
                            } ?>
                        </td>

                        <td></td>
                        
                        <td class="t-align">
                            <?php foreach ($next_year as $ny) { 
                                if ($ny['EXPENDITURE_id'] == $key['EXPENDITURE_id']) {
                                    echo '₱',number_format($ny['LBP_EXP_AMOUNT'], 2);
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

        <table>
            <thead>
                <tr>
                    <td style="padding:30px;">
                        <div class="form-group">
                            <label>Prepared by:</label>
                            <br />
                            <br />
                            <h5 class = "text-center">HON. ANTONIO H. BACULIO</h5>
                            <h6 class = "text-center">Municipal Mayor</h6>
                        </div>
                    </td>
            
                    <td style="padding:30px;">
                        <div class="form-group">
                            <label>Reviewed by:</label>
                            <br />
                            <br />
                            <h5 class = "text-center">MARIELYD A. FERRER, CPA</h5>
                            <h6 class = "text-center">Mun. Budget Officer</h6>
                        </div>
                    </td>
            
            
                    <td style="padding:30px;">
                        <div class="form-group">
                            <label>Approved by:</label>
                            <br />
                            <br />
                            <h5 class = "text-center">HON. ANTONIO H. BACULIO</h5>
                            <h6 class = "text-center">Municipal Mayor</h6>
                        </div>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</body>
