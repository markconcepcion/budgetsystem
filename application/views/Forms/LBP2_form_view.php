<style>
    .table-bordered td{
        padding: 0px;
    }
</style>
<?php if($checking != 0){ ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <h5 class = "text-center">YOU HAVE ALREADY SUBMITTED AN LBP. &nbsp; <a style="color:blue;" href="<?php echo base_url('Department_head/Lbp/viewLBP2/'.$this->session->userdata('dept')); ?>">REVIEW?</a></h5>
                <div>
            <div>
<?php } else { 
    echo form_open('Department_head/Lbp/submitLBP2'); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <h6>LBP Form No.2</h6>
                    <br />
                    <h5 class = "text-center">PROGRAM APPROPRIATION AND OBLIGATION BY OBJECT OF EXPENDITURE</h5>
                    <br />
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Office Department</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: <?php echo $dept['DPT_NAME']; ?></h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Function</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: Direction & Control</h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Project/Activity</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: Administer, execute and marage municipal affairs</h6>
                        </div>
                    </div>
                    <div class="form-group row" style = "margin-top: -2%;">
                        <label class="col-sm-12 col-md-2 col-form-label">Fund</label>
                        <div class="col-sm-12 col-md-10" >
                            <h6 style = "margin-top: 1%;">: General Fund</h6>
                        </div>
                    </div>
                    <table class = "table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan = "2">Object of Expenditure</th>
                                <th rowspan = "2" class = "text-center">Account<br />Code</th>
                                <th rowspan = "2" class = "text-center">Past Year<br />2016<br />(Actual)</th>
                                <th rowspan = "1" colspan = "3" class = "text-center">Current Year 2017</th>
                                <th rowspan = "2" class = "text-center">Budget<br />Year 2018<br />Estimate</th>
                            </tr>
                            <tr>
                                <th rowspan = "1">1st Semester<br />(Actual)</th>
                                <th rowspan = "1">2st Semester<br />(Estimated)</th>
                                <th rowspan = "1">Total)</th>
                            </tr>
                            <tr>
                                <th>PERSONAL SERVICES</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 1) { ?>
                                <tr>
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="number" name="amount[]"></td>
                                </tr>
                            <?php } } ?>
                            
                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>
                            
                            <tr>
                                <th>MAINTENANCE AND OTHER<br />OPERATING EXPENSES:</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>

                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 2) { ?>
                                <tr>
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="number" name="amount[]"></td>
                                </tr>
                            <?php } } ?>

                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>
                            
                            <tr>
                                <th>MAINTENANCE AND OTHER<br />OPERATING EXPENSES:</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>

                            <?php foreach ($exps as $key) { if ($key['EXPCLASS_ID'] == 3) { ?>
                                <tr>
                                    <td><input value="<?php echo $key['EXPENDITURE_id']; ?>" name="exp_id[]" hidden=""  ><?php echo $key['EXP_NAME'] ?></td>
                                    <td><?php echo $key['EXP_ACCT_CODE'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="number" name="amount[]"></td>
                                </tr>
                            <?php } } ?>

                            <tr>
                                <th>SUB-TOTAL</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
                            </tr>
                            
                            <tr>
                                <th>MAINTENANCE AND OTHER<br />OPERATING EXPENSES:</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th>
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

                    <div class = "text-right">
                        <button type = "submit" class = "dropbtn">SUBMIT</button>
                    </div>
                </div>
            </div>
    <?php echo form_close(); } ?>
