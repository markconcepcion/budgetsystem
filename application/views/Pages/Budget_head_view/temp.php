<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" >
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
            
            <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px">Mun. Budget Office Control No.&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <input name="mbo_ctrl_no" style = "text-align: center; border: 1px solid white;border-bottom: 1px solid black; width: 100%;" value ="" ><br>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px"><label style = "font-size: 12px">Exp. Class&nbsp;</label></label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group">
                            <select name = "exp_id" id="exp_class" style = "border: 1px solid white;border-bottom: 1px solid black; width: 100%;">
                                <option selected></option>
                                
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Amt. Approp. :&nbsp; ₱</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="mbo" id = "allotment" style = "width: 100%" readonly> 
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">&nbsp;Code&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" value = ""  style = "width: 100%; text-align: center;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Add Approp.&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="number" class="mbo" id = "add_approp" name = "add_approp" style = "width: 100%"> 
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" id = "total_approp" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Previous Allot.</label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "prev" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Qtr. Allot.</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "quart" style = "width: 100%" readonly>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class = "mbo" style = "margin-left: 5px; width: 100%" id = "total" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Add Allot./Rem. Balance</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" style = "width: 100%" id = "remain_bal" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Less This Claim&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" id = "ltc" class="mbo" value="" style = "width: 80%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px"></label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Balance of Approp.</label>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" id = "balance" style = "width: 100%" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label style = "font-size: 12px">Remarks:</label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group text-center">
                        <input type="text" class="mbo" name = "remarks" style = "width: 100%;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">MBO/Asst. Initial</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                        <input type="text" class="mbo" name = "initial" style = "width: 100%">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                        <label style = "font-size: 12px">Date</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <input type="text" style = "border: 1px solid white;border-bottom: 1px solid black; width: 100%; text-align: center" value = "<?php echo date('F-d-Y') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>