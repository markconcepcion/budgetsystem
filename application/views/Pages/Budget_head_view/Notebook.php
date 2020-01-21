<style>td{padding:5px !important;}</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<table class="table table-striped table-sm">
                    <thead>
                        <tr style="background-color: lightgray;">
                            <th><div class="year-dropdown dropdown text-right">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
									<?=$year;?>  
								</a>
								<div class="dropdown-menu dropdown-menu-right box-shadow" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(250px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
									<?php foreach ($years as $yr) { ?>
                                        <button class="a-button">
                                            <a class="dropdown-item" href="<?php echo base_url('BH/NOTEBOOK/'.$yr['CTRL_NTB_YEAR']); ?>">
                                                <?php echo $yr['CTRL_NTB_YEAR']; ?>
                                            </a>
                                        </button>
                                    <?php } ?>
								</div>
							</div></th>
                        </tr>
                    </thead>
                </table>
				<!-- MAIN TABLE -->
				<table class="table table-bordered table-sm">
					<thead class="bar">
						<tr>
							<th>No.</th>
							<th>Code - Department</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; foreach ($ntb_list as $list) { $i++; ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $list['DPT_ID'].' - '.$list['DPT_NAME']; ?></td>
								<td><?php echo $list['CTRL_NTB_YEAR']; ?></td>
								<td><a href="<?php echo base_url('BH/DEPT_NOTEBOOK/'.$list['DPT_ID'].'/'.$list['CTRL_NTB_YEAR']); ?>">
									<button class="btn btn-warning btn-sm">View Expenditures</button></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>