<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 01.03.2017. -->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="ArchiveWeb - Evidencije državnog arhiva">
	<meta name="author" content="Sebastijan Legović">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
	<title>ArchiveWeb</title>

	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<!-- jQuery UI 1.11.4 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
	<!-- AdminLTE -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>">
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
	<!-- FusionCharts XT Trial -->
	<script src="<?php echo base_url('assets/fusioncharts/fusioncharts.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fusioncharts/fusioncharts.charts.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fusioncharts/fusioncharts.theme.zune.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fusioncharts/app.js'); ?>"></script>

</head>
<body class="hold-transition skin-black-light sidebar-mini" data-base-url="<?php echo base_url(); ?>">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url(); ?>" class="logo">
				<?php $logo=(setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
				<span class="logo-lg"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
			</a>
			<nav class="navbar navbar-static-top">
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
							$profile_pic='user.png';
							if(isset($this->session->userdata('user_details')[0]->profile_pic) && file_exists('assets/images/'.$this->session->userdata('user_details')[0]->profile_pic))
							{
								$profile_pic=$this->session->userdata('user_details')[0]->profile_pic;
							}?>
							<img src="<?php echo base_url().'assets/images/'.$profile_pic;?>"  class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo isset($this->session->userdata('user_details')[0]->name)?$this->session->userdata('user_details')[0]->name:'';?></span>
						</a>
						<ul class="dropdown-menu" role="menu" style="width: 164px;">
							<li><a href="<?php echo base_url('user/profile');?>"><i class="fa fa-user mr10"></i>Moj profil</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off mr10"></i>Odjava</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<?php?>
					<?php $this->load->view("include/menu");?>
				</ul>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-cogs"></i> <span>Administracija</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
					<?php
					if(CheckPermission("user", "own_read")){ ?>
						<li class="<?=($this->router->method==="userTable")?"active":"not-active"?>">
							<a href="<?php echo base_url();?>user/userTable"> <i class="fa fa-circle-o"></i> <span>Korisnici aplikacije</span></a>
						</li>
					<?php } if(isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type == 'admin'){ ?>
						<li class="<?=($this->router->class==="setting")?"active":"not-active"?>">
							<a href="<?php echo base_url("setting"); ?>"><i class="fa fa-circle-o"></i> <span>Korisničke ovlasti</span></a>
						</li>
					<?php }
					if(CheckPermission("user", "own_read")){ ?>
						<li class="<?=($this->router->class==="audit_log")?"active":"not-active"?>">
							<a href="<?php echo base_url("audit_log"); ?>"><i class="fa fa-circle-o"></i> <span>Bilježenje akcija korisnika</span></a>
						</li>
						<?php }
						?>
					</ul>
				</li>
			</ul>
		</section>
	</aside>
