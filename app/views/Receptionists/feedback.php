<div class="container">
	<div class="imagebg"></div>
	<div class="row " style="margin-top: 50px">
		<div class="col-md-6 col-md-offset-3 form-container">
			<h1>Feedback Form</h1> 
			<p> Please provide your feedback below: </p>
			<form role="form" method="post" id="reused_form">
				
				<div class="row">
					<div class="col-sm-12 form-group">
						<label>Q1. Would you like to recommend the doctor?*</label>
						<p>
							<label class="radio-inline">
								<input type="radio" name="recommend" id="radio_experience" value="Yes" required>
								Yes 
							</label>
							<label class="radio-inline">
								<input type="radio" name="recommend" id="radio_experience" value="No" >
								No 
							</label>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label for="comments">Q2. For which health problem/treatment did you visit?</label>
						<input type="text" class="form-control" id="treatment" name="treatment" required>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12 form-group">
						<label>Q3. What do you think can be improved?*</label>
						<p>
							<div class="checkbox">
							  <label><input type="checkbox" name="improved[]" value="Doctor friendliness">Doctor friendliness</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" name="improved[]" value="Explanation of the health issue">Explanation of the health issue</label>
							</div>
							<div class="checkbox disabled">
							  <label><input type="checkbox" name="improved[]" value="Treatment satisfaction">Treatment satisfaction</label>
							</div>
							<div class="checkbox disabled">
							  <label><input type="checkbox" name="improved[]" value="Value for money">Value for money</label>
							</div>
							<div class="checkbox disabled">
							  <label><input type="checkbox" name="improved[]" value="Wait time">Wait time</label>
							</div>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label for="comments">Q4. Tell us about your experience with the doctor.</label>
						<textarea class="form-control" type="textarea" name="comments" required id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label for="name"> Your Name:</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="col-sm-6 form-group">
						<label for="email"> Mobile:</label>
						<input type="number" maxlength="10" class="form-control" id="mobile" name="mobile" required>
					</div>
					<div class="col-sm-6 form-group">
						<label for="email"> Email:</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<button type="submit" class="btn btn-lg btn-warning btn-block" >Post </button>
					</div>
				</div>
			</form>
			<div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
			<div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="assets/css/form.css" />