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
					Patient 
					</a>
				</li>
				<li class="active">History Details</li>
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
					Patient History Details
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
									<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] != 2){ ?>
									<div class="profile-info-row">
										<div class="profile-info-name">  Amount </div>

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
									<?php } ?>
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
									<div class="panel-heading">
										Signed Content Form
									</div>
									<div class="panel-body">
										<?php if(!empty($tpl['bookingData']['file'])){ 
											$files = $tpl['bookingData']['file']; 
											foreach($files as $file) { ?>
											
											<a href="<?php echo 'app/web/signed_consent_form/'.$file['file_name']; ?>" target="_blank"><?php echo $file['file_name']; ?></a><br>
											<?php 
											}
											?>
											
											<br>
											<label class=" control-label no-padding-right required" for="form-field-1"> Parameters </label>
											<textarea id ="Notes" rows="4"  style="width: 100%;"><?php if(!empty($tpl['bookingData']['APHistory']['parameters'])){ echo $tpl['bookingData']['APHistory']['parameters']; }?></textarea>
											<br>
											<label class=" control-label no-padding-right required" for="form-field-1"> Notes </label>
											<textarea id ="Notes" rows="4"  style="width: 100%;"><?php if(!empty($tpl['bookingData']['APHistory']['notes'])){ echo $tpl['bookingData']['APHistory']['notes']; }?></textarea>
											
											
											<?php 
											
										} ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<!--<div>
									<span class="profile-picture" style="margin-left: 10%;">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?ph//00if(!empty($patient['pic'])){echo PROFILE_PICS.$patient['pic'];} else {echo PROFILE_PICS."profile-pic.jpg";} ?>" />
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
								</div> -->
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert</h4>
        </div>
        <div class="modal-body">
          <p>Once you complete treatment you will not be able to edit Parameters or Notes !</p>
          <p>Are you sure want complete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id ="completeTreatmentFinal">Yes</button>
        </div>
      </div>
      
    </div>
  </div>




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

$("#completeTreatment").click(function(){
	var Parameters = $("#Parameters").val();
	var Notes = $("#Notes").val();
	var booking_id = <?php echo $_GET['id'] ?>;
	if(Parameters){
		$("#ParametersErr").hide();
		if(Notes){
			$("#NotesErr").hide();
			$('#myModal').modal('show'); 
		} else {
			$("#NotesErr").show();
		}
	} else {
		$("#ParametersErr").show();
	}
	
});
$("#completeTreatmentFinal").click(function(){
	var Parameters = $("#Parameters").val();
	var Notes = $("#Notes").val();
	var booking_id = <?php echo $_GET['id'] ?>;
	if(Parameters){
		$("#ParametersErr").hide();
		if(Notes){
			$("#NotesErr").hide();
			$.ajax({
			   type: "POST",
			   url: "?controller=Receptionists&action=completeTreatment",
			   dataType: 'json',
			   data: {Parameters:Parameters,Notes:Notes,booking_id:booking_id},
			   success: function(data)
			   {
				if(data.status == 1){
					window.location.href = "?controller=Receptionists&action=listBooking";
				}					
			   }
			});
			
			
		} else {
			$("#NotesErr").show();
		}
	} else {
		$("#ParametersErr").show();
	}
});



 
 </script>