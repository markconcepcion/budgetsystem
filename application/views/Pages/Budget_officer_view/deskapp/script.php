<script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>

<!-- FOR NOTEBOOK SCRIPT @ Selecting Expenditures by Class -->
<script>
	$(function(){
		$('#exp_class_notebook').on('change', function() {
			var exp_class = $(this).val();
			$('#empty').hide();
			$('.expe').hide();
			
			$('#'+exp_class).show();
		});
	});
</script>
<script> // EDIT PROFILE AND TOGGLE SIDEBAR 
	//EDIT PROFILE
	$(function () {
		$('#edit_profile').on('click', function(){
			$('#edit_profile').hide();
			$('#change_password').hide();
			$('#submit_changes').show();
			$('.editable').removeAttr("readonly");
		});
	});
	//TOGGLE SIDEBAR
	$(function(){
		$('.s-right').on('click', function(){
			$('.s-right').hide();
			$('.s-left').show();
			$('.left-side-bar').show();
			$('.main-container').removeClass("enlarge");
		});
		$('.s-left').on('click', function(){
			$('.s-left').hide();
			$('.s-right').show();
			$('.left-side-bar').hide();
			$('.main-container').addClass("enlarge");
		});
	});
</script>

<script> // THIS SCRIPT IS FOR OBR DETAILS CHECKING
	$(function(){
		//FOR OBR CHECKING
		$('#exp-class').on('change', function() {
			var exclass_id = $(this).val();
			$('.idExC').hide();
			$('.'+exclass_id).show();
		});
	});
	
	$(function() { // COMPUTING ALL MBO REQUIREMENTS
		$('#exp').on('change', function() {
			var ex_id = $(this).val();
			var real_amt_approp = $('#real-amt-approp'+ex_id).val();
			var real_ltc = $('#real-ltc').val();
			var quarter = $('#quarter').val();
			var ltc = $('#ltc').val();
			var ex_name = $('#'+ex_id).text();
			var amt_approp = $('#amt-approp'+ex_id).val();
			var total_rel = $('#total-rel'+ex_id).val();
			var prev_allot = (amt_approp/4)*(quarter-1);
			var qtr_allot = (amt_approp/4);
			var total_allot = prev_allot+qtr_allot;
			var rem_bal = total_allot-total_rel;
			var bal_approp = rem_bal-ltc;

			$('#exp-mbo').val(ex_name);
			$('#mbo-amt-approp').val('₱'+real_amt_approp);
			$('#mbo-prev-allot').val('₱'+prev_allot.toLocaleString());
			$('#mbo-qtr-allot').val('₱'+qtr_allot.toLocaleString());
			$('#mbo-total-allot').val('₱'+total_allot.toLocaleString());
			$('#mbo-rem-bal').val('₱'+rem_bal.toLocaleString());
			$('#mbo-ltc').val('₱'+real_ltc);
			$('#mbo-bal-approp').val('₱'+bal_approp.toLocaleString());
			$('#mbo-bal-approp-dummy').val(bal_approp);

			//FOR ADD_APPROP (JUST IN CASE)
			$('#mbo-amt-approp-dummy').val(amt_approp);
			$('#mbo-rem-bal-dummy').val(rem_bal);

		});

		$('#mbo-add-approp').keyup(function(){
			var amt_approp = $('#mbo-amt-approp-dummy').val();
			var add_approp = $(this).val();
			var ltc = $('#ltc').val();
			var total_approp = (+amt_approp) + (+add_approp);
			var rem_bal = $('#mbo-rem-bal-dummy').val();

			var total_rem_bal = (+add_approp) + (+rem_bal);
			var total_bal_approp = (+total_rem_bal) - ltc;

			$('#mbo-total-approp').val('₱ '+total_approp.toLocaleString());
			$('#mbo-rem-bal').val('₱'+total_rem_bal.toLocaleString());
			$('#mbo-bal-approp').val('₱'+total_bal_approp.toLocaleString());
			$('#mbo-bal-approp-dummy').val(total_bal_approp);
		});
	});

	$(function() {
		$('#obr-reject-button').on('click', function(){
			var val = $('#mbo-bal-approp-dummy').val();
			if (val=="") {
				$('#alert-popup-h4').text('ERROR! Expenditure not found.');
				$('#alert-popup').modal('show');
			} else {
				$('#obr-status-h4').text('Reject Obr?');
				$('#obr-status-modal').modal('show');
				$('#obr-status-btn').on('click', function(){
					$('#submit-reject-obr').click();
				});
			}
		});
		$('#obr-check-button').on('click', function(){
			var val = $('#mbo-bal-approp-dummy').val();
			if (val<0) {
				$('#alert-popup-h4').text('ERROR! Insufficient Gold.');
				$('#alert-popup').modal('show');
			} else if (val=="") {
				$('#alert-popup-h4').text('ERROR! Expenditure not found.');
				$('#alert-popup').modal('show');
			} else {
				$('#obr-status-h4').text('Approve Obr?');
				$('#obr-status-modal').modal('show');
				$('#obr-status-btn').on('click', function(){
					$('#submit-accept-obr').click();
				});
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#req_amt').on('change', function(){
			var temp = $(this).val();
			if (temp <= 0) {
				alert("Amount cannot be 0 or less than 0");
        $(this).val(null);
			}
		});

		$('#req_part').on('change', function(){
			var temp_part = $(this).val();
			if (temp_part == "") {
				alert("Particular cannot be empty");
        $(this).val(null);
			}
		});

		$('#req_payee').on('change', function(){
			var temp_pay = $(this).val();
			if (temp_pay == "") {
				alert("Payee cannot be empty");
        $(this).val(null);
			}
		});
	});
</script>

<script>
	$('document').ready(function(){
		<?php if($this->session->flashdata('login_success')): ?>
			$('#log_ok').modal('show');
			setTimeout(function(){
				$('#log_ok').modal('hide');
			}, 1500);
		<?php endif; ?>
	});
</script>
