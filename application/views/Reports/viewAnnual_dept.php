<style>
    .dropbtns{ padding : 4px; width : 65px;}
    .table-bordered th, .table-bordered td {
        padding : 3px;
    }
</style>

<?php $year =  2019; ?>

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="dropdown text-right" style = "margin-bottom : 10px;">
                    <a class="btn btn-secondary dropbtn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <div class="dropdown-menu dropdown-menu-right box-shadow" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(616px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" style="color:#a0b3b9;" href="<?php echo base_url('Budget_head/Reports/quarter_dept_view'); ?>">Departments Quarter Reports</a>
                        <a class="dropdown-item" style="color:#a0b3b9;" href="<?php echo base_url('Budget_head/Reports'); ?>">Departments Annual Reports</a>
                        <a class="dropdown-item" style="color:#a0b3b9;" href="<?php echo base_url('Budget_head/Reports/quarter_consol_view'); ?>">Consolidated Quarter Reports</a>
                        <a class="dropdown-item" style="color:#a0b3b9;" href="<?php echo base_url('Budget_head/Reports/annnual_consol/'.$year); ?>">Consolidated Annual Reports</a>
                    </div>
                </div>

                <table class="table table-bordered table-sm">
                    <thead class="bar">
                        <tr>
                            <th scope="col">Annual Reports By Departments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($department as $dept) { ?>
                            <tr>
                                <td scope="row"><?php echo $dept['DPT_NAME'] ?></td>
                                <td><?php echo form_open('Budget_head/Reports/annual_dept/'.$year); ?>
                                    <input type="hidden" name="dept_code" value="<?php echo $dept['DPT_ID'] ?>">
                                    <button class="btn btn-warning btn-sm">VIEW</button>
                                <?php echo form_close(); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                                            


			</div>
		</div>