				<div class="row">
				
 			<div class="large-8 columns">
 			<?php if($this->session->userdata('logged_in')):?>
		      <a href="<?php echo base_url()?>index.php/support/createSupport"><button>Create Thread</button></a>
		     <?php endif; ?>

		      <?php 
		      if($query->num_rows()==0):     
		      ?>
		  	<div class='panel' style="font-size:30px;">
		  	No Thread to be Displayed		  	
		  	</div>
		  	<?php endif;?>
		      <?php
		      foreach($query->result_array() as $row):	?>
						<div class= 'panel'>
						Title: <a href="<?php echo base_url(); ?>index.php/support/view/<?php echo $row['support_id'];?>"><?php echo $row['title']; ?></a><br/><br/>
						By: <a href="<?php echo base_url()."index.php/user/view/".$row['userid'] ?>"><?php echo $row['username']; ?></a><br/><br/>
						On: <?php echo $row['supportinsertedon']; ?><br/><br/>
						Comments: <?php echo $comments[$row['support_id']]->num_rows();?>
						</div><br />

			<?php endforeach; ?>
			</div>
			</div>
			<div class = "row">

		    	<div class="large-12 columns">
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>

		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>

		    	<br/>

		    	<br/>
		    	<br/>

		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
		    	<br/>
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
		    
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
