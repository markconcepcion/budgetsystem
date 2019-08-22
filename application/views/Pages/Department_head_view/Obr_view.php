<?php echo form_open('Department_head/Obligation_request/SubmitOBR'); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                        <div class="col-sm-12 col-md-10">
                            <?php date_default_timezone_set('Asia/Manila'); ?>
                            <label><?php echo date('F-d-Y'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Payee</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_payee" name = "obr_payee" placeholder="Click Here to Enter Payee's Name" type="text" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Specified Expense</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_part" name = "obr_part" type="text" placeholder="Click Here to Enter Particular Expense" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Amount</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_amt" name = "obr_amount" type="number" step="0.01" max="1,000,000,000,000,000,042,420,637,374,017,961,984" placeholder="Click Here to Enter Amount" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-warning">SUBMIT</button>
                    </div>
                </div>
            </div>
<?php echo form_close(); ?>

<?php $this->load->view('Modals/obr_modal'); ?>