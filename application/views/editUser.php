
		    <?php foreach ($query->result_array() as $row): ?>
		    <div class="row">
		    	<div class="large-12 columns">
		    	<div class="panel">
					<h1>Edit Profile</h1>
					<?php echo $err;?>
					<?php echo validation_errors(); ?>	
				</div>
		    	</div>
				
			</div>

		    <div class = "row">
		    	<div class ="large-12 columns">
		    		<?php echo form_open_multipart('index.php/user/edit'); ?>
		    			<div class="medium-5 columns">
			    			<label>First Name</label>
			    			<input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
		    			</div>
		    			<div class="medium-3 columns">
			    			<label>Middle Name</label>
			    			<input type="text" name="middlename" value="<?php echo $row['middlename']; ?>">
		    			</div>
		    			<div class="medium-4 columns">
			    			<label>Last Name</label>
			    			<input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">	
		    			</div>
		    	
		    	<div class="large-12 columns">
    				<div class="medium-4 columns">
    					<label>Phone Number</label>
    					<input type="text" name = "phonenumber" value="<?php echo $row['phonenum']; ?>">
    				</div>
    			</div>
    			<div class="medium-9 columns">
    				<div class="medium-4 columns">
    					<label>Birthdate</label>
    					<?php 
    						$bdate=explode("-", $row['birthdate']);
    						
							//echo $as[1];
    						$months = array(
			                  '1' => 'January',
			                  '2' => 'February',
			                  '3' => 'March',
			                  '4' => 'April',
			                  '5' => 'May',
			                  '6' => 'June',
			                  '7' => 'July',
			                  '8' => 'August',
			                  '9' => 'September',
			                  '10' => 'October',
			                  '11' => 'November',
			                  '12' => 'December',
			                );

							echo form_dropdown('month', $months, $bdate[0]);
    					?>
					</div>
					<div class="medium-4 columns">
						<label>Day</label>
						<?php
						$options = array();
						for($i=1;$i<=31;$i++)
						{
							$options[''.$i] = $i;
						}

						echo form_dropdown('day', $options,$bdate[0]);
						?>
					</div>
					<div class="medium-3 columns">
						<label>Year</label>
						<?php
						$option = array();
						for($i=0;$i<=100;$i++)
						{
							$option[''.$i+1914] = $i+1914;
						}
						$selected = array('2000');

						echo form_dropdown('year', $option,$bdate[0]);
						?>
    					
    				</div>
    			</div>

    				<div class="medium-4 columns">
    					<label>Postal Code</label>
    					<input type="text" name ="postalcode" value="<?php echo $row['postalcode']; ?>">
    				</div>
    				
    			
    			
    				<div class="large-12 columns">
    				<label>Address</label>
    				<input type="text" name ="address" value="<?php echo $row['address']; ?>">
    				</div>    			
    			
    				<div class="large-8 columns">
    				<label>Email</label>
    				<input type="text" name="email" value="<?php echo $row['email']; ?>">
    				</div>

    			
    				<div class="large-6 columns">
    					<label>Update photo(leave blank if you do not wish to update)</label>
						<input type="file" name="userfile" size="20" />
    				</div>
    				    				
    				<div class="large-8 columns">
    					<Button type="submit"> Update! </Button>
    				</div>

    				</form>
    			</div>
		    </div>
		    <?php endforeach; ?>
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
