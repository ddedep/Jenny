
		    <div class="large-12 column">
		    	<div class="row">
		    		
		    		<div class="small-12 columns">
					<h1>Ad Details</h1>
					<h1><?php echo validation_errors(); echo $message;?></h1>
			    		<?php echo form_open_multipart('index.php/ads'); ?>
			    	</div>
		    	</div>
				<div class="row">
					<div class="small-6 columns">
    					<label>Category<span style="color:red;font-size:20px;">*</span></label>
    					<select name="category">
    						<option value="0" selected="selected">Categories</option>
					        <?php foreach ($categories->result_array() as $row):?>
					       	 <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname']; ?></option>
					    	<?php endforeach; ?>
						</select>
    				</div>
				</div>
				<div class="row">
							<div class="large-4 columns">
							<label>Regions<span style="color:red;font-size:20px;">*</span></label>
						      <select id= 'regions'>
						        <option value="0" selected="selected">Regions</option>
						      	<?php foreach ($regions->result_array() as $row):?>
						      	<?php if($row['regionid']==18){ ?>
						       	 <option value="<?php echo $row['regionid'];?>" selected><?php echo $row['regionname']; ?></option>
						       	<?php
						       	}
						       	else{
						       	?>
						       	<option value="<?php echo $row['regionid'];?>"><?php echo $row['regionname']; ?></option>
						       	<?php }?>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-4 columns">
					      		<label>Province/City<span style="color:red;font-size:20px;">*</span></label>
					      		 
						      <select id ='provinces' name='provinces'>
						      <option value="0" selected="selected">Provinces/City</option>
						      </select>
					      </div>
					      <div class="large-4 columns">
					      </div>
				</div>
				<div class="row">
					<div class="small-3 columns">
						<label>Ad Title<span style="color:red;font-size:20px;">*</span></label>
						<input type="text" name="title" id="title" maxlength="30" />
					</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
    					<label>Ad Duration<span style="color:red;font-size:20px;">*</span></label>
    					<select name="duration">
    						<option value="0" selected="selected">Duration</option>
							<option value="7">One Week</option>
							<option value="15">15 Days</option>
							<option value="30">30 Days</option>
						</select>
    				</div>
				</div>
				<div class="row">
					<div class="small-8 columns">
						<label>Description<span style="color:red;font-size:20px;">*</span></label>
						<textarea name="description" id="body" style="height:200px;"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Price<span style="color:red;font-size:20px;">*</span></label>
						<input type="text" name="price">
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>image</label>
    					<label>upload photos</label>
						<input type="file" name="files[]" />
			            <input type="file" name="files[]" />
			            <input type="file" name="files[]" />
			            <input type="file" name="files[]" />
			            <input type="file" name="files[]" />
			            <input type="file" name="files[]" />
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>video link</label>
						<input type="text" name ="video">
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<br/><br/><h1><Button type="submit" id="submit">Submit</Button></h1>
					</div>
				
				</div>
				</form>
			</div>

		</div>
		<div class = "row">
				
    			<div class="large-12 columns"><span style="color:red;font-size:20px;">*</span> = Required</div>
				
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
		</div>
		<!--Scripts -->
		<script type="text/javascript">
		var titles = [<?php foreach ($adsList->result_array() as $row){ echo '"'.$row['title'].'",';}?>];
		var body = [<?php foreach ($adsList->result_array() as $row){ echo '"'.$row['body'].'",';}?>];
		$("#title").click(function(){
		//	alert("fak");
		});
		/*$("#title").change(function(){
		//	alert($("#title").val());
			for (index = 0; index < titles.length; ++index) {
			    if(titles[index]!=$("#title").val())
			    {

			    	$("#submit").attr("disabled", 'false');
			    }
			    else
			    {
			    	alert($("#title").value());
			    	$("#submit").attr("disabled", 'true');
			    }
			}
		});*/
		$("#email").change(function(){

			for (index = 0; index < emails.length; ++index) {
			    if(emails[index]!=$("#email").val())
			    {
			    	$("#emark").attr("src","<?php echo base_url();?>img/good_mark.png");c
			    }
			    else
			    {
			    	$("#emark").attr("src","<?php echo base_url();?>img/bad_mark.png")
			    }
			}
		});


		
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
