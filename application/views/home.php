			<div class="large-3 column" style="width:220px;">
		    		<div class="panel">
		    			<label>Recent Searches:</label>
				    	<?php 
				    	$count=0;
				    	foreach ($search->result_array() as $row) {
				    		if($row['searchbody']!=''){
					    		echo "<a href='".base_url()."index.php/ads/search/".$row['searchbody']."'>".$row['searchbody']."</a><br />";
					    		$count++;
					    	}
				    		if($count==5) break;
				    	} 
				    	?>
		    		</div>
		    		
		   	</div>
		   	<div>
		   	
		    <div class="row">
			    <!-- Search -->
			   	<div class="row">
			   		<div class="large-9 columns">
			   			<?php echo form_open('index.php/ads/search'); ?>
				   		<div class="large-12 columns">
					        <input type="text" id ="autocomplete" name="search"  required>
					    </div>
					      <div class="large-4 columns">
						      <select name="category">
						        <option value="0" selected="selected">Categories</option>
						        <?php foreach ($categories->result_array() as $row):?>
						       	 <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-4 columns">
						      <select id= 'regions' name = 'region'>

						      	<option value="0" selected="selected">Regions</option>
						      	<?php foreach ($regions->result_array() as $row):?>
						       	 <option value="<?php echo $row['regionid'];?>"><?php echo $row['regionname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-4 columns">
						      <select id ='provinces' name='province'>
						      	<option value="0" selected="selected">Provinces/City</option>
						      </select>
					      </div>
				      </div>
				       <div class="large-3 columns">
				      	<button type="submit">Search</button>
				      </div>
				      </form>
		      	</div>     		      
		    </div>
		    <!-- Carousel -->
		    <div class = "row">
		    	
		    	<div class="large-12">
				    <div class="container">
						<h1>Featured Ads</h1>
						<div id="ca-container" class="ca-container">
							<div class="ca-wrapper">
								<?php
									foreach($query->result_array() as $row):
								?>
								<div class="ca-item">
									<div class="ca-item-main">
										<div class="ca-icon" style="width:233px;
												height:189px;
												position:relative;
												margin:0 auto;
												background:transparent url(<?php echo base_url()."images/".$row['imagelink']; ?>) no-repeat center center;">
										</div>
										<h3><?php echo $row['title']; ?></h3>
										<h4>
											<span>Price:<?php echo $row['price'];?></span>
											<span>By:<a href="<?php echo base_url();?>index.php/user/view/<?php echo $row['userid'];?>" style="color:blue;"><?php echo $row['username'];?></a></span>

										</h4>
											<a href="<?php echo base_url(); ?>index.php/ads/view/<?php echo $row['adid']; ?>" class="ca-more">more...</a>
									</div>
									
								</div>
							<?php
							endforeach;
							?>
							</div>
						</div>
					</div>
				</div>
		    </div>
		    <div class="row">
		    	<h1>Top Ads</h1>
		    	<div class="large-12 columns">
		    	<?php $count=0; $top=array(); ?>
		    	<?php foreach ($topAds->result_array() as $toprow){
		    		$top[$count] = $toprow;
		    		$count++;
		    	} ?>
		    	<?php for ($i=0; $i < 4 && $i<$count; $i++):?>
		 
		    			<div class="large-3 columns" style="height:300px; margin:0 auto;">
		    				<div class="ca-item-main">
		    				<div class="ca-icon" style="width:233px;
										height:189px;
										position:relative;
										margin:0 auto;
										background:transparent url(<?php echo base_url()."images/".$top[$i]['imagelink']; ?>) no-repeat center center;">
							</div>
							<div class="ca-item">
								<h4 style="font-weight:bold;"><?php  
									
									echo $top[$i]['title']; 
								?>
								</h4>
								<span>Price:Php <?php echo $top[$i]['price'];?></span><br/>
								<span>By:<a href="<?php echo base_url();?>index.php/user/view/<?php echo $top[$i]['userid'];?>" style="color:blue;"><?php echo $top[$i]['username'];?></a></span><br/>
								<a href="<?php echo base_url(); ?>index.php/ads/view/<?php echo $top[$i]['adid'];?>" style="position: relative;
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
		    			</div>
		    		
		    	<?php endfor;?>
		    	</div>
		    </div>
		    <div class="row">
		    	<h1>Recent Ads</h1>
		    	<div class="large-12 columns">
		    	<?php $count=0; $rec=array(); ?>
		    	<?php foreach ($recent->result_array() as $recrow){
		    		$rec[$count] = $recrow;
		    		$count++;
		    	} ?>
		    	<?php for ($i=0; $i < 4 &&  $i<$count; $i++):?>
		 
		    			<div class="large-3 columns" style="height:300px; margin:0 auto;">
		    				<div class="ca-item-main">
		    				<div class="ca-icon" style="width:233px;
										height:189px;
										position:relative;
										margin:0 auto;
										background:transparent url(<?php echo base_url()."images/".$rec[$i]['imagelink']; ?>) no-repeat center center;">
							</div>
							<div class="ca-item">
								<h4 style="font-weight:bold;"><?php  
									
									echo $rec[$i]['title']; 
								?>
								</h4>
								<span>Price:Php <?php echo $rec[$i]['price'];?></span><br/>
								<span>By:<a href="<?php echo base_url();?>index.php/user/view/<?php echo $rec[$i]['userid'];?>" style="color:blue;"><?php echo $rec[$i]['username'];?></a></span><br/>
								<a href="<?php echo base_url(); ?>index.php/ads/view/<?php echo $rec[$i]['adid'];?>" style="position: relative;
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
		    			</div>
		    		
		    	<?php endfor;?>
		    	</div>

		    <!--footer -->
		    <div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
		</div>
		<!--Scripts -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

	    <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.mockjax.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>src/jquery.autocomplete.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>scripts/countries.js"></script>
		<script type="text/javascript">
		$(function () {
		    'use strict';
		    var searches = {
		    	<?php 
		    	$count=0;
		    	foreach ($search->result_array() as $row) {
		    		echo '"'.$row['searchid'].'":"'.$row['searchbody'].'",';
		    		$count++;
		    		if($count==10) break;
		    	} 
		    	?>

		    };
		    var countriesArray = $.map(searches, function (value, key) { return { value: value, data: key }; });


		    // Initialize autocomplete with local lookup:
		    $('#autocomplete').autocomplete({
		        lookup: countriesArray,
		        minChars: 0,
		        onSelect: function (suggestion) {
		            $('#selection').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        }
		    });
		});

		</script>
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
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
		
	</body>
</html>
