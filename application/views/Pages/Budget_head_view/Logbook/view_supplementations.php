<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="row">
                        <h4 class="col-sm-12 col-md-11" style="padding-top:10px;"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;SUPPLEMENTATIONS OF OBLIGATION REQUEST</h4>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead class="bar">
                            <tr>
                                <th scope="col">Expenditure</th>
                                <th scope="col">Department</th>
                                <th scope="col">Supplemented Amount</th>
                                <th scope="col">Requested Amount</th>
                                <th scope="col">Approved Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalSupp = 0;
                            foreach ($supps as $supp) { 
                                $totalSupp += $supp['MBO_TMP'];?>
                                <tr>
                                    <td><?php echo ucwords(strtolower($supp['EXP_NAME']))?></td>
                                    <td><?php echo ucwords(strtolower($supp['DPT_NAME']))?></td>
                                    <td><?php echo '₱ '.number_format($supp['MBO_TMP'],2)?></td>
                                    <td><?php echo '₱ '.number_format($supp['PART_AMOUNT'],2)?></td>
                                    <td><?php echo date('M-d-Y', strtotime($supp['OBR_APPROVED_DATE'])).' '.date('D', strtotime($supp['OBR_APPROVED_DATE']))?></td>
                                </tr>
                            <?php } ?>
                            <tr class="text-center" style="background-color:#564e2829 !important;">
                                <th colspan="5">TOTAL: ₱<?php echo number_format($totalSupp,2)?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>