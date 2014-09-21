
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
						<a href="<?php echo base_url() ?>index.php/messages">Inbox</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
					</div>
				<?php endif;?>
				</div>
			<div style="margin-left:25%">
				<?php echo $Message; 
					echo validation_errors();
				?>
				<?php echo form_open("index.php/messages/compose"); ?>
				<?php if($query->num_rows>0){
				foreach ($query->result_array() as $row):
					echo "To: <input type='text' name='recipient' value=".$row['username'].">"."</input><br/>";?>
					Message: <br/>
					<textarea name="message" style="height:300px;width:60%"></textarea><br/><br/>
					<button type="submit" style="margin-left:25%">Send</button>
				<?php 
					endforeach;
					}
					else
					{
				?>
						To:<img id="umark" src="<?php echo base_url();?>img/bad_mark.png" /> <input id="username" type='text' name='recipient' style="width:60%;" required /><br/>
						Message: <br/>
						<textarea name="message" style="height:300px;width:60%" required></textarea><br/><br/>
						<button type="submit" style="margin-left:25%">Send</button>
					<?php }?>
				</form>
			</div>
		</div>
		<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
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
	    <script type="text/javascript">
	    var usernames = ["",<?php foreach ($users->result_array() as $row){ echo '"'.$row['username'].'",';}?>];
	    $("#username").change(function(){
	    		
					for (index = 0; index < usernames.length; ++index) {
					    if(usernames[index]==$("#username").val())
					    {
					    	$("#umark").attr("src","<?php echo base_url();?>img/good_mark.png");
					    	break;
					    }
					    else
					    {
					    	$("#umark").attr("src","<?php echo base_url();?>img/bad_mark.png");
					    }
					}
				});
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
