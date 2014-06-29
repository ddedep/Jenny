
		    <div class="row">
				<h3>Ad Details</h3>
				<?php echo validation_errors(); echo $message;?>
		    		<?php echo form_open_multipart('index.php/ads'); ?>

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
						      <select id= 'regions'>
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
						      <select id ='provinces' name='provinces'>
						      </select>
					      </div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Ad Title</label>
						<input type="text" name="title">
					</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
    					<label>Ad Duration</label>
    					<select name="duration">
							<option value="7">One Week</option>
							<option value="15">15 Days</option>
							<option value="30" selected="selected">30 Days</option>
						</select>
    				</div>
				</div>
				<div class="row">
					<div class="small-8 columns">
						<label>Description</label>
						<textarea name="description"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Price</label>
						<input type="text" name="price">
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>image</label>
    					<label>upload photo</label>
    					
						<input type="file" name="userfile" size="20" />
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>video link</label>
						<input type="text" name ="video">
					</div>
				</div>
				<Button type="submit">Submit</Button>
				</form>
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
