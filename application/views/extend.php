				<div class="large-6 columns" style="margin-left: 30%;">
		      		
		        	<?php
		        	echo $message;
		        	foreach($query->result_array() as $row):
					
						echo "<h1>".$row['title']."</h1>";
					?>
					<?php
						echo "<h4>Description</h4>";
						echo "<div class= 'panel'>";
						if($row['videolink']!=""){
						echo '<iframe width="420" height="345"';
						echo ' src="//www.youtube.com/embed/'.$row['videolink'].'"" frameborder="0">';
						echo '</iframe><br/>';
						}
						if($row['imagelink1']!="")
							echo "<img src='".base_url()."images/".$row['imagelink1']."' style='height:200px;width:200px;'><br/>";
						else
							echo "<img src='".base_url()."images/nophoto.jpg' style='height:200px;width:200px;'><br/>";
						echo "Title: ".$row['title']."<br/><br/>";
						echo "Duration: ".$row['duration']." Days<br/><br/>";
						echo "Price: ".$row['price']."<br/><br/>";
						echo  $this->typography->nl2br_except_pre($row['body']);
						echo "Total Views: ".$row['view']."<br/><br/>";
						echo "</div>";
						
					?>
					<?php echo form_open('index.php/ads/extendThis'); ?>
					<input name ='duration'  type='hidden' value=<?php echo $row['duration'];?> />
                    <input name ='adid'      type="hidden" value=<?php echo $row['adid']; ?> />
			        <select name="length">
						<option value='7'>1 week(100 points)</option>
						<option value='15'>15 days(150 points)</option>
						<option value='30'>30 days(200 points)</option>
					</select>
					<?php 
						echo "<button id='Feature' type='submit' onclick=\"return confirm('Are you sure?')\">Extend Ad Duration</button>";
					endforeach;
                    ?>
					</form>
		 		</div>
		 		<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
		   		</div>
		</div>
		<!--Scripts -->
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
