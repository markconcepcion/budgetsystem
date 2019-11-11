<style>
    .nav-link.text-blue{ border-radius: 0; border-bottom: 0; }
    .nav-link.text-blue.active.show, .nav-link.active {
        border-radius: 0; border-bottom: 1.5px solid #ff9900;
        background-color: #ff9900 !important;
        color: white !important;
    }
    td{text-align: center;} table.table-bordered{border:2px solid black !important;}
</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="row">
				    <h4 class="col-sm-12 col-md-5" style="padding-top:10px;"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;LOGS</h4>
                    <ul class="nav nav-pills justify-content-end col-sm-12 col-md-7" role="tablist" style="padding-right:16px;">
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#reject" role="tab" aria-selected="true">Rejected</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#approve" role="tab" aria-selected="false">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-blue" data-toggle="tab" href="#all" role="tab" aria-selected="false">ALL</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <table class="table table-bordered table-sm">
                            <thead class="bar">
                                <tr style="border: 2px solid #3c3c3c;">
                                    <th></th>
                                    <th>Obr No.</th>
                                    <th>Control No.</th>
                                    <th>Particulars</th>
                                    <th>Date Submitted</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log) { ?>
                                    <tr>
                                        <td class="text-center"<?php if ($log['OBR_STATUS'] === 'DECLINED'){ echo 'style="background-color:#ff9900" >'; ?>
                                            <i class="fa fa-close" aria-hidden="true"></i>
                                        <?php } else { echo 'style="background-color:#4CAF50" >'; ?>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        <?php } ?></td>
                                        <td><?php echo $log['OBR_NO']; ?></td>
                                        <td><?php echo $log['MBO_ID']; ?></td>
                                        <td><?php echo $log['PART_PARTICULARS']; ?></td>
                                        <td><?php echo $log['OBR_DATE']; ?></td>
                                        <td><?php echo $log['DEPARTMENT_DPT_ID']; ?></td>
                                        <td><a href="<?php echo base_url('Budget_officer/Obr/obrPrint/'.$log['OBR_ID']); ?>"><button type="button" class="btn btn-secondary btn-sm" style="width:100%"><i class="fa fa-view"></i>View ObR</button></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="approve" role="tabpanel">
                        <table class="table table-bordered table-sm">
                            <thead class="bar">
                                <tr style="border: 2px solid #3c3c3c;">
                                    <th></th>
                                    <th>Obr No.</th>
                                    <th>Control No.</th>
                                    <th>Particulars</th>
                                    <th>Date Submitted</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log) { ?>
                                    <?php if ($log['OBR_STATUS'] === 'APPROVED'){ ?>
                                    <tr>
                                        <td class="text-center" style="background-color:#4CAF50"><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td><?php echo $log['OBR_NO']; ?></td>
                                        <td><?php echo $log['MBO_ID']; ?></td>
                                        <td><?php echo $log['PART_PARTICULARS']; ?></td>
                                        <td><?php echo $log['OBR_DATE']; ?></td>
                                        <td><?php echo $log['DEPARTMENT_DPT_ID']; ?></td>
                                        <td><a href="<?php echo base_url('Budget_officer/Obr/obrPrint/'.$log['OBR_ID']); ?>"><button type="button" class="btn btn-secondary btn-sm" style="width:100%"><i class="fa fa-view"></i>View ObR</button></a></td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reject" role="tabpanel">
                        <table class="table table-bordered table-sm">
                            <thead class="bar">
                                <tr style="border: 2px solid #3c3c3c;">
                                    <th></th>
                                    <th>Obr No.</th>
                                    <th>Control No.</th>
                                    <th>Particulars</th>
                                    <th>Date Submitted</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log) { ?>
                                    <?php if ($log['OBR_STATUS'] === 'DECLINED') { ?>
                                        <tr>
                                        <td class="text-center" style="background-color:#ff9900"><i class="fa fa-close" aria-hidden="true"></i></td>
                                        <td><?php echo $log['OBR_NO']; ?></td>
                                        <td><?php echo $log['MBO_ID']; ?></td>
                                        <td><?php echo $log['PART_PARTICULARS']; ?></td>
                                        <td><?php echo $log['OBR_DATE']; ?></td>
                                        <td><?php echo $log['DEPARTMENT_DPT_ID']; ?></td>
                                        <td><a href="<?php echo base_url('Budget_officer/Obr/obrPrint/'.$log['OBR_ID']); ?>"><button type="button" class="btn btn-secondary btn-sm" style="width:100%"><i class="fa fa-view"></i>View ObR</button></a></td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>    
			</div>
		</div>




<!-- 
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <?php if ($currYear === null) { ?>
                                <a class="dropbtn" href = "<?php echo base_url('Logbook/addLogbook'); ?>"><i class="icon-copy fi-plus"></i>&nbsp; Logbook</a>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="dropbtn dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> &nbsp; YEAR</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php foreach ($year as $y) { ?>
                                        <a class="dropdown-item"  
                                            href="<?php echo base_url('Logbook/index/'.$y['LB_YEAR']); ?>"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> &nbsp; <?php echo $y['LB_YEAR']; ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5 class="text-blue" style = "margin-left:15px;">Logbook</h5>
                             <p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> 
                        </div>
                    </div>
                    
                    <table class="data-table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Obr No.</th>
                                <th>Control No.</th>
                                <th>Particulars</th>
                                <th>date</th>
                                <th>Dept</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $l) { if ($l['MBO_ID'] != null) {?>
                                <tr>
                                    <td class="table-plus"><?php echo $l['OBR_NO'].'-19' ?></td>
                                    <td><?php if ($l['MBO_ID'] != NULL) { echo $l['MBO_ID'].'-'.(date('Y')-2000); } ?></td>
                                    <td><?php echo $l['PART_PARTICULARS'] ?></td>
                                    <td><?php echo $l['OBR_DATE']; ?></td>
                                    <td><?php echo $l['DEPARTMENT_DPT_ID']; ?></td>
                                </tr>
                            <?php } else { ?>
                                <tr style="background-color:orange; color;white;">
                                    <td class="table-plus"><?php echo $l['OBR_NO'].'-19' ?></td>
                                    <td>-</td>
                                    <td><?php echo $l['PART_PARTICULARS'] ?></td>
                                    <td><?php echo $l['OBR_DATE']; ?></td>
                                    <td><?php echo $l['DEPARTMENT_DPT_ID']; ?></td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->