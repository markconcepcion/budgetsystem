<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr style="background-color: lightgray;">
                            <th><div class="year-dropdown dropdown text-right">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
                                    <?=$lbp_yr;?>  
                                </a>
                                <div class="dropdown-menu dropdown-menu-right box-shadow" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(250px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <?php foreach ($Lbp_yrs as $yr) { ?>
                                        <button class="a-button" style="width: -webkit-fill-available;">
                                            <a class="dropdown-item" href="<?php echo base_url('BO/lbp_list/'.$yr['FRM_YEAR']); ?>">
                                                <?php echo $yr['FRM_YEAR']; ?>
                                            </a>
                                        </button>
                                    <?php } ?>
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
                        <?php if ($row_num != 0) { ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    Consolidated LBP 1: &nbsp;
                                    <a class="btn btn-secondary btn-sm" href="<?php echo base_url('BO/printLBP1/'.$lbp_yr); ?>">
                                        VIEW LBP 1
                                    </a>
                                </td>
                            </tr>
                            <?php $i=0; foreach ($LIST as $d) { $i++; 
                                if ($d['FRM_STATUS'] === 'FINALIZED') { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $d['DPT_ID'].' - '.$d['DPT_NAME']; ?></td>
                                    <td><?php echo $d['FRM_STATUS']; ?></td>
                                    <td><a href="<?php echo base_url('B0/printLBP2/'.$d['FRM_ID']);?>" class = "btn btn-warning btn-sm">VIEW LBP 2</a></td>
                                </tr>
                                <?php }
                            } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    No data available this year LBP!
                                </td>
                            </tr>         
                        <?php } ?>     
                    </tbody>
                </table>
			</div>
		</div>
                                            
