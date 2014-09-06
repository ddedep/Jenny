 			<div class="row">
 			<div class="large-2 column">
				<span style="font-size:1px;">.</span>
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
				echo "Images:<br/><br/><br/>";
				
				for($i=1;$i<=6;$i++) {
					if($row['imagelink'.$i]!="") echo "<img src=".base_url()."images/".$row['imagelink'.$i]." style='height:200px;width:200px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					if($i%2==0) echo "<br/><br/><br/>";
				}
				echo "<br/>Title: ".$row['title']."<br/><br/>";
				if($row['owner']!=$userid):
			 		echo "Posted by: <a href='".base_url()."index.php/user/view/".$row['owner']."'>".$row['username']."</a><br/><br/>";
			 		echo "Email: <a href='".base_url()."index.php/user/view/".$row['owner']."'>".$row['email']."</a><br/><br/>";
			 		echo "Contact Number: <a href='".base_url()."index.php/user/view/".$row['owner']."'>".$row['phonenum']."</a><br/><br/>";
				endif;
				

				$startDate = $row['adinsertedon'];
				$endDate = strtotime("+".$row['duration']." days",time($startDate));
				$formatted = date('m/d/Y',$endDate);

				$owner = $row['email'];

				$date = new DateTime($row['adinsertedon']);
											 
				echo "Expires on: ".$formatted."<br/><br/>";
				echo "Price: ".$row['price']."<br/><br/>";
				echo "About: ".$row['body']."<br/><br/>";
				echo "Total Views: ".$row['view']."<br/><br/>";
				echo "Posted On: ".$date->format('m-d-Y')."<br/><br/>";
				echo "</div>";
				endforeach;
			?>
			
			<?php if($row['owner']==$userid && $row['isexpired']!=1 && $row['issold']!=1  && $row['isfeatured']==0):?>
			<a href="<?php echo base_url();?>index.php/ads/feature/<?php echo $row['adid'];?>"><button>Feature This Ad!</button></a>
			<?php endif; ?>
           
            <?php if($row['owner']==$userid && $row['isexpired']!=1 && $row['issold']!=1): ?>
			<a href="<?php echo base_url();?>index.php/ads/extend/<?php echo $row['adid'];?>"><button>Extend Duration</button></a>
			<?php endif; ?>
            <?php if($row['owner']==$userid && ($row['isexpired']==1 || $row['issold']==1)): ?>
			<a href="<?php echo base_url();?>index.php/ads/repost/<?php echo $row['adid'];?>"><button>Repost</button></a>&nbsp &nbsp &nbsp &nbsp
			<?php endif; ?>
			<?php $isSold = $row['issold'] ?>
			
			<?php if($hidefav==0 && $row['owner']!=$userid && $this->session->userdata('logged_in')): echo form_open('index.php/ads/favorite'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Add to Favorites</button>
			</form>
			<?php endif; ?>

			<?php if($hidefav>0 && $row['owner']!=$userid): echo form_open('index.php/ads/unfavorite'); ?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit">Remove to Favorites</button>
			</form>
			<?php endif; ?>

			<?php if($isSold==0 && $row['owner']==$userid): echo form_open('index.php/ads/sell'); ?>
				<input name ="adid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit"onclick="return confirm('Are you sure?')">Mark As Sold</button>
			</form>
			<?php endif; ?>

			<?php if($isSold!=0):?>
				<input name ="favid" type="hidden" value="<?php echo $row['adid'];?>" />
				<button type="submit" disabled="">Ad Already Sold</button>
			</form>
			<?php endif; ?>
			<?php
				if($row['owner']!=$userid && $this->session->userdata('logged_in')):
			?>
				<a href="<?php echo base_url();?>index.php/messages/compose/<?php echo $row['owner'];?>"><button>Message Owner</button></a>
			<?php
				endif;
			?>
			<?php
				if($row['owner']==$userid && $row['issold']!=1):
			?>
				<a href="<?php echo base_url();?>index.php/ads/edit/<?php echo $row['adid'];?>"><button>Edit</button></a>
			<?php
				endif;
			?>

			<?php
				if($row['owner']==$userid && $row['issold']!=1):
				echo form_open('index.php/ads/delete');
			?>
				<input name ="owner" type="hidden" value="<?php echo $row['adid'];?>" />
				<button  type ="submit" onclick="return confirm('Are you sure?')">Delete Ad</button>
				</form>
			<?php
				endif;
			?>
			<?php if($this->session->userdata('logged_in')): ?>
			<label>Comment</label>
			<textarea id='comment' style="height:150px;" required></textarea><br/>
			<button id='postComment'>Post</button>
			<?php endif; ?>
			<?php if(!$this->session->userdata('logged_in')): ?>
				<h2><span style="color:red;font-size:20px;">*</span>Please Log in to Post a Comment</h2><br/>
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
		    <?php if(!$this->session->userdata('logged_in')): ?>
			<?php echo form_open_multipart('index.php/ads/view/'.$adid); ?>
				<h1 style="font-size:25px;">Message Owner</h1>
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
				<br /><button type="submit" >Submit</button> 
			</form>
			<?php  endif; ?>
		      
			</div>
			<div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
			    	</div>
			    </div>
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
			if($('#comment').val() == '')
			{
			      alert('Comment can not be left blank!');
			 }
			 else
			 {
			   $.post( "<?php echo base_url();?>index.php/ads/comment", {adid:<?php echo $row['adid'];?>, body:$('#comment').val()} ).done(function( data ) {
				//alert( "Data Loaded: " + data );
				if(data=='added') alert('oheayh');
				else{
					
			//	alert(data);
					$('#commentArea').html("<div class='panel'>"+username+" wrote: <br/><i>"+$('#comment').val()+"<br/></i><i>"+data+"</i></div>"+$('#commentArea').html());
					$('#comment').attr('value','');
				}
				});
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
