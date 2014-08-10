
		    	<div class="row">
				<h1>Welcome</h1>
			    </div>
			    <div class= "row">
			    	<div class="large-6 column">
			    		<span style= "color: red;"><?php echo $err; ?></span>
			    		<h2>Sign in</h2>
			    		<?php echo form_open('index.php/home/login'); ?>
			    		<label>Email or Username</label>
			    		<input type="text" name="username" required>
			    		<label>Password</label>
			    		<input type="password" name="password" required>
			    		<Button id="login" type="submit"> Sign in </Button>
			    		</form>
			    		<a href="<?php echo base_url(); ?>index.php/home/forget"><button>Forgot Password</button></a>
			    	</div>
			    	<div class="large-6 column">
			    		<h4>New?</h4>
			    		<a href="<?php echo base_url(); ?>index.php/register"><button>Register</button></a>

			    	</div>
			    </div>
			</div>
		</div>
		<!--Scripts -->
		<script type="text/javascript">
				$('#login').click(function() {
					//$("#register").attr("disabled", !this.checked);
				});
		</script>
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
