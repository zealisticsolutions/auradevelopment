<?php 
// $patient = $tpl['result']['userDetails'][0];
// $language = $tpl['result']['userLanguage'];
// $medicalHistory = $tpl['result']['userMedicalHistory'];

// echo "<pre>";
// print_r($patient);
// echo "</pre>";
// die;
 ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>

				<li>
					<a href="#">
					Appointment 
					</a>
				</li>
				<li class="active">Details</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					Appointment Details
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
					
					</div>
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php if(!empty($patient['pic'])){echo PROFILE_PICS.$patient['pic'];} else {echo PROFILE_PICS."profile-pic.jpg";} ?>" />
									</span>

									<div class="space-4"></div>
								</div>

								<div class="space-6"></div>

								<div class="profile-contact-info">
									<div class="profile-contact-links align-left">
									
										<a data-toggle="modal" id="openModel" data-target="#myModal" class="btn btn-link">
											
											Before Image
										</a>

										
									</div>

									<div class="space-6"></div>												
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="space-12"></div>
								<?php if(!empty($tpl['bookingData'])){ $patient = $tpl['bookingData']['data'];} ?>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Patient Name </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php if(!empty($patient['patient_name'])) {echo  $patient['patient_name'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Gender </div>

										<div class="profile-info-value">
											<i class="fa fa-<?php
											if(!empty($patient['patient_gender'])){
												if($patient['patient_gender'] == 1){
													echo "male";
												}
												if($patient['patient_gender'] == 2){
													echo "female";
												}
												if($patient['patient_gender'] == 3){
													echo "male";
												}
											} ?> light-green bigger-110"></i>
											<span class="editable" id="age">
												<?php  
													if(!empty($patient['patient_gender'])){
														
														if($patient['patient_gender'] == 1){
															$gender = "Male";
														}
														if($patient['patient_gender'] == 2){
															$gender = "Female";
														}
														if($patient['patient_gender'] == 3){
															$gender = "Other";
														}
														echo $gender;
													}
													else {
														echo "NA";
													}										
												?>
											</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Date of birth </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="age"><?php if(!empty($patient['patient_dob'])) {echo   date('d-m-Y', strtotime ($patient['patient_dob']));} else {echo "NA";} ?></span>
										</div>
									</div>
									
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Treatment </div>

										<div class="profile-info-value">
											<i class="fa fa-user light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['treatment_name'])) {echo  $patient['treatment_name'];} else {echo "NA";} ?></span>
											
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Room </div>

										<div class="profile-info-value">
											<i class="fa fa-user light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['treatment_room'])) {echo  $patient['treatment_room'];} else {echo "NA";} ?></span>
											
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Date & Time </div>

										<div class="profile-info-value">
											<i class="fa fa-user light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['timing'])) {echo  $patient['timing'];} else {echo "NA";} ?></span>
											
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Doctor Name </div>

										<div class="profile-info-value">
											<span class="editable" id="country"><?php if(!empty($patient['doctor_name'])) {echo  $patient['doctor_name'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Duration </div>

										<div class="profile-info-value">
											<i class="fa fa-mobile light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['duration'])) {echo  $patient['duration'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name">  Aamount </div>

										<div class="profile-info-value">
											<i class="fa fa-mobile light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['amount'])) {echo  $patient['amount'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Coupon </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="signup"><?php if(!empty($patient['coupon'])) {echo $patient['coupon'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Discount </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="signup"><?php if(!empty($patient['discount'])) {echo $patient['discount'];} else {echo "NA";} ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Booked By </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="signup"><?php if(!empty($patient['rec_booked_by'])) {echo $patient['rec_booked_by'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
								</div>

								<div class="space-20"></div>
								<div class="space-6"></div>
								<div class="panel panel-danger">
									<div class="panel-heading">Signed Content Form</div>
									<div class="panel-body">
										<?php if(!empty($tpl['bookingData']['file'])){ 
											$files = $tpl['bookingData']['file']; 
											foreach($files as $file) { ?>
											
											<a href="<?php echo 'app/web/signed_consent_form/'.$file['file_name']; ?>" target="_blank"><?php echo $file['file_name']; ?></a><br>
											<?php 
											}
											
										} ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div>
									<span class="profile-picture" style="margin-left: 10%;">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php if(!empty($patient['pic'])){echo PROFILE_PICS.$patient['pic'];} else {echo PROFILE_PICS."profile-pic.jpg";} ?>" />
									</span>

									<div class="space-4"></div>
								</div>

								<div class="space-6"></div>

								<div class="profile-contact-info">
									<div class="profile-contact-links align-left">
									
										<a data-toggle="modal" id="openModel" data-target="#myModal" class="btn btn-link">
											
											After Image
										</a>

										
									</div>

									<div class="space-6"></div>												
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
$("#sendPrivateMessage").click(function(){
    var mobile = $("#mobile").val();
    var message = $("#messageContent").val();
	// alert(message);
	$("#msgSent").hide();
	$("#msgNotSent").hide();
	if(mobile){
		// alert(mobile);
	    $("#mobileError").hide();
		if(message){
			// alert(message);
			$("#contentError").hide();
			$.ajax({
				type: "POST",
				url: '<?php echo $_SERVER['PHP_SELF']; ?>?controller=SMSTemplates&action=sendSms',
				dataType: "json",
				data: {mobile:mobile, message:message },
				success: function(response) {
					if(response.status == "OK"){
						$("#msgSent").show();
					}else{
						$("#msgNotSent").show();
					}
				},
				error: function(response) {
					console.log(response.status);
				}
			});
		} else {
			$("#contentError").show();
		}
	} else {
		$("#mobileError").show();
	}
});
$("#openModel").click(function(){
	$("#messageContent").val('');
	$("#contentError").hide();
	$("#mobileError").hide();
	$("#msgSent").hide();
	$("#msgNotSent").hide();
});



 
 </script>