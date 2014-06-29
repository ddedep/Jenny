
		    <div class="row">
		    	<div class="large-12 columns">
		    	<div class="panel">
					<h1>Register With Us</h1>
					<?php echo $err;?>
					<?php echo validation_errors(); ?>	
				</div>
		    	</div>
				
			</div>
		    <div class = "row">
		    	<div class ="large-12 columns">
		    		<?php echo form_open_multipart('index.php/register'); ?>
		    			<div class="medium-5 columns">
			    			<label>First Name<span style="color:red;font-size:20px;">*</span></label>
			    			<input type="text" name="firstname">
		    			</div>
		    			<div class="medium-3 columns">
			    			<label>Middle Name</label>
			    			<input type="text" name="middlename">
		    			</div>
		    			<div class="medium-4 columns">
			    			<label>Last Name<span style="color:red;font-size:20px;">*</span></label>
			    			<input type="text" name="lastname">	
		    			</div>
		    	
		    	<div class="large-12 columns">
    				<div class="medium-4 columns">
    					<label>Cellphone Number(+639XXXXXXXXX)<span style="color:red;font-size:20px;">*</span></label>
    					<input type="text" name = "phonenumber">
    				</div>
    			</div>
    			<div class="medium-9 columns">
    				<div class="medium-4 columns">
    					<label>Birthmonth<span style="color:red;font-size:20px;">*</span></label>
    					<select name="month">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="medium-4 columns">
						<label>Day<span style="color:red;font-size:20px;">*</span></label>
						<?php
						$options = array();
						for($i=1;$i<=31;$i++)
						{
							$options[''.$i] = $i;
						}

						echo form_dropdown('day', $options,'1');
						?>
					</div>
					<div class="medium-3 columns">
						<label>Year<span style="color:red;font-size:20px;">*</span></label>
						<?php
						$option = array();
						for($i=0;$i<=84;$i++)
						{
							$option[''.$i+1914] = $i+1914;
						}
						$selected = array('1998');

						echo form_dropdown('year', $option,'2000');
						?>
    					
    				</div>
    			</div>
  			
    			
    				<div class="large-12 columns">
    				<label>Address<span style="color:red;font-size:20px;">*</span></label>
    				<input type="text" name ="address">
    				</div>
    			
    				<div class="large-6 columns">
    				<label>Username<span style="color:red;font-size:20px;">*</span></label>
    				<input type="text" name="username">
    				</div>
    			
    			
    				<div class="large-8 columns">
    				<label>Email<span style="color:red;font-size:20px;">*</span></label>
    				<input type="text" name="email">
    				</div>

    			
    				<div class="large-6 columns">
    				<label>Password(minimum 6 characters)<span style="color:red;font-size:20px;">*</span></label>
    				<input type="password" name="password">
    				</div>
    			
    			
    				<div class="large-6 columns">
    				<label>Confirm Password<span style="color:red;font-size:20px;">*</span></label>
    				<input type="password" name="passwordconfirm">
    				</div>
    				<div class="large-6 columns">
    					<label>upload photo(10 mb max size)</label>
						<input type="file" name="userfile" size="20" />
    				</div>
    				<div class="large-8 columns">
    					<input type="checkbox" id='terms'/> I agree to the
    					<a href="JavaScript:newPopup('<?php echo base_url();?>index.php/register/terms');" style="color:Blue;">Terms and Agreements</a>
    				</div>
    				
    				<div class="large-8 columns">
    					<Button id="register" type="submit" disabled='false'> Register! </Button>
    				</div>

    				</form>

    			</div>
    			<span style="color:red;font-size:20px;">*</span> = Required
		    </div>
		</div>
		<!--Scripts -->
			<!-- Terms and Agreements -->
			<script type="text/javascript">
				$('#terms').click(function() {
					$("#register").attr("disabled", !this.checked);
				});
			// Popup window code
			function newPopup(url) {
				popupWindow = window.open(
					url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
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
