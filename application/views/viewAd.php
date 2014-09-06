					<div class="row">
					<div class="large-12 column">
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
					<div class="large-10 columns">
		        	<h1>Ads:</h1>
		        		<?php


				        	foreach($query->result_array() as $row):
				        		$startDate = $row['adinsertedon'];
								$endDate = strtotime("+".$row['duration']." days",time($startDate));
								$formatted = date('m/d/Y',$endDate);
				        ?>
			      		<div class="large-4 columns">
								<div class= 'panel'>
								<a href="<?php echo base_url()?>index.php/ads/view/<?php echo $row['adid'];?>"><img src="<?php echo base_url(); ?>images/<?php if($row['imagelink1']!=""){echo $row['imagelink1'];}else{echo "nophoto.jpg";}?>" style='height:200px;width:200px;'></a><br/>
								Title: <?php echo $row['title']?><br/><br/>
								Expires on: <?php echo $formatted; ?><br/><br/>
								Price: <?php echo $row['price'] ?> <br/><br/>
								<span>Posted On: <?php
												$date = new DateTime($row['adinsertedon']);
												echo $date->format('m-d-Y');
											 ?></span><br/><br/>
								<a href="<?php echo base_url(); ?>index.php/ads/view/<?php echo $row['adid'];?>" style="position: relative;
										margin-left: 75px;
										font-weight: bold;
										background: #ccbda2;
										text-align: center;
										color: white;
										font-family: 'Georgia','Times New Roman',serif;
										font-style: italic;
										text-shadow: 1px 1px 1px #897c63;">more...</a>
								
								</div>
						
			        	</div>
			        	<?php
							endforeach;
							if($query->num_rows() == 0)
							{
								echo "<span style='font-size:20px;'>No Ads found!</span>";
							}
				        ?>

		        	</div>
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
