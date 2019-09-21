<style>
    .nav-link.text-blue{ 
        border-radius: 0; border-bottom: 0; 
    }
    .nav-link.text-blue.active.show, .nav-link.active{
        border-radius: 0; border-bottom: 1.5px solid #ff9900;
        background-color: #ff9900 !important;
        color: white !important;
    }
    .notif{ 
        background: #dddddd; 
    }
    .notif > td{ 
        padding: 0;
    }
</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="row">
				    <h4 class="col-sm-12 col-md-5" style="padding-top:10px;"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Recent Activities</h4>
                    <ul class="nav nav-pills justify-content-end col-sm-12 col-md-7" role="tablist" style="padding-right:17px;">
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#propose" role="tab" aria-selected="true">Proposed LBP2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#check" role="tab" aria-selected="true">Checked ObR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#pending" role="tab" aria-selected="false">Pending ObR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-blue" data-toggle="tab" href="#all" role="tab" aria-selected="false">ALL</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "PENDING") { ?>
                                        <tr class="notif">
                                            <?php echo form_open('Budget_head/Obr/Obr_details/'.$obr['OBR_ID']); ?><input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                            <?php echo '<td><button type="submit" class="btn btn-sm">'.date('M', strtotime($obr['OBR_DATE'])).' '.date('d', strtotime($obr['OBR_DATE'])).' - A new obligation request has been submitted from '.$obr['DPT_NAME'].'. <a>VIEW?</a></button></td>';
                                            echo form_close(); ?>
                                        </tr>
                                    <?php } else { 
                                        foreach ($obr_mbo as $mbo) {;
                                            if ($mbo['OBLIGATION_REQUEST_OBR_ID'] === $obr['OBR_ID']) { ?>
                                                <tr class="notif">
                                                    <?php echo form_open('Budget_head/Obr/Obr_details_checked/'.$obr['OBR_ID']); ?><input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                                    <?php echo '<td><button type="submit" class="btn btn-sm"><span style="color:black!important;">'.date('M', strtotime($obr['OBR_APPROVED_DATE'])).' '.date('d', strtotime($obr['OBR_APPROVED_DATE'])).' - An obligation request has been checked by '.$mbo['USR_FNAME'].' '.$mbo['USR_LNAME'].' and is waiting for approval. </span><a>VIEW?</a></button></td>';
                                                    echo form_close(); ?>
                                                </tr>
                                            <?php }
                                        }// end of foreach
                                    }//end of else
                                } foreach ($lbps as $lbp) { ?>
                                    <tr class="notif">
                                        <?php echo '<td><button class="btn btn-sm">As of now, the '.$lbp['DPT_NAME'].' has already proposed a budget for year '.$lbp['FRM_YEAR'].'. <a href="'.base_url('Budget_head/Lbp/Lbp2/'.$lbp['FRM_ID']).'">VIEW?</a></button></td>'; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pending" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "PENDING") { ?>
                                        <tr class="notif">
                                            <?php echo form_open('Budget_head/Obr/Obr_details/'.$obr['OBR_ID']); ?><input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                            <?php echo '<td><button type="submit" class="btn btn-sm"><a>'.date('M', strtotime($obr['OBR_DATE'])).' '.date('d', strtotime($obr['OBR_DATE'])).' - A new obligation request has been submitted from '.$obr['DPT_NAME'].'. <span class="text-blue">VIEW?</span></a></button></td>';
                                            echo form_close(); ?>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="check" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "CHECKED") { 
                                        foreach ($obr_mbo as $mbo) { 
                                            if ($mbo['OBLIGATION_REQUEST_OBR_ID'] === $obr['OBR_ID']) { ?>
                                                <tr class="notif">
                                                    <?php echo form_open('Budget_head/Obr/Obr_details_checked/'.$obr['OBR_ID']); ?><input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                                    <?php echo '<td><button type="submit" class="btn btn-sm"><a>'.date('M', strtotime($obr['OBR_APPROVED_DATE'])).' '.date('d', strtotime($obr['OBR_APPROVED_DATE'])).' - An obligation request has been checked by '.$mbo['USR_FNAME'].' '.$mbo['USR_LNAME'].' and is waiting for approval. <span class="text-blue">VIEW?</span></a></button></td>';
                                                    echo form_close(); ?>
                                                </tr>
                                            <?php }
                                        }// end of foreach
                                    }//end of else
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="propose" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($lbps as $lbp) { ?>
                                    <tr class="notif">
                                        <?php echo '<td><button class="btn btn-sm"><a href="'.base_url('Budget_head/Lbp/Lbp2/'.$lbp['FRM_ID']).'">As of now, the '.$lbp['DPT_NAME'].' has already proposed a budget for year '.$lbp['FRM_YEAR'].'. <span class="text-blue">VIEW?</span></a></button></td>'; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
