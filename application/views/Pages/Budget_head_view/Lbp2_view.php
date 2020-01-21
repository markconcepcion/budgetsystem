<style>.table-bordered td{ padding: 2px; font-size: 13px ! important; } h6{font-weight:600;}
    .subtotal-head{ background-color:#564e2829!important; }
    .grandtotal-head{ background-color:#a5a5a5!important; }
</style>
<?php 
    $prev_year_sub_total = 0; 
    $prev_year_grand_total = 0;
    $curr_year_sub_total_1 = 0;
    $curr_year_grand_total_1 = 0;
    $curr_year_sub_total_2 = 0;
    $curr_year_grand_total_2 = 0;
    $total_curr_year_sub_total = 0;
    $total_curr_year_grand_total = 0;
    $nxtYr2_sbtotal=0; $nxtYr2_grndtotal=0;
?>

<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <?php  if ($Lbp2_det['FRM_STATUS'] === "FINALIZED") { ?>
                    <img src="<?php echo base_url('assets/jimage/approved-icon-png-26.jpg') ?>" class="img-approved">
                <?php } else { ?>
                    <button class="btn btn-black float" id="update-lbp2-btn" style="right:5%;">UPDATE</button>
                    <button class="btn btn-warning float hide" id="confirm-approve-lbp2-btn" data-toggle="modal" data-target="#approve-lbp2-modal" style="right: 5%;">APPROVE</button>
                <?php } ?>
                
                <?php echo form_open('Budget_head/Lbp/Lbp2_approve/'.$Lbp2_det['FRM_ID']); ?>
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
                                <th rowspan = "2" class = "text-center">Past Year<br /><?php echo ($Lbp2_det['FRM_YEAR']-2); ?><br />(Actual)</th>
                                <th rowspan = "1" colspan = "3" class = "text-center">Current Year <?php echo ($Lbp2_det['FRM_YEAR']-1); ?></th>
                                <th rowspan = "2" class = "text-center">Budget<br />Year <?php echo $Lbp2_det['FRM_YEAR']; ?><br />Estimate</th>
                            </tr>
                            <tr>
                                <th rowspan = "1">1st Semester<br />(Actual)</th>
                                <th rowspan = "1">2st Semester<br />(Estimated)</th>
                                <th rowspan = "1">(Total)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($Exp_classes as $ExC) { 
                                $prev_year_sub_total=0;
                                $curr_year_sub_total_1=0;
                                $curr_year_sub_total_2=0;
                                $total_curr_year_sub_total=0;
                                $nxtYr2_sbtotal=0;
                            ?>
                                <tr> 
                                    <td colspan="7"><b><h6><?php echo $ExC['EXPCLASS_NAME']; ?><h6></b></td> 
                                </tr>
                                
                                <?php foreach ($Exps as $Ex) {
                                    if ($ExC['EXPCLASS_ID'] === $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                                        <tr>
                                            <td><input name="Exp_id[]" value="<?php echo $Ex['EXPENDITURE_id']; ?>" hidden>
                                                <?php echo $Ex['EXP_NAME']?></td>
                                            <td><?php echo $Ex['EXP_ACCT_CODE']?></td>
                                            <!-- ACTUAL PREVIOUS YEAR EXPENDITURE -->
                                            <td>
                                                <?php foreach ($prev_year as $prev) { 
                                                    if ($prev['EXPENDITURE_EXPENDITURE_id'] == $Ex['EXPENDITURE_id']) {
                                                        $prev_year_sub_total += $prev['PART_AMOUNT'];
                                                        echo '₱  ',number_format($prev['PART_AMOUNT'],2);
                                                    }
                                                } ?>
                                            </td>

                                            <!-- ACTUAL CURRENT YEAR EXPENDITURE(1ST SEM) -->
                                            <td>
                                                <?php foreach ($curr_year_1 as $first) { 
                                                    if ($first['EXPENDITURE_EXPENDITURE_id'] == $Ex['EXPENDITURE_id']) {
                                                        $curr_year_sub_total_1 += $first['PART_AMOUNT'];
                                                        echo '₱  ',number_format($first['PART_AMOUNT'],2);
                                                    }
                                                } ?>
                                            </td>
                                            
                                            <!-- TOTAL CURRENT YEAR ESTIMATED EXPENDITURE(2ND SEM) -->
                                            <td>
                                                <?php foreach ($curr_year_2 as $cy2) {
                                                    foreach ($curr_year_1 as $cy1) { 
                                                        if ($cy2['EXPENDITURE_EXPENDITURE_id'] == $Ex['EXPENDITURE_id']) {
                                                            if ($cy2['EXPENDITURE_EXPENDITURE_id'] == $cy1['EXPENDITURE_EXPENDITURE_id']) {
                                                                $curr_year_sub_total_2 += ($cy2['EXP_AMOUNT']-$cy1['PART_AMOUNT']);
                                                                echo '₱  ',number_format(($cy2['EXP_AMOUNT']-$cy1['PART_AMOUNT']),2);
                                                            } else {
                                                                $curr_year_sub_total_2 += $cy2['EXP_AMOUNT'];
                                                                echo '₱  ',number_format($cy2['EXP_AMOUNT'],2);
                                                            }
                                                        }
                                                    }
                                                } ?>
                                            </td>
                                            
                                            <!-- TOTAL CURRENT YEAR EXPENDITURE -->
                                            <td>
                                                <?php foreach ($curr_year_2 as $sec) { 
                                                    if ($sec['EXPENDITURE_EXPENDITURE_id'] == $Ex['EXPENDITURE_id']) {
                                                        $total_curr_year_sub_total += $sec['EXP_AMOUNT'];
                                                        echo '₱  ',number_format($sec['EXP_AMOUNT'],2);
                                                    }
                                                } ?>
                                            </td>
                                            
                                            <!-- TOTAL NEXT YEAR ESTIMATED EXPENDITURE -->
                                            <td class="text-right">
                                                <?php foreach ($Lbp_exps as $LE) { 
                                                    if ($Ex['EXPENDITURE_id'] === $LE['EXPENDITURE_EXPENDITURE_id']) {
                                                        $nxtYr2_sbtotal = $nxtYr2_sbtotal + $LE['LBP_EXP_AMOUNT']; ?>
                                                        <input type="number" name="Lbp_exp_id[]" value="<?php echo $LE['LBP_EXP_ID']; ?>" hidden>
                                                        ₱<input type="text" name="Exp_amt[]" class="submit-lbp2-input lbp-input-disabled exp-amt class<?php echo $ExC['EXPCLASS_ID']?>" value="<?php echo number_format($LE['LBP_EXP_AMOUNT'], 2); ?>"
                                                        data-id="<?php echo $ExC['EXPCLASS_ID']; ?>" data-name="class<?php echo $ExC['EXPCLASS_ID']?>"
                                                        step="0.01" max="1,000,000,000,000,000,042,420,637,374,017,961,984" disabled>
                                                    <?php } 
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } 
                                } ?>
                                <tr class="text-center subtotal-head"> 
                                    <th colspan="2">SUB-TOTAL</th> 
                                    <th>
                                        <?php if ($prev_year_sub_total > 0) {
                                            echo '₱',number_format($prev_year_sub_total, 2);
                                        } else { echo '-'; } ?>
                                    </th> 
                                    <th>
                                        <?php if ($curr_year_sub_total_1 > 0) {
                                            echo '₱',number_format($curr_year_sub_total_1, 2);
                                        } else { echo '-'; } ?>
                                    </th>
                                    <th>
                                        <?php if ($curr_year_sub_total_2 > 0) {
                                            echo '₱',number_format($curr_year_sub_total_2, 2);
                                        } else { echo '-'; } ?>
                                    </th>
                                    <th>
                                        <?php if ($total_curr_year_sub_total > 0) {
                                            echo '₱',number_format($total_curr_year_sub_total, 2);
                                        } else { echo '-'; } ?>
                                    </th>
                                    <th class="subtotal" id="subtotal<?php echo $ExC['EXPCLASS_ID']; ?>">
                                        <?php if ($nxtYr2_sbtotal > 0) {
                                            echo '₱',number_format($nxtYr2_sbtotal, 2);
                                        } else { echo '-'; } ?>
                                    </th>
                                </tr>
                            <?php 
                                $prev_year_grand_total += $prev_year_sub_total;
                                $curr_year_grand_total_1 += $curr_year_sub_total_1;
                                $curr_year_grand_total_2 += $curr_year_sub_total_2;
                                $total_curr_year_grand_total += $total_curr_year_sub_total;
                                $nxtYr2_grndtotal += $nxtYr2_sbtotal;
                            } ?>
                            <tr class="text-center grandtotal-head"> 
                                <th colspan="2">GRAND-TOTAL</td> 
                                <th>
                                    <?php if ($prev_year_grand_total > 0) {
                                        echo '₱',number_format($prev_year_grand_total, 2);
                                    } else { echo '-'; } ?>
                                </th>
                                <th>
                                    <?php if ($curr_year_grand_total_1 > 0) {
                                        echo '₱',number_format($curr_year_grand_total_1, 2);
                                    } else { echo '-'; } ?>
                                </th>
                                <th>
                                    <?php if ($curr_year_grand_total_2 > 0) {
                                        echo '₱',number_format($curr_year_grand_total_2, 2);
                                    } else { echo '-'; } ?>
                                </th>
                                <th>
                                    <?php if ($total_curr_year_grand_total > 0) {
                                        echo '₱',number_format($total_curr_year_grand_total, 2);
                                    } else { echo '-'; } ?>
                                </th>
                                <th id="grand_total">
                                    <?php if ($nxtYr2_grndtotal > 0) {
                                        echo '₱',number_format($nxtYr2_grndtotal, 2);
                                    } else { echo '-'; } ?>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Prepared by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center"><?php echo $Lbp2_det['signPrepared']?></h5>
                                <h6 class = "text-center">
                                    <?php if ($Lbp2_det['DPT_ID'] == 1011) { 
                                        echo 'Municipal Mayor';
                                    } else {
                                        echo 'Department Head';
                                    } ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Reviewed by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center"><?php echo $Lbp2_det['signReviewed']?></h5>
                                <h6 class = "text-center">Mun. Budget Officer</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Approved by:</label>
                                <br />
                                <br />
                                <h5 class = "text-center"><?php echo $Lbp2_det['signApproved']?></h5>
                                <h6 class = "text-center">Municipal Mayor</h6>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="approve-lbp2-btn" hidden></button>
                <?php echo form_close(); ?>
            </div>
        </div>