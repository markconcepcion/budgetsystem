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
				    <h4 class="col-sm-12 col-md-5" style="padding-top:10px;"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Latest Transaction</h4>
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

                    <!-- CONSOLIDATED RECENT ACTIVITIES -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "PENDING") 
                                    {
                                        echo form_open('Budget_head/Obr/Obr_details/'.$obr['OBR_ID']); ?>
                                            <tr class="notif">
                                                <input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                                <td><button type="button" class="btn btn-sm" style="cursor:text;">
                                                        <?php echo date('M', strtotime($obr['OBR_DATE'])).' '.date('d', strtotime($obr['OBR_DATE'])).' - A new obligation request has been submitted from '.$obr['DPT_NAME'].'.'; ?>
                                                </button></td>
                                                <td><button type="submit" class="btn btn-sm text-blue"><a>VIEW</a></button></td>
                                            </tr>
                                        <?php echo form_close(); 
                                    } 
                                    else 
                                    { 
                                        foreach ($obr_mbo as $mbo)
                                        {
                                            if ($mbo['OBLIGATION_REQUEST_OBR_ID'] === $obr['OBR_ID']) 
                                            { 
                                                echo form_open('Budget_head/Obr/Obr_details_checked/'.$obr['OBR_ID']); //END OF PHP ?> 
                                                    <tr class="notif"><!-- START OF HTML-->
                                                        <input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                                        <td><button type="button" class="btn btn-sm" style="cursor:text;"><span style="color:black!important;">
                                                            <?php echo date('M', strtotime($obr['OBR_APPROVED_DATE'])).' '.date('d', strtotime($obr['OBR_APPROVED_DATE'])).' - An obligation request has been checked by '.$mbo['USR_FNAME'].' '.$mbo['USR_LNAME'].' and is waiting for approval.'; ?> 
                                                        </span></button></td>
                                                        <td><button type="submit" class="btn btn-sm text-blue"><a>VIEW</a></button></td>
                                                    </tr>
                                                <?php echo form_close(); 
                                            }
                                        }// end of foreach
                                    }//end of else
                                } foreach ($lbps as $lbp) { ?>
                                    <tr class="notif">
                                        <td>   
                                            <button type="button" class="btn btn-sm" style="cursor:text;">
                                                <?php echo 'As of now, the '.$lbp['DPT_NAME'].' has already proposed a budget for year '.$lbp['FRM_YEAR'].'.'; ?>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm">
                                                <a href="<?php echo base_url('Budget_head/Lbp/Lbp2/'.$lbp['FRM_ID']); ?>">VIEW</a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- PENDING OBLIGATION REQUESTS -->
                    <div class="tab-pane fade" id="pending" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "PENDING") 
                                    { if ($obr['obrViewStatus'] == "0") {
                                        echo form_open('Budget_head/Obr/Obr_details/'.$obr['OBR_ID']); ?>
                                        <tr class="notif">
                                            <input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                            <td><button type="button" class="btn btn-sm" style="cursor:text;">
                                                    <?php echo date('M', strtotime($obr['OBR_DATE'])).' '.date('d', strtotime($obr['OBR_DATE'])).' - A new obligation request has been submitted from '.$obr['DPT_NAME'].'.'; ?>
                                            </button></td>
                                            <td><button type="submit" class="btn btn-sm text-blue"><a>VIEW</a></button></td>
                                        </tr>
                                        <?php echo form_close(); 
                                    } }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- CHECKED OBLIGATION REQUESTS -->
                    <div class="tab-pane fade" id="check" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($obrs as $obr) { 
                                    if ($obr['OBR_STATUS'] === "CHECKED") 
                                    { 
                                        foreach ($obr_mbo as $mbo)
                                        {
                                            if ($mbo['OBLIGATION_REQUEST_OBR_ID'] === $obr['OBR_ID']) 
                                            { 
                                                echo form_open('Budget_head/Obr/Obr_details_checked/'.$obr['OBR_ID']); //END OF PHP ?> 
                                                    <tr class="notif"><!-- START OF HTML-->
                                                        <input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                                        <td><button type="button" class="btn btn-sm" style="cursor:text;"><span style="color:black!important;">
                                                            <?php echo date('M', strtotime($obr['OBR_APPROVED_DATE'])).' '.date('d', strtotime($obr['OBR_APPROVED_DATE'])).' - An obligation request has been checked by '.$mbo['USR_FNAME'].' '.$mbo['USR_LNAME'].' and is waiting for approval.'; ?> 
                                                        </span></button></td>
                                                        <td><button type="submit" class="btn btn-sm text-blue"><a>VIEW</a></button></td>
                                                    </tr>
                                                <?php echo form_close(); 
                                            }
                                        }// end of foreach
                                    }//end of else
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- PROPOSED LBP 2 -->
                    <div class="tab-pane fade" id="propose" role="tabpanel">
                        <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                            <tbody>
                                <?php foreach ($lbps as $lbp) { ?>
                                    <tr class="notif">
                                        <td>   
                                            <button type="button" class="btn btn-sm" style="cursor:text;">
                                                <?php echo 'As of now, the '.$lbp['DPT_NAME'].' has already proposed a budget for year '.$lbp['FRM_YEAR'].'.'; ?>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm">
                                                <a href="<?php echo base_url('Budget_head/Lbp/Lbp2/'.$lbp['FRM_ID']); ?>">VIEW</a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
