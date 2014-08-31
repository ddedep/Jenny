<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>One Stop Deal</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	    <link rel="shortcut icon" href="../favicon.ico"> 
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.jscrollpane.css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		 <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
		 
	    <style type="text/css">
	    	 div.titles {
			    overflow: visible;
			}

	    </style>
	</head>

	<body>
		<div class= "large-12 columns">
			<!-- header -->
			<div class="row">
		      <div class="large-12 columns">
		       <div class = 'panel' style="font-size:15px;">
		       <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>img/logo.png" style="height:50px"></a>
		        	<?php if($username!=NULL) echo "<a href=".base_url()."index.php/user>"."Welcome ".$username."!&nbsp;	&nbsp;</a>"; 
		        	else{
		        		echo '<a href="';echo base_url().'index.php/home/login">'."Sign in or Register</a>&nbsp;	&nbsp";
		        		}  ?>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/ads">Post an Ad&nbsp;	&nbsp;</a>
		        	<span style="margin-left:500px;">
		        	
		        	<?php	
			        	if($username==NULL) echo ""; 
			        	else{
			        		echo '<a href="';echo base_url().'index.php/logout">'."<img src='".base_url()."img/logout.png' style='height:50px;' />Logout</a>&nbsp;	&nbsp";
			        		}
		        	?>
		        	</span>
		        </div>
		      </div>
		    </div>
