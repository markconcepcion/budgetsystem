<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="float" style="width: 96.5%;padding-right:28px;">
                    <div class="text-right">
                        <?php if ($order === "DESC") { ?>
                            <a href="<?php echo base_url('BH/VIEW_OBR/'.date('Y').'/'.'ASC'); ?>"><button class="btn btn-warning">
                                <i class="icon-copy fa fa-sort-amount-asc" aria-hidden="true"></i>
                                SORT ASCENDINGLY
                            </button></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('BH/VIEW_OBR/'.date('Y').'/'.'DESC'); ?>"><button class="btn btn-warning">
                                <i class="icon-copy fa fa-sort-amount-desc" aria-hidden="true"></i>
                                SORT DESCENDINGLY
                            </button></a>
                        <?php }?>
                    </div>
                </div>
                <table class="table table-bordered table-sm" style="margin-top:50px;">
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
                        <?php $i=0; foreach ($Obrs as $obr) {  $i++;
                            if ($obr['OBR_STATUS'] === "CHECKED") {?>
                                <tr><td><?php echo $i; ?></td>
                                    <td><?php echo $obr['DPT_NAME'] ?></td>
                                    <td><?php echo $obr['OBR_DATE'] ?></td>
                                    <td><?php echo $obr['OBR_STATUS'] ?></td>
                                    <td><?php echo form_open('Budget_head/Obr/Obr_details_checked/'.$obr['OBR_ID']); ?>
                                        <input name="dpt_id" value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                        <button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i>&nbsp;REVIEW</button>
                                    <?php echo form_close(); ?></td>
                                </tr>
                            <?php } 
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>