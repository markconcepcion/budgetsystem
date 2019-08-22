<div class="left-side-bar">
	<div class="bar">
		<a href="<?php echo base_url('Department_head/Home'); ?>">
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
					<a href="<?php echo base_url('Budget_officer/Home'); ?>" id = "Pages/Homepage"   class="dropdown-toggle no-arrow sb">
						<i class="icon-copy fa fa-home" aria-hidden="true"></i><span class="mtext">HOME</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_officer/Obligation_request'); ?>" id = "Pages/ObligationRequest_view" class="dropdown-toggle no-arrow sb">
						<i class="fa fa-paperclip" aria-hidden="true"></i><span class="mtext">OBR</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_officer/Logbook/index/'.date('Y')); ?>" id = "Pages/Logbook_logs" class="dropdown-toggle no-arrow sb">
						<i class="fa fa-bookmark" aria-hidden="true"></i><span class="mtext">LOGBOOK</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_officer/ControlNotebook'); ?>" id = "Pages/ControlNotebook_view" class="dropdown-toggle no-arrow sb">
						<i class="fa fa-book" aria-hidden="true"></i><span class="mtext">NOTEBOOK</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/Lbp/index/1'); ?>" id = "Pages/Logbook_logs" class="dropdown-toggle no-arrow sb">
						<i class="fa fa-list" aria-hidden="true"></i><span class="mtext">LBP</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Budget_head/Reports'); ?>" id = "Pages/ControlNotebook_view" class="dropdown-toggle no-arrow sb">
						<i class="fa fa-bar-chart" aria-hidden="true"></i><span class="mtext">REPORT</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>