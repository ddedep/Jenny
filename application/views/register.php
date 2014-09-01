
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
		    			<div class="medium-4 columns">
			    			<label>First Name<span style="color:red;font-size:20px;">*</span></label>
			    			<input type="text" name="firstname" required>
		    			</div>
		    			<div class="medium-2 columns">
			    			<label>Middle Name<span style="color:red;font-size:20px;visible:false;"> </span></label>
			    			<input type="text" name="middlename">
		    			</div>
		    			<div class="medium-6 columns">
			    			<label>Last Name<span style="color:red;font-size:20px;">*</span></label>
			    			<input type="text" name="lastname" required>	
		    			</div>
		    	
    				<div class="medium-4 columns">
    					<label>Cellphone Number(+639XXXXXXXXX)<span style="color:red;font-size:15px;">*</span></label>
    					<input type="text" name = "phonenumber" required>
    				</div>
 
    			
    				<div class="medium-4 columns">
    					<label>Birtdate<span style="color:red;font-size:15px;">*</span></label>
    					<select name="month">
    						<option value="0">Month</option>
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
					<div class="medium-2 columns">
						<label><span style="font-size:1px;">.</span></label>
						
						<?php
						$options = array();
						$options[0] = 'day';
						for($i=1;$i<=31;$i++)
						{
							$options[''.$i] = $i;
						}

						echo form_dropdown('day', $options,'0');
						?>
					</div>
					<div class="medium-2 columns">
						<label><span style="font-size:1px;">*</span></label>
						
						<?php
						$option = array();
						$option[0] = 'Year';
						for($i=1;$i<=83;$i++)
						{
							$option[''.$i+1913] = $i+1914;
						}

						echo form_dropdown('year', $option,'0');
						?>
    					
    				</div>
    			
  			
    			
    				<div class="large-12 columns">
    				<label>Address<span style="color:red;font-size:20px;">*</span></label>
    				<input type="text" name ="address" required>
    				</div>
    			
    				<div class="large-7 columns">
    				<label>Username(Minimum 6 characters)<span style="color:red;font-size:20px;">*</span><img id="umark" src="<?php echo base_url();?>img/bad_mark.png" /></label>
    				<input type="text" name="username" id="username" required>
    				</div>
    			
    			
    				<div class="large-7 columns">
    				<label>Email<span style="color:red;font-size:20px;">*</span><img id="emark" src="<?php echo base_url();?>img/bad_mark.png" /></label>
    				<input type="text" name="email" id="email" required>
    				</div>

    			
    				<div class="large-6 columns">
    				<label>Password (minimum 6 characters with capital letter,small letter and special character)<span style="color:red;font-size:20px;">*</span></label>
    				<input id="pass" type="password" name="password" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
    				</div>
    			
    			
    				<div class="large-6 columns">
    				<label>Confirm Password<span style="color:red;font-size:20px;">*</span><img id="pmark" src="<?php echo base_url();?>img/bad_mark.png" /></label>
    				<input id="conf" type="password" name="passwordconfirm" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
    				</div>
    				<div class="large-6 columns">
    					<label>upload photo(10 mb max size)</label>
						<input type="file" name="userfile" size="20" />
    				</div>
    				<div class="large-8 columns">
    				<input type="checkbox" id='terms' style="width:10px"> 
    					<label for="terms">I agree to the
    					<a href="JavaScript:newPopup('<?php echo base_url();?>index.php/register/terms');" style="color:Blue;">Terms and Agreements</a></label>
    					
    				</div>
    				
    				<div class="large-8 columns">
    					<Button id="register" type="submit" disabled='false'> Register! </Button>
						
    				</div>
						
    				</form>

    			</div>
				<div class="row">
    				<div class="large-12 columns"><span style="color:red;font-size:20px;">*</span> = Required</div>
				</div>
    			<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
		    </div>
		</div>
		<!--Scripts -->
			<!-- Terms and Agreements -->
			<script type="text/javascript">
				var usernames = ["",<?php foreach ($users->result_array() as $row){ echo '"'.$row['username'].'",';}?>];
				var emails = ["",<?php foreach ($users->result_array() as $row){ echo '"'.$row['email'].'",';}?>];
				$('#terms').click(function() {
					$("#register").attr("disabled", !this.checked);
				});
			// Popup window code
			function newPopup(url) {
				popupWindow = window.open(
					url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
			</script>
			<script type="text/javascript">
				$("#conf").change(function(){
					if($("#conf").val()==$("#pass").val())
					{
				    	$("#pmark").attr("src","<?php echo base_url();?>img/good_mark.png");
				    }
				    else
				    {	
				    	$("#pmark").attr("src","<?php echo base_url();?>img/bad_mark.png");
				    }
				});
				$("#username").change(function(){
					if($("#username").val().length>=6)
					{
					    	
						for (index = 0; index < usernames.length; ++index) {
						//	alert(usernames[index]);

						    if(usernames[index]!=$("#username").val())
						    {
						    	$("#umark").attr("src","<?php echo base_url();?>img/good_mark.png");
						    }
						    
						    else
						    {
						    //	alert(usernames[index]);
						    	$("#umark").attr("src","<?php echo base_url();?>img/bad_mark.png");
						    	break;
						    }
						}
					}
					else
					{
						$("#umark").attr("src","<?php echo base_url();?>img/bad_mark.png");
					}
				});
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
