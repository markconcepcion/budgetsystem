<div class="modal fade" id="log_ok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content mod_design text-center">
            <div class="modal-body text-center" style="padding-left: 10%; padding-right: 10%">
                <h5 style="color:white;"><?php echo $this->session->flashdata('edit_success') ?></h5>
            </div>
        </div>
    </div>
</div>

<script>
	$('document').ready(function(){
        <?php if($this->session->flashdata('submit_success')): ?>
			$('#log_ok').modal('show');
			setTimeout(function(){
				$('#log_ok').modal('hide');
			}, 1500);
		<?php endif; ?>
	});
</script>
