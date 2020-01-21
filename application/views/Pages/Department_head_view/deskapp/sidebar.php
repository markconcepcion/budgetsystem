<div class="left-side-bar">
	<div class="bar">
		<a href="<?php echo base_url('Department_head/Home'); ?>">
			<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
			<h1 class="sb-head text-orange"><b>LGU-Budget Office</b></h1>
		</a>
	</div>
	
	<div class="menu-block customscroll" id="sidebar">
		<div class="title sidebar-menu" style="text-align:center; padding-bottom:0px;">
			<h5 style="color: lightgrey;"><?php echo ucwords(strtoupper($uprofile['DPT_NAME'])); ?></h5>
			<h6 style="color: lightgrey;">(DEPARTMENT HEAD)</h6> 
		</div>
		<div class="sidebar-menu" id="sidebar">
			<ul id="accordion-menu">
				<li>
					<a href="<?php echo base_url('Department_head/Home'); ?>" class="dropdown-toggle no-arrow <?php if($highlights === 'home') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-home" aria-hidden="true"></i>
						<span>HOME</span>
					</a>
				</li>						
				<li>
					<a href="<?php echo base_url('DH/LBP/'.$this->session->userdata('dept')); ?>" class="dropdown-toggle no-arrow <?php if($highlights === 'lbp') { echo 'active'; } ?>">
						<i class="fa fa-list" aria-hidden="true"></i>
						<span>SUBMIT LBP</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Department_head/Obligation_request'); ?>" class="dropdown-toggle no-arrow <?php if($highlights === 'obr') { echo 'active'; } ?>">
						<i class="fa fa-paperclip" aria-hidden="true"></i>
						<span>SUBMIT OBR</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Department_head/Notebook'); ?>" class="dropdown-toggle no-arrow <?php if($highlights === 'notebook') { echo 'active'; } ?>">
						<i class="fa fa-bar-chart" aria-hidden="true"></i>
						<span>VIEW EXPENDITURE</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>