
		    	<div class="row">
				<h1>Please enter the verification code sent to your mobile phone and E-mail</h1>
			    </div>
			    <div class= "row">
			    	<div class="large-6 column">
			    		<span style= "color: red;"><?php echo $err; ?></span>
			    		<h2>Enter Verification code:</h2>
			    		<?php echo form_open('index.php/register/verify'); ?>
			    		<label>Verification Code</label>
			    		<input type="text" name="code">
			    		<Button type="submit"> Verify </Button>
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
