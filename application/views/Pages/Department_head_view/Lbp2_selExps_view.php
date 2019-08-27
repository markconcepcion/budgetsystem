<style> .table-bordered td{ padding: 2px;} h6, h4{font-weight:600;} </style>

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="row">
                    <!-- <div class="col-sm-12 col-md-4">
                        <h4>LBP2 Records</h4>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>#</th>
                                <th>Lbp 2</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div> -->

                    <div class="col-sm-12 col-md-12">
                        <table class="table table-striped table-sm" style="width:50%;">
                            <thead><tr style="background-color: lightgray;">
                                <th class="btn-secondary btn-sm notes">
                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                    NOTE: Click on the black buttons to show Expenditures
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </th>
                            </tr></thead>
                        </table>

                        <?php echo form_open('Department_head/Lbp/Lbp2_selExps');  
                            foreach ($Exp_classes as $ExC) { ?>
                                <label class="weight-600" style="width:100%">
                                    <button type="button" value="<?php echo $ExC['EXPCLASS_ID']; ?>" class="btn btn-black btn-sm text-left show-exps-btn" style="width:100%">
                                        <?php echo $ExC['EXPCLASS_NAME']; ?>
                                    </button>
                                </label>
                                <table class="table table-striped table-sm hide show<?php echo $ExC['EXPCLASS_ID']; ?>" style="width:60%; margin-bottom:6px;">
                                    <thead><tr style="background-color: lightgray;">
                                        <th class="btn-secondary btn-sm notes">
                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                            NOTE: To Choose Expenditures, just click the checkboxes you want to include
                                            <i class="fa fa-smile-o" aria-hidden="true"></i>
                                        </th>
                                    </tr></thead>
                                </table>
                                <?php foreach ($Exps as $Ex) {
                                    if ($ExC['EXPCLASS_ID'] === $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                                        <div class="custom-control custom-checkbox mb-0 hide show<?php echo $ExC['EXPCLASS_ID']; ?>">
                                            <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $Ex['EXPENDITURE_id']; ?>" 
                                            name="Exp_id[]" value="<?php echo $Ex['EXPENDITURE_id']; ?>">
                                            <label class="custom-control-label" for="customCheck<?php echo $Ex['EXPENDITURE_id']; ?>">
                                                <?php echo $Ex['EXP_ACCT_CODE'].' - '.$Ex['EXP_NAME']; ?>
                                            </label>
                                        </div>
                                    <?php } 
                                } 
                            } ?>
                            <input name="currYr" value="<?php echo date('Y'); ?>" hidden>
                            <input name="Dpt_id" value="<?php echo $this->session->userdata('dept'); ?>" hidden>
                            <button type="submit" class="btn btn-warning float" style="top:4%;right:4%;">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                
			</div>
		</div>
