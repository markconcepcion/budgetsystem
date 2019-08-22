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

<script>
	$('document').ready(function(){
		$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});
	});
</script>

<script>
	$(function () {

		<?php $class1 = 0; $class2 = 0; $class3 = 0;
		foreach ($exp_actual_budget as $eab) { ?>
			$('#act<?php echo $eab['EXPENDITURE_EXPENDITURE_id'] ?>').text(<?php echo $eab['LBP_EXP_AMOUNT'] ?>);
			$('#t_act<?php echo $eab['EXPENDITURE_EXPENDITURE_id'] ?>').text(<?php echo $eab['LBP_EXP_AMOUNT'] ?>);
		<?php if ($eab['EXPENDITURE_CLASS_EXPCLASS_ID'] == 1) {
				$class1 += $eab['LBP_EXP_AMOUNT'];
			} elseif ($eab['EXPENDITURE_CLASS_EXPCLASS_ID'] == 2) {
				$class2 += $eab['LBP_EXP_AMOUNT'];
			} elseif ($eab['EXPENDITURE_CLASS_EXPCLASS_ID'] == 3) {
				$class3 += $eab['LBP_EXP_AMOUNT'];
			} else {

			} } ?>

		<?php $bclass1 = 0; $bclass2 = 0; $bclass3 = 0;
			foreach ($exp_obligated as $obr) { ?>
			$('#obr<?php echo $obr['EXPENDITURE_id'] ?>').text(<?php echo $obr['PART_AMOUNT'] ?>);
			$('#t_obr<?php echo $obr['EXPENDITURE_id'] ?>').text(<?php echo $obr['PART_AMOUNT'] ?>);
		<?php if ($obr['EXPENDITURE_CLASS_EXPCLASS_ID'] == 1) {
				$bclass1 += $obr['PART_AMOUNT'];
			} elseif ($obr['EXPENDITURE_CLASS_EXPCLASS_ID'] == 2) {
				$bclass2 += $obr['PART_AMOUNT'];
			} elseif ($obr['EXPENDITURE_CLASS_EXPCLASS_ID'] == 3) {
				$bclass3 += $obr['PART_AMOUNT'];
			} else {

			} } ?>

		<?php foreach ($expenditures as $exp1) { ?>
			$act = $('#t_act<?php echo $exp1['EXPENDITURE_id']; ?>').text();
			$obr = $('#t_obr<?php echo $exp1['EXPENDITURE_id']; ?>').text();
			$temp = $act - $obr;

			if(isNaN($temp)){
				$temp = $act;
			}

			$('#unobr<?php echo $exp1['EXPENDITURE_id']; ?>').text($temp);
		<?php } ?>
		
		$('#ps_sub').text(<?php echo $class1; ?>);
		$('#ma_sub').text(<?php echo $class2; ?>);
		$('#co_sub').text(<?php echo $class3; ?>);

		$('#ps_sub5').text(<?php echo $class1; ?>);
		$('#ma_sub5').text(<?php echo $class2; ?>);
		$('#co_sub5').text(<?php echo $class3; ?>);

		$('#ps_sub6').text(<?php echo $bclass1; ?>);
		$('#ma_sub6').text(<?php echo $bclass2; ?>);
		$('#co_sub6').text(<?php echo $bclass3; ?>);

		$('#ps_sub10').text($('#ps_sub').text() - $('#ps_sub6').val());
		$('#ma_sub10').text($('#ma_sub').text() - $('#ma_sub6').val());
		$('#co_sub10').text($('#co_sub').text() - $('#co_sub6').val());
	});	

</script>

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
<script>
	$(function(){
		$('#accept').hide();
		$('#reject').hide();

		$('#exp_class').on('change', function(){
			var exp_id = $(this).val();
			var amt_approp = 0;
			var total_rel = 0;

			<?php  
				foreach ($amt_approp as $key) { ?>
					if(exp_id == <?php echo $key['EXPENDITURE_id'] ?>){
						amt_approp = <?php echo $key['LBP_EXP_AMOUNT']; ?>
					}
			<?php } foreach ($minus_allot as $ma) { ?>
				if (exp_id == <?php echo $ma['EXPENDITURE_id'] ?> ) {
					total_rel = <?php echo $ma['PART_AMOUNT']; ?>
				}
			<?php } ?>
			
			
			var additional = $("#add_approp").val();
			var ltc = <?php echo $LTClaim; ?>;
			var prev = (amt_approp / 4) * (<?=$quarter?> - 1);
			var quarter = (amt_approp / 4);
			var total_allot = prev + quarter;
			var remain_bal = total_allot - total_rel;
			var bal = remain_bal - ltc;
			var total_approp = additional + amt_approp;

			$('#prev').val('₱'+prev.toLocaleString());
			$('#quart').val('₱'+quarter.toLocaleString());
			$('#total').val('₱'+total_allot.toLocaleString());
			$('#allotment').val('₱'+amt_approp.toLocaleString());
			$('#balance').val('₱'+bal.toLocaleString());
			$('#remain_bal').val('₱'+remain_bal.toLocaleString());
			$('#total_approp').val('₱'+total_approp.toLocaleString());
			$('#ltc').val('₱'+ltc.toLocaleString());
			$('#exp_id').val(exp_id);
			

			if (bal >= 0) {
				$('#reject').hide();
				$('#accept').show();
				$('#status').val("accept");
			} else {
				$('#accept').hide();
				$('#reject').show();
				$('#status').val("reject");
			}
		});
	});
</script>

<script>
	$(function(){
		$('#submit_lbp').hide();

		$('#edit_lbp').on('click', function(){
			$('#edit_lbp').hide();
			$('#submit_lbp').show();

			<?php foreach ($lbp_exp as $value) { ?>
				$('#amt<?php echo $value['EXPENDITURE_EXPENDITURE_id']; ?>').text('');
				$('#amt<?php echo $value['EXPENDITURE_EXPENDITURE_id']; ?>').append(
					'<input type="text" name ="amount[]" value="'+<?php echo $value['LBP_EXP_AMOUNT']; ?>+'">'
				);
			<?php } ?>
		});
	});
</script>

<script type="text/javascript">
	$(function(){
		$('#pending').on('click', function(){
			$('.hider').hide();
			$('.cursor').removeClass('active');
			$('#pending').addClass('active');
			$('#pend').show();
		});
		$('#on_process').on('click', function(){
			$('.hider').hide();
			$('.cursor').removeClass('active');
			$('#on_process').addClass('active');
			$('#process').show();
		});
		$('#approved').on('click', function(){
			$('.hider').hide();
			$('.cursor').removeClass('active');
			$('#approved').addClass('active');
			$('#appro').show();
		});
		$('#reject').on('click', function(){
			$('.hider').hide();
			$('.cursor').removeClass('active');
			$('#reject').addClass('active');
			$('#rej').show();
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
	$(function(){
		var content = <?php echo $content; ?>;
		console.log(content);
	})
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
