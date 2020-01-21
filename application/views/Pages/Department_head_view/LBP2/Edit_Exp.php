<style>
    /* .trueHide{display:none!important;} */
    .table-bordered td{ padding: 2px;} h6, h4{font-weight:600;} </style>

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <table class="table table-bordered table-sm">
                            <thead class="bar">
                                <tr>
                                    <td colspan="2">LBP2 Current Expenditures</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($class as $c) { ?>
                                    <tr>
                                        <th colspan="2" class="text-center"><?php echo $c['EXPCLASS_NAME'];?></th>
                                    </tr>
                                    <?php foreach ($exps as $e) { 
                                        if ($e['EXPENDITURE_CLASS_EXPCLASS_ID'] == $c['EXPCLASS_ID']) { ?>
                                            <tr>
                                                <td><button type="button" value="<?php echo $e['LBP_EXP_ID']; ?>" class="del-exp-btn btn btn-danger btn-sm btn-block">
                                                    <i class="icon-copy fa fa-trash" aria-hidden="true"></i></button></td>
                                                <td id="exp_name<?php echo $e['LBP_EXP_ID'];?>"><?php echo $e['EXP_NAME']; ?></td>
                                            </tr>
                                        <?php } 
                                    } ?>    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <table class="table table-striped table-sm" style="width:80%;">
                            <thead><tr style="background-color: lightgray;">
                                <th class="btn-secondary btn-sm notes">
                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                    NOTE: Click on the black buttons to show Expenditures
                                </th>
                            </tr></thead>
                        </table>

                        <?php echo form_open('DH/ADD/LBP2_EXP/'.$lbp_id);  
                            foreach ($Exp_classes as $ExC) { ?>
                                <label class="weight-600" style="width:100%">
                                    <button type="button" value="<?php echo $ExC['EXPCLASS_ID']; ?>" class="btn btn-black btn-sm text-left show-exps-btn" style="width:100%">
                                        <?php echo $ExC['EXPCLASS_NAME']; ?>
                                    </button>
                                </label>
                                <table class="table table-striped table-sm hide show<?php echo $ExC['EXPCLASS_ID']; ?>" style="width:*0%; margin-bottom:6px;">
                                    <thead><tr style="background-color: lightgray;">
                                        <th class="btn-secondary btn-sm notes">
                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                            NOTE: To Choose Expenditures, just click the checkboxes you want to include
                                        </th>
                                    </tr></thead>
                                </table>
                                <?php foreach ($Exps as $Ex) {
                                    if ($ExC['EXPCLASS_ID'] === $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                                        <div class="div<?php echo $Ex['EXPENDITURE_id']; ?> custom-control custom-checkbox mb-0 hide show<?php echo $ExC['EXPCLASS_ID']; ?>">
                                            <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $Ex['EXPENDITURE_id']; ?>" 
                                            name="Exps_id[]" value="<?php echo $Ex['EXPENDITURE_id']; ?>">
                                            <label class="custom-control-label" for="customCheck<?php echo $Ex['EXPENDITURE_id']; ?>">
                                                <?php echo $Ex['EXP_ACCT_CODE'].' - '.$Ex['EXP_NAME']; ?> 
                                            </label>
                                        </div>
                                    <?php } 
                                } 
                            } ?>
                            <input name="currYr" value="<?php echo date('Y'); ?>" hidden>
                            <input name="Dpt_id" value="<?php echo $this->session->userdata('dept'); ?>" hidden>
                            <button type="submit" class="btn btn-warning float" style="top:0.5%;right:2.5%;">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                
			</div>
		</div>
