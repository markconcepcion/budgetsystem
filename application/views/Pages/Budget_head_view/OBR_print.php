
                    <table style = "border: 1px solid black; width: 100%;">
                        <thead>
                            <tr>
                                <th colspan = "12">
                                    <h6 class = "text-center">Republic of the Philippines</h6>
                                    <h6 class = "text-center">Province of Misamis Oriental</h6>
                                    <h6 class = "text-center">oOo</h6>
                                    <h5 class = "text-center">MUNICIPALITY OF MANTICAO</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan = "6" class = "text-center" style = "border: 1px solid black;">OBLIGATION REQUEST</td>
                                <td colspan = "6"  class = "text-left" style = "border: 1px solid black;">&nbsp; No. &nbsp; 
                                </td>
                            </tr>

                            <tr>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Payee:</td>

                                <td colspan = "8" class = "text-left" style = "border: 1px solid black;"> &nbsp; <?php // echo echo $obr_details['OBR_PAYEE']; ?>
                                </td>

                                <td colspan = "3" class = "text-left" style = "border: 1px solid black;">&nbsp; Date: &nbsp; <?php // echo echo date('F-d-Y', strtotime($obr_details['OBR_DATE'])); ?></td>
                            </tr>

                            <tr>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Address</td>
                                <td colspan = "11" class = "text-left" style = "border: 1px solid black;">&nbsp; Manticao, Misamis Oriental</td>
                            </tr>

                            <tr>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Responsibility <br /> Center</td>
                                <td colspan = "8" class = "text-center" style = "border: 1px solid black;">Particulars</td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">F.P.P</td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Account <br /> Code</td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Amount</td>
                            </tr>

                            <tr style="min-height:25%;">
                                <td colspan = "9" class = "text-center" style = "border: 1px solid black;">
                                    <?php // echo $LTClaim=0; foreach ($obr_exp_details as $key) {  $LTClaim+=$key['PART_AMOUNT']; ?>
                                        <?php // echo echo $key['PART_PARTICULARS']; ?>
                                    <?php // echo } ?>
                                        
                                    <div class = "text-left" style="padding-left: 10%;">
                                        <label style = "font-size: 12px">Mun. Budget Office Control No.&nbsp;</label><input class = "mbo" value ="<?php // echo echo $mbo_det['MBO_ID'].'-'.(date('Y')-2000); ?>" readonly><br>
                                        <label style = "font-size: 12px">Exp. Class&nbsp;</label>
                                        <input class = "mbo" value = "<?php // echo echo $amt_approp['EXP_NAME']; ?>" style = "width: 50%;"readonly><br />
                                        <label style = "font-size: 12px">Amt. Approp.&nbsp;</label><input type="text" class="mbo" value = "<?php // echo echo '₱',number_format($amt_approp['LBP_EXP_AMOUNT'], 2); ?>"readonly>
                                        <label style = "font-size: 12px">&nbsp;Code&nbsp;</label><input type="text" class = "mbo" value = "<?php //$dept_code; ?>"readonly><br>
                                        <label style = "font-size: 12px">Add Approp.&nbsp;</label><input type="text" value = "<?php // echo echo '₱',number_format(1000, 2); ?>"  class="mbo"readonly>
                                        <input type="text" class = "mbo" style = "margin-left: 5px" value="<?php // echo echo '₱',number_format(($amt_approp['LBP_EXP_AMOUNT']+1000), 2); ?>" readonly><br>
                                        <label style = "font-size: 12px">Previous Allot.</label><input type="text" class="mbo" value = "<?php // echo echo '₱',number_format($prev, 2); ?>"readonly><br>
                                        <label style = "font-size: 12px">Qtr. Allot.</label><input type="text" class="mbo" value = "<?php // echo echo '₱',number_format($quarter, 2); ?>"readonly>
                                        <input type="text" class = "mbo" style = "margin-left: 5px" value = "<?php // echo echo '₱',number_format($total, 2); ?>" readonly><br>
                                        <label style = "font-size: 12px">Add Allot./Rem. Balance</label><input type="text" class="mbo" value = "<?php // echo echo '₱',number_format($remain_bal, 2); ?>" readonly><br>
                                        <label style = "font-size: 12px">Less This Claim&nbsp;</label><input type="text" id = "ltc" class="mbo" value="<?php // echo echo '(₱',number_format($LTClaim, 2),')'; ?>" readonly><br>
                                        <label style = "font-size: 12px">Balance of Approp.</label><input type="text" class="mbo" value = "<?php // echo echo '₱',number_format(($total-$LTClaim), 2); ?>" readonly><br>
                                        <label style = "font-size: 12px">Remarks:</label><input type="text" class="mbo" value = "<?php // echo echo $mbo_det['MBO_REMARKS']; ?>" readonly><br>
                                        <label style = "font-size: 12px">MBO/Asst. Initial</label><input type="text" class="mbo" value = "<?php // echo echo $mbo_det['MBO_INITIAL']; ?>" readonly>
                                        <label style = "font-size: 12px">Date</label><input type="text"  readonly name = "approved_date" required = "" class = "mbo" value="<?php // echo echo $obr_details['OBR_APPROVED_DATE']; ?>"><br>
                                    </div>
                                    
                                </td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>

                                <td colspan = "1" style = "width: 1%;" class = "text-center">
                                    <?php // echo foreach ($obr_exp_details as $key_amt) { ?>
                                        <?php // echo echo '₱',number_format($key_amt['PART_AMOUNT'], 2); ?>
                                    <?php // echo } ?>
                                        <br />
                                    <input class = "form-control" readonly style = "background-color: white; border: 1px solid white; margin-bottom: 200%;">
                                </td>
                            </tr>

                            <tr>
                                <td colspan = "11" class = "text-center" style = "border: 1px solid black;">Total <h6 style = "text-align: right; margin-top: -2.5%;">₱<h6></td>
                                <td colspan = "1" class = "text-center" style = "border: 1px solid black; width: 3%;"> <?php // echo echo number_format($LTClaim, 2); ?></td>
                            </tr>

                            <tr>
                                <td colspan = "6" style = "border: 1px solid black;">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3"  style = "margin-left: 3%;">Certified</label>
                                            <h6 style = "margin-left: -5.5%; margin-top: -4%;">A</h6>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5" style = "margin-left: 15%;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Charge to appropriation/allotment necessary,<br />lawful and under y direct supervision</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5" style = "margin-left: 15%;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Supporting documents valid, proper and legal</label>
                                        </div>
                                    </div>
                                </td>
                                <td colspan = "6"style = "border: 1px solid black;"> 
                                    <div class="custom-control custom-checkbox mb-5" style = "margin-top: -10%;">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4" style = "margin-left: 3%;">Certified</label>
                                        <h6 style = "margin-left: -5%; margin-top: -4%;">B</h6>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5"  style = "margin-left: 15%;">
                                        <label >Existence of available appropriation</label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-center"><br />Signature:</td>
                                <td colspan = "5" style = "border: 1px solid black"><br /><br /> <input readonly style = "margin-bottom: 2%; border: 1px solid white"></td>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-center"><br />Signature:</td>
                                <td colspan = "5" style = "border: 1px solid black"><br /><br /></td>
                            </tr>

                            <tr>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left">Printed<br /> Name:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> <input readonly style = "margin-bottom: 2%; border: 1px solid white" value = "ANTONIO H. BACULIO"></td>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left">Printed<br /> Name:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> <input readonly style = "margin-bottom: 2%; border: 1px solid white" value = "MARIELYD A. FERRER, CPA"></td>
                            </tr>

                            <tr>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left"><br /> Position:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> Municipal Mayor</td>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left"><br /> Position:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> Municipal Budget Officer</td>
                            </tr>
                            
                            <tr>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left">Date:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> <input readonly style = "margin-bottom: 2%; border: 1px solid white" value = ""></td>
                                <td colspan = "1" style = "border: 1px solid black" class = "text-left">Date:</td>
                                <td colspan = "5" style = "border: 1px solid black" class = "text-center"> <input readonly style = "margin-bottom: 2%; border: 1px solid white" value = ""></td>
                            </tr>
                        </tbody>
                    </table>