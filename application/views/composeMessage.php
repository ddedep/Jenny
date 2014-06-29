
		<div class="row">
			<div style="margin-left:25%">
				<?php echo $Message; 
					echo validation_errors();
				?>
				<?php echo form_open("index.php/messages/compose"); ?>
				<?php if($query->num_rows>0){
				foreach ($query->result_array() as $row):
					echo "To: <input type='text' name='recipient' value=".$row['username'].">"."</input><br/>";?>
					Message: <br/>
					<textarea name="message" style="height:300px;width:60%"></textarea>
					<button type="submit" style="margin-left:25%">Submit</button>
				<?php 
					endforeach;
					}
					else
					{
				?>
						To: <input type='text' name='recipient' style="width:60%;"></input><br/>
						Message: <br/>
						<textarea name="message" style="height:300px;width:60%"></textarea>
						<button type="submit" style="margin-left:25%">Submit</button>
					<?php }?>
				</form>
			</div>
		</div>
    </body>
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
