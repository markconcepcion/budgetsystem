	<title>LGU-Budget System</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/fonts/font-awesome/css/afont-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/fonts/font-awesome/css/afont-awesome.min.css">
	
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>

	<style>
		#sidebar, .left-side-bar{ 
			background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
			background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%); 
			min-height: 550px;
		}
			
		.hide{ display:none; }
	
		.menu-icon {
			background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
			background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
		}
		.menu-icon span{ background: orange; }

		.orange, .dropdown-toggle::after { color: orange !important; }
		.user-info-dropdown .dropdown-toggle .user-icon { color: orange !important; border: 1px solid orange; }
		.btn-warning {
			background-color: #ff9900;
			border-color: #ff9900;
		}
		.btn-secondary {
			background-color: rgb(152, 107, 218);
			border-color: rgb(152, 107, 218);
		}

		.text-blue{ color: rgb(152, 107, 218); }
		a:hover{ color: #ff9900 !important; }

		.forscroll{
			overflow-y: auto;
			height: 400px;
		}

		.mod_head{
			margin-left: 70px;
		}
		
		.bar
		{
			width: 100%;
			height: 10%;
			border: 1px solid #080808;
			background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
			background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
			color: white;
		}

		.logo
		{
			width: 50px;
			height: 50px;
			position: absolute;
			border-radius: 50%;
			left: 5%;
			top: 10px;
		}
		h1
		{
			font-size: 15px;
			margin-left: 28%;
			margin-top: 35px;
		}

		.sidebar-menu .dropdown-toggle, .sidebar-menu .dropdown-toggle .fa{
			color: lightgrey !important;
		}

		.sidebar-menu .dropdown-toggle.active, .sidebar-menu .dropdown-toggle.active .fa{
			color: white;
			background: orange;
		}
		.sidebar-menu .dropdown-toggle:hover, .sidebar-menu .show > .dropdown-toggle {
			background: lightgrey;
			color: orange !important;
		}
		.sidebar-menu .dropdown-toggle:hover .fa, .sidebar-menu .show > .dropdown-toggle .fa {
			color: orange !important;
		}

		.box-shadow{
			border-top: 2px solid black;
			border-bottom: 5px solid #d49f00;
			border-left: 1.25px solid black;
			border-right: 1.25px solid black;
		}

		.line-shadow {border-bottom: 5px solid #d49f00; }
		.dash{ 
			padding: 0;
			max-width: 10px;
		}
		.exp-acct-code {
			padding-right: 6px !important;
    		padding-left: 6px !important;
		}
		.acct-code{
			padding-right: 0px !important;
    		padding-left: 2px !important;
			max-width: 40px;
		}
		.customscroll {
			background-image: url('<?php echo base_url('assets/as.jpg'); ?>');
			background-size: cover;
		}

		.nav.vtabs{
			border-right: 1px solid rgb(152, 107, 218);
		}
	</style>
