
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 class="text-blue">Obligation Request List</h5>
                        </div>
                </div>
                <div class="row">
                    <table class="data-table nowrap">
                        <thead class="bar">
                            <tr>
                                <th class="table-plus datatable-nosort">No.</th>
                                <th>Department</th>
                                <th>Date Submitted:</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach ($obr_list as $ol) {  $i++;?>
                                <tr>
                                    <td class="table-plus"><?php echo $i ?></td>
                                    <td><?php echo $ol['DPT_NAME'] ?></td>
                                    <td><?php echo $ol['OBR_DATE'] ?></td>
                                    <td>
                                        <?php echo form_open('Budget_officer/Obligation_request/obr_details_view/'.$ol['OBR_ID']);?>
                                            <input type="hidden" name = "dept" value="<?php echo $ol['DPT_ID']; ?>">
                                            <input type="hidden" name = "year" value="<?php echo date('Y', strtotime($ol['OBR_DATE'])); ?>">
                                            <button class="btn btn-outline-primary">
                                                <i class="fa fa-eye"></i>&nbsp;View Details
                                            </button>
                                        <?php echo form_close(); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>