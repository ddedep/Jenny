
		    	<?php if($query!=null): 
				foreach($query->result_array() as $row):
				?>
				<div class="row">
				<h3>Ad Details</h3>
				<?php echo validation_errors(); echo $message;?>
		    	</div>
		    		<?php echo form_open_multipart('index.php/Ads/edit/'.$adID); ?>

				<div class="row">
					<div class="small-6 columns">
    					<label>Category</label>
    					<select name="category">
							<option value="1">Men</option>
							<option value="2">Women</option>
							<option value="3" selected="selected">Children</option>
						</select>
    				</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
    					<label>City</label>
    					<select name="city">
							<option value="1">Makati</option>
							<option value="2">Quezon City</option>
							<option value="3" selected="selected">Manila</option>
						</select>
    				</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Ad Title</label>
						<input type="text" name="title" value ="<?php echo $row['title']; ?>">
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
						<textarea name="description" value =""><?php echo $row['body']; ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>Price</label>
						<input type="text" name="price" value ="<?php echo $row['price']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>image</label>
    					<label>upload photo(leave blank if you do not wish to change)</label>
    					
						<input type="file" name="userfile" size="20" value="<?php echo $row['imagelink']; ?>" />
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label>video link</label>
						<input type="text" name ="video" value="https://www.youtube.com/watch?v=<?php echo $row['videolink']; ?>">
					</div>
				</div>
				<input type="hidden"  name="imgname" value = "<?php echo $row['imagelink'] ?>" />
				<input type="submit">
				</form>
			</div>
			<?php break;endforeach;endif; ?>
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
