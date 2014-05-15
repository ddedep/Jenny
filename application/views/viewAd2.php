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
		<div class="row">
		
			<div class="large-8 column">
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
		      
		      		
		        	<?php

		        	foreach($query->result_array() as $row):
					
						echo "<h1>".$row['title']."</h1>";
					?>
					<?php
						echo "<h4>Description</h4>";
						echo "<div class= 'panel'>";
						echo '<iframe width="420" height="345"';
						echo ' src="//www.youtube.com/embed/'.$row['videolink'].'"" frameborder="0">';
						echo '</iframe><br/>';
						echo "<img src=".base_url()."images/".$row['imagelink']." style='height:200px;width:200px;'><br/>";
						echo "Title: ".$row['title']."<br/><br/>";
						echo "Duration: ".$row['duration']." Days<br/><br/>";
						echo "Price: ".$row['price']."<br/><br/>";
						echo "About: ".$row['body']."<br/><br/>";
						echo "</div>";
						endforeach;
					?>
					<?php
						echo form_open_multipart('index.php/ads');
						echo "<input name = 'owner' type='hidden' value='".$row['owner']."''></input>";
					?>
					<input type="submit" value='subscribe' />
					</form>
					<?php echo form_open_multipart('index.php/ads'); ?>
						<label>Name</label>
						<input type="text" />
						<label>Email</label>
						<input type="text" />
						<label>Contact Number</label>
						<input type="text" />
						<label>Message</label>
						<textarea name="description"></textarea>
						<button type="submit">Submit</button> 
					</form>
		       
		        

		      </div>
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
