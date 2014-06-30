 			<div class="row">
 			<div class="large-2 column">
				<?php if(!$hide):?>
					<div class="panel">
						<h5>Menu</h5>
						<a href="<?php echo base_url() ?>index.php/ads/view">My Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewExpired">Expired Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/userSubscription">Subscription</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/user/subscription">Subscription Ads</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewFavorites">My Favorites</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/globe/charge">Buy Points</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/ads/viewWish">Looking for</a> <br/><br/>
						<a href="<?php echo base_url(); ?>index.php/messages/compose">Compose message</a><br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages">Inbox</a> <br/><br/>
						<a href="<?php echo base_url() ?>index.php/messages/sent">Sent</a> <br/><br/>
					</div>
				<?php endif;?>
				</div>
 			<div class="large-8 columns" >
 			<?php
 			$owner="";
 			$adid=0;
 			echo $message;
        	foreach($query->result_array() as $row):
				$adid=$row['adid'];
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
				echo "Images:<br/>";
				foreach ($images->result_array() as $rowk) {
					echo "<img src=".base_url()."images/".$rowk['imagelink']." style='height:200px;width:200px;'>";
				}
				echo "<br/>Title: ".$row['title']."<br/><br/>";
				if($row['owner']!=$userid):
			 		echo "Posted by: <a href='".base_url()."index.php/user/view/".$row['owner']."'>".$row['username']."</a><br/><br/>";
				endif;
				

				$startDate = $row['insertedon'];
				$endDate = strtotime("+".$row['duration']." days",time($startDate));
				$formatted = date('m/d/Y',$endDate);

				$owner = $row['email'];

				echo "Expires on: ".$formatted."<br/><br/>";
				echo "Price: ".$row['price']."<br/><br/>";
				echo "About: ".$row['body']."<br/><br/>";
				echo "Total Views: ".$row['view']."<br/><br/>";
				echo "</div>";
				endforeach;
			?>
			
			<?php if($row['owner']==$userid && $row['isexpired']!=1): ?>
			<a href="<?php echo base_url();?>index.php/ads/feature/<?php echo $row['adid'];?>"><button>Feature This Ad!</button></a>
			<?php endif; ?>
           
            <?php if($row['owner']==$userid && $row['isexpired']!=1): ?>
			<a href="<?php echo base_url();?>index.php/ads/extend/<?php echo $row['adid'];?>"><button>Extend Duration</button></a>
			<?php endif; ?>
            <?php if($row['owner']==$userid && $row['isexpired']==1): ?>
			<a href="<?php echo base_url();?>index.php/ads/repost/<?php echo $row['adid'];?>"><button>Repost</button></a>
			<?php endif; ?>
			<?php $isSold = $row['issold'] ?>
			
			<?php if($hidefav==0 && $row['owner']!=$userid): echo form_open('index.php/ads/favorite'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Favorite</button>
			</form>
			<?php endif; ?>

			<?php if($isSold==0 && $row['owner']==$userid): echo form_open('index.php/ads/sell'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Mark As Sold</button>
			</form>
			<?php endif; ?>

			<?php if($isSold!=0):?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit" enabled="false">Sold</button>
			</form>
			<?php endif; ?>
			<?php
				if($row['owner']!=$userid):
			?>
				<a href="<?php echo base_url();?>index.php/messages/compose/<?php echo $row['owner'];?>"><button>Message Owner</button></a>
			<?php
				endif;
			?>
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
			<?php echo form_open_multipart('index.php/user/email'); ?>
				<label>Name</label>
				<input type="text" name="name" />
				<label>Email</label>
				<input type="text" name="email"/>
				<label>Contact Number</label>
				<input type="text" name="contact"/>
				<label>Message</label>
				<textarea name="body"></textarea>
				<input type="hidden" name="to" value="<?php echo $owner ?>"/>
				<input type="hidden" name="adid" value="<?php echo $adid; ?>" />
				<button type="submit" >Submit</button> 
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
