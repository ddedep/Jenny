
		    	<?php if($query->num_rows()>0): 
				foreach($query->result_array() as $rowz):
				?>

				<div class="row">
				<h3>Ad Details</h3>
				<?php echo validation_errors(); echo $message;?>
		    		<?php echo form_open_multipart('index.php/ads/edit'); ?>
<input type="hidden" name="adID" value="<?php echo $adID; ?>" >
				<div class="row">
					<div class="small-6 columns">
    					<label>Category</label>
    					<select name="category">
					        <?php foreach ($categories->result_array() as $row):?>
					       	 <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname']; ?></option>
					    	<?php endforeach; ?>
						</select>
    				</div>
				</div>
				<div class="row">
							<div class="large-4 columns">
							<label>Regions</label>
						      <select id= 'regions'>
						      	<?php foreach ($regions->result_array() as $row):?>
						       	 <option value="<?php echo $row['regionid'];?>"><?php echo $row['regionname']; ?></option>
						    	<?php endforeach; ?>
						      </select>
					      </div>
					      <div class="large-4 columns">
					      	<label>Provinces/City</label>
						      <select id ='provinces' name='provinces'>
						      	<option value="0">-------</option>
						      </select>
					      </div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Ad Title</label>
						<input type="text" name="title" value = "<?php echo $rowz['title']?>">
					</div>
				</div>
				<div class="row">
					<div class="small-8 columns">
						<label>Description</label>
						<textarea name="description"><?php echo $rowz['body']?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Price</label>
						<input type="text" name="price" value="<?php echo $rowz['price']?>">
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>image</label>
    					<label>upload photos</label>
						<input type="file" name="userfile[]" />
			            <input type="file" name="userfile[]" />
			            <input type="file" name="userfile[]" />
			            <input type="file" name="userfile[]" />
			            <input type="file" name="userfile[]" />
			            <input type="file" name="userfile[]" />
			 
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>video link</label>
						<input type="text" name ="video" value="https://www.youtube.com/watch?v=<?php echo $rowz['videolink']?>">
					</div>
				</div>
				<input type="hidden" name='duration' value="<?php echo $rowz['duration']?>">
				<Button type="submit" onclick="return confirm('Are you sure?')">Submit</Button>
				</form>
			</div>
			<?php break;endforeach;endif; ?>
			<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
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
