
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">My Schedule</li>
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
					Doctor
					<small>
						My Schedule
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
				
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
				<?php if(!empty($_SESSION["USER_TYPE"]) And ($_SESSION["USER_TYPE"] == 1)){ ?>
					<form class="form-horizontal" method="post">
						
						<div class="form-group">
							<div class="col-sm-3">
								<input type="checkbox" name="title" id="title_1" /> <label for="title_1"><strong>Everyday</strong></label>
							</div>
							
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_2" value="1" /> <label for="box_2">Monday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_3" value="2" /> <label for="box_3">Tuesday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_4" value="3" /> <label for="box_4">Wednesday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_5" value="4" /> <label for="box_4">Thursday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_6" value="5" /> <label for="box_4">Friday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_7" value="6" /> <label for="box_4">Saturday</label>
							</div>
							<div class="col-sm-3">
								<input type="checkbox" class="emp" name="day[]" id="box_1" value="7" /> <label for="box_1">Sunday</label>
							</div>
						</div>
						
					
						
						<div class="form-group">
							<label class="errMsg"><?php if(!empty($_SESSION['scheduleErr'])){ echo $_SESSION['scheduleErr'];} $_SESSION['scheduleErr'] ="";?></label>
							
						</div>
						<div class="form-group">
							<div class="action-buttons">
								<a class="green add_schdule" href="#" id="">
									<i style="margin-top: 10px;margin-left: 25%;" class="ace-icon fa fa-plus bigger-130"></i>
								</a>
							</div>
						</div>
						<div id="put_in" style="margin-left: 0%;">
							<div class="form-group" id="take_it">
								<div class="input-group custom_datepicker clockpicker pull-center" style="width: 50%;margin-bottom: 1%;" data-placement="left" data-align="top" data-autoclose="true">
									<input type="text" required name="start_time[]" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" placeholder="HH:MM" title="HH:MM time format">
								</div>
								<div class="input-group1 custom_datepicker clockpicker1 pull-center" style="width: 50%;margin-bottom: 1%;" data-placement="left" data-align="top" data-autoclose="true">
									<input type="text" required name="end_time[]" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" placeholder="HH:MM" title="HH:MM time format">
								</div>
							</div>
						</div>
						
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>
					</form>
				<?php } ?>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>
											<i class="ace-icon fa fa-cogs bigger-110 hidden-480"></i>
											Day
										</th>
										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Start Time
										</th>

										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											End Time
										</th>
									</tr>
								</thead>

							<tbody>
							<?php 
								
								$patients = $tpl['result'];
								foreach($patients as $patient) {
							?>
								<tr>
									<td>
									
										<?php if(!empty($patient['day'])) {
												if($patient['day']==1){
													echo "Monday";
												}
												if($patient['day']==2){
													echo "Tuesday";
												}
												if($patient['day']==3){
													echo "Wednesday";
												}
												if($patient['day']==4){
													echo "Thursday";
												}
												if($patient['day']==5){
													echo "Friday";
												}
												if($patient['day']==6){
													echo "Saturday";
												}
												if($patient['day']==7){
													echo "Sunday";
												}
											
											} else {echo "NA";} ?>
									</td>
									
									<td><?php  if(!empty($patient['start_time'])) { echo  $patient['start_time'];} else {echo "NA";}?></td>
									
									<td><?php if(!empty($patient['end_time'])){ echo  $patient['end_time']; } else { echo "NA";}?></td>
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="assets/css/chosen.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<script src="assets/js/ace-extra.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="assets/js/jquery-2.1.4.min.js"></script>
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
$(document).ready(function(){
	$('input[name="all"],input[name="title"]').bind('click', function(){
	var status = $(this).is(':checked');
	toggleAllWorkers(status);
	});
	
	function toggleAllWorkers(status) {
		$('.emp').prop('checked',status);
	}
});

$(function() {
	$('#datetimepicker3').datetimepicker({
		pickDate: false
	});
});
$( ".add_schdule" ).click(function() {
  $("#take_it").clone().appendTo("#put_in");
});
$('.start_time').timepicker({
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

$('.end_time').timepicker({
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

 $('input[id^=start_time]').removeClass('hasDatepicker');
 $('input[id^=end_time]').removeClass('hasDatepicker');
</script>
<script type="text/javascript">

</script>
