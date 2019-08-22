<style> .table-bordered td{ padding: 2px; font-size: 13px ! important; } h6{font-weight:600;} </style>

<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <?php echo form_open('Department_head/Lbp/Lbp2_edit/'.$Lbp2_det['FRM_ID']); 
                    if ($Lbp2_det['FRM_STATUS'] === "FINALIZED") { ?>
                        <img src="<?php echo base_url('assets/jimage/approved-icon-png-26.jpg') ?>" class="img-approved">
                    <?php } else { ?>
                        <button type="button" class="btn btn-black float" id="edit-lbp2-btn" style="right:5%;">EDIT</button>
                        <button type="submit" class="btn btn-warning float hide" id="submit-edit-lbp2-btn" style="right: 5%;">SUBMIT</button>
                    <?php } ?>

                    <table class="table table-bordered table-sm lbp-head">
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
                    <table class="table table-bordered table-sm">
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
                                            <td class="text-right">
                                                <?php foreach ($Exps_prevYr as $Ex_prevYr) { 
                                                    if ($Ex['EXPENDITURE_id'] === $Ex_prevYr['EXPENDITURE_EXPENDITURE_id']) {
                                                        $prevYr_sbtotal = $prevYr_sbtotal + $Ex_prevYr['LBP_EXP_AMOUNT']; 
                                                        echo '₱'.number_format($Ex_prevYr['LBP_EXP_AMOUNT'], 2 );
                                                    } 
                                                } ?>
                                            </td>
                                            <td class="text-right">
                                            
                                            </td>
                                            <td class="text-right">
                                                <?php foreach ($Exps_currYr as $Ex_currYr) { 
                                                    if ($Ex['EXPENDITURE_id'] === $Ex_currYr['EXPENDITURE_EXPENDITURE_id']) {
                                                        $currYr2_sbtotal = $currYr2_sbtotal + $Ex_currYr['LBP_EXP_AMOUNT']; 
                                                        echo '₱'.number_format($Ex_currYr['LBP_EXP_AMOUNT'], 2 );
                                                    } 
                                                } ?>
                                            </td>
                                            <td class="text-right"></td>
                                            <td class="text-right">
                                                <?php foreach ($Lbp_exps as $LE) { 
                                                    if ($Ex['EXPENDITURE_id'] === $LE['EXPENDITURE_EXPENDITURE_id']) {
                                                        $nxtYr2_sbtotal = $nxtYr2_sbtotal + $LE['LBP_EXP_AMOUNT']; 
                                                        echo '<input type="number" name="Lbp_exp_id[]" value="'.$LE['LBP_EXP_ID'].'" hidden>';
                                                        echo '₱'.'<input class="lbp-input-disabled exp-amt" value="'.number_format($LE['LBP_EXP_AMOUNT'], 2).'">';
                                                        echo '<input type="number" name="Exp_amt[]" class="lbp-input-disabled hide" step="0.01" 
                                                            max="1,000,000,000,000,000,042,420,637,374,017,961,984" value="'.$LE['LBP_EXP_AMOUNT'].'">';
                                                    } 
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } 
                                } ?>
                                <tr> 
                                    <td colspan="2"><b><h6>SUB-TOTAL</h6></b></td> 
                                    <td><b><h6><?php echo '₱',number_format($prevYr_sbtotal, 2 ); ?></h6></b></td> 
                                    <td><b><h6></h6></b></td> 
                                    <td><b><h6><?php echo '₱',number_format($currYr2_sbtotal, 2 ); ?></h6></b></td> 
                                    <td><b><h6></h6></b></td> 
                                    <td><b><h6><?php echo '₱',number_format($nxtYr2_sbtotal, 2 ); ?></h6></b></td> 
                                </tr>
                            <?php 
                                $prevYr_grndtotal = $prevYr_grndtotal + $prevYr_sbtotal; $prevYr_sbtotal = 0 ; 
                                $currYr2_grndtotal = $currYr2_grndtotal + $currYr2_sbtotal; $currYr2_sbtotal = 0 ; 
                                $nxtYr2_grndtotal = $nxtYr2_grndtotal + $nxtYr2_sbtotal; $nxtYr2_sbtotal = 0 ; 
                            } ?>
                            <tr> 
                                <td colspan="2"><b><h6>GRAND-TOTAL</h6></b></td> 
                                <td><b><h6><?php echo '₱',number_format($prevYr_grndtotal, 2 ); ?></h6></b></td> 
                                <td><b><h6></h6></b></td> 
                                <td><b><h6><?php echo '₱',number_format($currYr2_grndtotal, 2 ); ?></h6></b></td> 
                                <td><b><h6></h6></b></td> 
                                <td><b><h6><?php echo '₱',number_format($nxtYr2_grndtotal, 2 ); ?></h6></b></td> 
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
                <?php echo form_close(); ?>
            </div>
        </div>