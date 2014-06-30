
		    	<div class="row">
		    	<?php echo validation_errors();?>
			    </div>
			    <div class= "row">
			    	<div class="large-6 column">
			    		<span  style= "font-size:20px;color: red;"><?php echo $message; ?></span>
			    		<h2>Forgot Password</h2>
			    		<?php echo form_open('index.php/home/forget'); ?>
			    		<label>Enter Email</label>
			    		<input type="text" name="email">
			    		<Button type="submit"> Email Password </Button>
			    		</form>
			    	</div>
			    	<div class="large-6 column">
			    		
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
