<style>
	.badge{ background-color : orange; }
	.cursor{ cursor : pointer }
	.cursor:hover{ background-color: lightgrey; }
	.active{ background-color: lightgrey !important; }
	.hider { display:none; }
	.table-responsive { max-height:250px; border-bottom: 1px solid black;}
	.table {border: 1px solid black;}
	.box-shadow { box-shadow:0px 0px 8px rgba(0, 0, 0, 0.9)}
	.to-do-list ul li{ background:lightgrey;}
    button, html [type="button"], [type="reset"], [type="submit"] {
        -webkit-appearance: initial;
        cursor: initial;
    }
</style>

<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30" style="max-height: 320px;">
                        <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                            <h4 class="mb-30">Recent Activities</h4>
                            <div class="to-do-list mx-h-450 customscroll mCustomScrollbar _mCS_5 mCS-autoHide" style="position: relative; overflow: auto; max-height: 200px;"><div id="mCSB_5" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 450px;"><div id="mCSB_5_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                <ul>
                                    <?php foreach ($obrs as $key) {
                                        echo form_open('Budget_officer/Obligation_request/obr_details_view/'.$key['OBR_ID']); ?>
                                        <input type="hidden" name = "dept" value="<?php echo $key['DPT_ID']; ?>">
                                        <input type="hidden" name = "year" value="<?php echo date('Y', strtotime($key['OBR_DATE'])); ?>">
                                        <button type="submit" style="cursor:initial"><li class="test-me">
                                            <label><?php echo $key['OBR_DATE'] ?> </label>
                                            <label>A New Obligation Request have been submitted by <?php echo $key['DPT_NAME'] ?> </label></label>
                                        </li></button>
                                    <?php echo form_close(); } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('Modals/login_modal'); ?>
