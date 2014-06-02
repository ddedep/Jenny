
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Capstone </title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	    <link rel="shortcut icon" href="../favicon.ico"> 
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.jscrollpane.css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />
		 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
	</head>
	<body>
		<!--Body -->
		<div class="large-8 column">
			<div class="row">
		      <div class="large-12 columns">
		       <div class = 'panel'>
		       <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>img/MIT-Seal.png" style="height:50px"></a>
		        	<?php if($username!=NULL) echo "Welcome ".$username."!&nbsp;	&nbsp;"; 
		        	else{
		        		echo '<a href="';echo base_url().'index.php/home/login">'."Sign in or Register</a>&nbsp;	&nbsp";
		        		}  ?>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/user">Profile&nbsp;	&nbsp;</a>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/Ads">Sell&nbsp;	&nbsp;</a>	|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/support">Customer Support</a>&nbsp;	&nbsp;|
		        	<?php	
			        	if($username==NULL) echo ""; 
			        	else{
			        		echo '<a href="';echo base_url().'index.php/logout">'."logout</a>&nbsp;	&nbsp";
			        		}
		        	?>
		        </div>
		      </div>
		      <a href="<?php echo base_url()?>index.php/support/createSupport"><button>Create Support</button></a>
		     
		      <?php foreach($query->result_array() as $row):	?>
						<div class= 'panel'>
							<h2>Support <?php echo $row['support_id']; ?></h2>
							Title: <?php echo $row['title']; ?><br/><br/>
							<?php echo $row['body']; ?><br/><br/>
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
		<!--Scripts -->
		<script type="text/javascript">
		var username = "<?php echo $this->session->userdata('username'); ?>";
		var body = $('#comment').val();
		//alert(body);
	//	var time = $.now();
		$('#postComment').click(function(){
		//	alert(body);
		   $.post( "<?php echo base_url();?>index.php/support/comment", {threadid:<?php echo $row['support_id'];?>, body:$('#comment').val()} ).done(function( data ) {
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