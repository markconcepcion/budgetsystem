<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div style="text-align:right">
                </div>

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
                            <td colspan = "6"  class = "text-left" style = "border: 1px solid black;">&nbsp; No. &nbsp; <?=$obr_no.'-'.(date('Y')-2000); ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Payee:</td>

                            <td colspan = "8" class = "text-left" style = "border: 1px solid black;"> &nbsp; <?php echo $obr_details['OBR_PAYEE']; ?>
                            </td>

                            <td colspan = "3" class = "text-left" style = "border: 1px solid black;">&nbsp; Date: &nbsp; <?php echo date('F-d-Y', strtotime($obr_details['OBR_DATE'])); ?></td>
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
                            <td colspan = "9" style = "border: 1px solid black;">
                                <br />
                                <br />
                                <div class = "text-center">
                                    <?php  $LTClaim=0; foreach ($obr_exp_details as $key) {  $LTClaim+=$key['PART_AMOUNT']; ?>
                                        <?php echo $key['PART_PARTICULARS']; ?>
                                    <?php } $data['LTClaim'] = $LTClaim;?>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <button class = "dropbtn btn-sm" data-toggle = "modal" data-target = "#sample" style = "margin-left: 3%;">REVIEW</button>
                                   
                            </td>
                            <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>
                            <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>

                            <td colspan = "1" style = "width: 1%;" class = "text-center">
                                <?php foreach ($obr_exp_details as $key_amt) {  
                                    echo number_format($key_amt['PART_AMOUNT'], 2);
                                } ?>
                                    <br />
                                <input class = "form-control" readonly style = "background-color: white; border: 1px solid white; margin-bottom: 200%;">
                            </td>
                        </tr>

                        <tr>
                            <td colspan = "11" class = "text-center" style = "border: 1px solid black;">Total <h6 style = "text-align: right; margin-top: -2.5%;">₱<h6></td>
                            <td colspan = "1" class = "text-center" style = "border: 1px solid black; width: 3%;"> <?php echo number_format($LTClaim, 2); ?></td>
                        </tr>

                        <tr>
                            <td colspan = "6" style = "border: 1px solid black;">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <label class="custom-control-label" for="customCheck3"  style = "margin-left: 3%;">Certified</label>
                                        <h6 style = "margin-left: -5.5%; margin-top: -4%;">A</h6>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5" style = "margin-left: 15%;">
                                        <label class="custom-control-label" for="customCheck1">Charge to appropriation/allotment necessary,<br />lawful and under y direct supervision</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5" style = "margin-left: 15%;">
                                        <label class="custom-control-label" for="customCheck2">Supporting documents valid, proper and legal</label>
                                    </div>
                                </div>
                            </td>
                            <td colspan = "6"style = "border: 1px solid black;"> 
                                <div class="custom-control custom-checkbox mb-5" style = "margin-top: -10%; color:black;">
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
            </div>
        </div>
<?php $this->load->view('modals/review', $data); ?>
