
		<div class="row">
			<div class="large-12 column">
				<div class="large-2 column">
					<div class="panel">
						<h5>Menu</h5>
						<a href="<?php echo base_url() ?>index.php/ads/view">My Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewExpired">Expired Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewSold">Sold Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/userSubscription">Subscription</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/subscription">Subscribed Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewFavorites">My Favorites</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/globe/charge">Buy Points</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewWish">Looking for</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages">Inbox(<?php echo $unread ?>)</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
					</div>
				</div>
				<div class="large-8 column">
					
					<?php foreach ($messages->result_array() as $row): ?>
						<div class="panel">
						To: <a href="<?php echo base_url();?>index.php/user/view/<?php echo $row['userid']; ?>"><?php echo $row['username']; ?></a> <br/>
						<?php echo $row['senton']; ?> <br/><br/>
						<a href="<?php echo base_url();?>index.php/messages/view2/<?php echo $row['messageid']; ?>">View Message</a>
						</div>
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
		<div class = "row" style="margin-bottom:0;">
		    	<div class="large-12 columns" style="margin-bottom:0;">
		    	<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
								<br />
				<br />
				<br />
				<br />
				<br />
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
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
