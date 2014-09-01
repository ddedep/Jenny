
		<div class="row">
			<div class="large-12 column">
				
				<div  class="large-3 column">
					<div class="row">
						<div class="large-12 column" style="background-color:#f2f2f2;margin-left:5%;">
								
								<div class="large-12 column">
								<?php
									echo "<br/><img src=".base_url()."images/".$profile['pic']." style='height:200px;width:200px;'><br/>";
								?>
								<?php

									echo "<br/>Name: ".$profile['firstname']." ".$profile['middlename']." ".$profile['lastname']."<br/><br/>";
									echo "Email: ".$profile['email']."<br/><br/>";
									echo "Phone Number: ".$profile['phonenum']."<br/><br/>";
									echo "Points: ".$profile['points']."<br/><br/>";
									echo "Profile views: ".$profile['views']."<br/><br/>";
									if($own){
									echo "Total Ads: ".($actAds+$exAds)."<br/><br/>";
									echo "Active Ads: ".$actAds."<br/><br/>";
									echo "Expired Ads: ".$exAds."<br/><br/>";
									echo "Sold Ads: ".$soldAds."<br/><br/>";
									echo "Total Subscibers: ".$subscribers->num_rows()."<br/><br/>";
									echo "Total Subsciptions: ".$subscribedTo->num_rows()."<br/><br/><br/><br/><br/>";
								}
								?>
									<?php if(!$own){
										if($this->session->userdata('logged_in'))
										{
											echo "<a href='".base_url()."index.php/messages/compose/".$profile['userid']."'><button>Message Me!</button></a>";
										}
										else
										{
											echo "<a href='".base_url()."index.php/messages/compose/".$profile['userid']."'><button>Message Me!</button></a>";
										}
									} ?>
									<?php if(!$subscribed && !$own && $this->session->userdata('logged_in')):
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
								</div>	
						</div>
						
					</div>
					
				</div>
				<div class="large-9 columns">
		        	<h1>Ads:</h1>
		        	
		        		<?php


				        	foreach($ads->result_array() as $row):
				        		$startDate = $row['adinsertedon'];
								$endDate = strtotime("+".$row['duration']." days",time($startDate));
								$formatted = date('m/d/Y',$endDate);
				        ?>
				        
			      		<div class="large-4 column">
								<div class= 'panel'>
								<img src="<?php echo base_url(); ?>images/<?php echo$row['imagelink']?>" style='height:200px;width:200px;'><br/>
								Title: <?php echo $row['title']?><br/><br/>
								Expires on: <?php echo $formatted; ?><br/><br/>
								Price: <?php echo $row['price'] ?> <br/><br/>
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
				        ?>

		        	</div>
		       			
				<div class = "row">
		    	<div class="large-12 columns">
		    		<br/>
		    		<br/>
		    		<br/>
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
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
