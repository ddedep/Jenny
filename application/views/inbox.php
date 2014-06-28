
		<div class="row">
			<div style="margin-left:25%">
				<div class="large-8 column">
					
					<?php foreach ($messages->result_array() as $row): ?>
						<div class="panel">
						From: <?php echo $row['username']; ?> <br/>
						Message:<br/><?php echo $row['body']; ?> <br/>
						<?php echo $row['insertedon']; ?>
						</div>
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
    </body>
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
