<div class="left-side-bar">
	<div class="bar">
		<a href="<?php echo base_url('Department_head/Home'); ?>">
			<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
			<h1 class="sb-head text-orange"><b><?php echo ucwords(strtoupper($uprofile['DPT_NAME'])); ?></b></h1>
		</a>
	</div>
	<div class="menu-block customscroll" id="sidebar">
		<div class="title sidebar-menu" style="text-align:center; padding-bottom:0px;">
			<h5 style="color: lightgrey;">Budget Officer</h5>
		</div>
		<div class="sidebar-menu" id="sidebar">
			<ul id="accordion-menu">
				<?php if ($this->session->userdata('level') != "BH_STAFF") { ?>
					<li>
						<a href="<?php echo base_url('Budget_officer/Home'); ?>" id = "Pages/Homepage"  
							class="dropdown-toggle no-arrow  <?php if($highlights === 'home') { echo 'active'; } ?>">
							<i class="icon-copy fa fa-home" aria-hidden="true"></i><span class="mtext">HOME</span>
						</a>
					</li>
				<?php } ?>
				
				<li>
					<a href="<?php echo base_url('Budget_officer/Obr'); ?>" class="dropdown-toggle no-arrow 
						<?php if($highlights === 'obr') { echo 'active'; } ?>">
						<i class="fa fa-paperclip" aria-hidden="true"></i><span class="mtext">OBR</span>
					</a>
				</li>

				<?php if ($this->session->userdata('level') != "BH_STAFF") { ?>
					<li>
						<a href="<?php echo base_url('Budget_officer/Logbook'); ?>" class="dropdown-toggle no-arrow
							<?php if($highlights === 'logbook') { echo 'active'; } ?> ">
							<i class="fa fa-bookmark" aria-hidden="true"></i><span class="mtext">LOGBOOK</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('Budget_officer/ControlNotebook'); ?>" class="dropdown-toggle no-arrow
							<?php if($highlights === 'notebook') { echo 'active'; } ?>">
							<i class="fa fa-book" aria-hidden="true"></i><span class="mtext">NOTEBOOK</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('Budget_officer/Report'); ?>" class="dropdown-toggle no-arrow
							<?php if($highlights === 'report') { echo 'active'; } ?>">
							<i class="fa fa-bar-chart" aria-hidden="true"></i><span class="mtext">REPORTS</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url('Budget_officer/Lbp'); ?>" class="dropdown-toggle no-arrow
							<?php if($highlights === 'lbp') { echo 'active'; } ?>">
							<i class="fa fa-list" aria-hidden="true"></i><span class="mtext">LBP</span>
						</a>
					</li>
				<?php } ?>	
			</ul>
		</div>
	</div>
</div>