<?php if($this->session->flashdata('edit_failed')): ?>
    <div class="modal fade" id="editf-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content box-shadow bar">
                <div class="modal-body text-center font-18">
                    <div class="mb-15 text-center"><img src="http://localhost/BASystem/assets/jimage/cancel.png" class="logo" style="position: unset;"></div>
                    <h3 class="mb-10 text-white"><?php echo $this->session->flashdata('edit_failed') ?></h3>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>