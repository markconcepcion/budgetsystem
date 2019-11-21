<style>
	.badge{ background-color : orange; }
	.cursor{ cursor : pointer; color:black !important;}
	.cursor:hover{ background-color: lightgrey; }
	.active{ background-color: lightgrey !important; }
	.table-responsive { max-height:250px; border-bottom: 1px solid black;}
	.table {border: 1px solid black;}
	.box-shadow { box-shadow:0px 0px 8px rgba(0, 0, 0, 0.9)}
	.to-do-list ul li{ background:lightgrey;}
</style>

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 row">
				<div class="bg-white border-radius-4 box-shadow mb-30 bar col-md-3" style = "padding:0px;">
					<h5 class="pd-20" style = "color:white;">Obligation Request List</h5>
					<div class="list-group">
						<a id = "pending" type = "button" class="cursor list-group-item d-flex align-items-center justify-content-between">Pending <span class="badge badge-primary badge-pill"><?=$PENDING;?></span></a>
						<a id = "on_process" type = "button" class="cursor list-group-item d-flex align-items-center justify-content-between">On Process <span class="badge badge-primary badge-pill"><?=$CHECKED;?></span></a>
						<a id = "approved" type = "button" class="cursor list-group-item d-flex align-items-center justify-content-between">Approved <span class="badge badge-primary badge-pill"><?=$APPROVED;?></span></a>
						<a id = "reject" type = "button" class="cursor list-group-item d-flex align-items-center justify-content-between">Reject <span class="badge badge-primary badge-pill"><?=$DECLINED;?></span></a>
					</div>
				</div>

				<div class = "col-md-9">
					<div  class="hide" id = "pend">
						<div class="table-responsive">
							<table class="table table-striped">
							<thead class = "bar" style = "color: white;">
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Payee</th>
									<th scope="col">Particular</th>
									<th scope="col">Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($obrs as $key) { if ($key['OBR_STATUS'] === "PENDING") { ?>
									<tr>
										<td scope="row"><?php echo $key['OBR_DATE']; ?></td>
										<td scope="row"><?php echo $key['OBR_PAYEE']; ?></td>
										<td scope="row"><?php echo $key['PART_PARTICULARS']; ?></td>
										<td scope="row"><?php echo '₱',number_format($key['PART_AMOUNT'], 2); ?></td>
									</tr>
								<?php } } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="hide" id = "process">
						<div class="table-responsive">
							<table class="table table-striped">
							<thead class = "bar" style = "color: white;">
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Payee</th>
									<th scope="col">Particular</th>
									<th scope="col">Amount</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($obrs as $key) { if ($key['OBR_STATUS'] === "CHECKED") { ?>
									<tr>
										<td scope="row"><?php echo $key['OBR_DATE']; ?></td>
										<td scope="row"><?php echo $key['OBR_PAYEE']; ?></td>
										<td scope="row"><?php echo $key['PART_PARTICULARS']; ?></td>
										<td scope="row"><?php echo '₱',number_format($key['PART_AMOUNT'], 2); ?></td>
									</tr>
								<?php } } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="hide" id = "appro">
						<div class="table-responsive">
							<table class="table table-striped">
							<thead class = "bar" style = "color: white;">
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Payee</th>
									<th scope="col">Particular</th>
									<th scope="col">Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($obrs as $key) { if ($key['OBR_STATUS'] === "APPROVED") { ?>
									<tr>
										<td scope="row"><?php echo $key['OBR_DATE']; ?></td>
										<td scope="row"><?php echo $key['OBR_PAYEE']; ?></td>
										<td scope="row"><?php echo $key['PART_PARTICULARS']; ?></td>
										<td scope="row"><?php echo '₱',number_format($key['PART_AMOUNT'], 2); ?></td>
									</tr>
								<?php } } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="hide" id = "rej">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead class = "bar" style = "color: white;">
									<tr>
										<th scope="col">Date</th>
										<th scope="col">Payee</th>
										<th scope="col">Particular</th>
										<th scope="col">Amount</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($obrs as $key) { if ($key['OBR_STATUS'] === "DECLINED") { ?>
										<tr>
											<td scope="row"><?php echo $key['OBR_DATE']; ?></td>
											<td scope="row"><?php echo $key['OBR_PAYEE']; ?></td>
											<td scope="row"><?php echo $key['PART_PARTICULARS']; ?></td>
											<td scope="row"><?php echo '₱',number_format($key['PART_AMOUNT'], 2); ?></td>
										</tr>
									<?php } } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->load->view('Modals/login_modal'); ?>
	<?php $this->load->view('Modals/lbp_modal'); ?>

