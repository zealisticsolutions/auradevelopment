<div class="middle_right_box_content">
	<div class="well well-sm"><strong><center><span class="glyphicons glyphicons-user"></span><b>Login Here</b><br><?php echo "<b style = 'color:Red'>$tpl[msg]</b>"; ?></strong></center></div>
	 <center>
		<body onload="CoolClock.findAndCreateClocks()">
		<!-- <canvas id="clk1" class="CoolClock:fancy myClock"></canvas> -->
		<!-- <canvas id="clk2" style="display:block;" class="CoolClock:fancy"></canvas> -->
		<canvas id="_coolclock_auto_id_4" class="CoolClock:Cold" width="550" height="550" style="width: 550px; height: 550px;"></canvas>
</body>
	 </center>
	  <center>
		 <form class="form-horizontal" method = "post">
			  <div class="form-group">
				 <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
				 <div class="col-sm-4">
				   <input type="text" name = "email" class="form-control" id="inputEmail3" placeholder="Email" required>
				 </div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-5 control-label">Password</label>
				<div class="col-sm-4">
				  <input type="password" name = "password" class="form-control" id="inputPassword3" placeholder="Password" required>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-5 col-sm-3">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
				  <button type="submit"class="btn btn-primary" name = "submit" style = "width:100%">Sign in</button>
				</div>
			  </div>
		</form>
	</center>
	  </div>
 </div>
