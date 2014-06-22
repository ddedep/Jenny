	
		    	<div class="row">
 				<div class="large-8 columns" style="margin-left: 20%;">
				<h3>Support Details</h3>
				<?php echo validation_errors(); echo $message;?>
		    		<?php echo form_open_multipart('index.php/support/createSupport'); ?>

				<div class="row">
					<div class="small-6 columns">
						<label>Support Title</label>
						<input type="text" name="title">
					</div>
				</div>
				
				<div class="row">
					<div class="small-8 columns">
						<label>Body</label>
						<textarea name="body"></textarea>
					</div>
				</div>
				<button type="submit">Submit</button>
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
