<div class="left-side-bar">
	<div class="bar">
		<a href="<?php echo base_url('Superuser/Home'); ?>">
			<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
			<h1 class="text-orange"><b>LGU-BUDGET OFFICE</b></h1>
		</a>
	</div>
	<div class="menu-block customscroll" id="sidebar">
		<div class="title sidebar-menu" style="text-align:center; padding-bottom:0px;">
			<h5 style="color: lightgrey;">ADMIN</h5>
		</div>
		<div class="sidebar-menu" id="sidebar">
			<ul id="accordion-menu">
				<li>
					<a href="<?php echo base_url('Superuser/Home')?>" class="dropdown-toggle no-arrow <?php if($highlights === 'Home') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-home" aria-hidden="true"></i>
						<span>HOME</span>
					</a>
				</li>
				
				<li>
					<a href="<?php echo base_url('Superuser/Department')?>" class="dropdown-toggle no-arrow <?php if($highlights === 'Department') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-building" aria-hidden="true"></i>
						<span>DEPARTMENT</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Superuser/Expenditure')?>" class="dropdown-toggle no-arrow <?php if($highlights === 'Expenditure') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-bar-chart" aria-hidden="true"></i>
						<span>EXPENDITURE</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Superuser/Account')?>" class="dropdown-toggle no-arrow <?php if($highlights === 'Account') { echo 'active'; } ?>">
						<i class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
						<span>ACCOUNTS</span>
					</a>
				</li>
				<!-- <li>
					<a href="Assignation" class="dropdown-toggle no-arrow">
						<i class="icon-copy fa fa-users" aria-hidden="true"></i>
						<span>ASSIGNATION</span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>