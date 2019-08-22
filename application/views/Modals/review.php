
<?php echo form_open('Budget_officer/Obligation_request/pass_OBR'); ?>
<div class="modal fade" id="sample" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden = "true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Review OBR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style = "padding-left: 10%; padding-right: 10%">

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px">Mun. Budget Office Control No.&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <input name="mbo_ctrl_no" style = "text-align: center; border: 1px solid white;border-bottom: 1px solid black; width: 100%;" value ="<?=$mbo_no.'-'.(date('Y')-2000); ?>" ><br>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px"><label style = "font-size: 12px">Exp. Class&nbsp;</label></label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group">
                            <select name = "exp_id" id="exp_class" style = "border: 1px solid white;border-bottom: 1px solid black; width: 100%;">
                                <option selected></option>
                                <?php foreach ($amt_approp as $key) {  
                                        echo '<option value = "'.$key['EXPENDITURE_id'].'">'.' '.$key['EXP_NAME'].'</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Amt. Approp. :&nbsp; ₱</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="mbo" id = "allotment" style = "width: 100%" readonly> 
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">&nbsp;Code&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" value = "<?=$dept_code; ?>"  style = "width: 100%; text-align: center;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Add Approp.&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="number" class="mbo" id = "add_approp" name = "add_approp" style = "width: 100%"> 
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" id = "total_approp" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Previous Allot.</label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "prev" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Qtr. Allot.</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "quart" style = "width: 100%" readonly>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" style = "margin-left: 5px; width: 100%" id = "total" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Add Allot./Rem. Balance</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" style = "width: 100%" id = "remain_bal" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Less This Claim&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" id = "ltc" class="mbo" value="<?php echo number_format($LTClaim, 2); ?>" style = "width: 80%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Balance of Approp.</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "balance" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px">Remarks:</label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group text-center">
                        <input type="text" class="mbo" name = "remarks" style = "width: 100%;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">MBO/Asst. Initial</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" name = "initial" style = "width: 100%">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Date</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <input type="text" style = "border: 1px solid white;border-bottom: 1px solid black; width: 100%; text-align: center" value = "<?php echo date('F-d-Y') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type = "hidden" name = "dept_id" value = "<?=$dept_code; ?>" > 
                <input type = "hidden" name = "mbo_no" value = "<?=$mbo_no ?>" >    
                <input type = "hidden" name = "status"  id = "status" >
                <input type = "hidden" name = "exp_id"  id = "exp_id">
                <input type = "hidden" name = "obr_id" value = "<?php echo $obr_details['OBR_ID']; ?>" >
                <input type = "hidden" name = "obr_no" value = "<?=$obr_no ?>">
                <button type="submit" id = "accept" class="dropbtn" style = "padding:8px;">PASS OBR</button>
                <button type="submit" id = "reject" class="btn btn-danger">REJECT OBR</a>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
