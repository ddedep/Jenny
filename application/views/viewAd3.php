		        
		        
		      	<div class="row">
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
						<a href="<?php echo base_url(); ?>index.php/messages/compose">Compose message</a><br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages">Inbox</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
					</div>
				<?php endif;?>
				</div>
		      	<div class="large-10 column">

		      	<h1>Ads:</h1>
		      		<?php if($query->num_rows()==0):
		      				echo form_open("index.php/ads/addToLookingFor");  
		      		 ?>
		      		 		<span style="font-size:30px;">No Ads for <span style="color:red"><?php echo $search; ?></span> yet</span> <br/>
		      		 		<input type="hidden" name="search" value="<?php echo $search;?>">
		      				<button type="submit">Add To Looking For</button>
		      			</form>

		      		<?php 
		      			endif;
		      		?>
		        		<?php


				        	foreach($query->result_array() as $row):
				        		$startDate = $row['insertedon'];
								$endDate = strtotime("+".$row['duration']." days",time($startDate));
								$formatted = date('m/d/Y',$endDate);
				        ?>
			      		<div class="large-4 columns">
								<div class= 'panel'>
								<img src="<?php echo base_url(); ?>images/<?php echo$row['imagelink']?>" style='height:200px;width:200px;'><br/>
								Title: <?php echo $row['title']?><br/><br/>
								Owner: <a href="<?php echo base_url()."index.php/user/view/".$row['userid']; ?>"><?php echo $row['username']?></a><br/><br/>
								Expires on: <?php echo $formatted; ?><br/><br/>
								Price: <?php echo $row['price'] ?> <br/><br/>
								<a href="<?php echo base_url()?>index.php/ads/view/<?php echo $row['adid'];?>">View Ad</a>
								</div>
						
			        	</div>
			        	<?php
							endforeach;
				        ?>
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
