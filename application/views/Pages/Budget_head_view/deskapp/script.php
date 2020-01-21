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
	Highcharts.chart('chart4', {
		chart: {
			type: 'column',
			borderWidth: 1.5
			
		},
		title: {
			text: 'Chart Representation of Remaining Allocated Budget of Expenditure Class of Every Department'
		},
		// subtitle: {
		// 	text: 'Source: WorldClimate.com'
		// },
		xAxis: {
			categories: <?php echo $categories; ?>,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Remaining Balance (₱)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr>'+
							'<td style="color:{series.color};padding:5">{series.name}: </td>' +
							'<td><b>₱</b></td>' +
							'<td style="padding:0;text-align:right;"><b>{point.y:,.2f}</b></td>'+
						'</tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: <?php echo $series; ?>
	});

	$(function() {
		$('#augment_amt').keyup(function(){
			var val = $(this).val();
			var temp = val.replace(/,/g, '');
			if(isNaN(temp)){
				alert("numbers only");
				$(this).val(0);
			} else {
				var msg = new Intl.NumberFormat({ style : 'decimal', currency: 'PHP' }).format(temp);
				$(this).val(msg);
			}
		});
	});


	$(function(){
		$('.select_class').on('change', function() {
			var class_id = $(this).val();
			$('.expenditure').hide();
			$('.select_exp').val(' ');
			$('.class'+class_id).show();

			if ($('.select_dept').val() == '') {
				console.log('false');
			} else {
				var classID = $(this).val();
				var deptID = $('.select_dept').val();
				var amt = document.getElementById('amt').value;
				$.ajax({
					url:'<?php echo base_url();?>Budget_head/Home/get_augment_amount/'+classID+'/'+deptID,
					type:'post',
					data:{'new':amt},
					success:function(data){
						$('#amt').html(new Intl.NumberFormat({ style : 'decimal', currency: 'PHP' }).format(data));
						$('#limit_amt').val(data);
					}
				});
			}
		});

		$('.select_dept').on('change', function(){
			if ($('.select_class').val() == '') {
				console.log('false');
			} else {
				var classID = $('.select_class').val();
				var deptID = $(this).val();
				var amt = document.getElementById('amt').value;
				$.ajax({
					url:'<?php echo base_url();?>Budget_head/Home/get_augment_amount/'+classID+'/'+deptID,
					type:'post',
					data:{'new':amt},
					success:function(data){
						$('#amt').html(new Intl.NumberFormat({ style : 'decimal', currency: 'PHP' }).format(data).toLocaleString());
						$('#limit_amt').val(data);
					}
				});
			}
		});
	});

	$(function(){
		$('#check-aug-btn').on('click', function(){
			var max = $('#limit_amt').val();augment_amt
			var val = parseInt(($('#augment_amt').val()).replace(/,/g, ''))
			if (val < 1) {
				alert("Amount is zero!");
			} else {
				if (val > max) {
					alert("Amount exceeds limit!");
				} else {
					$('#augment-btn').click();
				}
			}
		});
	});
</script>

<!-- FOR NOTEBOOK SCRIPT @ Selecting Expenditures by Class -->
<script>
	$(function(){
		//FOR OBR CHECKING
		$('#exp-class').on('change', function() {
			var exclass_id = $(this).val();
			$('.idExC').hide();
			$('.'+exclass_id).show();
		});
	});
</script>

<script>
	<?php if ($content == 'Pages/Budget_head_view/Obr_details_view' ) { ?>
        <a class="btn btn-warning float backbtn" href="<?php echo base_url('Budget_head/Obr/removeStat/'.$Obr_details['OBR_ID']); ?>"><i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i></a>
	<?php } else { ?>
		$('.min-height-200px').prepend('<a class="btn btn-warning float backbtn" onclick="history.go(-1);return false;"><i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i></a>');
	<?php } ?>
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

<script> //LBP2 FUNCTIONS
	$(function(){
		// UPDATE LBP2 BY REMOVING DISABLE
		$('#update-lbp2-btn').on('click', function(){
			$('.lbp-input-disabled').removeAttr('disabled');
			$('.lbp-input-disabled').addClass('bg-gray');
			$('#update-lbp2-btn').hide();
			$('#confirm-approve-lbp2-btn').show();
		});

		// APPROVE EDITED LBP2 
		$('#confirm-modal-lbp2-btn').on('click', function(){
			$('#approve-lbp2-btn').click();
		});
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
</script>

<script> // FOR POPUP MESSAGE
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

<script>
    $(function(){
        $('#print-btn').click(function(){
			window.print();
        });
    });
</script>