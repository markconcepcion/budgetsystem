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
				<span class="user-name orange"><?php echo $this->session->userdata('user_name');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right box-shadow">
				<a class="dropdown-item" href="<?php echo base_url('Budget_head/Profile')?>"><i class="fa fa-user-md" aria-hidden="true"></i>Profile</a>
				<a class="dropdown-item" href="<?php echo base_url('Login/Logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
			</div>
		</div>
	</div>
</div>
