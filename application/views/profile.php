
			<div class="large-12 column">
				<div class="large-2 column">
				<?php if(!$hide):?>
					<div class="panel">
						<h5>Menu</h5>
						<a href="<?php echo base_url() ?>index.php/ads/view">My Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewExpired">Expired Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/userSubscription">Subscription</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/subscription">Subscription Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewFavorites">My Favorites</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/globe/charge">Buy Points</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewWish">Looking for</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages">Inbox</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
					</div>
				<?php endif;?>
				</div>
				<div  class="large-10 column">
					<div class="row">
						<div class="large-4 column">
						<div class="panel">
						<?php
							echo "<img src=".base_url()."images/".$profile['pic']." style='height:200px;width:200px;'><br/>";
						?>
						</div>
						</div>
						<div class= "large-12 column">
						<div class="panel">
						<?php
							echo "Name: ".$profile['firstname']." ".$profile['middlename']." ".$profile['lastname']."<br/><br/>";
							echo "Email: ".$profile['email']."<br/><br/>";
							echo "Phone Number: ".$profile['phonenum']."<br/><br/>";
							echo "Points: ".$profile['points']."<br/><br/>";
							if($own){
							echo "Total Ads: ".($actAds+$exAds)."<br/><br/>";
							echo "Active Ads: ".$actAds."<br/><br/>";
							echo "Expired Ads: ".$exAds."<br/><br/>";
						}
						?>
						</div>
						</div>
						
					</div>
					<?php if(!$own){
						echo "<a href='".base_url()."index.php/messages/compose/".$profile['userid']."'><button>Message Me!</button></a>";
					} ?>
					<?php if(!$subscribed && !$own):
						echo form_open_multipart('index.php/ads/subscribe');
					?>
					<input type="hidden" name = 'userid' value ='<?php echo $profile['userid'];?>'/>
					<button type="submit">Subscribe</button>
					</form>
					<?php endif;?>
					<?php if($subscribed && !$own): ?>
						<button type="submit" disabled="true">Already Subscribed!</button>
					<?php endif;?>
					<?php if(!$hide){
						echo "<a href='".base_url()."index.php/user/edit'><button type='submit'>Edit</button></a>";
					} ?>
					
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
