
  		
    	<?php
    	echo $message;
    	foreach($query->result_array() as $row):
		
			echo "<h1>".$row['title']."</h1>";
		?>
		<?php
			echo "<h4>Description</h4>";
			echo "<div class= 'panel'>";
			echo '<iframe width="420" height="345"';
			echo ' src="//www.youtube.com/embed/'.$row['videolink'].'"" frameborder="0">';
			echo '</iframe><br/>';
			echo "<img src=".base_url()."images/".$row['imagelink']." style='height:200px;width:200px;'><br/>";
			echo "Title: ".$row['title']."<br/><br/>";
			echo "Duration: ".$row['duration']." Days<br/><br/>";
			echo "Price: ".$row['price']."<br/><br/>";
			echo "About: ".$row['body']."<br/><br/>";
			echo "Total Views: ".$row['view']."<br/><br/>";
			echo "</div>";
			endforeach;
		?>
		<?php echo form_open('index.php/ads/featureThis'); ?>
		<input name ='adid' type="hidden" value=<?php echo $row['adid'] ?> />
		<?php 
		if($row['owner']==$userid && $row['isfeatured']==0){
			echo "<button id='Feature' type='submit'>Feature Ad(costs 300 points)</button>";
		}
		else if($row['isfeatured']==1)
		{
			echo "<button id='Feature' type='submit' disabled>This is a Featured Ad</button>";
		}
		else redirect('index.php'); 
		?>
		</form>
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
