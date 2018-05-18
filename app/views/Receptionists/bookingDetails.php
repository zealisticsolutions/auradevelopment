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
				<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 2){ ?>
				<li>
					<a href="#">
					Treatment 
					</a>
				</li>
				<li class="active">Room</li>
				<?php } else { ?>
				<li>
					<a href="#">
					Appointment 
					</a>
				</li>
				<li class="active">Details</li>
				<?php } ?>
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
				<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 2){ ?>
					Treatment Room
				<?php } else { ?>
					Appointment Details
				<?php } ?>
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
										<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 2 ){ ?>
										Start Your Treatment
										<?php } elseif($_SESSION["USER_TYPE"] == 5){
											?>
											Counselling Form
											<?php
										}
										else { ?>
										Signed Content Form
										
										<?php }?>
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
											<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 2){ ?>
											<div id ="startTreatment" style="display:true">
											<label class=" control-label no-padding-right required" for="form-field-1"> Parameters </label>
											<textarea id ="Parameters" rows="4"  style="width: 100%;"></textarea>
											<br>
											<label class="errMsg" style="display:none" id="ParametersErr">Please enter the treatment parameters!</label> 
											<br>
											<label class=" control-label no-padding-right required" for="form-field-1"> Notes </label>
											<textarea id ="Notes" rows="4"  style="width: 100%;"></textarea>
											<br>
											<label class="errMsg" style="display:none" id="NotesErr">Please enter the treatment notes!</label>
											<br>
											</div>
											<button style="width: 100%;" id="completeTreatment" class="btn btn-info">Complete Treatment</button><br>
											<?php } ?>
											<?php 
											
										} if($_SESSION["USER_TYPE"] == 5) {?>
											<div id ="startTreatment" style="display:true">
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<?php
													$srvTypes = $tpl['bookingData']['srvType']; 
													?>
													<label class="required" for="id-date-picker-1">Treatment Categories </label>
													<div class="from-group">
														<select id="categories" class="form-control form-control-lg">
															<option value="">--Categories--</option>
															<?php foreach($srvTypes as $srvType) {?>
															<option value="<?php echo $srvType['st_id'];  ?>"><?php if(!empty($srvType['st_name'])){ echo $srvType['st_name'];} ?></option>
															<?php } ?>
														</select>
													</div>
													<label class="errMsg" style="display:none" id="categoriesErr">Please select a treatment category!</label> 
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<label class="required" for="id-date-picker-1">Treatments Plan</label>
													<div class="">
														<select id ="services" class="form-control form-control-lg">
															<option value="">--Treatments--</option>
														</select>
													</div>
													<label class="errMsg" style="display:none" id="servicesErr">Please select a treatment plan!</label>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<label class="required" for="id-date-picker-1">Sessions</label>
													<div class="">
														<input type="text" style="width: 100%;" id="Sessions" name="lname">
													</div>
													<label class="errMsg" style="display:none" id="servicesErr">Please select a treatment plan!</label>
												</div>
											</div>
											<label class=" control-label no-padding-right" for="form-field-1"> Offers </label>
											<textarea id ="Offers" rows="4"  style="width: 100%;"></textarea>
											<br>
											<label class=" control-label no-padding-right" for="form-field-1"> Others </label>
											<textarea id ="Others" rows="4"  style="width: 100%;"></textarea>
											<br>
											<label class=" control-label no-padding-right required" for="form-field-1"> Notes </label>
											<textarea id ="counsellingNotes" rows="4"  style="width: 100%;"></textarea>
											<br>
											<label class="errMsg" style="display:none" id="counsellingNotesErr">Please enter the Counselling notes!</label>
											<br>
											</div>
											<button style="width: 100%;" id="completeCounselling" class="btn btn-info">Complete Counselling</button><br>
										<?php } ?>
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
          <p>Are you sure want to complete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default completeTreatmentFinal" >Yes</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="completeCounsellingModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert</h4>
        </div>
        <div class="modal-body">
          <p>Once you complete the counselling you will not be able to edit any details!</p>
          <p>Are you sure want to complete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default completeTreatmentFinal" >Yes</button>
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

$("#completeCounselling").click(function(){	
	var categories = $("#categories").val();
	var services = $("#services").val();
	var counsellingNotes = $("#counsellingNotes").val();
	var booking_id = <?php echo $_GET['id'] ?>;
	if(categories){
		$("#categoriesErr").hide();
		if(services){
			$("#servicesErr").hide();
			if(counsellingNotes){
				$("#counsellingNotesErr").hide();
				$('#completeCounsellingModel').modal('show'); 	
			} else {
				$("#counsellingNotesErr").show();
			}
		} else {
			$("#servicesErr").show();
		}
	} else {
		$("#categoriesErr").show();
	}
});

$(".completeTreatmentFinal").click(function(){
	// alert("Test");
	if($("#Parameters").val()){
		var Parameters = $("#Parameters").val();
	} else {
		var Parameters = '';
	}
	if($("#Notes").val()){
		var Notes = $("#Notes").val();
	} else {
		var Notes = '';
	}
	if($("#categories").val()){
		var categories = $("#categories").val();
	} else {
		var categories = '';
	}
	if($("#services").val()){
		var services = $("#services").val();
	} else {
		var services = '';
	}
	if($("#counsellingNotes").val()){
		var counsellingNotes = $("#counsellingNotes").val();
	} else {
		var counsellingNotes = '';
	}
	if($("#Offers").val()){
		var Offers = $("#Offers").val();
	} else {
		var Offers = '';
	}
	if($("#Others").val()){
		var Others = $("#Others").val();
	} else {
		var Others = '';
	}
	if($("#Sessions").val()){
		var Sessions = $("#Sessions").val();
	} else {
		var Sessions = '';
	}
	var actualNote =Notes+''+counsellingNotes;
	var booking_id = <?php echo $_GET['id'] ?>;
	// if(Parameters){
		// $("#ParametersErr").hide();
		// if(Notes){
			// $("#NotesErr").hide();
			$.ajax({
			   type: "POST",
			   url: "?controller=Receptionists&action=completeTreatment",
			   dataType: 'json',
			   data: {Parameters:Parameters,Notes:actualNote,booking_id:booking_id,categories:categories,services:services,Others:Others,Offers:Offers,Sessions:Sessions},
			   success: function(data)
			   {
				if(data.status == 1){
					window.location.href = "?controller=Receptionists&action=listBooking";
				}					
			   }
			});
			
			
		// } else {
			// $("#NotesErr").show();
		// }
	// } else {
		// $("#ParametersErr").show();
	// }
});

$("#categories").change(function(){
	$('#services').empty();
	$('#services').append('<option value="">--Treatments--</option>');
	
	$('#doctors').empty();
	$('#doctors').append('<option value="">--Doctors--</option>');
     $.ajax({
		type: 'POST',
		dataType: 'json',
		url: '?controller=Receptionists&action=gerTreatments',
		data: {data:$(this).val()},
		success: function( data ) {
			$.each(data.srvType, function(i, value) {
				$('#services').append($('<option>').text(value.srv_name).attr('value', value.s_id));
				console.log(value.srv_name);
			});
		},
		error: function(xhr, status, error) {
			alert(status);
		},
    });
});

 
 </script>