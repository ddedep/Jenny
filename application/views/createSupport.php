	
		    	<div class="row">
		    	<div class="large-12 column">
		    	
 				<div class="large-8 columns" style="margin-left:18%;">
					<h1>Support Details</h1>
					<?php echo validation_errors(); echo $message;?>
			    		<?php echo form_open_multipart('index.php/support/createSupport'); ?>

					<div class="row">
						<div class="small-6 columns">
							<label>Support Title</label>
							<input type="text" name="title" required>
						</div>
					</div>
					
					<div class="row">
						<div class="small-8 columns">
							<label>Body</label>
							<textarea name="body" style="height:300px;" required></textarea>
						</div>
					</div>
					<br/><h1><button type="submit">Submit</button></h1>
					</form>
				</div>
				</div>
			</div>
			<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
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
