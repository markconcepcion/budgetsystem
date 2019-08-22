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
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="dropdown text-right" style = "margin-bottom : 10px;">
                    <a class="dropbtn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="display: none; position: absolute; transform: translate3d(616px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="<?php echo base_url('Budget_head/Reports/quarter_dept_view'); ?>">Departments Quarter Reports</a>
                        <a class="dropdown-item" href="<?php echo base_url('Budget_head/Reports'); ?>">Departments Annual Reports</a>
                        <a class="dropdown-item" href="<?php echo base_url('Budget_head/Reports/quarter_consol_view'); ?>">Consolidated Quarter Reports</a>
                        <a class="dropdown-item" href="<?php echo base_url('Budget_head/Reports/annnual_consol/'.$year); ?>">Consolidated Annual Reports</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Consolidated Quarter Reports</th>
                            <th><?php echo form_open('Budget_head/Reports/quarter_consol/'.$year); ?>
                                <input type = "hidden" name = "quarter_num" value = "3">
                                <button class = "dropbtn dropbtns">1ST</button>
                            <?php echo form_close(); ?></th>
                            <th><?php echo form_open('Budget_head/Reports/quarter_consol/'.$year); ?>
                                <input type = "hidden" name = "quarter_num" value = "6">
                                <button class = "dropbtn dropbtns">2ND</button>
                            <?php echo form_close(); ?></th>
                            <th><?php echo form_open('Budget_head/Reports/quarter_consol/'.$year); ?>
                                <input type = "hidden" name = "quarter_num" value = "9">
                                <button class = "dropbtn dropbtns">3RD</button>
                            <?php echo form_close(); ?></th>
                            <th><?php echo form_open('Budget_head/Reports/quarter_consol/'.$year); ?>
                                <input type = "hidden" name = "quarter_num" value = "12">
                                <button class = "dropbtn dropbtns">4TH</button>
                            <?php echo form_close(); ?></th>
                        </tr>
                    </thead>
                </table>
                                            


			</div>
		</div>
                                            
