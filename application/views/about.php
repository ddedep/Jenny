
			    <div class="row">
					<div class="large-8 column"><span style="font-size:16px;">
			    	<a name="about"><h1 style="font-size:30px;">About</h1></a>
					OneStopDeal.com is a website customized for Filipinos to buy and sell online. All ads are posted by <br/>our members and we do not involve ourselves in transactions between buyers and sellers. <br/><br/>
					Membership in, and/or usage of, OneStopDeal.com is voluntary. Using and accessing our site means <br/>that you have read, understood and agreed to all the rules and regulations set by MVY Buy & Sell.<br/><br/>

					<a name="rules"><h1 style="font-size:30px;">General Rules</h1></a>
					OneStopDeal.com is a buy and sell website that serves as a channel to both buyers and sellers to find<br/> and make their own deal. This is a community-based system that allows users to control their account<br/> and moderate as well the post of other members. Forums for different issues are available for all<br/> account owners in order to alert other users for dealers who are not trustworthy or they think is in<br/> violation of any of the rules and policies set by the OneStopDeal.com administrators.<br/><br/> 
					Membership registration in OneStopDeal.com is not forced. All the members of the website<br/> voluntarily created their own accounts and therefor it means that they have read, understood and<br/> agreed to the rules and policies of the website including the all amendments, additions, revisions, etc.,<br/> which the administrators can modify anytime.<br/><br/> 
					OneStopDeal.com is an open to all website and promotes safe advertising. In order to achieve and<br/> sustain this goal of the website, all the information to be specified in the website must follow the rules<br/> below. OneStopDeal.com has the right to suspend or delete any accounts, advertisements, forum,<br/> comments, etc., that would violate any of these conditions:<br/><br/> 
					* No offensive materials/contents that would lead to any form of violence. <br/>
					* No sexual items or adult contents. <br/>
					* No brutal, improper or offensive language. <br/>
					* No hateful and discriminating comments. <br/>
					* No services that are considered illegal by the law. <br/>
					* No reference and at the same time no replicas of an original item protected by copyright or any form of ownership is allowed. <br/>
					Note: Anything that the OneStopDeal.com administrators consider as violation can lead to rightful punishments.<br/><br/><br/>

					<a name="terms"><h1 style="font-size:30px;">Terms of Use</h1></a>
					<br /><br />1.	Acceptance of Terms of Use and Agreement
					Using and accessing OneStopDeal.com (“our website”) means that you have read, understood and agreed to follow these Terms of Use. Terms of Use may change time to time with or without prior notice to its users.


					<br /><br />2. User Account
					Each user is generally allowed only one (1) active member account. You are responsible for the security of your account including your username and password. We are strongly recommending that you won’t share your username or password with another user. 
					<br /><br />3. Your Obligations
					When you are using OneStopDeal.com (“our website”), you agree to provide truthful information when requested, and be at least eighteen (18) years old. You will be responsible for everything you post to the website. Your own posts do not reflect on how MVY Buy & Sell’s image. You bear all responsibilities for your posts.
					You also explicitly agree that you will comply with the following restrictions:
					<br />(a)You shall not provide OneStopDeal.com with any content that is considered unlawful, illegal, threatening, harassing, abusive, obscene, offensive, vulgar, libelous, or which may violent a local or international law.
					<br />(b)You will not collect or use any information from any users without their consent. 
					<br />(c)You will not impersonate other people. 

					<br /><br />4. Indemnification
					<br />You agree to indemnify us from any claim or demand that may be made any third party due to your conduct or connection with OneStopDeal.com (“our service”). 
					<br /><br /><a name="disclaimer">5. Disclaimer</a>
					<br />OneStopDeal.com takes no responsibility from any consequence due to the actions, or lack of actions, you have done using our website’s services. Any content you provide is at your own risk. We make no warranty that no part of our system will be virus-free, uninterrupted, timely, secure, accurate or reliable.

					<a name="privacy"><h1 style="font-size:30px;">Privacy Policy</h1></a>
					<br><br>OneStopDeal.com respects each individual’s right to personal privacy.	 
					<br><br>OneStopDeal.com collects information through our website. We mainly collect our visitor’s name and e-mail address. We collect other information mainly from our registration forms.  All information collected is not mandatory. 
					<br><br>Information collected by OneStopDeal.com will be used for the purpose of getting in touch with the members. These involved sending notifications about his ads.
					<br><br>All information offered at our forum, however, becomes public knowledge.
					<br><br>Members have the option to change their own personal information at any given time. 
					<br><br>If any problems might arise, we have our customer support tab in which the members may submit their concerns. <br><br>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>
					</span>
			    </div>
			    <div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
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
