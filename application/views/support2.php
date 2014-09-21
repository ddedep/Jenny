			<div class="row">
 			<div class="large-12 columns">
 				<?php if($this->session->userdata('logged_in')): ?>
		      <a href="<?php echo base_url()?>index.php/support/createSupport"><button>Create Thread</button></a>
		     	<?php endif ?>
		      <?php foreach($query->result_array() as $row):	?>
						<div class= 'panel'>
							Title: <?php echo $row['title']; ?><br/><br/>
							<?php echo $row['body']; ?><br/><br/>
							By: <?php echo $row['username']; ?><br/><br/>
							On: <?php echo $row['insertedon']; ?><br/><br/>
						</div><br />
			<?php endforeach; ?>
			<?php if(!$this->session->userdata('logged_in')): ?>
				

				<a href="<?php echo base_url();?>index.php/home/login/<?php echo $row['support_id']; ?>"><button>Comment</button></a>
			<?php endif;?>
			<?php if($this->session->userdata('logged_in')): ?>
			<label>Comment</label>
			<textarea id='comment' style="height:100px;"></textarea><br/>
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
		    <div class = "row">
		    	<div class="large-12 columns">
			    	<div class="panel" style="margin-bottom:0;">
			    		<a href="<?php echo base_url();?>index.php/faq/about#about">About</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#terms">Terms and Conditions</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq/about#privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/home/contactus">Contact Us</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/support">Forum</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>index.php/faq">FAQ</a>&nbsp;|&nbsp;Copyright 2014 onestopdeal.com.ph
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
