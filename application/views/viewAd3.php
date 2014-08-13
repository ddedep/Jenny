		        
		        
		      	<div class="row">
		      	
		      		<div class="large-12 columns">
			   			<?php echo form_open('index.php/ads/search'); ?>
					   		<div class="large-10 columns">
						        <input type="text" id ="autocomplete" name="search">
						    </div>
					     	 <div class="large-3 columns">
						      <select name="category">
						        <option value="0" selected="selected">Categories</option>
						        <?php foreach ($categories->result_array() as $row):?>
						       	 <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-3 columns">
						      <select id= 'regions' name = 'region'>

						      	<option value="0" selected="selected">Regions</option>
						      	<?php foreach ($regions->result_array() as $row):?>
						       	 <option value="<?php echo $row['regionid'];?>"><?php echo $row['regionname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-3 columns">
						      <select id ='provinces' name='province'>
						      	<option value="0" selected="selected">Provinces/City</option>
						      </select>
					      </div>
					      <div class="large-3 columns">
					      	<button type="submit">Search</button>
					      </div>
				      	</form>
				    </div>
					       
					      	<h1>Ads:</h1>
					      		<?php if($query->num_rows()==0):
					      				echo form_open("index.php/ads/addToLookingFor");  
					      		 ?>
		      		 		<div class="panel"><span style="font-size:30px;margin-left:40%"><img src="<?php echo base_url(); ?>img/Warning_icon.svg" style="height:50px;" />No ads for <span style="color:red"><?php echo $search; ?></span> yet</span></div> <br/>
		      		 		<input type="hidden" name="search" value="<?php echo $search;?>">
		      				<div style="margin-left:40%"><button type="submit">Add To Looking For</button></div>
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
								
								Price: <?php echo $row['price'] ?> <br/><br/>
								<a href="<?php echo base_url()?>index.php/ads/view/<?php echo $row['adid'];?>">View Ad</a>
								</div>
						
			        	</div>
			        	<?php
							endforeach;
				        ?>
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
		//	alert(regionName);
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
