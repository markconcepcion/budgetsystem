<?php 
    $total_approp = $lbpExpenditure['LBP_EXP_AMOUNT']+$obrInfo['MBO_TMP'];
    $prev_allot = ($lbpExpenditure['LBP_EXP_AMOUNT']/4)*($quarter-1);
    $qtr_allot = ($lbpExpenditure['LBP_EXP_AMOUNT']/4);
    $total_allot = $prev_allot+$qtr_allot;
    $total_release = 0;
    foreach ($obrApprovedExpenditure as $expenditures) {
        $total_release += $expenditures['PART_AMOUNT'];
    }
    $remain_bal = ($total_allot-$total_release) + $obrInfo['MBO_TMP'];
    $bal_approp = $remain_bal-$obrInfo['PART_AMOUNT'];
?>  

<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/fonts/font-awesome/css/afont-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/fonts/font-awesome/css/afont-awesome.min.css">

<style>
    .bar {
        width: 100%;
        height: 10%;
        border: 1px solid #080808;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%); 
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        color: white;
    }
    .checkboxStyle {
        height: 0.7cm;
        width: 0.7cm;
    }
    .maxWidth{
        width: 100%;
    }
    input.lineStyle{
        border:0;
        border-bottom:1px solid black !important;
    }
    .mboPrintStyle{
        margin: 8cm 5cm 2cm 5cm;
        height: 50%;
        width: 50%;
    }
</style>
<style type="text/css" media="screen"></style>
<style type="text/css" media="print">
    /* @page {size:landscape}  */ 
    @media print {
        @page {size: A4; max-height:100%; max-width:100%}
        body{ width:100%; height:100%; }    
        .toHide, .toHide * {display:none !important;}
    }
</style>

<div class="bar text-right toHide" style="height:auto;">
    <a onclick="history.go(-1);return false;"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
    <a href="<?php echo base_url(); ?>"><button class="btn btn-warning"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</button></a>
    <button type="button" class="btn btn-warning" id="print-btn"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
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
            <td colspan = "6"  class = "text-left" style = "border: 1px solid black;">&nbsp; No. &nbsp; <?php echo $obrInfo['OBR_NO'].'-'.$obrInfo['obrNoYear']; ?>
            </td>
        </tr>

        <tr>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Payee:</td>

            <td colspan = "8" class = "text-left" style = "border: 1px solid black;"> &nbsp; <?php echo $obrInfo['OBR_PAYEE']; ?></td>

            <td colspan = "3" class = "text-left" style = "border: 1px solid black;">&nbsp; Date: &nbsp; <?php echo $obrInfo['OBR_DATE']; ?></td>
        </tr>

        <tr>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Address</td>
            <td colspan = "11" class = "text-left" style = "border: 1px solid black;">&nbsp; Manticao, Misamis Oriental</td>
        </tr>

        <tr>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Responsibility <br /> Center</td>
            <td colspan = "7" class = "text-center" style = "border: 1px solid black;">Particulars</td>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">F.P.P</td>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;">Account <br /> Code</td>
            <td colspan = "2" class = "text-center" style = "border: 1px solid black;">Amount</td>
        </tr>

        <tr style="min-height:25%;">
            <td class="border-right:0px"></td>
            <td colspan = "7" class = "text-center" style = "border: 1px solid black; border-left:0px">
                <p style="margin-top:2cm;"><?php echo $obrInfo['PART_PARTICULARS']; ?></p>
                <table class="mboPrintStyle">
                    <tr>
                        <td colspan="2"><label style = "font-size: 12px">Mun. Budget Office Control No.&nbsp;</label></td>
                        <td colspan="2"><input class="lineStyle maxWidth text-center" value="<?php echo $obrInfo['MBO_ID'].'-'.$obrInfo['mboIDYear']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td colspan="1"><label style = "font-size: 12px">Exp. Class&nbsp;</label></td>
                        <td colspan="3"><input class="lineStyle maxWidth  text-center" value="<?php echo $obrInfo['EXPCLASS_NAME']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td><label style = "font-size: 12px">Amt. Approp.&nbsp;</label></td>
                        <td><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($lbpExpenditure['LBP_EXP_AMOUNT'],2); ?>" readonly></td>
                        <td><label style="font-size: 12px">&nbsp;Code&nbsp;</label></td>
                        <td><input class="lineStyle maxWidth text-center" value="<?PHP ECHO $obrInfo['deptID']; ?>" readonly><br></td>
                    </tr>
                    <tr>
                        <td colspan="1"><label style = "font-size: 12px">Add Approp.&nbsp;</label></td>
                        <td colspan="1"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($obrInfo['MBO_TMP'],2); ?>" readonly></td>
                        <td colspan="2" style="padding-left:10px;"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($total_approp, 2)?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="1"><label style="font-size:12px">Previous Allot.</label></td>
                        <td colspan="1"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($prev_allot,2); ?>" readonly></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="1"><label style = "font-size: 12px">Qtr. Allot.&nbsp;</label></td>
                        <td colspan="1"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($qtr_allot,2); ?>" readonly></td>
                        <td colspan="2" style="padding-left:10px;"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($total_allot,2); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1"><label style = "font-size: 12px">Add Allot./Rem. Balance</label></td>
                        <td colspan="2" style="padding-left:10px;"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($remain_bal,2); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1"><label style = "font-size: 12px">Less This Claim&nbsp;</label></td>
                        <td colspan="2" style="padding-left:10px;"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($obrInfo['PART_AMOUNT'],2); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1"><label style = "font-size: 12px">Balance of Approp.&nbsp;</label></td>
                        <td colspan="2" style="padding-left:10px;"><input class="lineStyle maxWidth text-center" value="<?php echo '₱'.number_format($bal_approp,2); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="1"><label style = "font-size: 12px">Remarks:&nbsp;</label></td>
                        <td colspan="3"><input class="lineStyle maxWidth text-center" value="<?php echo $obrInfo['MBO_REMARKS']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label style = "font-size: 12px">MBO/Asst. Initial&nbsp;</label></td>
                        <td><input class="lineStyle maxWidth text-center" value="<?php echo $obrInfo['MBO_INITIAL']; ?>" readonly></td>
                        <td><label style="font-size: 12px">&nbsp;Date&nbsp;</label></td>
                        <td><input class="lineStyle maxWidth text-center" value="<?php echo $obrInfo['OBR_APPROVED_DATE']; ?>" readonly><br></td>
                    </tr>
                </table>
            </td>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black;"></td>

            <td colspan = "2" valign="top" style = "padding-top:2cm; width: 1%;" class="text-center">
                <?php echo '₱'.number_format($obrInfo['PART_AMOUNT'],2); ?>
            </td>
        </tr>

        <tr>
            <td colspan = "11" class = "text-right" style = "border: 1px solid black;">
                <p><span class="text-right;">Total &nbsp; ₱</span></p>
            </td>
            <td colspan = "1" class = "text-center" style = "border: 1px solid black; width: 3%;"> <?php echo number_format($obrInfo['PART_AMOUNT'],2); ?></td>
        </tr>

        <tr>
            <td colspan = "6" style = "border: 1px solid black; padding:0.5cm;">
                <table>
                    <tr>
                        <td><input type="text" class="checkboxStyle" value=" A" readonly></td>
                        <td style="padding-left:1cm;">Certified</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left:1cm;">
                            <label><input type="checkbox" class="checkboxStyle" disabled></label>
                            <label style="margin-left:1cm;">Charge to appropriation/allotment necessary,<br />lawful and under y direct supervision</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left:1cm;">
                            <label><input type="checkbox" class="checkboxStyle" disabled></label>
                            <label style="margin-left:1cm;">Supporting documents valid, proper and legal</label>
                        </td>
                    </tr>
                </table>
            </td>
            <td colspan = "6" style = "border: 1px solid black; ; padding:0.5cm;"> 
                <table>
                    <tr>
                        <td><input type="text" class="checkboxStyle" value=" B" readonly></td>
                        <td style="padding-left:1cm;">Certified</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left:1cm;">
                            <label>Existence of available appropriation</label>
                        </td>
                    </tr>
                </table>
                <!-- <div class="custom-control custom-checkbox mb-5" style = "margin-top: -10%;">
                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                    <label class="custom-control-label" for="customCheck4" style = "margin-left: 3%;">Certified</label>
                    <h6 style = "margin-left: -5%; margin-top: -4%;">B</h6>
                </div>
                <div class="custom-control custom-checkbox mb-5"  style = "margin-left: 15%;">
                    <label >Existence of available appropriation</label>
                </div> -->
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
            <td colspan = "5" style = "border: 1px solid black" class = "text-center">ANTIONIO BACULIO</td>
            <td colspan = "1" style = "border: 1px solid black" class = "text-left">Printed<br /> Name:</td>
            <td colspan = "5" style = "border: 1px solid black" class = "text-center">MARIELYD FERRER</td>
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

<?php $this->load->view('Pages/Budget_officer_view/deskapp/script'); ?>