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
		      <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>img/MIT-Seal.png" style="height:50px"></a>
		        	<?php if($username!=NULL) echo "Welcome ".$username."!&nbsp;	&nbsp;"; 
		        	else{
		        		echo '<a href="';echo base_url().'index.php/home/login">'."Sign in or Register</a>&nbsp;	&nbsp";
		        		}  ?>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/user">Profile&nbsp;	&nbsp;</a>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/Ads">Sell&nbsp;	&nbsp;</a>	|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/support">Customer Support</a>&nbsp;	&nbsp;|
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
		    		<?php echo form_open_multipart('index.php/register'); ?>
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
    			<div class="medium-9 columns">
    				<div class="medium-4 columns">
    					<label>Birthdate</label>
    					<select name="month">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="medium-4 columns">
						<label>Day</label>
						<?php
						$options = array();
						for($i=1;$i<=31;$i++)
						{
							$options[''.$i] = $i;
						}

						echo form_dropdown('day', $options,'1');
						?>
					</div>
					<div class="medium-3 columns">
						<label>Year</label>
						<?php
						$option = array();
						for($i=0;$i<=100;$i++)
						{
							$option[''.$i+1914] = $i+1914;
						}
						$selected = array('2000');

						echo form_dropdown('year', $option,'2000');
						?>
    					
    				</div>
    			</div>

    				<div class="medium-4 columns">
    					<label>Postal Code</label>
    					<input type="text" name ="postalcode">
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
    				<div class="large-6 columns">
    					<label>upload photo</label>
						<input type="file" name="userfile" size="20" />
    				</div>
    				<div class="large-8 columns">
    					<input type="checkbox">
    					<label>Lorem ipsum</label>
    				</div>
    				
    				<div class="large-8 columns">
    					<Button type="submit"> Register! </Button>
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
