<style>
    .nav-link.text-blue{ `
        border-radius: 0; border-bottom: 0; 
    }
    .nav-link.text-blue.active.show, .nav-link.active{
        border-radius: 0; border-bottom: 1.5px solid #ff9900;
        background-color: #ff9900 !important;
        color: white !important;
    }
    .notif{ 
        background: #dddddd; 
    }
    .notif > td{ 
        padding: 0;
    }
</style>

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 primaryscroll">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div>
                        <div id="chart4"></div>
                        <div class="pd-20 form-group text-center">
                            <button type="button" class="btn btn-secondary text-white" data-toggle="modal" data-target="#augment">Augment</button>
                            <a href="<?php echo base_url('BH/augment_view'); ?>" class="btn btn-warning text-white">View Augmentations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('Modals/BH/augment_modal');
        
        