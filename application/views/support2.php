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
 			<div class="large-8 columns">

		      <a href="<?php echo base_url()?>index.php/support/createSupport"><button>Create Thread</button></a>
		     
		      <?php foreach($query->result_array() as $row):	?>
						<div class= 'panel'>
							Title: <?php echo $row['title']; ?><br/><br/>
							<?php echo $row['body']; ?><br/><br/>
							By: <?php echo $row['username']; ?><br/><br/>
							On: <?php echo $row['insertedon']; ?><br/><br/>
						</div><br />
			<?php endforeach; ?>
			<?php if($this->session->userdata('logged_in')): ?>
			<label>Comment</label>
			<textarea id='comment'></textarea>
			<button id='postComment'>Post</button>
			<?php endif; ?>
			<div class="row" id='commentArea'>
				 <?php foreach($comments->result_array() as $comrow):	?>
				 	<div class="panel">
				 		<?php echo $comrow['username']; ?> wrote: <br/>
				 		<i><?php echo $comrow['body'] ?></i> <br/>
				 		&nbsp;<i><?php echo $comrow['cominsertedon']; ?></i>
				 	</div>
				 <?php endforeach; ?>
		    </div>
		    </div>
		    </div>
		    
		</div>
		<!--Scripts -->
		<script type="text/javascript">
		var username = "<?php echo $this->session->userdata('username'); ?>";
		var body = $('#comment').val();
		//alert(body);
	//	var time = $.now();
		$('#postComment').click(function(){
		//	alert(body);
			if($('#comment').val() == '')
			{
			      alert('Comment can not be left blank!');
			 }
			 else{
		   		$.post( "<?php echo base_url();?>index.php/support/comment", {threadid:<?php echo $row['support_id'];?>, body:$('#comment').val()} ).done(function( data ) {
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
