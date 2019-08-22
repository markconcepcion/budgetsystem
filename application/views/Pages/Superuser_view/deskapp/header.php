<div class="pre-loader"></div>
<div class="header-right bar">
	<div class="menu-icon">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div class="user-info-dropdown">
		<div class="dropdown">
			<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
				<span class="user-icon orange"><i class="fa fa-user-o orange"></i></span>
				<span class="user-name orange"><?php echo $uprofile['USR_FNAME'],' ',$uprofile['USR_LNAME']; ?></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right box-shadow">
				<a class="dropdown-item" href="<?php echo base_url('Superuser/Profile')?>"><i class="fa fa-info-circle" aria-hidden="true"></i>Profile Information</a>
				<a class="dropdown-item" data-toggle="modal" data-target="#logout-modal" href=""><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a>
			</div>
		</div>
	</div>
</div>