<html>
	<head>
			<title>Homepage</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jcss/HOME_CSS.css'); ?>">
			
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core.js"></script>
	</head>

	<body>
		<div class="bar">
			<img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="logo">
			<img src="<?php echo base_url('assets/jimage/profile-icon.png'); ?>" class="profile">
			<img src="<?php echo base_url('assets/jimage/settings-icon.png'); ?>" class="settings">
			<h1>LGU-BUDGET OFFICE</h1>
			<div class="search-container">
					<form>
						<input type="text" placeholder="Search.." name="search">
						<button type="submit" id="submit">Submit</button>
					</form>
			</div>
		</div>
			
		<div id="sidebar">
			<ul>
				<a href="<?php echo base_url('Main/Home'); ?>"><li class="HOME">HOME</li></a>

				<?php if($this->session->userdata('level') === "BUDGET HEAD" || $this->session->userdata('level') === "BUDGET OFFICER"  ): ?>
					<a href="<?php echo base_url('ControlNotebook/index/'.$this->session->userdata('dept')); ?>"><li class="NOTEBOOK">NOTEBOOK</li></a>
					<a href="<?php echo base_url('Obligation_request/obr_list_view'); ?>"><li>OBR</li></a>
					<a href=""><li>FORMS</li></a>
					<a href=""><li>REPORTS</li></a>
					<a href="<?php echo base_url('Logbook'); ?>"><li>LOGS</li></a>
				<?php endif; ?> 
				
				<?php if($this->session->userdata('level') === "DEPARTMENT HEAD"): ?>
					<a href="<?php echo base_url('Forms/lbp_form_2'); ?>"><li>SUBMIT LBP</li></a>
					<a href="<?php echo base_url('Forms/obr_form_index'); ?>"><li>SUBMIT OBR</li></a>
					<a href="<?php echo base_url('ControlNotebook/index/'.$this->session->userdata('dept')); ?>"><li>VIEW EXPENDITURES</li></a>
				<?php endif; ?> 

			</ul>
		</div>