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
</style>

<div class="bar text-right toHide" style="height:auto;">
    <a href="<?php echo base_url('budget_officer/Report'); ?>"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
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
                <th class="text-center">BY <?php echo date('Y'); ?><br />AB<br />(2)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />Supp # 1<br />(3)</th>
                <th class="text-center">DECLARED<br />Savings<br />(4)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />Augmentation<br />(5)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />Total<br />Budget<br />(6)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />Obligations<br />as of <?php echo date('F-d-Y'); ?><br />(7)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />for<br />CA<br />(8)</th>
                <th class="text-center">BY <?php echo date('Y'); ?><br />Reserve<br />(9)</th>
                <th class="text-center">Total<br />Obligation, CA<br />& Reserve<br />(10)</th>
                <th class="text-center">Unobigated<br />Balance<br />(11)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exp_classes as $exc) { ?>
                <tr>
                    <td colspan = "10" style = "padding-top:5px;"><b><?php echo $exc['EXPCLASS_NAME']; ?>:</b></td>
                </tr>
                <?php foreach ($exps as $exp) { 
                    if ($exc['EXPCLASS_ID'] === $exp['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                        <tr>
                            <td><?php echo $exp['EXP_NAME']; ?></td>
                            <?php foreach ($lbps_exps as $lbp_exp) { if ($lbp_exp['EXPENDITURE_EXPENDITURE_id'] === $exp['EXPENDITURE_id']) { ?>
                                <td class="text-left"><?php echo '₱ '.number_format($lbp_exp['LBP_EXP_AMOUNT'],2); ?></td>
                            <?php } } ?>
                            
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">-</td>
                        </tr>
                    <?php } 
                } ?>
                <tr>
                    <td class ="text-center sub-total"><b>SUB-TOTAL</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                    <td class = "text-right sub-total"><b>0</b></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

