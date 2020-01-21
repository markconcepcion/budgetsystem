<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
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
                            <!-- <p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
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
                                    <td><?php if ($l['MBO_ID'] != NULL) { echo $l['MBO_NO'].'-'.(date('Y')-2000); } ?></td>
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
        </div>