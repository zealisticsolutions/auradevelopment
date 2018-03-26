<?PHP
 
?>
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Search Your Place</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="search-form" name = "search-form" method= "post">
									<div class="form-group col-md-2">
										<select class="form-control select-box">
											<option>Course</option>
											<?php 
											$courses= $tpl['result'];
											
											foreach($courses as $course) 
											{
												?>
												<option value="<?php echo $course['course_name_id']; ?>"><?php echo $course['course_name']; ?></option>";
												<?php
											}
											?>
										</select>
									</div>
									<div class="form-group col-md-3">
										<input type="text" class="form-control" id="Search" placeholder="Keyword">
									</div>
									<div class="form-group col-md-2">
										<select class="form-control select-box">
											<option>Fees</option>
											<option>Monthly</option>
											<option>Yearly</option>
										</select>
									</div>
									<div class="form-group col-md-3">
										<input type="text" class="form-control" id="Search" placeholder="Your Amount">
									</div>
									<div class="form-group col-md-2">
										<button type="submit" class="btn btn-site">Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
