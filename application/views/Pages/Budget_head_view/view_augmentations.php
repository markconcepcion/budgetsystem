<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="row">
                        <h4 class="col-sm-12 col-md-12" style="padding-top:10px;"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;AUGMENTATIONS BY DEPARTMENT</h4>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead class="bar">
                            <tr>
                                <th scope="col">Augmented To</th>
                                <th scope="col">Augmented From</th>
                                <th scope="col">Department</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Augmented Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalAug = 0;
                            foreach ($augmentations as $aug) { 
                                $totalAug += $aug['amount']; ?>
                            <tr>
                                <td><?php echo ucwords(strtolower($aug['EXP_NAME']))?></td>
                                <td><?php echo ucwords(strtolower($aug['EXPCLASS_NAME']))?></td>
                                <td><?php echo ucwords(strtolower($aug['DPT_NAME']))?></td>
                                <td><?php echo '₱ '.number_format($aug['amount'],2)?></td>
                                <td><?php echo date('M-d-Y', strtotime($aug['augmented_date'])).' '.date('D', strtotime($aug['augmented_date']))?></td>
                            </tr>
                            <?php } ?>
                            <tr class="text-left"  style="background-color:#564e2829 !important;">
                                <td></td>
                                <td></td>
                                <td><b>TOTAL:</b></td>
                                <td colspan="2"><b><?php echo '₱ '.number_format($totalAug,2)?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>