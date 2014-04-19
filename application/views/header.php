<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Capstone </title>
		
	<!--load bootstrap -->
		<link href="<?php echo base_url() ?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>css/math.css" rel="stylesheet">	
	<!--loading flat UI -->
		<link href="<?php echo base_url() ?>css/flat-ui.css" rel = "stylesheet">
	<!--[if lt IE 9]>
	<script  src= "js/html5shiv.js"></script>
	<![endif]-->
	</head>
	
	<body>
		<div class="menu-class">
		<div class="navbar navbar-inverse">
			<div class="nav-header">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-collapse-02"></button>
			</div>
			<div class="navbar-collapse collapse navbar-collapse-02">
				<ul class="nav navbar-nav navbar-left">
					<!-- Menu Items -->

					<li><a href="<?php echo base_url()?>index.php/auth">Home</a></li>
					<li>
						<a href="#">ads</a>
						<ul>
						<li><a href="<?php echo base_url()?>index.php/ads">View Ads</a></li>
						<li><a href="<?php echo base_url()?>index.php/ads/createads">Create Ads</a></li>	
						</ul>
					</li>
					
					
					<!-- end of menu -->
				</ul>
			</div>
		</div>
		</div>
