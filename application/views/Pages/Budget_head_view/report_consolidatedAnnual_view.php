<style>
    .table{width: 100%;}
    .sub-total{ border-top: 1px solid black !important; border-bottom: 1px solid black !important; }
    .btn-warning { background-color: #ff9900; border-color: #ff9900; border-radius:0; }
    .table th, .table td { padding: 0px;
        font-size: 14px ! important; font-style: italic;
        font-family: -webkit-body; border: 0px;
    }
</style>
<style type="text/css" media="screen"></style>
<style type="text/css" media="print">
    /* @page {size:landscape}  */ 
    @media print {
        @page {size: Legal landscape;max-height:100%; max-width:100%}
        body{ width:100%; height:100%; }    
        .toHide, .toHide * {display:none !important;}
    }
    .subtotal-head{ background-color:#564e2829!important; }
    .grandtotal-head{ background-color:#a5a5a5!important; }
</style>

<div class="bar text-right toHide" style="height:auto;">
    <a href="<?php echo base_url('BH/REPORT/'.$year); ?>"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
    <a href="<?php echo base_url(); ?>"><button class="btn btn-warning"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</button></a>
    <button type="button" class="btn btn-warning" id="print-btn"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
</div>
<div class="pd-5 bg-white" id="toPrint">
    <table class="table">
        <thead>
            <tr>
                <th class = "text-center">
                    Blank <br /> <br /> Particulars
                </th>
                <th class="text-center">BY <?php echo $year; ?><br />AB<br />(2)</th>
                <th class="text-center">BY <?php echo $year; ?><br />Supp # 1<br />(3)</th>
                <th class="text-center">DECLARED<br />Savings<br />(4)</th>
                <th class="text-center">BY <?php echo $year; ?><br />Augmentation<br />(5)</th>
                <th class="text-center">BY <?php echo $year; ?><br />Total<br />Budget<br />(6)</th>
                <th class="text-center">BY <?php echo $year; ?><br />Obligations<br /><!--as of <?php echo date('F-d-Y'); ?> --><br />(7)</th>
                <th class="text-center">BY <?php echo $year; ?><br />for<br />CA<br />(8)</th>
                <th class="text-center">BY <?php echo $year; ?><br />Reserve<br />(9)</th>
                <th class="text-center">Total<br />Obligation, CA<br />& Reserve<br />(10)</th>
                <th class="text-center">Unobigated<br />Balance<br />(11)</th>
            </tr>
        </thead>
        <tbody>
        <?php $ab=0; $qs_st = 0; $qa_st = 0;$total_bg =0; $obr_t = 0; $total_obr =0;$totality =0;
        foreach ($exp_classes as $exc) { 
            $ab = 0;  
            $qs_st = 0;
            $qa_st = 0;
            $total_bg =0;
            $obr_t = 0;
            $total_obr =0; $totality =0;?>
            <tr>
                <td colspan = "10" style = "padding-top:5px;"><b><?php echo $exc['EXPCLASS_NAME']; ?>:</b></td>
            </tr>
            <?php foreach ($exps as $exp) { 
                if ($exc['EXPCLASS_ID'] === $exp['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                    <tr>
                        <td><?php echo $exp['EXP_NAME']; ?></td>
                        
                        <td class="text-left">
                        <?php
                        foreach ($lbps_exps as $lbp_exp) {  
                            if ($lbp_exp['EXPENDITURE_EXPENDITURE_id'] === $exp['EXPENDITURE_id']) { 
                                $ab+=$lbp_exp['LBP_EXP_AMOUNT']; ?>
                                <?php echo '₱ '.number_format($lbp_exp['LBP_EXP_AMOUNT'],2); ?>
                            <?php } 
                        } ?>
                        </td>

                        <td class="text-left">
                            <?php $temp_supp=0;
                                foreach ($quarter_supp as $qs) {
                                if ($qs['EXPENDITURE_EXPENDITURE_id'] === $exp['EXPENDITURE_id']) { 
                                    if ($qs['MBO_TMP'] < 1) {
                                        echo '-';
                                    } else {
                                        $qs_st += $qs['MBO_TMP'];  $temp_supp=$qs['MBO_TMP'];
                                        echo '₱ '.number_format($qs['MBO_TMP'],2);
                                    }
                                } 
                            } ?>
                        </td>

                        <td class="text-left">-</td>
                        
                        <td class="text-left">
                            <?php  $temp_aug=0;
                                foreach ($quarter_aug as $qa) {
                                if ($qa['exp_id'] === $exp['EXPENDITURE_id']) { 
                                    $qa_st += $qa['amount']; $temp_aug= $qa['amount']; ?>
                                    <?php echo '₱ '.number_format($qa['amount'],2); ?>
                                <?php } 
                            } ?>
                        </td>

                        <td class="text-left">
                        <?php $total_budget = 0;
                        foreach ($lbps_exps as $lbp_exp) { 
                            if ($lbp_exp['EXPENDITURE_EXPENDITURE_id'] === $exp['EXPENDITURE_id']) {
                                $total_budget = $lbp_exp['LBP_EXP_AMOUNT']+$temp_aug+$temp_supp;
                                $total_bg += $total_budget;
                                echo '₱ '.number_format($total_budget,2); ?>
                            <?php }
                        } ?>
                        </td>

                        <td class="text-left">
                        <?php 
                            foreach ($quarter_obr as $obr) { if ($obr['EXPENDITURE_id'] === $exp['EXPENDITURE_id']) { 
                                $obr_t += $obr['PART_AMOUNT']; ?>
                                <?php echo '₱ '.number_format($obr['PART_AMOUNT'],2); ?>
                            <?php } 
                        } ?>
                        </td>
                        
                        <td class="text-left">-</td>
                        <td class="text-left">-</td>

                        <td class="text-left">
                        <?php $total_exp = 0;
                            foreach ($quarter_obr as $obr) { if ($obr['EXPENDITURE_id'] === $exp['EXPENDITURE_id']) { 
                                $total_exp = $obr['PART_AMOUNT']; $total_obr += $total_exp;?>
                                <?php echo '₱ '.number_format($total_exp,2); ?>
                            <?php } 
                        } ?>
                        </td>
                        
                        <th class="text-left"><?php
                        $totality += $total_budget-$total_exp; echo '₱ '.number_format($total_budget-$total_exp,2)?></th>
                    </tr>
                <?php } 
            } ?>
            <tr class="subtotal-head">
                <th class ="text-center sub-total"><b>SUB-TOTAL</b></th>
                <th class = "text-left sub-total">
                    <?php if ($ab > 0) {
                        echo '₱ '.number_format($ab,2); 
                    } else { echo '-'; } ?>
                </th>
                <th class = "text-left sub-total">
                    <?php if ($qs_st > 0) {
                        echo '₱ '.number_format($qs_st,2); 
                    } else { echo '-'; } ?>
                </th>

                <th class = "text-left sub-total">-</th>
                
                <th class = "text-left sub-total">
                    <?php if ($qa_st > 0) {
                        echo '₱ '.number_format($qa_st,2); 
                    } else { echo '-'; } ?>
                </th>
                <th class = "text-left sub-total">
                    <?php if ($total_bg > 0) {
                        echo '₱ '.number_format($total_bg,2); 
                    } else { echo '-'; } ?>
                </th>
                <th class = "text-left sub-total">
                    <?php if ($obr_t > 0) {
                        echo '₱ '.number_format($obr_t,2); 
                    } else { echo '-'; } ?>
                </th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total">
                    <?php if ($total_obr > 0) {
                        echo '₱ '.number_format($total_obr,2); 
                    } else { echo '-'; } ?>
                </th>
                <th class = "text-left sub-total">
                    <?php if ($totality > 0) {
                        echo '₱ '.number_format($totality,2); 
                    } else { echo '-'; } ?>
                </th>
            </tr>
        <?php } ?>
        <tr class="grandtotal-head">
                <th class ="text-center sub-total"><b>GRAND-TOTAL</b></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
                <th class = "text-left sub-total"></th>
            </tr>
    </tbody>
    </table>
</div>

