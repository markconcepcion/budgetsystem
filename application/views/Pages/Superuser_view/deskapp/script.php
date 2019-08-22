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
	$(function () {
		$('.deact-dept-button').on('click', function(){
			var val = $(this).data('id');
			$('#deact-dept-id').val(val);
		});

		$('#edit_profile').on('click', function(){
			$('#edit_profile').hide();
			$('#change_password').hide();
			$('#submit_changes').show();
			$('.editable').removeAttr("readonly");
		});

		$('#edit-mayor').on('click', function(){
			$('#edit-mayor').hide();
			$('#sub-mayor').show();
			$('#mayor-input').removeAttr("readonly");
		});

		$('#edit-bhead').on('click', function(){
			$('#edit-bhead').hide();
			$('#sub-bhead').show();
			$('#bhead-input').removeAttr("readonly");
		});

		$('.edit-dept').on('click', function(){
			$('#dept-id').val($(this).data('id'));
			$('#dept-code').val($(this).data('id'));
			$('#dept-name').val($(this).data('name'));
		});

		$("#code-one").keyup(function(){
			var val = $(this).val();

			if(isNaN(val) == true || val > 9 || val == null){
				alert("ENTER ONLY 1 DIGIT NUMBER");
				$(this).val(null);
			} else if(val > 0) {
				$("#code-two").focus();
			}
		});

		$("#code-two").keyup(function(){
			var val = $(this).val();

			if(isNaN(val) == true || val > 99 || val == null){
				alert("ENTER ONLY 2 DIGIT NUMBER");
				$(this).val(null);
			} else if(val >= 10) {
				$("#code-three").focus();
			}
			
		});

		$("#code-three").keyup(function(){
			var val = $(this).val();

			if(isNaN(val) == true || val > 99 || val == null){
				alert("ENTER ONLY 2 DIGIT NUMBER");
				$(this).val(null);
			} else if (val >= 10){
					$("#code-four").focus();
				}
			
		});

		$("#code-four").keyup(function(){
			var val = $(this).val();

			if(isNaN(val) == true || val > 999 || val == null){
				alert("ENTER ONLY 3 DIGIT NUMBER");
				$(this).val(null);
			} 
		});

		$('#select-post').on('change', function() {
			var post = $(this).val();
			if ((post == "BUDGET HEAD") || (post == "BUDGET OFFICER 1") || (post == "BUDGET OFFICER 2") ){
				$('.dpt-list').hide();
				$('#select-dept').val(null);
				$('#auto-select').val("1071");
				$('#auto-select').text("Municipal Budget Office");
			} else {
				$('.dpt-list').show();
				$('#auto-select').val(null);
				$('#auto-select').text(null);
			}
		});
	});
</script>

<script>
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



