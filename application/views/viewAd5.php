		        
		        
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
					<div class="large-3 columns">
						<div class="panel">
							<h2>Price Range:</h2><br/>
								<a href="#" id="p250">Php 0-250</a><br/><br/>
								<a href="#" id="p500">Php 251-500</a><br/><br/>
								<a href="#" id="p1000">Php 501-1000</a><br/><br/>
								<a href="#" id="pUp">Php 10001-up</a><br /><br/>
								<a href="#" id="showAll">All</a><br /><br/>
								<div style="float:left;">Php</div><input id="from" type="text" style="padding:0px;height:20px;width:50px;font-size:10px;margin:0px;float:left;"/><div style="float:left;"> &nbsp to &nbsp</div><input id="to" type="text" style="padding:0px;float:left;height:20px;width:50px;font-size:10px;margin:0px;"/><br/><br/><a href="#"><input id="rangefilter" type="submit" style="height:20px;width:45px;margin-left:50px;font-size:12px;"/></a><br/><br/><br/>
						</div>
						<div class="panel">
							<h2>Date Range:</h2><br/>
								<a href="#" id="today">Today</a><br/><br/>
								<a href="#" id="days">3 Days</a><br/><br/>
								<a href="#" id="week">Week</a><br/><br/>
								<a href="#" id="month">Month</a><br /><br/>
								<a href="#" id="showAll">All</a><br /><br/>
						</div>
					</div>
					<div class="large-9 columns">
					      	<h1>Ads:</h1>
					      		<?php if($query->num_rows()==0):
					      				echo form_open("index.php/ads/addToLookingFor");  
					      		 ?>
		      		 		<div class="panel"><span style="font-size:30px;margin-left:40%"><img src="<?php echo base_url(); ?>images/Warning_sign.png" alt="<?php echo base_url(); ?>img/nophoto.jpg" style="height:50px;" />No ads to Display</span></div> <br/>
		      			</form>

		      		<?php 
		      			endif;
		      		?>
		        		<?php


				        	foreach($query->result_array() as $row):
				        		$startDate = $row['adinsertedon'];
				        		$date1 = new DateTime();
				        //		echo $startDate;
				        		
								$endDate = strtotime("+".$row['duration']." days",time($startDate));
								$formatted = date('m/d/Y',$endDate);
				        ?>
			      		<div class="large-4 columns">
								<div class= 'panel' style="overflow:hidden;">
								<a href="<?php echo base_url()?>index.php/ads/view/<?php echo $row['adid'];?>"><img src="<?php echo base_url(); ?><?php if($row['imagelink1']!=''){ echo 'images/'.$row['imagelink1'];} else{echo 'img/nophoto.jpg';}?>"style='height:200px;width:200px;'></a><br/>
								Title: <?php echo $row['title']?><br/><br/>
								Owner: <a href="<?php echo base_url()."index.php/user/view/".$row['userid']; ?>"><?php echo $row['username']?></a><br/><br/>
										<span class="date" style="display: none;"><?php echo $date1->diff(new DateTime($startDate))->d;?></span>
								Price: <span class="price"><?php echo $row['price'] ?></span> <br/><br/>
								<span>Posted On: <?php
												$date = new DateTime($row['adinsertedon']);
												echo $date->format('m-d-Y');
											 ?></span><br/><br/>
								<a href="<?php echo base_url()?>index.php/ads/view/<?php echo $row['adid'];?>">View Ad</a>
								</div>
						
			        	</div>
			        	<?php
							endforeach;
				        ?>
		        	</div>
		        </div>
		        
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
			//price ranges
			$("#p250").click(function(){
				$("span.price").each(function(){
					$(this).parent().hide();
				});
				$("span.price").each(function(){
					if(Number($(this).text())<=250){
						$(this).parent().show();
					}
				});
			});

			$("#p500").click(function(){
				$("span.price").each(function(){
					$(this).parent().hide();
				});
				$("span.price").each(function(){
					if(Number($(this).text())<=500 && Number($(this).text())>250){
						$(this).parent().show();
					}
				});
			});
			$("#p1000").click(function(){
				$("span.price").each(function(){
					$(this).parent().hide();
				});
				$("span.price").each(function(){
					if(Number($(this).text())<=1000 && Number($(this).text())>500){
						$(this).parent().show();
					}
				});
			});
			$("#pUp").click(function(){
				$("span.price").each(function(){
					$(this).parent().hide();
				});
				$("span.price").each(function(){
					if(Number($(this).text())>1000){
						$(this).parent().show();
					}
				});
			});
			$("#rangefilter").click(function(){
				
				$("span.price").each(function(){
					$(this).parent().hide();
				});
				$("span.price").each(function(){
					if(Number($(this).text())>=Number($("#from").val()) && Number($("#to").val())>=Number($(this).text())){
						$(this).parent().show();
					}
				});
			});
			//date range
			$("#today").click(function(){
				$("span.date").each(function(){
					$(this).parent().hide();
				});
				$("span.date").each(function(){
					if(Number($(this).text())<=1){
						$(this).parent().show();
					}
				});
			});

			$("#days").click(function(){
				$("span.date").each(function(){
					$(this).parent().hide();
				});
				$("span.date").each(function(){
					if(Number($(this).text())<=3){
						$(this).parent().show();
					}
				});
			});
			$("#week").click(function(){
				$("span.date").each(function(){
					$(this).parent().hide();
				});
				$("span.date").each(function(){
					if(Number($(this).text())<=7){
						$(this).parent().show();
					}
				});
			});
			$("#Month").click(function(){
				$("span.date").each(function(){
					$(this).parent().hide();
				});
				$("span.date").each(function(){
					if(Number($(this).text())<=30){
						$(this).parent().show();
					}
				});
			});
			$("#showAll").click(function(){
				$("span").each(function(){
					$(this).parent().show();
				});
			});

			//regions
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
