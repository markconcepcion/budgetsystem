<style>
    .table th, .table td { 
        padding: 0px;
        font-size: 12 ! important;
        font-style: italic;
        font-family: -webkit-body;
        border: 0px;
    }
</style>

<div>
    <div class="page-header">

    </div>
    <div class="pd-5 bg-white border-radius-4 box-shadow mb-30">
        <table class = "table">
            <thead>
                <tr>
                    <th class = "text-center">
                        <?php if ($department === 0) {
                            echo "Consolidated";
                        } else {
                            echo $department['DPT_NAME']; } 
                        ?> <br /> <br /> Particulars
                    </th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />AB<br />(2)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />Supp # 1<br />(3)</th>
                    <th class = "text-center">DECLARED<br />Savings<br />(4)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />Augmentation<br />(5)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />Total<br />Budget<br />(6)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />Obligations<br />as of <?php echo date('F-d-Y'); ?><br />(7)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />for<br />CA<br />(8)</th>
                    <th class = "text-center">BY <?php echo date('Y'); ?><br />Reserve<br />(9)</th>
                    <th class = "text-center">Total<br />Obligation, CA<br />& Reserve<br />(10)</th>
                    <th class = "text-center">Unobigated<br />Balance<br />(11)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan = "10" style = "padding-top:5px;"><b>PERSONAL SERVICES:</b></td>
                </tr>
                <?php foreach ($expenditures as $exp) { if ($exp['EXPENDITURE_CLASS_EXPCLASS_ID'] == 1) { ?>
                    <tr>
                        <td><?php echo $exp['EXP_NAME']; ?></td>
                        <td class = "text-right" id = "act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "unobr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                    </tr>
                <?php } } ?>
                
                <tr>
                    <td class = "text-center" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>SUB-TOTAL</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ps_sub"></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ps_sub5"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ps_sub6"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ps_sub9"><b>0</b></td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ps_sub10"><b>0</b></td>
                </tr>

                <tr>
                    <td colspan = "10" style = "border: 1px solid white"><b>MAINTENANCE AND OTHER <br /> OPERATING EXPENSES:</b></td>
                </tr>
                <?php foreach ($expenditures as $exp) { if ($exp['EXPENDITURE_CLASS_EXPCLASS_ID'] == 2) { ?>
                    <tr>
                        <td><?php echo $exp['EXP_NAME']; ?></td>
                        <td class = "text-right" id = "act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "unobr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                    </tr>
                <?php } } ?>

                <tr>
                    <td class = "text-center" style = "border-top: 1px solid black; border-bottom: 1px solid black;">SUB-TOTAL</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ma_sub">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ma_sub5">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ma_sub6">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ma_sub9">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "ma_sub10">0</td>
                </tr>

                <tr>
                    <td colspan = "10" style = "border: 1px solid white"><b>CAPITAL OUTLAY:</b></td>
                </tr>
                
                <?php foreach ($expenditures as $exp) { if ($exp['EXPENDITURE_CLASS_EXPCLASS_ID'] == 3) { ?>
                    <tr>
                        <td><?php echo $exp['EXP_NAME']; ?></td>
                        <td class = "text-right" id = "act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_act<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right">-</td>
                        <td class = "text-right" id = "t_obr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                        <td class = "text-right" id = "unobr<?php echo $exp['EXPENDITURE_id']; ?>">-</td>
                    </tr>
                <?php } } ?>
                <tr>
                    <td class = "text-center" style = "border-top: 1px solid black; border-bottom: 1px solid black;">SUB-TOTAL</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "co_sub">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "co_sub5">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "co_sub6">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "co_sub9">0</td>
                    <td class = "text-right" style = "border-top: 1px solid black; border-bottom: 1px solid black;" id = "co_sub10">0</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>