<div class="left-side-bar">
	<div class="bar">
		<a href="<?php echo base_url('Budget_head/Home'); ?>">
			<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
			<h1 class="sb-head text-orange"><b>LGU-BUDGET OFFICE</b></h1>
		</a>
	</div>
	<div class="menu-block customscroll" id="sidebar">
		<div class="title sidebar-menu" style="text-align:center; padding-bottom:0px;">
			<h5 style="color: lightgrey;"><?php echo $this->session->userdata('level'); ?></h5>
		</div>
		<div class="sidebar-menu" id="sidebar">
			<ul id="accordion-menu">
				<li>
					<a href="<?php echo base_url('Budget_head/Home'); ?>" class="dropdown-toggle no-arrow">
						<i class="icon-copy fa fa-home" aria-hidden="true"></i>
						<span class="mtext">HOME</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/Obr'); ?>" class="dropdown-toggle no-arrow">
						<i class="fa fa-paperclip" aria-hidden="true"></i><span class="mtext">OBR</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/Reports'); ?>" class="dropdown-toggle no-arrow">
						<i class="fa fa-bar-chart" aria-hidden="true"></i><span class="mtext">REPORTS</span>
					</a>
				</li>
				
				<li>
					<a href="<?php echo base_url('Budget_head/Lbp'); ?>" class="dropdown-toggle no-arrow">
						<i class="fa fa-list" aria-hidden="true"></i><span class="mtext">LBP</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/Logbook'); ?>" class="dropdown-toggle no-arrow">
						<i class="fa fa-bookmark" aria-hidden="true"></i><span class="mtext">LOGBOOK</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/CNotebook'); ?>" class="dropdown-toggle no-arrow">
						<i class="fa fa-book" aria-hidden="true"></i><span class="mtext">NOTEBOOK</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>