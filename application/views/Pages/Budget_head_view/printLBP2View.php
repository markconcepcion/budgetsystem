<style>
    .table-bordered td{ padding: 2px; font-size: 13px ! important; } h6{font-weight:600;} 
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

<body>    
    <div class="bar text-right toHide" style="height:auto;">
        <a href="<?php echo base_url('Budget_head/Lbp'); ?>"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
        <a href="<?php echo base_url(); ?>"><button class="btn btn-warning"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</button></a>
        <button type="button" class="btn btn-warning" id="print-btn"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
    </div>
    <div class="container">
        <table class="table table-sm lbp-head lbpHeader pd-10">
            <thead>
                <tr> <th colspan="2"><b>LBP no.2</b></th> </tr>
                <tr> <th class="text-center" colspan="2"><h5>PROGRAM APPROPRIATION AND OBLIGATION BY OBJECT OF EXPENDITURE</h5></th> </tr>
                <tr>
                    <th class="title">Office Department</th>
                    <th><?php echo ': '.$Lbp2_det['DPT_NAME']; ?></th>
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

        <table class="table table-bordered table-sm pd-10">
            <thead>
                <tr>
                    <th rowspan = "2">Object of Expenditure</th>
                    <th rowspan = "2" class = "text-center">Account<br />Code</th>
                    <th rowspan = "2" class = "text-center">Past Year<br /><?php echo ($Lbp2_det['FRM_YEAR']-1); ?><br />(Actual)</th>
                    <th rowspan = "1" colspan = "3" class = "text-center">Current Year <?php echo $Lbp2_det['FRM_YEAR']; ?></th>
                    <th rowspan = "2" class = "text-center">Budget<br />Year <?php echo ($Lbp2_det['FRM_YEAR']+1); ?><br />Estimate</th>
                </tr>
                <tr>
                    <th rowspan = "1">1st Semester<br />(Actual)</th>
                    <th rowspan = "1">2st Semester<br />(Estimated)</th>
                    <th rowspan = "1">(Total)</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $prevYr_sbtotal=0; $prevYr_grndtotal=0;
                    $currYr1_sbtotal=0; $currYr1_grndtotal=0; 
                    $currYr2_sbtotal=0; $currYr2_grndtotal=0; 
                    $nxtYr2_sbtotal=0; $nxtYr2_grndtotal=0; 
                ?>
                <?php foreach ($Exp_classes as $ExC) { ?>
                    <tr> <td colspan="7"><b><h6><?php echo $ExC['EXPCLASS_NAME']; ?><h6></b></td> </tr>
                    <?php foreach ($Exps as $Ex) {
                        if ($ExC['EXPCLASS_ID'] === $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                            <tr>
                                <td><input name="Exp_id[]" value="<?php echo $Ex['EXPENDITURE_id']; ?>" hidden>
                                    <?php echo $Ex['EXP_NAME']?></td>
                                <td><?php echo $Ex['EXP_ACCT_CODE']?></td>
                                <td></td>
                                <td></td>
                                
                                <td class="text-left">
                                    <?php foreach ($Lbp_exps as $LE) { 
                                        if ($Ex['EXPENDITURE_id'] === $LE['EXPENDITURE_EXPENDITURE_id']) {
                                            $nxtYr2_sbtotal = $nxtYr2_sbtotal + $LE['LBP_EXP_AMOUNT']; 
                                            echo '<input type="number" name="Lbp_exp_id[]" value="'.$LE['LBP_EXP_ID'].'" hidden>';
                                            echo '₱'.number_format($LE['LBP_EXP_AMOUNT'], 2);
                                        } 
                                    } ?>
                                </td>

                                <td></td>
                                <td></td>
                            </tr>
                        <?php } 
                    } ?>
                    <tr> 
                        <td colspan="2"><b><h6>SUB-TOTAL</h6></b></td> 
                        <td><b><h6></h6></b></td> 
                        <td><b><h6></h6></b></td> 
                        <td><b><h6><?php echo '₱',number_format($currYr2_sbtotal, 2 ); ?></h6></b></td> 
                        <td><b><h6></h6></b></td> 
                        <td><b><h6></h6></b></td> 
                    </tr>
                <?php 
                    $currYr2_grndtotal = $currYr2_grndtotal + $currYr2_sbtotal; $currYr2_sbtotal = 0 ; 
                    $nxtYr2_grndtotal = $nxtYr2_grndtotal + $nxtYr2_sbtotal; $nxtYr2_sbtotal = 0 ; 
                } ?>
                <tr> 
                    <td colspan="2"><b><h6>GRAND-TOTAL</h6></b></td> 
                    <td><b><h6></h6></b></td> 
                    <td><b><h6></h6></b></td> 
                    <td><b><h6><?php echo '₱',number_format($currYr2_grndtotal, 2 ); ?></h6></b></td> 
                    <td><b><h6></h6></b></td> 
                    <td><b><h6><?php echo '₱',number_format($nxtYr2_grndtotal, 2 ); ?></h6></b></td> 
                </tr>
            </tbody>
        </table>
        
        <table>
            <thead class="text-center">
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

