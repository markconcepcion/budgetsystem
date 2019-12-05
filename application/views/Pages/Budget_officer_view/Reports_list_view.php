<style>
    button{width:90%;}
    th {text-align:center;}
    .dropdown-menu{min-width:5.25rem !important; border-radius:0 !important;}
</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="bg-white pd-20 border-radius-4 box-shadow mb-30 primaryscroll" style="padding-top:10px;">
                <div class="row">
                    <h4 class="col-sm-12 col-md-6" style="padding-top: 14px; padding-left:16px;"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;REPORTS LIST</h4>
                    <div class="dropdown text-right col-sm-12 col-md-6" style = "margin-bottom:5px; padding-right:17px;">
                        <a class="dropbtn dropdown-toggle btn btn-secondary" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <?php echo $yr; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right box-shadow" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(616px, 33px, 0px); top: 0px; left: 0px; will-change: transform; border-bottom: 5px solid rgb(152, 107, 218) !important;">
                            <?php foreach ($yrs as $yr_list) { ?>
                                <a class="dropdown-item" href=""><?php echo $yr_list['LB_YEAR']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead class="bar">
                        <tr>
                            <th></th>
                            <th>1st Quarter</th>
                            <th>2nd Quarter</th>
                            <th>3rd Quarter</th>
                            <th>4th Quarter</th>
                            <th>Annual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><b>Consolidated</b></td>
                            <td>
                                <?php echo form_open('budget_officer/report/consolidatedQuarter'); ?>
                                    <input name="quarter" value="1" hidden>
                                    <input name="year" value="<?php echo $yr; ?>" hidden>
                                    <button type="submit" class="btn btn-warning btn-sm">View</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open('budget_officer/report/consolidatedQuarter'); ?>
                                    <input name="quarter" value="2" hidden>
                                    <input name="year" value="<?php echo $yr; ?>" hidden>
                                    <button type="submit" class="btn btn-warning btn-sm">View</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open('budget_officer/report/consolidatedQuarter'); ?>
                                    <input name="quarter" value="3" hidden>
                                    <input name="year" value="<?php echo $yr; ?>" hidden>
                                    <button type="submit" class="btn btn-warning btn-sm">View</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open('budget_officer/report/consolidatedQuarter'); ?>
                                    <input name="quarter" value="4" hidden>
                                    <input name="year" value="<?php echo $yr; ?>" hidden>
                                    <button type="submit" class="btn btn-warning btn-sm">View</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open('budget_officer/report/consolidatedAnnual'); ?>
                                    <input name="quarter" value="annual" hidden>
                                    <input name="year" value="<?php echo $yr; ?>" hidden>
                                    <button type="submit" class="btn btn-warning btn-sm">View</button>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <?php foreach ($dpts as $dpt) { 
                            if ($dpt['DPT_ID'] != 1111) { ?>
                                <tr>
                                    <td><?php echo $dpt['DPT_ID'].' - '.$dpt['DPT_NAME']; ?></td>
                                    <td>
                                        <?php echo form_open('budget_officer/report/departmentQuarter'); ?>
                                            <input name="quarter" value="1" hidden>
                                            <input name="year" value="<?php echo $yr; ?>" hidden>
                                            <input name="dpt_id" value="<?php echo $dpt['DPT_ID'];?>" hidden>
                                            <button type="submit" class="btn btn-secondary btn-sm">View</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open('budget_officer/report/departmentQuarter'); ?>
                                            <input name="quarter" value="2" hidden>
                                            <input name="year" value="<?php echo $yr; ?>" hidden>
                                            <input name="dpt_id" value="<?php echo $dpt['DPT_ID'];?>" hidden>
                                            <button type="submit" class="btn btn-secondary btn-sm">View</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open('budget_officer/report/departmentQuarter'); ?>
                                            <input name="quarter" value="3" hidden>
                                            <input name="year" value="<?php echo $yr; ?>" hidden>
                                            <input name="dpt_id" value="<?php echo $dpt['DPT_ID'];?>" hidden>
                                            <button type="submit" class="btn btn-secondary btn-sm">View</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open('budget_officer/report/departmentQuarter'); ?>
                                            <input name="quarter" value="4" hidden>
                                            <input name="year" value="<?php echo $yr; ?>" hidden>
                                            <input name="dpt_id" value="<?php echo $dpt['DPT_ID'];?>" hidden>
                                            <button type="submit" class="btn btn-secondary btn-sm">View</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open('budget_officer/report/departmentAnnual'); ?>
                                            <input name="quarter" value="annual" hidden>
                                            <input name="year" value="<?php echo $yr; ?>" hidden>
                                            <input name="dpt_id" value="<?php echo $dpt['DPT_ID'];?>" hidden>
                                            <button type="submit" class="btn btn-secondary btn-sm">View</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>