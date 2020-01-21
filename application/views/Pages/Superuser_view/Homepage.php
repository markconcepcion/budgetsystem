<style>
    table-sm th, .table-sm td {
        padding: 0.5px;
        font-size: 15px;
        text-align: center;
    }
</style>
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <?php echo form_open('Superuser/Home'); ?>
                <div class="row">
                    <h5 class="col-sm-12 col-md-8"><i class="icon-copy fa fa-history" aria-hidden="true"></i> <b>LOGS</b></h5>
                        <div class="form-group col-sm-12 col-md-4 row dreAppend">
                            <div class="col-sm-12 col-md-8">
                                <input type="date" class="form-control" id="log_date_inp" name="logs_date">
                            </div>
                            <button type="button" class="search_log_btn col-sm-12 col-md-4 btn btn-warning btn-sm">
                                <i class="icon-copy fa fa-search" aria-hidden="true"></i>
                                Search
                            </button>
                        </div>
                </div>
                <?php echo form_close(); ?>
                <div class="primaryscroll" style="height:450px;">
                    <table class="table table-bordered table-sm">
                        <thead class="bar">
                            <tr>
                                <th class="text-center">Time</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Transaction</th>
                                <th class="text-center">Employee</th>
                                <th class="text-center">Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log) { ?>
                                <tr>
                                    <td><?php echo date('h:i A', strtotime($log['timestamp'])); ?></td>
                                    <td><?php echo date('M-d-Y', strtotime($log['timestamp'])); ?></td>
                                    <td><?php echo $log['log_transaction']; ?></td>
                                    <td><?php echo $log['USR_FNAME'].' '.$log['USR_MNAME'].' '.$log['USR_LNAME']; ?></td>
                                    <td><?php echo $log['DPT_NAME']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>