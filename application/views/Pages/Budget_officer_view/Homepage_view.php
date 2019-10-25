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
                <h4 class="col-sm-12 col-md-5" style="padding-top:10px !important; padding:0px;"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Pending Obligation Requests </h4>
                <table class="table table-bordered table-sm" style="border-top:2px solid black;">
                    <tbody>
                        <?php foreach ($obrs as $obr) { ?>
                            <?php echo form_open('Budget_officer/Obr/Obr_details/'.$obr['OBR_ID']); ?>
                                <tr class="notif">
                                    <input name="dpt_id"  value="<?php echo $obr['DPT_ID']; ?>" hidden>
                                    <td>
                                        <button type="button" class="btn btn-sm" style="cursor:text;"><span style="color:black!important;">
                                            <?php echo date('M', strtotime($obr['OBR_DATE'])).' '.date('d', strtotime($obr['OBR_DATE'])).' - A new obligation request has been submitted from '.$obr['DPT_NAME'].'.'; ?> 
                                        </button>
                                    </td>
                                    <td><button type="submit" class="btn btn-sm text-blue"><a>VIEW</a></button></td>
                                </tr>
                        <?php echo form_close(); } ?>
                    </tbody>
                </table>
            </div>
        </div>
