
			    <div class="row">
			    	<h1 style="font-size:30px;">Frequently Asked Questions</h1>
			    <div class="large-12 column">
				<div class="large-8 column"style="margin-left:5%;">
			    	<span style="font-size:16px;">
			    		<h3>How to register?</h3><br/>
						&nbsp;1.	Go to “Sign In or Register” at the top of the OneStopDeal page. <br/>
						&nbsp;2.	Click “Register” button.<br/>
						&nbsp;3.	Enter your information in the field. All the asterisk in the field must be filled.<br/>
						&nbsp;4.	Once you’re done, it would automatically send you the link at your email to confirm your registration.<br/><br/>
						
						<h3>Do I need an account to post an ad?</h3> <br/>
						&nbsp;Yes. You can only post an ad if you’re a registered user and already login in your account. <br/>

						<h3>How can I post an ad?</h3> <br/>
						&nbsp;1.	Go to “Sell” at the top of the OneStopDeal page.<br/>
						&nbsp;2.	Enter all the information of your ad in the field.<br/><br/>

						<h3>How long will my ad be online?</h3>
						&nbsp;It depends on what the seller placed on the ad duration, it can range from 7days to 30days, unless deleted by the seller.<br/><br/>

						<h3>How can I extend my ad?</h3>
						&nbsp;The site has a pointing system that can be used to extend an ad. You can accumulate the points through posting ad or buying points.<br/><br/>

						<h3>What is pointing system?</h3>
						&nbsp;Pointing system is a method we use to help the users to extend the duration of an ad, repost the ad that already expired or make it in the featured ad. To extend an ad the member must have 120 points, to repost ad 150 points and for the featured ad 300 points. All of this will give an ad of duration of 30days.<br/><br/>
			    		
						<h3>How can I acquire a point?</h3>
						&nbsp;You can acquire this points by either posting ad or buy points. For every ad a you post it is equivalent to 1 point, while on buying of points is different, to acquire 1 point is corresponds to 5 pesos. 50 pesos is the minimum amount you should pay to get a point. <br/><br/>

						<h3>Where can I view my ad?</h3>
						&nbsp;1.	Go to “Profile” at the top of the OneStopDeal page.<br/>
						&nbsp;2.	Go to “My Ads” at the right side of your profile page.<br/><br/>
						<h3>How can I delete my ad?</h3>
						&nbsp;1.	Go to “My Ads” at the right side of your profile page.<br/>
						&nbsp;2.	Click “View Ad” on the bottom of the ad you wish to delete. <br/>
						&nbsp;3.	At the bottom of the description of your ad there is a “Delete Ad” button.<br/><br/>
						<h3>How can I report fraud or fake items?</h3>
						&nbsp;If you find a seller that is selling fake items or determined that an ad is using fraudulent identity, please report the ad to Customer Service so we can take action and investigate the concern.<br/><br/>
						<h3>How can I upload a video?</h3>
						&nbsp;Just enter the video link in the field and it would automatically save on your ad.<br/><br/>
						</span>
					</div>
				</div>
			    </div>
			    <div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
			</div>
			
		</div>
		<!--Scripts -->
		<script type="text/javascript">
		
			$('#regions').change(function(){
				var regionName = $('#regions').find(":selected").val();
			//alert(regionName);
		   $.post( "<?php echo base_url();?>index.php/home/getProvinces", {regionID:regionName} ).done(function( data ) {
			//	alert(regionName+" Data Loaded: " + data );
				if(data=='added') alert('oheayh');
				else{
			//	alert(data);
				$('#provinces').html(data);
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
