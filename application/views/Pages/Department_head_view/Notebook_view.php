<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <?php echo form_open('Department_head/Notebook/Notebook_Exp/'.$this->session->userdata('dept')); ?>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE:</label>
                        <select class="form-control" id="exp-class" name="ExC_id">
                            <option selected="">* * * CLICK HERE FIRST</option>
                            <?php foreach ($Exp_classes as $ExC) { ?>
                                <option value="<?php echo $ExC['EXPCLASS_ID']; ?>">
                                    <?php echo $ExC['EXPCLASS_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                        <label>EXPENDITURE CLASS:</label>
                        <select class="form-control" name="Exp_id">
                            <option selected="">* * * CLICK HERE THEN</option>
                            <?php foreach ($Exps as $Ex) { ?>
                                <option class="hide idExC <?php echo $Ex['EXPENDITURE_CLASS_EXPCLASS_ID']; ?>" value="<?php echo $Ex['EXPENDITURE_id']; ?>">
                                    <?php echo $Ex['EXP_NAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <button class="btn btn-warning float" style="bottom:1px;" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;SEARCH
                        </button>                            
                    </div>
                </div>
                <?php echo form_close(); ?>

                <!-- <div class="tab">
                    <div class="row clearfix">
                        <div class="col-md-3 col-sm-12">
                            <div class="forscroll">
                                <ul class="nav flex-column nav-tabs vtabs" role="tablist">
                                    <?php $j=1; foreach ($Exp_classes as $key) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link nl<?php if($j===1){echo" active show"; $j++;}?>" data-toggle="tab" href="#<?php echo $key['EXPCLASS_NAME'];?>" role="tab" aria-selected="false"><?php echo ucwords(strtolower($key['EXPCLASS_NAME'])) ;?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="tab-content">
                                <?php $l=1; foreach ($Exp_classes as $key) { ?>
                                    <div class="tab-pane fade<?php if($l===1){echo" active show"; $l++;}?>" id="<?php echo $key['EXPCLASS_NAME'];?>" role="tabpanel">
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
                                                    <?php $i=1; foreach ($Exps as $exp_key) { ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $i; $i++; ?></th>
                                                            <td><?php echo $exp_key['EXP_ACCT_CODE']; ?></td>
                                                            <td><?php echo $exp_key['EXP_NAME']; ?></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table-sm">
                    <thead class="bar">
                        <tr>
                            <th scope="col">Expenditure</th>
                            <th scope="col">Annual Appropriation</th>
                            <th scope="col">Allotment Release</th>
                            <th scope="col">Actual Release</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                        </tr>
                    </tbody>
                </table> -->
            </div>
        </div>