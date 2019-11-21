<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr style="background-color: lightgray;">
                            <th><h3 class="text-center" style="color:gray;"><?=$lbp_yr.' ';?> LBP</h3></th>
                            <th><div class="year-dropdown dropdown text-right">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
									<?=$lbp_yr;?>  
								</a>
								<div class="dropdown-menu dropdown-menu-right box-shadow" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(250px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
									<?php foreach ($Lbp_yrs as $yr) { echo form_open('Budget_officer/Lbp'); ?>
                                        <input name="lbp_yr" value="<?php echo $yr['FRM_YEAR']; ?>" hidden>
                                        <button class="a-button" type="submit"><a class="dropdown-item"><?php echo $yr['FRM_YEAR']; ?></a></button>
                                    <?php echo form_close(); } ?>
								</div>
							</div></th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-bordered table-sm">
                    <thead class="bar">
                        <tr>
                            <th>No.</th>
                            <th>Departments</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td colspan="4"><?php echo form_open('Budget_officer/Lbp/Lbp1'); ?>
                                Consolidated LBP 2:&nbsp;
                                <input type="hidden" name="year" value="<?=$lbp_yr;?>">
                                <button class = "btn btn-secondary btn-sm">VIEW LBP 1</button>
                            <?php echo form_close(); ?></td>
                        </tr>
                        <?php $i=0; foreach ($LIST as $d) { $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $d['DPT_ID'].' - '.$d['DPT_NAME']; ?></td>
                                <td><?php echo $d['FRM_STATUS']; ?></td>
                                <td><a href="<?php echo base_url('Budget_officer/Lbp/Lbp2/'.$d['FRM_ID']);?>" class = "btn btn-warning btn-sm">VIEW LBP 2</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
			</div>
		</div>
                                            
