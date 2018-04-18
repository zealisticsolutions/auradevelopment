<?php 

?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Settings</li>
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
			</div><!-- /.ace-settings-container -->

			<div class="page-header">
				<h1>
					Settings
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Promo Code
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="vspace-12-sm"></div>
						<form class="form-horizontal" method="post">
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="form-field-1" placeholder="Promo Code"  name="promo_code" value="<?php if(!empty($_POST['promo_code'])){echo $_POST['promo_code'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['promo_code'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['promo_code']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="form-field-1" placeholder="Promo Code Value"  name="value" value="<?php if(!empty($_POST['value'])){echo $_POST['value'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['value'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['value']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-4">
									<select id="type" class="form-control form-control-lg" name="type">
										<option value="">Select</option>
										<option value="1">In Percent</option>
										<option value="2">Flat</option>
									</select>
									<?php if(!empty($tpl['errorMsg']['type'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['type']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-2 col-sm-2">
									<div class="input-group">
										<input class="form-control date-picker" readonly value="<?php if(!empty($_POST['valid_form'])){echo $_POST['valid_form'];} ?>" name="valid_form" placeholder="Valid Form" id="appointment_date" type="text" >
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
									</div>
									<?php if(!empty($tpl['errorMsg']['valid_form'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['valid_form']; ?></label>
									<?php } ?>
								</div>
								<div class="col-xs-2 col-sm-2">
									<div class="input-group">
										<input class="form-control date-picker" readonly value="<?php if(!empty($_POST['valid_till'])){echo $_POST['valid_till'];} ?>" name="valid_till" placeholder="Valid Till" id="appointment_date" type="text" >
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
									</div>
									<?php if(!empty($tpl['errorMsg']['valid_till'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['valid_till']; ?></label>
									<?php } ?>
								</div>
							</div>
							<br>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="form-field-1" placeholder="Using Frequency"  name="frequency" value="<?php if(!empty($_POST['frequency'])){echo $_POST['frequency'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['frequency'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['frequency']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="form-field-1" placeholder="Minimum Value Limit"  name="min_value_limit" value="<?php if(!empty($_POST['min_value_limit'])){echo $_POST['min_value_limit'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['min_value_limit'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['min_value_limit']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<textarea rows="4" cols="59" name ="description" placeholder="Description"><?php if(!empty($_POST['description'])){echo $_POST['description'];} ?></textarea>
									<?php if(!empty($tpl['errorMsg']['description'])) {?>
										<br><label class="errMsg"><?php echo $tpl['errorMsg']['description']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<button style = "margin-bottom: 4px;"type="submit" class="btn btn-info btn-sm">
								<i class="ace-icon fa fa-plus bigger-110"></i>Add
							</button>
							
						</form>
						<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th>Promo Code</th>
										<th>Value</th>
										<th>Type</th>
										<th>Valid From</th>
										<th>Valid Till</th>
										

										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Created on
										</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php 
									$languages= $tpl['result'];
									// echo "<pre>";
									// print_r($languages);
									// die;
									foreach($languages as $language){
									?>
									<tr>
										<td>
											<?php echo $language['promo_code'] ?>
										</td>
										<td class="hidden-480"><?php echo $language['value'] ?></</td>
										<td class="hidden-480"><?php echo $language['type'] ?></</td>
										<td><?php  echo $date = date('d-m-Y H:i:s', strtotime ($language['valid_form'])); ?></</td>
										<td><?php  echo $date = date('d-m-Y H:i:s', strtotime ($language['valid_till'])); ?></</td>
										<td><?php  echo $date = date('d-m-Y H:i:s', strtotime ($language['created_at'])); ?></</td>
										<td>
											
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
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
<script>
$('.date-picker').datepicker({
	autoclose: true,
	todayHighlight: true,
	startDate: '-0m',
	
})
//show datepicker when clicking on the icon
.next().on(ace.click_event, function(){
	$(this).prev().focus();
});
</script>