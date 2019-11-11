<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <h5 class="weight-500 mb-20">MANAGE ACCOUNTS</h5>
                <div class="tab">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-blue" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#deactivatedAcct" role="tab" aria-selected="true">Inactive Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Add an Account</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home5" role="tabpanel">
                            <div class="pd-20 forscroll">
                                <table class="table table-bordered table-sm">
                                    <thead class="bar">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">User Position</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($acc_list as $key) { 
                                            if ($key['USR_POST'] != "SUPERUSER") { 
                                                if (($bhprofile['USR_ID']+1) != $key['USR_ID']) {?>
                                            <tr>
                                                <th scope="row"><?php echo $i; $i++; ?></th>
                                                <td><?php echo $key['USR_FNAME'],' ',$key['USR_LNAME']; ?></td>
                                                <td><?php echo $key['DPT_NAME']; ?></td>
                                                <td><?php echo $key['USR_POST']; ?></td>
                                                <td> 
                                                    <a href="<?php echo base_url('Superuser/Account/resetAcct/'.$key['USR_ID'].'/'.$key['USR_FNAME'].'/'.$key['DEPARTMENT_DPT_ID']); ?>">
                                                        <button type="button" class="edit-dept btn btn-secondary btn-sm">Reset</button>
                                                    </a>
                                                    <?php if ($key['USR_POST'] === "BUDGET HEAD") { ?>
                                                        <a href="<?php echo base_url('Superuser/Account/bh_deacct/'.$key['USR_ID']); ?>"><button type="button" class="btn btn-warning btn-sm">Deactivate</button></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url('Superuser/Account/de_acct/'.$key['USR_ID']); ?>"><button type="button" class="btn btn-warning btn-sm">Deactivate</button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="deactivatedAcct" role="tabpanel">
                            <div class="pd-20 forscroll">
                                <table class="table table-bordered table-sm">
                                    <thead class="bar">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">User Position</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($inactiveAccts as $acct) { 
                                            if ($key['USR_POST'] != "SUPERUSER") { 
                                                // if (($bhprofile['USR_ID']+1) != $key['USR_ID']) {?>
                                            <tr>
                                                <th scope="row"><?php echo $i; $i++; ?></th>
                                                <td><?php echo $acct['USR_FNAME'],' ',$acct['USR_LNAME']; ?></td>
                                                <td><?php echo $acct['DPT_NAME']; ?></td>
                                                <td><?php echo $acct['USR_POST']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('Superuser/Account/activateAcct/'.$acct['USR_ID']); ?>">
                                                        <button type="button" class="btn btn-warning btn-sm">Activate</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } } //} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile5" role="tabpanel">
                            <div class="pd-20">
                                <?php echo form_open('Superuser/Account/addAccount'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="fname" placeholder="Click Here to Enter First Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Middle Name</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="mname" placeholder="Click Here to Enter Middle Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="lname" placeholder="Click Here to Enter Last Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="uname" placeholder="Click Here to Enter Username" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" placeholder="Click Here to Enter Password" name="password" type="password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Position</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select class="custom-select col-12" name="upost" id="select-post"  required="">
                                                <option selected=""></option>
                                                <option value="BUDGET HEAD">BUDGET HEAD</option>
                                                <option value="BUDGET OFFICER 1">BUDGET OFFICER 1</option>
                                                <option value="BUDGET OFFICER 2">BUDGET OFFICER 2</option>
                                                <option value="DEPARTMENT HEAD">DEPARTMENT HEAD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Department</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select class="custom-select col-12" name="udept" id="select-dept" required="">
                                                <option id="auto-select" selected=""></option>
                                                <?php foreach ($dept_list as $key) { if ($key['USR_ID'] === NULL) { ?>
                                                    <option class="dpt-list" value="<?php echo $key['DPT_ID']; ?>"><?php echo $key['DPT_NAME']; ?></option>
                                                <?php } } ?>
                                            </select>
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