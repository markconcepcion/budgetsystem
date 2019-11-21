<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <h5 class="weight-500 mb-20">MANAGE EXPENDITURE</h5>
                <div class="tab">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-blue" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Expenditure List</a>
                        </li>
                        <li class="nav-item" id="add-exp-tab">
                            <a class="nav-link text-blue"  data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Click Here to Add Expeniture</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" id="add-expclass-tab" data-toggle="tab" href="#contact5" role="tab" aria-selected="false">Click Here to Add Expenditure Class</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="home5" role="tabpanel">
                            <div class="pd-20">
                                <div class="tab">
                                    <div class="row clearfix">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="forscroll">
                                                <ul class="nav flex-column nav-tabs vtabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link nl active show" data-toggle="tab" href="#<?php echo $exp_class['EXPCLASS_NAME'];?>" role="tab" aria-selected="true"><?php echo ucwords(strtolower($exp_class['EXPCLASS_NAME'])); ?></a>
                                                    </li>
                                                    <?php foreach ($exp_classes as $key) {
                                                        if ($exp_class['EXPCLASS_ID'] != $key['EXPCLASS_ID']) { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link nl" data-toggle="tab" href="#<?php echo $key['EXPCLASS_NAME'];?>" role="tab" aria-selected="false"><?php echo ucwords(strtolower($key['EXPCLASS_NAME'])) ;?></a>
                                                            </li>
                                                        <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="<?php echo $exp_class['EXPCLASS_NAME'];?>" role="tabpanel">
                                                    <div class="forscroll line-shadow">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bar">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Account Code</th>
                                                                    <th scope="col">Expenditure</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach ($exp as $key) { 
                                                                    if ($exp_class['EXPCLASS_ID'] === $key['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                                                                        <tr>
                                                                            <th scope="row"><?php echo $i; $i++; ?></th>
                                                                            <td><?php echo $key['EXP_ACCT_CODE']; ?></td>
                                                                            <td><?php echo $key['EXP_NAME']; ?></td>
                                                                            <td>
                                                                                <button type="button" class="editExpenditureBtn btn btn-warning btn-sm" data-id="<?php echo $key['EXPENDITURE_id']; ?>"
                                                                                data-code="<?php echo $key['EXP_ACCT_CODE']; ?>" data-name="<?php echo $key['EXP_NAME']; ?>" data-toggle="modal" 
                                                                                data-target="#editExpenditureModal">
                                                                                    Edit
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php foreach ($exp_classes as $key) {
                                                    if ($exp_class['EXPCLASS_ID'] != $key['EXPCLASS_ID']) { ?>
                                                        <div class="tab-pane fade" id="<?php echo $key['EXPCLASS_NAME'];?>" role="tabpanel">
                                                            <div class="forscroll line-shadow">
                                                                <table class="table table-bordered table-sm">
                                                                    <thead class="bar">
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Account Code</th>
                                                                            <th scope="col">Expenditure</th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i=1; foreach ($exp as $exp_key) { 
                                                                            if ($key['EXPCLASS_ID'] === $exp_key['EXPENDITURE_CLASS_EXPCLASS_ID']) { ?>
                                                                                <tr>
                                                                                    <th scope="row"><?php echo $i; $i++; ?></th>
                                                                                    <td><?php echo $exp_key['EXP_ACCT_CODE']; ?></td>
                                                                                    <td><?php echo $exp_key['EXP_NAME']; ?></td>
                                                                                    <td>
                                                                                        <button type="button" class="editExpenditureBtn btn btn-warning btn-sm" data-id="<?php echo $exp_key['EXPENDITURE_id']; ?>"
                                                                                        data-code="<?php echo $exp_key['EXP_ACCT_CODE']; ?>" data-name="<?php echo $exp_key['EXP_NAME']; ?>" data-toggle="modal" 
                                                                                        data-target="#editExpenditureModal">
                                                                                            Edit
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php }
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile5" role="tabpanel">
                            <div class="pd-20">
                                <?php echo form_open('Superuser/Expenditure/addExp'); ?>
                                    <div class="form-group">
                                        <label>Expenditure Account Code</label>
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-1 acct-code" style="padding-left:15.5px !important; max-width:45px !important;">
                                                <input class="form-control exp-acct-code code1Limit" name="code1"  id="code-one" type="text"style="width: 25px;" placeholder="0" required> 
                                            </div>
                                            <div class="dash col-sm-12 col-md-1">
                                                <span>_</span>
                                            </div>
                                            <div class="col-sm-12 col-md-1 acct-code">
                                                <input class="form-control exp-acct-code code2Limit" name="code2" id="code-two" type="text"style="width: 35px;" placeholder="00" required>
                                            </div>
                                            <div class="dash col-sm-12 col-md-1">
                                                <span>_</span>
                                            </div>
                                            <div class="col-sm-12 col-md-1 acct-code">
                                                <input class="form-control exp-acct-code code3Limit" name="code3"  id="code-three" type="text" style="width: 35px;" placeholder="00" required>
                                            </div>
                                            <div class="dash col-sm-12 col-md-1">
                                                <span>_</span>
                                            </div>
                                            <div class="col-sm-12 col-md-1 acct-code">
                                                <input class="form-control exp-acct-code code4Limit" name="code4"  id="code-four" type="text" style="width: 45px;" placeholder="000" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Expenditure Name</label>
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-9">
                                                <input class="form-control" type="text" name="part_name" placeholder="Click Here to Enter Expenditure Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Expenditure Class</label>
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-9">
                                                <select name="part_class" class="form-control" required="">
                                                    <option selected=""><-- CLICK HERE TO CHOOSE EXPENDITURE CLASS --></option>
                                                    <?php foreach ($exp_classes as $key) { ?>
                                                        <option value="<?php echo $key['EXPCLASS_ID']; ?>"><?php echo $key['EXPCLASS_NAME']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <button type="submit" class="btn btn-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact5" role="tabpanel">
                            <div class="pd-20">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-sm">
                                            <thead class="bar">
                                                <tr>
                                                    <td>Expenditure Class</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($exp_classes as $key) { ?>
                                                    <tr>
                                                        <td><?php echo ucwords(strtolower($key['EXPCLASS_NAME'])) ;?></td>
                                                        <td>
                                                            <button type="button" class="editExpenditureClassBtn btn btn-warning btn-sm" data-id="<?php echo $key['EXPCLASS_ID']?>"
                                                            data-value="<?php echo ucwords(strtolower($key['EXPCLASS_NAME'])); ?>" data-toggle="modal" data-target="#editExpenditureClassModal">
                                                                Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_open('Superuser/Expenditure/addExpClass'); ?>
                                            <div class="form-group">
                                                <label>Expenditure Class Name</label>
                                                <div>
                                                    <input class="form-control" type="text" name="class_name" id="exp-class" placeholder="Click Here to Enter Expenditure Class Name">
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
            </div>
        </div>