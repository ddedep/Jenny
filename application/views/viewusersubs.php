		<div class="row">
			<div class="large-12 column">
			<div class="large-2 column">
				<?php if(!$hide):?>
					<div style="large-2 column">
						<div class="panel">
							<h5>Menu</h5>
							<a href="<?php echo base_url() ?>index.php/ads/view">My Ads</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/ads/viewExpired">Expired Ads</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/user/userSubscription">Subscription</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/user/subscription">Subscription Ads</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/ads/viewFavorites">My Favorites</a> <br/><br/>
							<a href="">Buy Points</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/ads/viewWish">Looking for</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/messages">Inbox</a> <br/><br/>
							<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
						</div>
					</div>
				<?php endif;?>
			</div>
			<div class="large-9 column">
	        	<h1>Subscribed to:</h1>
	      
	        	<?php
	        	foreach($query->result_array() as $row):
				?>
					<div class="large-4 column">
						<div class="panel">
							<?php echo "<img src=".base_url()."images/".$row['picture']." style='height:200px;width:200px;'><br/>"; ?>
							Username:<?php echo $row['username']; ?><br/>
							Number of Ads: <?php echo $totalAds[$row['userid']]; ?> <br/>
							<a href="<?php echo base_url();?>index.php/messages/compose/<?php echo $row['userid']; ?>">Message</a>
						</div>
					</div>
				
				<?php
					endforeach; 
		        ?>
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
