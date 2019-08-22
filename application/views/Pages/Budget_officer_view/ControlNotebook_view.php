<style>td{padding:5px !important;}</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table class="data-table table-sm stripe hover nowrap dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row">
											<th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1" aria-label="Name">CODE</th>
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">OFFICES</th>
											<th class="" rowspan="1" colspan="1" aria-label="Action">ACTION</th></tr>
									</thead>
									<tbody>

										<?php foreach ($ntb_list as $list) { ?>
											<tr role="row" class="even">
												<td><?php echo $list['DPT_ID'] ?></td>
												<td><?php echo $list['DPT_NAME'] ?></td>
												<td><a href="<?php echo base_url('Department_head/ControlNotebook/viewExpenditures_dept/'.$list['DPT_ID']); ?>"><button class="dropbtn">View Expenditures</button></a></td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
							</div>
							<?php if ($checkNotebook['CTRL_NTB_YEAR'] != date('Y')) { ?>
								<div class="col-sm-12" style="text-align:center;">
									<a href="<?php echo base_url('Budget_officer/ControlNotebook/addNotebooks');  ?>"><button class="dropbtn">Add New Notebooks</button></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>