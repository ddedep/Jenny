
		    <div class="row">
			    <!-- Search -->
			   	<div class="row">
			   		<div class="large-9 columns">
			   			<?php echo form_open('index.php/ads/search'); ?>
				   		<div class="large-12 columns">
					        <input type="text" id ="tags" name="search">
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
						      <select id= 'regions'>

						      	<option value="0" selected="selected">Regions</option>
						      	<?php foreach ($regions->result_array() as $row):?>
						       	 <option value="<?php echo $row['regionid'];?>"><?php echo $row['regionname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-4 columns">
						      <select id ='provinces' name='province'>
						      	<option value="0" selected="selected">provinces</option>
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
									<span class="ca-quote">&ldquo;</span>
									<span><?php echo $row['body'];?></span>
								</h4>
									<a href="<?php echo base_url(); ?>/index.php/ads/view/<?php echo $row['adid']; ?>" class="ca-more">more...</a>
							</div>
							
						</div>
					<?php
					endforeach;
					?>
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
		    	<?php for ($i=0; $i < 4; $i++):?>
		    		<div class="row">
		    			<?php for ($j=0; $j <3 ; $j++):?> 
		    			<?php if(($i*3)+($j+1)<$count): ?>
		    			<div class="large-4 columns" style="height:450px; margin:0 auto;">
		    				<div class="ca-item-main">
		    				<div class="ca-icon" style="width:233px;
										height:189px;
										position:relative;
										margin:0 auto;
										background:transparent url(<?php echo base_url()."images/".$top[(($i*3))+($j)]['imagelink']; ?>) no-repeat center center;">
							</div>
							<div class="ca-item">
								<h3><?php  
									
									echo $top[($i*3)+($j+1)]['title']; 
								?>

								</h3>
								<span><?php echo $top[($i*3)+($j+1)]['body']; ?></span><br/>
								<a href="http://localhost/Jenny/index.php/ads/view/<?php echo $top[($i*3)+($j+1)]['adid'];?>" style="position: relative;
										font-weight: bold;
										background: #ccbda2;
										text-align: center;
										color: white;
										font-family: 'Georgia','Times New Roman',serif;
										font-style: italic;
										text-shadow: 1px 1px 1px #897c63;">more...</a>
									<?php endif; ?>
							</div>
							
							</div>
		    			</div>
		    			<?php endfor; ?>
		    		</div>
		    	<?php endfor;?>
		    	</div>
		    </div>
		    <!--footer -->
		    <div class = "row">
		    	
		    </div>
		</div>
		<!--Scripts -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
		
		 <script>
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
