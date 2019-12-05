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
	$('.min-height-200px').prepend('<a class="btn btn-warning float backbtn" href="<?php echo base_url('Department_head/'.$highlights); ?>"><i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i></a>');
</script>

<script>
	// TOGGLE SIDEBAR
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

<script>
	$(function(){ // EDIT PROFILE INFORMATION
		$('#edit_profile').on('click', function(){
			$('#edit_profile').hide();
			$('#change_password').hide();
			$('#submit_changes').show();
			$('.editable').removeAttr("readonly");
		});
		// SELECT EXP_CLASS IN NOTEBOOK THEN SHOW INCLUDED EXPS
		$('#exp-class').on('change', function() {
			var exclass_id = $(this).val();
			console.log(exclass_id);
			$('.idExC').hide();
			$('.'+exclass_id).show();
		});
	});
</script>


<script> // POP UPS 
	$('document').ready(function(){
		<?php if($this->session->flashdata('edit_success')): ?>
			$('#edit-modal').modal('show');
			setTimeout(function(){
				$('#edit-modal').modal('hide');
			}, 1500);
		<?php endif; ?>

		<?php if($this->session->flashdata('edit_failed')): ?>
			$('#editf-modal').modal('show');
			setTimeout(function(){
				$('#editf-modal').modal('hide');
			}, 1500);
		<?php endif; ?>
	});
</script>

<!-- // LBP2 FUNCTIONS -->
<script>
	$(function(){ // TOGGLE EXPENDITURE DIV
		$('.show-exps-btn').on('click', function(){
			var val = $(this).val();
			$('.show'+val).toggle();
		});
	});
</script>
<script>
	$(function(){
		// UPDATE LBP2 BY REMOVING DISABLE
		$('#edit-lbp2-btn').on('click', function(){
			$('.exp-amt').hide();
			$('.lbp-input-disabled').removeClass('hide');
			$('.lbp-input-disabled').addClass('bg-gray');
			$('#edit-lbp2-btn').hide();
			$('#submit-edit-lbp2-btn').show();
		});
	});
</script>











<!-- FOR NOTEBOOK SCRIPT @ Selecting Expenditures by Class -->
<script type="text/javascript">
	$(function(){
		$('#pending').on('click', function(){
			$('.hide').hide();
			$('.cursor').removeClass('active');
			$('#pending').addClass('active');
			$('#pend').show();
		});
		$('#on_process').on('click', function(){
			$('.hide').hide();
			$('.cursor').removeClass('active');
			$('#on_process').addClass('active');
			$('#process').show();
		});
		$('#approved').on('click', function(){
			$('.hide').hide();
			$('.cursor').removeClass('active');
			$('#approved').addClass('active');
			$('#appro').show();
		});
		$('#reject').on('click', function(){
			$('.hide').hide();
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
