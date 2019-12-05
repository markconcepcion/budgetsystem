<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="text-right" style="width: 99.8%;">
                    <?php echo form_open('budget_officer/Obr'); 
                        if ($order_by === "SORT ASCENDINGLY") { ?>
                            <input name="order" value="ASC" hidden><input name="order_by" value="SORT DESCENDINGLY" hidden>
                            <button class="btn btn-warning">
                                <i class="icon-copy fa fa-sort-amount-asc" aria-hidden="true"></i>
                                <?php echo $order_by; ?>
                            </button>
                        <?php } else { ?>
                            <input name="order" value="DESC" hidden><input name="order_by" value="SORT ASCENDINGLY" hidden>
                            <button class="btn btn-warning">
                                <i class="icon-copy fa fa-sort-amount-desc" aria-hidden="true"></i>
                                <?php echo $order_by; ?>
                            </button>
                    <?php } echo form_close();?>
                </div>
                
                <table class="table table-bordered table-sm" style="margin-top:10px;">
                    <thead class="bar">
                        <tr>
                            <th>#</th>
                            <th>DEPARTMENT</th>
                            <th>DATE SUBMITTED:</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($obrs as $obr) {  
                            if ($obr['obrViewStatus'] == 0) { $i++; ?>
                            <tr><td><?php echo $i; ?></td>
                                <td><?php echo $obr['DPT_NAME'] ?></td>
                                <td><?php echo date('M-d-Y', strtotime($obr['OBR_DATE'])); ?></td>
                                <td><?php echo $obr['OBR_STATUS'] ?></td>
                                <td><?php echo form_open('Budget_officer/Obr/Obr_details/'.$obr['OBR_ID']); ?>
                                    <input name="dpt_id" value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                    <button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i>&nbsp;VIEW DETAILS</button>
                                <?php echo form_close(); ?></td>
                            </tr>
                            <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>