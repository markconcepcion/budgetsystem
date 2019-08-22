<?php echo form_open('Obligation_request/SubmitOBR'); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                        <div class="col-sm-12 col-md-10">
                            <label class="col-sm-12 col-md-2 col-form-label"><?php echo date('F-d-Y'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Payee</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_payee" name = "obr_payee" type="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Particular</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_part" name = "obr_part" type="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Amount</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="req_amt" name = "obr_amount" type="number" required>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-right:50px;">
                        <div class="col-sm-12 col-md-10"></div>
                        <div class="col-sm-12 col-md-2">
                            <button type="submit" class="dropbtn">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
<?php echo form_close(); ?>