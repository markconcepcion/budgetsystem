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
    .table th, .table td { padding: 2px;
        font-size: 14px ! important;
    }
    .subtotal-head{ background-color:#564e2829!important; }
    .grandtotal-head{ background-color:#a5a5a5!important; }
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

<?php 
    $prev_year_sub_total = 0; 
    $prev_year_grand_total = 0;
    $curr_year_sub_total_1 = 0;
    $curr_year_grand_total_1 = 0;
    $curr_year_sub_total_2 = 0;
    $curr_year_grand_total_2 = 0;
    $total_curr_year_sub_total = 0;
    $total_curr_year_grand_total = 0;
    $next_year_sub_total = 0;
    $next_year_grand_total = 0;
?>

<body>
    <div class="bar text-right toHide" style="height:auto;">
        <a onclick="history.go(-1);return false;"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
        <a href="<?php echo base_url('BO'); ?>"><button class="btn btn-warning"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</button></a>
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
                    <th rowspan = "2" class = "text-center">Past Year<br /><?php echo ($year-2); ?><br />(Actual)</th>
                    <th rowspan = "1" colspan = "3" class = "text-center">Current Year <?php echo ($year-1); ?></th>
                    <th rowspan = "2" class = "text-center">Budget<br />Year <?php echo $year; ?><br />Estimate</th>
                </tr>
                <tr>
                    <th rowspan = "1">1st Semester<br />(Actual)</th>
                    <th rowspan = "1">2st Semester<br />(Estimated)</th>
                    <th rowspan = "1">(Total)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expenditure_classes as $exp_class) { 
                    $prev_year_sub_total=0;
                    $curr_year_sub_total_1=0;
                    $curr_year_sub_total_2=0;
                    $total_curr_year_sub_total=0;
                    $next_year_sub_total=0;
                ?>

                    <!-- DISPLAY ALL LBP EXPENDITURE CLASSES -->
                    <tr>
                        <th colspan="7"><?php echo $exp_class['EXPCLASS_NAME']; ?></th>
                    </tr>

                    <?php foreach ($expenditures as $exps) {
                        if ($exp_class['EXPCLASS_ID'] == $exps['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                            <tr>
                                <!-- EXPENDITURE NAME AND ACCOUNT CODE -->
                                <td style="padding-left:15px;"><?php echo $exps['EXP_NAME'] ?></td>
                                <td><?php echo $exps['EXP_ACCT_CODE'] ?></td>

                                <!-- ACTUAL PREVIOUS YEAR EXPENDITURE -->
                                <td>
                                    <?php foreach ($prev_year as $prev) { 
                                        if ($prev['EXPENDITURE_EXPENDITURE_id'] == $exps['EXPENDITURE_id']) {
                                            $prev_year_sub_total += $prev['PART_AMOUNT'];
                                            echo '₱  ',number_format($prev['PART_AMOUNT'],2);
                                        }
                                    } ?>
                                </td>

                                <!-- ACTUAL CURRENT YEAR EXPENDITURE(1ST SEM) -->
                                <td>
                                    <?php $act_sem=0; foreach ($curr_year_1 as $first) { 
                                        if ($first['EXPENDITURE_EXPENDITURE_id'] == $exps['EXPENDITURE_id']) {
                                            $curr_year_sub_total_1 += $first['PART_AMOUNT'];
                                            $act_sem = $first['PART_AMOUNT'];
                                            echo '₱  ',number_format($first['PART_AMOUNT'],2);
                                        }
                                    } ?>
                                </td>
                                
                                <!-- TOTAL CURRENT YEAR ESTIMATED EXPENDITURE(2ND SEM) -->
                                <td>
                                    <?php foreach ($curr_year_2 as $cy2) {
                                        if ($cy2['EXPENDITURE_EXPENDITURE_id'] == $exps['EXPENDITURE_id']) {
                                            $curr_year_sub_total_2 += ($cy2['EXP_AMOUNT']-$act_sem);
                                            echo '₱  ',number_format(($cy2['EXP_AMOUNT']-$act_sem),2);
                                        }
                                    } ?>
                                </td>
                                
                                <!-- TOTAL CURRENT YEAR EXPENDITURE -->
                                <td>
                                    <?php foreach ($curr_year_2 as $sec) { 
                                        if ($sec['EXPENDITURE_EXPENDITURE_id'] == $exps['EXPENDITURE_id']) {
                                            $total_curr_year_sub_total += $sec['EXP_AMOUNT'];
                                            echo '₱  ',number_format($sec['EXP_AMOUNT'],2);
                                        }
                                    } ?>
                                </td>

                                <!-- TOTAL NEXT YEAR ESTIMATED EXPENDITURE -->
                                <td>
                                    <?php foreach ($next_year as $next) { 
                                        if ($next['EXPENDITURE_EXPENDITURE_id'] == $exps['EXPENDITURE_id']) {
                                            $next_year_sub_total += $next['EXP_AMOUNT'];
                                            echo '₱  ',number_format($next['EXP_AMOUNT'],2);
                                        }
                                    } ?>
                                </td>
                                
                            </tr>
                        <?php }
                    } ?>

                    <!-- SUBTOTAL OF EVERY LBP EXPENDITURE CLASSES -->
                    <tr class="text-center subtotal-head">
                        <th colspan="2">SUB-TOTAL</th>
                        <th>
                            <?php if ($prev_year_sub_total > 0) {
                                echo '₱',number_format($prev_year_sub_total, 2);
                            } else { echo '-'; }  ?>
                        </th> 
                        <th>
                            <?php if ($curr_year_sub_total_1 > 0) {
                                echo '₱',number_format($curr_year_sub_total_1, 2);
                            } else { echo '-'; }  ?>
                        </th>
                        <th>
                            <?php if ($curr_year_sub_total_2 > 0) {
                                echo '₱',number_format($curr_year_sub_total_2, 2);
                            } else { echo '-'; }  ?>
                        </th>
                        <th>
                            <?php if ($total_curr_year_sub_total > 0) {
                                echo '₱',number_format($total_curr_year_sub_total, 2);
                            } else { echo '-'; }  ?>
                        </th>
                        <th>
                            <?php if ($next_year_sub_total > 0) {
                                echo '₱',number_format($next_year_sub_total, 2);
                            } else { echo '-'; }  ?>
                        </th>
                    </tr>

                <?php 
                    $prev_year_grand_total += $prev_year_sub_total;
                    $curr_year_grand_total_1 += $curr_year_sub_total_1;
                    $curr_year_grand_total_2 += $curr_year_sub_total_2;
                    $total_curr_year_grand_total += $total_curr_year_sub_total;
                    $next_year_grand_total += $next_year_sub_total;
                } ?>
                
                <tr class="text-center grandtotal-head">
                    <th colspan="2">GRAND-TOTAL</th>
                    <th>
                        <?php if ($prev_year_grand_total > 0) {
                            echo '₱',number_format($prev_year_grand_total, 2);
                        } else { echo '-'; }  ?>
                    </th>
                    <th>
                        <?php if ($curr_year_grand_total_1 > 0) {
                            echo '₱',number_format($curr_year_grand_total_1, 2);
                        } else { echo '-'; }  ?>
                    </th>
                    <th>
                        <?php if ($curr_year_grand_total_2 > 0) {
                            echo '₱',number_format($curr_year_grand_total_2, 2);
                        } else { echo '-'; }  ?>
                    </th>
                    <th>
                        <?php if ($total_curr_year_grand_total > 0) {
                            echo '₱',number_format($total_curr_year_grand_total, 2);
                        } else { echo '-'; }  ?>
                    </th>
                    <th>
                        <?php if ($next_year_grand_total > 0) {
                            echo '₱',number_format($next_year_grand_total, 2);
                        } else { echo '-'; }  ?>
                    </th>
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
                            <h5 class = "text-center"><?php echo $sign['signPrepared']; ?></h5>
                            <h6 class = "text-center">Mun. Budget Officer</h6>
                        </div>
                    </td>
            
                    <td style="padding:30px;">
                        <div class="form-group">
                            <label>Reviewed by:</label>
                            <br />
                            <br />
                            <h5 class = "text-center"><?php echo $sign['signReviewed']; ?></h5>
                            <h6 class = "text-center">Mun. Budget Officer</h6>
                        </div>
                    </td>
            
            
                    <td style="padding:30px;">
                        <div class="form-group">
                            <label>Approved by:</label>
                            <br />
                            <br />
                            <h5 class = "text-center"><?php echo $sign['signApproved']; ?></h5>
                            <h6 class = "text-center">Municipal Mayor</h6>
                        </div>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</body>
