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
	    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
	</head>
	<body>


		<div class= "large-12 columns">
			<!-- header -->
			<div class="row">
		      <div class="large-12 columns">
		        <div class = 'panel'>
		        	<?php if($username!=NULL) echo "Welcome ".$username."!&nbsp;	&nbsp;"; 
		        	else{
		        		echo '<a href="';echo base_url().'index.php/home/login">'."Sign in or Register</a>&nbsp;	&nbsp";
		        		}  ?>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/user">Profile&nbsp;	&nbsp;</a>|&nbsp;	&nbsp;<a href="<?php echo base_url();?>index.php/Ads">Sell&nbsp;	&nbsp;</a>	|&nbsp;	&nbsp;<a href="">Customer Support</a>&nbsp;	&nbsp;|
		        	<?php	
			        	if($username==NULL) echo ""; 
			        	else{
			        		echo '<a href="';echo base_url().'index.php/logout">'."logout</a>&nbsp;	&nbsp";
			        		}
		        	?>
		        </div>
		      </div>
		    </div>
		    <div class="row">
			    <!-- Search -->
			   	<div class="row">
			   		<div class="large-9 columns">
				   		<div class="large-12 columns">
					        <input type="text">
					    </div>
					      <div class="large-4 columns">
						      <select>
						        <option value="husker">Categories</option>
						        <option value="starbuck">Starbuck</option>
						        <option value="hotdog">Hot Dog</option>
						        <option value="apollo">Apollo</option>
						      </select>
					      </div>
					      <div class="large-4 columns">
						      <select>
						        <option value="husker">Region</option>
						        <option value="starbuck">Starbuck</option>
						        <option value="hotdog">Hot Dog</option>
						        <option value="apollo">Apollo</option>
						      </select>
					      </div>
					      <div class="large-4 columns">
						      <select>
						        <option value="husker">Cities</option>
						        <option value="starbuck">Starbuck</option>
						        <option value="hotdog">Hot Dog</option>
						        <option value="apollo">Apollo</option>
						      </select>
					      </div>
				      </div>
				       <div class="large-3 columns">
				      	<a href="#" class="large button">Search</a>
				      </div>
		      </div>     		      
		    </div>
		    <!-- Carousel -->
		    <div class = "row">
			    <div class="container">
				<h1>Your Top Ads Here</h1>
				<div id="ca-container" class="ca-container">
					<div class="ca-wrapper">
						<div class="ca-item ca-item-1">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Stop factory farming</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Animals are not commodities</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-2">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Respect Life &amp; Rights</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>I hold that the more helpless a creature, the more entitled it is to protection by man from the cruelty of man.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Would you eat your dog?</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-3">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Become 100% meat-free</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>I feel that spiritual progress does demand at some stage that we should cease to kill our fellow creatures for the satisfaction of our bodily wants.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>You can change the world</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-4">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Make a difference</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>A man is but the product of his thoughts what he thinks, he becomes.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Think globally, act locally</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-5">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Say no to killing</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>A weak man is just by accident. A strong but non-violent man is unjust by accident.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Animals have rights, too!</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-6">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Don't believe the lies</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>An error does not become truth by reason of multiplied propagation, nor does truth become error because nobody sees it.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>How essential is meat?</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-7">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>Save the planet</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>A small body of determined spirits fired by an unquenchable faith in their mission can alter the course of history.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Collateral damage?</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="ca-item ca-item-8">
							<div class="ca-item-main">
								<div class="ca-icon"></div>
								<h3>It's time to move on</h3>
								<h4>
									<span class="ca-quote">&ldquo;</span>
									<span>A nation's culture resides in the hearts and in the soul of its people.</span>
								</h4>
									<a href="#" class="ca-more">more...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6>Let's finally become humans</h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
										<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
										<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
									</div>
									<ul>
										<li><a href="#">Read more</a></li>
										<li><a href="#">Share this</a></li>
										<li><a href="#">Become a member</a></li>
										<li><a href="#">Donate</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
		    </div>
		    <!--footer -->
		    <div class = "row">
		    	
		    </div>
		</div>
		<!--Scripts -->
		<script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
	    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
	    <script>
	      $(document).foundation();
	    </script>
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
	</body>
</html>
