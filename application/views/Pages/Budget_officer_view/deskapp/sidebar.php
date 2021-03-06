<div class="left-side-bar">
<div class="bar">
	<a href="<?php echo base_url('BO'); ?>">
		<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
		<h1 class="sb-head text-orange"><b>LGU-Budget Office</b></h1>
	</a>
</div>
<div class="menu-block customscroll" id="sidebar">
	<div class="title sidebar-menu" style="text-align:center; padding-bottom:0px;">
		<h5 style="color: lightgrey;"><?php echo ucwords(strtoupper($uprofile['DPT_NAME'])); ?></h5>
		<h6 style="color: lightgrey;">(BUDGET OFFICER)</h6> 
	</div>
	<div class="sidebar-menu" id="sidebar">
		<ul id="accordion-menu">
			<?php if ($this->session->userdata('roleCode') == 2) { ?>
				<li>
					<a href="<?php echo base_url('BO'); ?>" class="dropdown-toggle no-arrow  <?php if($highlights === 'home') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-home" aria-hidden="true"></i><span class="mtext">HOME</span>
					</a>
				</li>
			<?php } ?>
			
			<li>
				<a href="<?php echo base_url('BO/VIEW_OBR/'.date('Y').'/'.'DESC'); ?>" class="dropdown-toggle no-arrow 
					<?php if($highlights === 'obr') { echo 'active'; } ?>">
					<i class="fa fa-paperclip" aria-hidden="true"></i><span class="mtext">OBR</span>
				</a>
			</li>

			<?php if ($this->session->userdata('roleCode') == 2) { ?>
				<li>
					<a href="<?php echo base_url('Budget_officer/Logbook'); ?>" class="dropdown-toggle no-arrow
						<?php if($highlights === 'logbook') { echo 'active'; } ?> ">
						<i class="fa fa-bookmark" aria-hidden="true"></i><span class="mtext">LOGBOOK</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('BO/NOTEBOOK/'.date('Y')); ?>" class="dropdown-toggle no-arrow
						<?php if($highlights === 'notebook') { echo 'active'; } ?>">
						<i class="fa fa-book" aria-hidden="true"></i><span class="mtext">NOTEBOOK</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('BH/REPORT/'.date('Y')); ?>" class="dropdown-toggle no-arrow
						<?php if($highlights === 'report') { echo 'active'; } ?>">
						<i class="fa fa-bar-chart" aria-hidden="true"></i><span class="mtext">REPORTS</span>
					</a>
				</li>
				
				<li>
					<a href="<?php echo base_url('BO/lbp_list/'.date('Y')); ?>" class="dropdown-toggle no-arrow
						<?php if($highlights === 'lbp') { echo 'active'; } ?>">
						<i class="fa fa-list" aria-hidden="true"></i><span class="mtext">LBP</span>
					</a>
				</li>
			<?php } ?>	
		</ul>
	</div>
</div>
</div>