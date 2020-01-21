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
	$('.min-height-200px').prepend('<a class="btn btn-warning float backbtn" onclick="history.go(-1);return false;"><i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i></a>');
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

			<?php if ($hide != null) {
				foreach ($exps as $e) { ?>
					$('.div<?php echo $e['EXPENDITURE_id']; ?>').removeClass('show'+val);
				<?php }
			} ?>

			$('.show'+val).toggle();
		});
	});
</script>
<script>
	$(function(){
		$('.del-exp-btn').on('click', function(){
			var val = $(this).val();
			var name = $('#exp_name'+val).text();
			var bool = confirm("Delete Confirmation: "+name+" \nOnce Deleted, retrieval is not possible\nAre you Sure??");
			if (bool) {
				$.ajax({
					url:"<?php echo base_url();?>DH/DEL/LBP2_EXP/"+val,
					type:'post',
					data:{'new':val},
					success:function(data){
						location.reload()
					}
				});
			}
		});
	});
</script>
<script>
	$(function(){
		// UPDATE LBP2 BY REMOVING DISABLE
		$('#edit-lbp2-btn').on('click', function(){
			$('.lbp-input-disabled').removeAttr('disabled');
			$('.lbp-input-disabled').addClass('bg-gray');
			$('#edit-lbp2-btn').hide();
			$('#addremove-btn').hide();
			$('#submit-edit-lbp2-btn').show();
		});
	});
</script>

<script>
	$(function() {
		$('#obr_amt').keyup(function(e){
			var val = $(this).val();
			var temp = val.replace(/,/g, '');
			if(isNaN(temp)){
				alert("numbers only");
				$('#obr_amt').val(0);
			} else {
				var msg = new Intl.NumberFormat({ style : 'decimal', currency: 'PHP' }).format(temp);
				$('#obr_amt').val(msg);
			}
		});

		$(function() {
			$('.submit-lbp2-input').keyup(function() {
				var val = $(this).val();
				var temp = val.replace(/,/g, '');

				var id = $(this).data('id');
				var name = $(this).data('name');

				if(isNaN(temp)){
					alert("numbers only");
					$(this).val(0);
				} else {
					//VARIABLE NEEDED IN COMPUTING SUB AND GRAND TOTAL
					var subtotal = 0;
					var grandtotal = 0;

					//ASSIGNING VALUE TO SELECTED INPUT
					var msg = new Intl.NumberFormat({ style : 'decimal', currency: 'PHP' }).format(temp);
					$(this).val(msg);

					//FOR COMPUTING THE SUBTOTAL
					$('.'+name).each(function(){
						var temp_sub = parseInt(($(this).val()).replace(/,/g, ''));
						subtotal += temp_sub;
					});

					var final = new Intl.NumberFormat('ja-JP', { style : 'decimal', currency: 'PHP' }).format(subtotal);
					$('#subtotal'+id).text('₱ '+final);

					//FOR COMPUTING THE GRAND_TOTAL
					$('.submit-lbp2-input').each(function() {
						var temp_grand = parseInt(($(this).val()).replace(/,/g, ''));
						grandtotal += temp_grand;
					});
					var fin_gt = new Intl.NumberFormat('ja-JP', { style : 'decimal', currency: 'PHP' }).format(grandtotal);
					$('#grand_total').text('₱ '+fin_gt);
				}
			});
		})
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