<?php
// echo "<pre>";
// print_r($tpl['result']);
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
				<li class="active">Dashboard</li>
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
			<div class="ace-settings-container" id="ace-settings-container">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="ace-icon fa fa-cog bigger-130"></i>
				</div>

				<div class="ace-settings-box clearfix" id="ace-settings-box">
					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="no-skin" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div><!-- /.pull-left -->

					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
							<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
							<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
							<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
						</div>
					</div><!-- /.pull-left -->
				</div><!-- /.ace-settings-box -->
			</div><!-- /.ace-settings-container -->

			<div class="page-header">
				<h1>
					Appointments
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="vspace-12-sm"></div>	
							<div class="col-sm-12">
								<div class="col-sm-4">
									<div class="widget-box">
										<div class="widget-header">
											<h4 class="widget-title">Appointment Plan</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<?php
														$srvTypes = $tpl['result']['srvType']; 
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
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<label class="required" for="id-date-picker-1">Treatments </label>
														<div class="">
															<select id ="services" class="form-control form-control-lg">
																<option value="">--Treatments--</option>
															</select>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<label class="required" for="id-date-picker-1">Date </label>
														<div class="input-group">
															<input class="form-control date-picker" readonly value="" placeholder="Select Date" id="appointment_date" type="text" >
															<span class="input-group-addon">
																<i class="fa fa-calendar bigger-110"></i>
															</span>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<label class="required" for="id-date-picker-1">Available Doctors </label>
														<div class="">
															<select id ="doctors"  class="form-control form-control-lg">
																<option value="">--Doctors--</option>
															</select>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<label class="errMsg" style="display:none" id="appointmentErr">Please fill all required field! </label>
													
													</div>
												</div>
												<hr>
												
												
												<div class="widget-header">	
													<a href="#" data-action="reload" id="get_appointments">
														<button class="btn btn-info">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Get Slots
														</button>
														<br><br>
													</a>	
													
												</div>
												
											</div>
										</div>
									</div>	
								</div>
								<div class="col-sm-8" style="display:none" id="service_details">
									<div class="widget-box">
										<div class="widget-header">
											<h4 class="widget-title">Treatment Details</h4>
										</div>
										<div class="widget-body">
											<div class="widget-main">
												<div class="row">
													<div class="col-xs-12 col-sm-12">										
														<label class="required col-sm-12" for="id-date-picker-1"> Name </label>
														<div class="form-group">
															<div class="col-sm-12 col-xs-12">
																<input type="text"  placeholder="Duration" readonly name="duration" id="service_name_details" value="" class="col-xs-10 col-sm-5 popup-field" required>
																<br>
															</div>
														</div>
														
														<label class="required col-sm-12 col-xs-12" for="id-date-picker-1"> Cost </label>
														<div class="form-group">
															<div class="col-sm-12 col-xs-12">
																<input type="text"  placeholder="Cost" readonly name="duration" id="service_amount_details" value="" class="col-xs-10 col-sm-5 popup-field" required>
																<br>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12">										
														<label class="required col-sm-12 col-xs-12" for="id-date-picker-1">Duration </label>
														<div class="form-group">
															<div class="col-sm-12 col-xs-12">
																<input type="text"  placeholder="Duration" readonly name="duration" id="service_duration_details" value="" class="col-xs-10 col-sm-5 popup-field" required>
																<br>
															</div>
														</div>
														<div style="display:none">
															<label class="required col-sm-12 col-xs-12" for="id-date-picker-1">TCA Peel </label>
															<div class="form-group">
																<div class="col-sm-12 col-xs-12">
																	<input type="text"  placeholder="TCA Peel" readonly name="duration" id="service_tcapeal_details" value="" class="col-xs-10 col-sm-5 popup-field" required>
																	<br>
																</div>
															</div>
														</div>
														
													</div>
													<div class="col-xs-12 col-sm-12">
														<div class="widget-main">
															<p class="alert alert-info" id="service_desrciption_details">
																
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12" style="display:none" id="service_details1">
								<div class="widget-box">
										<div class="widget-header">
											<h4 class="widget-title">Available Slots</h4>
										</div>
										<div class="widget-body">
											<div class="widget-main">
												<div class="row" id="available_slots">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->





<!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
        <div class="modal-content">
			<form class="form-horizontal" id="bookAppointmentForm" role="form" method="post" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Book Appointment</h4>
			</div>
			<div class="modal-body">
				
					<div class="row"> 
					<div class="col-sm-6"> 
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Mobile </label>
							<div class="col-sm-9">
								<input type="number" pattern="[1-9]{1}[0-9]{9}" placeholder="Mobile" name="contact_no" id="pop_mobile" value="" class="col-xs-10 col-sm-5 popup-field" required>
							</div>
						</div>	
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Treatment </label>
							<div class="col-sm-9">
								<input type="text"  placeholder="Service Name" name="service_namme" id="pop_service_namme" readonly value="" class="col-xs-10 col-sm-5 popup-field" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Duration </label>
							<div class="col-sm-9">
								<input type="text"  placeholder="Duration" readonly name="duration" id="pop_duration" value="" class="col-xs-10 col-sm-5 popup-field" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> First Name </label>
							<div class="col-sm-9">
								<input type="text" id="firstname" placeholder="First Name" name="firstname" value="" class="col-xs-10 col-sm-5 popup-field" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Gender </label>
							<div class="col-sm-9">
								<select class="aura_select form-control popup-field" name="gender" id="gender" required>
									<option value="">Select  </option>
									<option value="1">Male</option>
									<option value="2">Female</option>
									<option value="3">Other</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Room No </label>
							<div class="col-sm-9">
								<select class="aura_select form-control popup-field" name="room" id="room" required>
									<option value="">Select  </option>
									<?php if(!empty($tpl['result']['MSRoom'])){ 
										foreach($tpl['result']['MSRoom'] as $room){ ?>
											<option value="<?php echo $room['sr_id']; ?>"><?php echo $room['sr_name']; ?></option>
										<?php	}?>
									<?php }?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth </label>
							<div class="col-sm-9">
								<input type="text" id="datepicker" placeholder="DD/MM/YYYY" readonly name="dob" value="" class="from-control date-picker1 hasDatepicker popup-field">	
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
							<div class="col-sm-9">
								<input type="text" id="address" placeholder="Address" name="address" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area </label>
							<div class="col-sm-9">
								<input type="text" id="area" placeholder="Area" name="area" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Location </label>
							<div class="col-sm-9">
								<input type="text" id="location" placeholder="Location" name="location" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						
					
						
						
						
						
					</div>
					<div class="col-sm-6"> 
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Cost </label>
							<div class="col-sm-9">
								<input type="text"  placeholder="Cost" readonly name="cost" id="pop_cost" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="Cost" readonly name="pop_st_id" id="pop_st_id" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="Cost" readonly name="pop_s_id" id="pop_s_id" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="Doctors" readonly name="pop_doctors" id="pop_doctors" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="user_exist" readonly name="user_exist" id="user_exist" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="patient_id" readonly name="patient_id" id="patient_id" required value="" class="col-xs-10 col-sm-5 popup-field">
								<input type="hidden"  placeholder="appoinment_date" readonly name="appoinment_date" id="appoinment_date" required value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Slot </label>
							<div class="col-sm-9">
								<input type="text" placeholder="Slot" readonly name="Slots" required id="pop_slots" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Last Name </label>
							<div class="col-sm-9">
								<input type="text" id="lastname" placeholder="Last Name" required name="lastname" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Blood Group </label>
							<div class="col-sm-9">
								<select class=" aura_select form-control popup-field" id="blood_group" name="blood_group">
									<option value="">Select  </option>
									<option value="A+">A+</option>
									<option value="O+">O+</option>
									<option value="B+">B+</option>
									<option value="AB+">AB+</option>
									<option value="A-">A-</option>
									<option value="O-">O-</option>
									<option value="B-">B-</option>
									<option value="AB-">AB-</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alternate Contact Details </label>
							<div class="col-sm-9">
								<input type="text" id="contact_no_a" placeholder="Alternate Contact Details"  name="contact_no_a" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pin Code </label>
							<div class="col-sm-9">
								<input type="text" id="pincode" placeholder="Pin Code" name="pincode" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City </label>
							<div class="col-sm-9">
								<input type="text" id="city" placeholder="City" name="city" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label required no-padding-right" for="form-field-1"> Email </label>
							<div class="col-sm-9">
								<input type="email" id="email_address" required placeholder="Email Address" name="email_address" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Referred By </label>
							<div class="col-sm-9">
								<input type="number" id="referred_id" placeholder="Referred By Mobile " name="referred_id" value="" class="col-xs-10 col-sm-5 popup-field">
							</div>
						</div>
						
						<div class="form-group" id="errors">
							
						</div>
						<div class="form-group" id="success">
							
						</div>
					</div>
					</div>
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-info" id="submit_button" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Submit
				</button>
				<button type="button" id="close_button" style="display:none" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</form>
        </div>
     </div>
</div>




		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
	<script src="assets/js/ace-extra.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
<script type="text/javascript">
   // $('.date-picker').datepicker({
		// autoclose: true,
		// todayHighlight: true
	// })
	
$("#services").change(function(){
	$("#service_details").hide();
	$("#service_details1").hide();
});
$("#doctors").change(function(){
	$("#service_details").hide();
	$("#service_details1").hide();
});
$("#close_button").click(function(){
	window.location.href = "?controller=Receptionists&action=bookAppinments";
});

$("#categories").change(function(){
	$("#service_details").hide();
	$("#service_details1").hide();
	$('#services').empty();
	$('#services').append('<option value="">--Treatments--</option>');
	
	$('#doctors').empty();
	$('#doctors').append('<option value="">--Doctors--</option>');
  // alert($(this).val());
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
			$.each(data.doctors, function(i, value) {
				$('#doctors').append($('<option>').text(value.name).attr('value', value.id));
				console.log(value.srv_name);
			});
		},
		error: function(xhr, status, error) {
			alert(status);
		},
    });
});
$("#pop_mobile").change(function(){
  // alert($(this).val());
	var pop_slots = $("#pop_slots").val();
	var appoinment_date = $("#appoinment_date").val();
     $.ajax({
		type: 'POST',
		dataType: 'json',
		url: '?controller=Receptionists&action=checkUserExist',
		data: {mobile:$(this).val(),pop_slots:pop_slots,appoinment_date:appoinment_date},
		success: function( data ) {
			if(data.user_exist == 1){
				// alert("All Okay");
				$("#firstname").val(data.firstname);
				$("#lastname").val(data.lastname);
				$("#gender").val(data.gender);
				$("#address").val(data.address);
				$("#blood_group").val(data.blood_group);
				$("#area").val(data.area);
				$("#location").val(data.location);
				$("#contact_no_a").val(data.contact_no_a);
				$("#pincode").val(data.pin);
				$("#city").val(data.city);
				$("#email_address").val(data.email);
				$("#user_exist").val(data.user_exist);
				$("#patient_id").val(data.id);
				
				$("#firstname").attr("readonly", "readonly");
				$("#lastname").attr("readonly", "readonly");
				$("#gender").attr("readonly", "readonly");
				$("#address").attr("readonly", "readonly");
				$("#blood_group").attr("readonly", "readonly");
				$("#area").attr("readonly", "readonly");
				$("#location").attr("readonly", "readonly");
				$("#contact_no_a").attr("readonly", "readonly");
				$("#pincode").attr("readonly", "readonly");
				$("#city").attr("readonly", "readonly");
				$("#email_address").attr("readonly", "readonly");
				
				
			} else {
				$("#firstname").val("");
				$("#lastname").val("");
				$("#gender").val("");
				$("#address").val("");
				$("#blood_group").val("");
				$("#area").val("");
				$("#location").val("");
				$("#contact_no_a").val("");
				$("#pincode").val("");
				$("#city").val("");
				$("#email_address").val("");
				$("#user_exist").val(data.user_exist);
				$("#firstname").removeAttr("readonly");
				$("#lastname").removeAttr("readonly");
				$("#gender").removeAttr("readonly");
				$("#address").removeAttr("readonly");
				$("#blood_group").removeAttr("readonly");
				$("#area").removeAttr("readonly");
				$("#location").removeAttr("readonly");
				$("#contact_no_a").removeAttr("readonly");
				$("#pincode").removeAttr("readonly");
				$("#city").removeAttr("readonly");
				$("#email_address").removeAttr("readonly");
			}
		},
		error: function(xhr, status, error) {
			alert(status);
		},
    });
});




$("#get_appointments").click(function(){
	var category = $("#categories").val();
	var services = $("#services").val();
	var appointment_date = $("#appointment_date").val();
	var doctors = $("#doctors").val();
	$('#available_slots').empty();
	// alert(available_slots);
	// alert(services);
	// alert(appointment_date);
	// alert(doctors);
	
	if(category !='' && services !='' && appointment_date !='' && doctors !=''){
		$("#appointmentErr").hide();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '?controller=Receptionists&action=getSlots',
			data: {category:category,services:services,appointment_date:appointment_date,doctors:doctors},
			success: function( data ) {
				if(data.success == 1){
					$("#service_name_details").val(data.service.srv_name);
					$("#service_duration_details").val(data.service.duration);
					$("#service_amount_details").val(data.service.amount);
					$("#service_tcapeal_details").val(data.service.tca_peel);
					$("#service_desrciption_details").html("<b>Description: </b><br>"+data.service.description);
					if(data.availableSlots==0){
						$('#available_slots').append('<div class="col-sm-12 alert alert-danger"><strong>Notice:</strong> Doctor is not available on selected date.</div>');
					} else {
						$.each(data.availableSlots, function(i, value) {
							$('#available_slots').append('<button type="button" appoinment_date="'+appointment_date+'" amount="'+data.service.amount+'" st_id="'+data.service.st_id+'"="'+data.service.amount+'" srv_name="'+data.service.srv_name+'" slot="'+value+'" duration="'+data.service.duration+'"  s_id="'+data.service.s_id+'" s_id="'+data.service.s_id+'"  style="margin-top: 1%; font-size: 10px; margin-left: 1%;" class="btn btn-sm bookSlot btn-success"><i class="ace-icon fa fa-clock-o bigger-110"></i><b>'+value+'</b></button>');
						});
					}
					$("#service_details").show();
					$("#service_details1").show();
				}
			},
			error: function(xhr, status, error) {
				alert(status);
			},
		});
	} else {
		$("#appointmentErr").show();
	}
	
});


</script>
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
					startDate: '-0m',
					
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('.date-picker1').datepicker({
					autoclose: true,
					todayHighlight: true,
					
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$(document).on('change', '.date-picker', function() {
				   // alert($(this).val());
				   var appoinment_date = $(this).val();
				   $("#service_details").hide();
				   $("#service_details1").hide();
				   if(appoinment_date){
						 // $.ajax({
							// type: 'POST',
							// dataType: 'json',
							// url: '?controller=Receptionists&action=gerTreatments',
							// data: {data:$(this).val()},
							// success: function( data ) {
								// $.each(data.srvType, function(i, value) {
									
								// });
							// },
							// error: function(xhr, status, error) {
								// alert(status);
							// },
						// });
				   }
				   
				});
				
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
			
$(document).on('click', '.bookSlot', function(event) {
	var amount = $(this).attr("amount");
	var srv_name = $(this).attr("srv_name");
	var slot = $(this).attr("slot");
	var duration = $(this).attr("duration");
	var pop_st_id = $(this).attr("st_id");
	var pop_s_id = $(this).attr("s_id");
	var appoinment_date = $(this).attr("appoinment_date");
	
	$("#pop_cost").val(amount);
	$("#pop_service_namme").val(srv_name);
	$("#pop_slots").val(slot);
	$("#appoinment_date").val(appoinment_date);
	$("#pop_duration").val(duration);
	$("#pop_st_id").val(pop_st_id);
	$("#pop_s_id").val(pop_s_id);
	$("#pop_doctors").val($("#doctors").val());
	$("#room option").removeAttr('disabled');
	$("#room option").css('background-color', 'white');
	 $.ajax({
			type: 'POST',
			dataType: 'json',
			url: '?controller=Receptionists&action=getAvailableRoom',
			data: {appoinment_date:appoinment_date,slot:slot},
			success: function( data ) {
				
				$.each(data.booked_room, function(i, value) {
					console.log(value);
					$('#room').children('option[value="' + value.room_id + '"]').attr('disabled', true);
					$("#room option[value='"+ value.room_id +"']").css('background-color', 'red');
					
				});
				$('#myModal').modal('show');
			},
			error: function(xhr, status, error) {
				alert(status);
			},
		});
   
});

$("#bookAppointmentForm").submit(function(e) {

	var user_exist = $("#user_exist").val();
	$("#submit_button").attr("disabled", "disabled");
	// alert(user_exist);
	if(user_exist ==2){
		var url = "?controller=Receptionists&action=createNewUser"; // the script where you handle the form input.
		// var url = "?controller=Receptionists&action=complteBooking"; // the script where you handle the form input.
	} else {
		var url = "?controller=Receptionists&action=complteBooking"; // the script where you handle the form input.
	}
    $('#errors').empty();
	$.ajax({
	   type: "POST",
	   url: url,
	   dataType: 'json',
	   data: $("#bookAppointmentForm").serialize(), // serializes the form's elements.
	   success: function(data)
	   {
		   // console.log(data.errMsg); // show response from the php script.
		   e.preventDefault();
		   if(data.errMsg){
			    $("#submit_button").removeAttr("disabled");
			    $.each(data.errMsg, function(i, value) {
					$('#errors').append('<label class="errMsg" >'+value+'</label><br>');
					console.log(value);
				});
		   }
		   if(data.status == 1){
				$("#submit_button").hide();
				$("#submit_button").hide();
				$("#close_button").show();
				$('#success').append('<label class="" style="color:green" >'+data.message+'</label><br>');
		   }
		   
	   }
	 });
	// alert("greate");
	// var data = $("#bookAppointmentForm").serialize();
	// console.log(data);
    e.preventDefault(); // avoid to execute the actual submit of the form.
});



</script>