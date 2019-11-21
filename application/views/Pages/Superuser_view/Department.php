<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <h5 class="weight-500 mb-20">MANAGE DEPARTMENTS</h5>
                <div class="tab">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-blue" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Department List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#inactiveDept" role="tab" aria-selected="true">Inactive Departments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Click Here to Add Department</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="home5" role="tabpanel">
                            <div class="pd-20 forscroll">
                                <table class="table table-bordered table-sm">
                                    <thead class="bar">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Department Name</th>
                                            <th scope="col">Department Head</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($dept_list as $key) { 
                                            // if (($key['USR_POST'] != "BUDGET OFFICER") && ($key['USR_POST'] != "SUPERUSER") && ($key['USR_STATUS'] === "ACTIVE") ) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i; $i++; ?></th>
                                                    <td><?php echo $key['DPT_ID']; ?></td>
                                                    <td><?php echo $key['DPT_NAME']; ?></td>
                                                    <td><?php echo $key['deptHead']; ?></td>
                                                    <td><button type="button" class="edit-dept btn btn-secondary btn-sm" 
                                                            data-toggle="modal" data-target="#edit_dept" 
                                                            data-id="<?php echo $key['DPT_ID']; ?>"
                                                            data-name="<?php echo $key['DPT_NAME']; ?>">Edit</button>
				                                        <a class="deact-dept-button" data-id="<?php echo $key['DPT_ID']; ?>" 
                                                            data-toggle="modal" data-target="#deact-dept-modal" href="">
                                                            <button class="btn btn-warning btn-sm">
                                                            <i class="" aria-hidden="true"></i>Deactivate</button></a>
                                                    </td>
                                                </tr>
                                            <?php // }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="inactiveDept" role="tabpanel">
                            <div class="pd-20 forscroll">
                                <table class="table table-bordered table-sm">
                                    <thead class="bar">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Department Name</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($inactiveDepts as $xDept) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; $i++; ?></th>
                                                <td><?php echo $xDept['DPT_ID']; ?></td>
                                                <td><?php echo $xDept['DPT_NAME']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('Superuser/Department/activateDept/'.$xDept['DPT_ID']); ?>" class="deact-dept-button">
                                                        <button class="btn btn-warning btn-sm">
                                                        <i class="" aria-hidden="true"></i>Activate</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile5" role="tabpanel">
                            <div class="pd-20">
                                <?php echo form_open('Superuser/Department/addDept'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Department Code</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="number" name="dept_code" placeholder="Click Here to Enter Department Code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Department Name</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="dept_name" placeholder="Click Here to Enter Department Name">
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-warning">Submit</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

