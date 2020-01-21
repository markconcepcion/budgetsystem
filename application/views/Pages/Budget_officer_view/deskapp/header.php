<div class="pre-loader"></div>
<div class="header-right bar">
	<div class="menu-icon">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<a class="sb-toggle s-right hide" style="left:0px !important;"><button class="btn btn-warning right">
		<i class="icon-copy fa fa-chevron-right" aria-hidden="true" style="margin-right: -10px !important;"></i>
		<i class="icon-copy fa fa-chevron-right" aria-hidden="true"></i>
	</button></a>
	<a class="sb-toggle s-left"><button class="btn btn-warning left">
		<i class="icon-copy fa fa-chevron-left" aria-hidden="true"></i>
		<i class="icon-copy fa fa-chevron-left" aria-hidden="true" style="margin-left: -10px !important;"></i>
	</button></a>
	<div class="user-info-dropdown">
		<div class="dropdown">
			<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
				<span class="user-icon orange"><i class="fa fa-user-o orange"></i></span>
				<span class="user-name orange"><?php echo $uprofile['USR_FNAME'],' ',$uprofile['USR_MNAME'],' ',$uprofile['USR_LNAME']; ?></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right box-shadow">
				<a class="dropdown-item" href="<?php echo base_url('Budget_officer/Profile')?>"><i class="fa fa-user-md" aria-hidden="true"></i>Profile</a>
				<?php if ($this->session->userdata('roleCode') == 3) { ?>
					<a class="dropdown-item" href="<?php echo base_url('BH')?>"><i class="fa fa-user" aria-hidden="true"></i> Login as Budget Head</a>
				<?php } ?>
				<a class="dropdown-item" href="<?php echo base_url('Login/Logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
			</div>
		</div>
	</div>
</div>
