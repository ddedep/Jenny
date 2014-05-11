<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Capstone </title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	    <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
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
		    <div class="row">
		    	<div class="large-12 columns">
		    	<div class="panel">
					<h1>Register With Us</h1>
					<?php echo $err;?>
					<?php echo validation_errors(); ?>	
				</div>
		    	</div>
				
			</div>
		    <div class = "row">
		    	<div class ="large-12 columns">
		    		<?php echo form_open('index.php/register'); ?>
		    			<div class="medium-5 columns">
			    			<label>First Name</label>
			    			<input type="text" name="firstname">
		    			</div>
		    			<div class="medium-3 columns">
			    			<label>Middle Name</label>
			    			<input type="text" name="middlename">
		    			</div>
		    			<div class="medium-4 columns">
			    			<label>Last Name</label>
			    			<input type="text" name="lastname">	
		    			</div>
		    	
		    	<div class="large-12 columns">
    				<div class="medium-4 columns">
    					<label>Phone Number</label>
    					<input type="text" name = "phonenumber">
    				</div>
    			</div>
    			<div class="large-12 columns">
    				<div class="medium-4 columns">
    					<label>Birthdate</label>
    					<input type="text" name = "birthdate">
    				</div>
    			</div>

    				<div class="medium-4 columns">
    					<label>Postal Code</label>
    					<input type="text" name ="postalcode">
    				</div>
    				<div class="medium-4 columns">
    					<label>Region</label>
    					<select></select>
    				</div>
    				<div class="medium-4 columns">
    					<label>City</label>
    					<select></select>
    				</div>
    			
    			
    				<div class="large-12 columns">
    				<label>Address</label>
    				<input type="text" name ="address">
    				</div>
    			
    				<div class="large-6 columns">
    				<label>Username</label>
    				<input type="text" name="username">
    				</div>
    			
    			
    				<div class="large-8 columns">
    				<label>Email</label>
    				<input type="text" name="email">
    				</div>

    			
    				<div class="large-6 columns">
    				<label>Password</label>
    				<input type="password" name="password">
    				</div>
    			
    			
    				<div class="large-6 columns">
    				<label>Confirm Password</label>
    				<input type="password" name="passwordconfirm">
    				</div>
    				<div class="large-8 columns">
    					<input type="checkbox">
    					<label>Lorem ipsum</label>
    				</div>
    				<div class="large-8 columns">
    					<input type="submit">
    				</div>

    				</form>
    			</div>
		    </div>
		</div>
		<!--Scripts -->
		<script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
	    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
	    <script>
	      $(document).foundation();
	    </script>
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
	</body>
</html>
