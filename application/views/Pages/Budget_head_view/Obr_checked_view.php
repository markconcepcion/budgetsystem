<?php 
    $total_approp = $lbp_exp['LBP_EXP_AMOUNT']+$obr_details['MBO_TMP'];
    $prev_allot = ($lbp_exp['LBP_EXP_AMOUNT']/4)*($quarter-1);
    $qtr_allot = ($lbp_exp['LBP_EXP_AMOUNT']/4);
    $total_allot = $prev_allot+$qtr_allot;
    $total_release = 0;
    foreach ($obr_exp as $obrexp) {
        $total_release += $obrexp['PART_AMOUNT'];
    }
    $remain_bal = ($total_allot-$total_release) + $obr_details['MBO_TMP'];
    $bal_approp = $remain_bal-$obr_details['PART_AMOUNT'];
?>

<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="row" style="margin:0px;">
                    <div class="col-sm-12 col-md-5 box-shadow ntb-bar" style="color:white; padding: 5px;">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">OBR NO.:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['OBR_NO']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">SUBMITTED ON:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['OBR_DATE']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">CHECKED ON:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['OBR_APPROVED_DATE']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">PAYEE:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['OBR_PAYEE']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">CHECKED BY:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['USR_FNAME'].' '.$obr_details['USR_FNAME']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">SPECIFIED EXPENSE:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_details['PART_PARTICULARS']; ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6" style="padding-right:0px;">AMOUNT:</div>
                            <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo '₱ '.number_format($obr_details['PART_AMOUNT'], 2); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 box-shadow" style="padding:15px;">
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-6 col-sm-12 label-input">Mun. Budget Office Control No.&nbsp;</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="mbo_no" class="line-input" value="<?php echo $obr_details['MBO_ID']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Exp. Class&nbsp;</label>
                            <div class="col-md-9 col-sm-12">
                                <input id="exp-mbo" class="line-input" value="<?php echo $obr_details['EXP_NAME']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Amt. Approp.</label>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" class="line-input" id="mbo-amt-approp" value="<?php echo '₱ '.number_format($lbp_exp['LBP_EXP_AMOUNT'],2); ?>" disabled  >
                            </div>
                            <label class="col-md-1 col-sm-12 label-input">Code</label>
                            <div class="col-md-3 col-sm-12">
                                <input type="text" class="line-input" name="dpt_id" value="<?=$dpt_id;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Add Approp.&nbsp;</label>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="line-input" id="mbo-add_approp" value="<?php echo '₱ '.number_format($obr_details['MBO_TMP'],2); ?>"  disabled>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" class="line-input" id="mbo-total_approp" value="<?php echo '₱ '.number_format($total_approp, 2)?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Previous Allot.</label>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="line-input" id="mbo-prev-allot" value="<?php echo '₱ '.number_format($prev_allot,2); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Qtr. Allot.</label>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="line-input" id="mbo-qtr-allot" value="<?php echo '₱ '.number_format($qtr_allot,2); ?>" disabled>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" class="line-input"  id="mbo-total-allot" value="<?php echo '₱ '.number_format($total_allot,2); ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input"></label>
                            <label class="col-md-4 col-sm-12 label-input">Add Allot./Rem. Balance</label>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" class="line-input" id = "mbo-rem-bal" value="<?php echo '₱ '.number_format($remain_bal,2); ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input"></label>
                            <label class="col-md-4 col-sm-12 label-input">Less This Claim&nbsp;</label>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" id="mbo-ltc" class="line-input" value="<?php echo '₱ '.number_format($obr_details['PART_AMOUNT'],2); ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input"></label>
                            <label class="col-md-4 col-sm-12 label-input">Balance of Approp.</label>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" class="line-input" id = "mbo-bal-approp" value="<?php echo '₱ '.number_format($bal_approp,2); ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">Remarks:</label>
                            <div class="col-md-9 col-sm-12 text-center">
                                <input type="text" class="line-input" name="remarks" value="<?php echo $obr_details['MBO_REMARKS']; ?>">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-md-3 col-sm-12 label-input">MBO/Asst. Initial</label>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="line-input" name="initial" value="<?php echo $obr_details['MBO_INITIAL']; ?>" disabled>
                            </div>
                            <label class="col-md-1 col-sm-12 label-input">Date</label>
                            <div class="col-md-4 col-sm-12">
                                <input type="date" class="line-input" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-right">
                   <button class="btn btn-secondary">RETURN</button>
                    <button class="btn btn-warning">APPROVE</button>
                </div>
            </div>
        </div>