
			<div class="large-12 column">
				
				<div  class="large-12 column">
					<div class="row">
						<div class="large-2 column">
				<?php if(!$hide):?>
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
				<?php endif;?>
					</div>
						<div class="large-9 column" style="background-color:#f2f2f2;margin-right:5%;">
								
								<div class="large-4 column">
								<?php
									echo "<br/><img src=".base_url()."images/".$profile['pic']." style='height:200px;width:200px;'><br/>";
								?>
								</div>
								<div class="large-8 column">
								<?php

							echo "<br/>Name: ".$profile['firstname']." ".$profile['middlename']." ".$profile['lastname']."<br/><br/>";
							echo "Email: ".$profile['email']."<br/><br/>";
							echo "Phone Number: ".$profile['phonenum']."<br/><br/>";
							echo "Points: ".$profile['points']."<br/><br/>";
							echo "Profile views: ".$profile['views']."<br/><br/>asdasd";
							if($own){
								echo $this->session->userdata('comment');
							echo "Total Ads: ".($actAds+$exAds)."<br/><br/>";
							echo "Active Ads: ".$actAds."<br/><br/>";
							echo "Expired Ads: ".$exAds."<br/><br/>";
							echo "Sold Ads: ".$soldAds."<br/><br/>";
							echo "Total Subscibers: ".$subscribers->num_rows()."<br/><br/>";
							echo "Total Subsciptions: ".$subscribedTo->num_rows()."<br/><br/><br/><br/><br/>";
						}
						?>
								
						</div>
						</div>
						
					</div>
					<div style="margin-left:50%;">
					<?php if(!$own){
						echo "<a href='".base_url()."index.php/messages/compose/".$profile['userid']."'><button>Message Me!</button></a>";
					} ?>
					<?php if(!$subscribed && !$own):
						echo form_open_multipart('index.php/ads/subscribe');
					?>
					<input type="hidden" name = 'userid' value ='<?php echo $profile['userid'];?>'/>
					<button type="submit" onclick="return confirm('Are you sure?')">Subscribe</button>
					</form>
					<?php endif;?>
					<?php if($subscribed && !$own): ?>
						<input type="hidden" name = 'userid' value ='<?php echo $profile['userid'];?>'/>
						<button type="submit" onclick="return confirm('Are you sure?')">Unsubscribe</button>
					</form>
					<?php endif;?>
					<?php if(!$hide){
						echo "<a href='".base_url()."index.php/user/edit'><button type='submit'>Edit</button></a>";
					} ?>
					</div>
				</div>

				<div class = "row">
		    	<div class="large-12 columns">
		    	<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
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
