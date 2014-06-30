
		<div class="row">
			<div class="large-12 column">
				<div class ="large-2 column">
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
				<div class="large-8 column">
					
					<?php foreach ($query->result_array() as $row): ?>
						<div class="panel">
						From: <?php echo $row['username']; ?> <br/>
						Message: <?php echo $row['body']; ?> <br/>
						<?php echo $row['senton']; ?><br/><br/>
						<a href="<?php echo base_url();?>index.php/messages/compose/<?php echo $row['userid']; ?>">Reply</a>
						</div>
						<?php echo form_open("index.php/messages/deleteInbox"); ?>
						<input type="hidden" name="messageid" value="<?php echo $row['messageid']; ?>" />
						<button type="submit">Delete</button>
						</form>
					<?php endforeach; ?>

					<?php foreach ($query2->result_array() as $row): ?>
						<div class="panel">
						To: <?php echo $row['username']; ?> <br/>
						Message: <?php echo $row['body']; ?> <br/>
						<?php echo $row['senton']; ?><br/><br/>
						</div>
						<?php echo form_open("index.php/messages/deleteSent"); ?>
						<input type="hidden" name="messageid" value="<?php echo $row['messageid']; ?>" />
						<button type="submit">Delete</button>
						</form>
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
