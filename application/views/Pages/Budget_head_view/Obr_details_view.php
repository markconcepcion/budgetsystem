<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="hide">
                    <?php foreach ($Lbp_exps as $lbp_exp) { ?>
                        <input value="<?php echo $lbp_exp['LBP_EXP_AMOUNT'] ?>" id="amt-approp<?php echo $lbp_exp['EXPENDITURE_EXPENDITURE_id']?>" hidden>
                        <input value="<?php echo number_format($lbp_exp['LBP_EXP_AMOUNT'],2); ?>" id="real-amt-approp<?php echo $lbp_exp['EXPENDITURE_EXPENDITURE_id'];?>" hidden>
                    <?php } 
                        foreach ($Exps_temp as $temp) {
                            foreach ($obr_exps as $obr) {
                                if ($obr['EXPENDITURE_EXPENDITURE_id'] === $temp['EXPENDITURE_id']) {
                                    $temp['temp'] = $temp['temp'] + $obr['PART_AMOUNT'];
                                }   
                            } ?>
                            <input value="<?php echo $temp['temp'] ?>" id="total-rel<?php echo $temp['EXPENDITURE_id']?>" hidden>
                        <?php } ?>
                    <input value="<?=$quarter;?>" id="quarter" hidden>
                    <input value="<?php echo $Obr_details['PART_AMOUNT'];?>" id="ltc" hidden>
                    <input value="<?php echo number_format($Obr_details['PART_AMOUNT'], 2); ?>" id="real-ltc" hidden>
                </div>
                <?php echo form_open('Budget_head/Obr/Obr_check/'.$Obr_details['OBR_ID']); ?>
                    <div class="row">      
                        <div class="form-group col-sm-12 col-md-6">
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
                        <div class="form-group col-sm-12 col-md-6">
                            <label>EXPENDITURE:</label>
                            <select class="form-control" id="exp" name="exp_id">
                                <option selected="">* * * CLICK HERE THEN</option>
                                <?php foreach ($Exps as $ex) { ?>
                                    <option class="hide idExC <?php echo $ex['EXPENDITURE_CLASS_EXPCLASS_ID'];?>" name="exp_id" id="<?php echo $ex['EXPENDITURE_id'];?>" 
                                        value="<?php echo $ex['EXPENDITURE_id'];?>"><?php echo $ex['EXP_NAME']; ?>
                                    </option>
                                <?php } ?>
                            </select>                   
                        </div>
                    </div>

                    <div class="row" style="margin:0px;">
                        <div class="col-sm-12 col-md-5 box-shadow ntb-bar" style="color:white; padding: 5px;">
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6" style="padding-right:0px;">OBR NO.: <input name="obr_no" value="<?php echo $obr_no.'-'.date('Y', strtotime($Obr_details['OBR_DATE'])); ?>" hidden></div>
                                <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $obr_no.'-'.date('Y', strtotime($Obr_details['OBR_DATE'])); ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6" style="padding-right:0px;">DATE:</div>
                                <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $Obr_details['OBR_DATE']; ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6" style="padding-right:0px;">PAYEE:</div>
                                <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $Obr_details['OBR_PAYEE']; ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6" style="padding-right:0px;">SPECIFIED EXPENSE:</div>
                                <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo $Obr_details['PART_PARTICULARS']; ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6" style="padding-right:0px;">AMOUNT:</div>
                                <div class="col-sm-12 col-md-6" style="padding-left:0px;"><?php echo '₱'.number_format($Obr_details['PART_AMOUNT'], 2); ?></div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-7 box-shadow" style="padding:15px;">
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-6 col-sm-12 label-input">Mun. Budget Office Control No.&nbsp;</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="mbo_no" class="line-input" value="<?php echo $mbo_no.'-'.date('Y', strtotime($Obr_details['OBR_DATE'])); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Exp. Class&nbsp;</label>
                                <div class="col-md-9 col-sm-12">
                                    <input id="exp-mbo" class="line-input" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Amt. Approp.</label>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" class="line-input" id="mbo-amt-approp" readonly> 
                                    <input type="text" class="line-input" id="mbo-amt-approp-dummy" hidden> 
                                </div>
                                <label class="col-md-1 col-sm-12 label-input">Code</label>
                                <div class="col-md-3 col-sm-12">
                                    <input type="text" class="line-input" name="dpt_id" value="<?=$dpt_id;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Add Approp.&nbsp;</label>
                                <div class="col-md-4 col-sm-12">
                                    <input type="number" class="line-input" id="mbo-add-approp" name="add_approp">
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" class="line-input" id = "mbo-total-approp" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Previous Allot.</label>
                                <div class="col-md-4 col-sm-12">
                                    <input type="text" class="line-input" id="mbo-prev-allot" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Qtr. Allot.</label>
                                <div class="col-md-4 col-sm-12">
                                    <input type="text" class="line-input" id="mbo-qtr-allot" readonly>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" class="line-input"  id="mbo-total-allot" readonly>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input"></label>
                                <label class="col-md-4 col-sm-12 label-input">Add Allot./Rem. Balance</label>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" class="line-input" id = "mbo-rem-bal" readonly>
                                    <input type="text" class="line-input" id = "mbo-rem-bal-dummy" hidden>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input"></label>
                                <label class="col-md-4 col-sm-12 label-input">Less This Claim&nbsp;</label>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" id="mbo-ltc" class="line-input" value="" readonly>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input"></label>
                                <label class="col-md-4 col-sm-12 label-input">Balance of Approp.</label>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" class="line-input" id = "mbo-bal-approp" readonly>
                                    <input type="text" class="line-input" id = "mbo-bal-approp-dummy" hidden>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">Remarks:</label>
                                <div class="col-md-9 col-sm-12 text-center">
                                    <input type="text" class="line-input" name="remarks">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0;">
                                <label class="col-md-3 col-sm-12 label-input">MBO/Asst. Initial</label>
                                <div class="col-md-4 col-sm-12">
                                    <input type="text" class="line-input" name="initial">
                                </div>
                                <label class="col-md-1 col-sm-12 label-input">Date</label>
                                <div class="col-md-4 col-sm-12">
                                    <input type="date" class="line-input" name="obr_checked_date" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right" style="padding-top:13px;">
                        <button type="button" id="obr-reject-btn" class="btn btn-secondary" value="DECLINED">DECLINED</button>
                        <button type="button" id="obr-check-btn" class="btn btn-warning">ACCEPT</button>
                        <button type="submit" id="submit-accept-obr" name="obr_check_btn" value="CHECKED" hidden>ACCEPT</button>
                        <button type="submit" id="submit-reject-obr" name="obr_check_btn" value="DECLINED" hidden>DECLINED</button>
                    </div>
                <?php echo form_close(); ?>
			</div>
		</div>
