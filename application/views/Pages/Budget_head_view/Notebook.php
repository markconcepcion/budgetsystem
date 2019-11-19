<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
				
				<!-- HEADER TABLE -->
				<!-- <table class="table table-bordered table-sm">
                    <thead>
                        <tr style="background-color: lightgray;">
                            <th>
								<?php if ($checkNotebook['CTRL_NTB_YEAR'] != date('Y')) { ?>
									<a href="<?php echo base_url('Budget_officer/ControlNotebook/addNotebooks');  ?>">
									<button class="btn btn-secondary">Add New Notebooks</button></a>
								<?php } else { ?>
									<a href=""><button class="btn btn-secondary">Add New Notebook</button></a>
								<?php } ?>
							</th>
                        </tr>
                    </thead>
                </table> -->
				
				<!-- MAIN TABLE -->
				<table class="table table-bordered table-sm">
                    <thead class="bar">
                        <tr>
                            <th>No.</th>
                            <th>Code - Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $i=0; foreach ($ntb_list as $list) { $i++; ?>
							<tr>
								<td><?php echo $i; ?></td>
                                <td><?php echo $list['DPT_ID'].' - '.$list['DPT_NAME']; ?></td>
								<td><a href="<?php echo base_url('Department_head/ControlNotebook/viewExpenditures_dept/'.$list['DPT_ID']); ?>">
									<button class="btn btn-warning btn-sm">View Expenditures</button></a></td>
							</tr>
						<?php } ?>
                    </tbody>
                </table>
			</div>
		</div>