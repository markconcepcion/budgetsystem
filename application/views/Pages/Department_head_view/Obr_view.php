<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="bg-white border-radius-4 box-shadow mb-30" style="padding:40px;">
                <?php echo form_open('Department_head/Obligation_request/submitOBR'); ?>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"><b>DATE</b></label>
                        <div class="col-sm-12 col-md-10">
                            <?php date_default_timezone_set('Asia/Manila'); ?>
                            <label><?php echo date('F-d-Y'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"><b>PAYEE</b></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name = "obr_payee" placeholder="Click Here to Enter Payee's Name" type="text" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"><b>SPECIFIED EXPENSE</b></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name = "obr_part" type="text" placeholder="Click Here to Enter Particular Expense" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"><b>AMOUNT</b></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="obr_amt" name = "obr_amount" type="text" step="0.01" min="1" max="1,000,000,000,000,000,042,420,637,374,017,961,984" placeholder="Click Here to Enter Amount" required>
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-top: 50px;">
                        <button type="submit" class="btn btn-warning">SUBMIT</button>
                        <a href="<?php echo base_url('DH'); ?>" class="btn btn-secondary">CANCEL</a>
                    </div>
                    <input type="hidden" name="preparedBy" value="<?php echo $uprofile['USR_FNAME'],' ',$uprofile['USR_MNAME'],' ',$uprofile['USR_LNAME']; ?>">
                    <input type="hidden" name="reviewedBy" value="<?php echo $mayor['USR_FNAME'],' ',$mayor['USR_MNAME'],' ',$mayor['USR_LNAME']; ?>">
                    <input type="hidden" name="approvedBy" value="<?php echo $bhead['USR_FNAME'],' ',$bhead['USR_MNAME'],' ',$bhead['USR_LNAME']; ?>">
                <?php echo form_close(); ?>
                
            </div>
        </div>
<?php $this->load->view('Modals/obr_modal'); ?>