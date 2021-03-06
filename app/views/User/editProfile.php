<?php
// echo "<pre>";
// print_r($_POST);
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
					User
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
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> First Name </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="First Name" name="firstname" value="<?php if(!empty($_POST['firstname'])){echo $_POST['firstname'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['firstname'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['firstname']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Last Name </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Last Name"  name="lastname" value="<?php if(!empty($_POST['lastname'])){echo $_POST['lastname'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['lastname'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['lastname']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Gender </label>

								<div class="col-sm-4">
									<select class="chosen-select aura_select form-control" name="gender" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select </option>
										<option value="1" <?php if(!empty($_POST['gender']) And $_POST['gender'] == 1){echo "selected";} ?>>Male</option>
										<option value="2" <?php if(!empty($_POST['gender']) And $_POST['gender'] == 2){echo "selected";} ?>>Female</option>
										<option value="3" <?php if(!empty($_POST['gender']) And $_POST['gender'] == 3){echo "selected";} ?>>Other</option>
									</select>
									<?php if(!empty($tpl['errorMsg']['gender'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['gender']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Date of Birth </label>

								<div class="col-sm-3">
									<input type="text" id="datepicker" readonly placeholder="MM/DD/YYYY" name="dob" value="<?php if($_POST['dob'] != "0000-00-00 00:00:00"){echo date("d/m/Y", strtotime($_POST['dob']));} ?>" class="from-control date-picker">	
									<?php if(!empty($tpl['errorMsg']['dob'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['dob']; ?></label>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Marriage Anniversary Date </label>

								<div class="col-sm-9">
									<input type="text" id="datepicker2" readonly placeholder="MM/DD/YYYY" name="marriage_date" value="<?php if($_POST['marriage_date'] != "0000-00-00 00:00:00" ){echo date("d/m/Y", strtotime($_POST['marriage_date']));} ?>" class="from-control date-picker">	
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Referred By </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" pattern="[1-9]{1}[0-9]{9}" placeholder="Referred By User's Mobile No" name="referred_id" value="<?php if(!empty($_POST['referred_id'])){echo $_POST['referred_id'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Blood Group </label>

								<div class="col-sm-4">
									<select class="chosen-select aura_select form-control" name="blood_group" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select  </option>
										<option value="A+" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "A+" ){echo "selected";} ?>>A+</option>
										<option value="O+" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "O+" ){echo "selected";} ?>>O+</option>
										<option value="B+" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "B+" ){echo "selected";} ?>>B+</option>
										<option value="AB+" <?php if(!empty($_POST['blood_group']) AND $_POST['blood_group'] == "AB+"){echo "selected";} ?>>AB+</option>
										<option value="A-" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "A-" ){echo "selected";} ?>>A-</option>
										<option value="O-" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "O-" ){echo "selected";} ?>>O-</option>
										<option value="B-" <?php if(!empty($_POST['blood_group'] ) AND $_POST['blood_group'] == "B-" ){echo "selected";} ?>>B-</option>
										<option value="AB-" <?php if(!empty($_POST['blood_group']) AND $_POST['blood_group'] == "AB-"){echo "selected";} ?>>AB-</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Mobile </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Contact Details"  name="contact_no" value="<?php if(!empty($_POST['contact_no'])){echo $_POST['contact_no'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['contact_no'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['contact_no']; ?></label>
									<?php } ?>
									<?php if(!empty($tpl['mobileExistErr'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['mobileExistErr']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alternate Contact Details </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Alternate Contact Details" name="contact_no_a" value="<?php if(!empty($_POST['contact_no_a'])){echo $_POST['contact_no_a'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Address" name="address" value="<?php if(!empty($_POST['address'])){echo $_POST['address'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Area" name="area" value="<?php if(!empty($_POST['area'])){echo $_POST['area'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Location </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Location" name="location" value="<?php if(!empty($_POST['location'])){echo $_POST['location'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="City" name="city" value="<?php if(!empty($_POST['city'])){echo $_POST['city'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pin Code </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Pin Code" name="pin" value="<?php if(!empty($_POST['pin'])){echo $_POST['pin'];} ?>" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							
							<!--<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Language </label>

								<div class="col-sm-4">
									<select class="chosen-select aura_select form-control" name="language" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select  </option>
										<?php 
											// $languages= $tpl['result']['language'];
											// foreach($languages as $language){
										?>
										<option value="<?php //echo $language['language_id']; ?>"><?php //echo $language['language_name'] ?></option>
										<?php 
											// }
										?>
									</select>
								</div>
							</div>
							-->
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> User Type </label>

								<div class="col-sm-4">
									<select class="chosen-select aura_select form-control " required name="type" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select  </option>
										<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 1){ ?>
											<option value="1" <?php if(!empty($_POST['type']) And $_POST['type'] == 1){echo "Selected";} ?>>Admin</option>
											<option value="4" <?php if(!empty($_POST['type']) And $_POST['type'] == 4){echo "Selected";} ?>>Receptionist</option>
											<option value="2" <?php if(!empty($_POST['type']) And $_POST['type'] == 2){echo "Selected";} ?>>Therapist</option>
											<option value="5" <?php if(!empty($_POST['type']) And $_POST['type'] == 5){echo "Selected";} ?>>Counsellor</option>
										<?php } ?>
										<option value="3" <?php if(!empty($_POST['type']) And $_POST['type'] == 3){echo "Selected";} ?>>Patient</option>
										
									</select>
									<?php if(!empty($tpl['errorMsg']['user_type'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['user_type']; ?></label>
									<?php } ?>
								</div>								
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Status </label>
								<div class="col-sm-4">
									<select class="chosen-select aura_select form-control " name="status" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select  </option>
										<option value="1" <?php if(!empty($_POST['status']) And $_POST['status'] == 1){echo "selected";} ?>>Active</option>
										<option value="2" <?php if($_POST['status'] == 0){echo "selected";} ?>>Inactive</option>
									</select>
									<?php if(!empty($tpl['errorMsg']['user_type'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['user_type']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Image Capture </label>
								<div class="col-sm-9">
									<div class="upload-btn-wrapper">
									  <button class="btnFile"><i class="fa fa-camera" aria-hidden="true"></i></button>
									  <input type="file" accept="image/*;capture=camera" id="form-field-1" placeholder="Image Capture" name="picture" class="col-xs-10 col-sm-5" />
									</div>
								</div>	
							</div>
							
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Update
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</div>
							
						</div>
							
							
						</form>

					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   
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
<script type="text/javascript">
    // $( "#datepicker" ).datepicker();
    // $( "#datepicker2" ).datepicker();
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
	})
</script>
