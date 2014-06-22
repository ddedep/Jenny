				<div class="row">
 			<div class="large-8 columns" style="margin-left: 20%;">
		      <a href="<?php echo base_url()?>index.php/support/createSupport"><button>Create Support</button></a>
		     
		      <?php foreach($query->result_array() as $row):	?>
						<div class= 'panel'>
						<h2>Support <?php echo $row['support_id']; ?></h2>
						Title: <?php echo $row['title']; ?><br/><br/>
						<?php echo $row['body']; ?><br/><br/>
						By: <?php echo $row['username']; ?><br/><br/>
						<a href="<?php echo base_url(); ?>/index.php/support/view/<?php echo $row['support_id'];?>">View Comments</a>
						</div><br />

			<?php endforeach; ?>
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
