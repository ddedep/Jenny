<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Capstone </title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	    <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.jscrollpane.css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />
	    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
	</head>
	<body>


		<div class= "large-12 columns">
			<!-- header -->
			<div class="row">
		      <div class="large-12 columns">
		        <div class = 'panel'>
		        	<?php if($username!=NULL) echo "Welcome ".$username."!&nbsp;	&nbsp;"; 
		        	else{
		        		echo '<a href="';echo base_url().'index.php/home/login">'."Sign in or Register</a>&nbsp;	&nbsp";
		        		}  ?>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/user">Profile&nbsp;	&nbsp;</a>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/Ads">Sell&nbsp;	&nbsp;</a>	|&nbsp;	&nbsp;<a href="">Customer Support</a>&nbsp;	&nbsp;|
		        	<?php	
			        	if($username==NULL) echo ""; 
			        	else{
			        		echo '<a href="';echo base_url().'index.php/logout">'."logout</a>&nbsp;	&nbsp";
			        		}
		        	?>
		        </div>
		      </div>
		    </div>
		 	<div class= "row">
		 		<h1>Page Does Not exist</h1>
		 	</div>
		</div>
		<!--Scripts -->
		<script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
	    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
	    <script>
	      $(document).foundation();
	    </script>
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
	</body>
</html>
