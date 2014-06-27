 			<div class="row">
 			<div class="large-8 columns" style="margin-left: 17%;">
 			<?php

        	foreach($query->result_array() as $row):
			
				echo "<h1>".$row['title']."</h1>";
			?>
			<?php
				echo "<h4>Description</h4>";
				echo "<div class= 'panel'>";
				if($row['videolink']!= '') {
					echo '<iframe width="420" height="345"';
					echo ' src="//www.youtube.com/embed/'.$row['videolink'].'"" frameborder="0">';
					echo '</iframe><br/>';
				}
				echo "<img src=".base_url()."images/".$row['imagelink']." style='height:200px;width:200px;'><br/>";
				echo "Title: ".$row['title']."<br/><br/>";
				echo "Duration: ".$row['duration']." Days<br/><br/>";
				echo "Price: ".$row['price']."<br/><br/>";
				echo "About: ".$row['body']."<br/><br/>";
				echo "Total Views: ".$row['view']."<br/><br/>";
				echo "</div>";
				endforeach;
			?>
			<?php if($row['owner']!=$userid): ?>
			<a href="<?php echo base_url();?>index.php/user/view/<?php echo $row['owner'];?>"><button>View Profile</button></a>
			<?php endif; ?>

			<?php if($row['owner']==$userid && $row['isexpired']!=1): ?>
			<a href="<?php echo base_url();?>index.php/Ads/feature/<?php echo $row['adid'];?>"><button>Feature This Ad!</button></a>
			<?php endif; ?>
           
            <?php if($row['owner']==$userid && $row['isexpired']!=1): ?>
			<a href="<?php echo base_url();?>index.php/Ads/extend/<?php echo $row['adid'];?>"><button>Extend Duration</button></a>
			<?php endif; ?>
            <?php if($row['owner']==$userid && $row['isexpired']==1): ?>
			<a href="<?php echo base_url();?>index.php/Ads/repost/<?php echo $row['adid'];?>"><button>Repost</button></a>
			<?php endif; ?>
			<?php $isSold = $row['issold'] ?>
			
			<?php if($hidefav==0 && $row['owner']!=$userid): echo form_open('index.php/Ads/favorite'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Favorite</button>
			</form>
			<?php endif; ?>

			<?php if($isSold==0 && $row['owner']==$userid): echo form_open('index.php/Ads/sell'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Mark As Sold</button>
			</form>
			<?php endif; ?>

			<?php if($isSold!=0):?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit" enabled="false">Sold</button>
			</form>
			<?php endif; ?>

			<?php if($hidewish==0 && $row['owner']!=$userid): echo form_open('index.php/Ads/wish'); ?>
				<input name ="wishid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Add to Wish List</button>
			</form>
			<?php endif; ?>
			<?php
				if($row['owner']==$userid):
			?>
				<a href="<?php echo base_url();?>index.php/ads/edit/<?php echo $row['adid'];?>"><button>Edit</button></a>
			<?php
				endif;
			?>

			<?php
				if($row['owner']==$userid):
				echo form_open('index.php/ads/delete');
			?>
				<input name ="owner" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type ="submit">Delete Ad</button>
				</form>
			<?php
				endif;
			?>
			<?php if($this->session->userdata('logged_in')): ?>
			<label>Comment</label>
			<textarea id='comment'></textarea>
			<button id='postComment'>Post</button>
			<?php endif; ?>
			<div class="row" id='commentArea'>
				 <?php foreach($comments->result_array() as $comrow):	?>
				 	<div class="panel">
				 		<?php echo $comrow['username']; ?> wrote: <br/>
				 		<i><?php echo $comrow['body'] ?></i>`<br/>
				 		&nbsp;<i><?php echo $comrow['cominsertedon']; ?></i>
				 	</div>
				 <?php endforeach; ?>
		    </div>
			<?php echo form_open_multipart('index.php/ads'); ?>
				<label>Name</label>
				<input type="text" />
				<label>Email</label>
				<input type="text" />
				<label>Contact Number</label>
				<input type="text" />
				<label>Message</label>
				<textarea name="description"></textarea>
				<button type="submit">Submit</button> 
			</form>
		       
		      
			</div>
		</div>
		<!--Scripts -->
		<script type="text/javascript">
			var username = "<?php echo $this->session->userdata('username'); ?>";
			var body = $('#comment').val();
		//	alert(body);
		//	var time = $.now();
			$('#postComment').click(function(){
			//	alert(body);
			   $.post( "<?php echo base_url();?>index.php/ads/comment", {adid:<?php echo $row['adid'];?>, body:$('#comment').val()} ).done(function( data ) {
				//alert( "Data Loaded: " + data );
				if(data=='added') alert('oheayh');
				else{
					
			//	alert(data);
					$('#commentArea').html("<div class='panel'>"+username+" wrote: <br/><i>"+$('#comment').val()+"<br/></i><i>"+data+"</i></div>"+$('#commentArea').html());
					$('#comment').attr('value','');
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
