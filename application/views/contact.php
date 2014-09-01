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
 			<div class="large-12 columns" >
 				<h1>Contact Us</h1>
 				<div class="large-8 column"style="margin-left: 18%;">
	 				<?php echo validation_errors(); echo $message;?>
				<?php echo form_open_multipart('index.php/home/contactUs'); ?>
					<label>Name</label>
					<input type="text" name="name" />
					<label>Email</label>
					<input type="text" name="email"/>
					<label>Contact Number</label>
					<input type="text" name="contact"/>
					<label>Message</label>
					<textarea name="body" style="height:250px;"></textarea>
					<h1><button type="submit" >Submit</button></h1>
				</form>
		       
		      </div>
			</div>
			<div class="large-4 columns">
			</div>
		</div>
		<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		</div>
		
		<!--Scripts -->
		<script type="text/javascript">
			var username = "<?php echo $this->session->userdata('username'); ?>";
			var body = $('#comment').val();
		//	alert(body);
		//	var time = $.now();
			$('#postComment').click(function(){
			//	alert(body);
			   $.post( "<?php echo base_url();?>index.php/ads/comment", {adid:<?php echo $row['adid'];?>, body:$('#comment').val()} ).done(function( data ) {
				//alert( "Data Loaded: " + data );
				if(data=='added') alert('oheayh');
				else{
					
			//	alert(data);
					$('#commentArea').html("<div class='panel'>"+username+" wrote: <br/><i>"+$('#comment').val()+"<br/></i><i>"+data+"</i></div>"+$('#commentArea').html());
					$('#comment').attr('value','');
				}
				});
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
