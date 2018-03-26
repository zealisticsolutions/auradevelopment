
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
							<?php if(!empty($_SESSION['scheduleErr'])){ echo $_SESSION['scheduleErr'];} $_SESSION['scheduleErr'] ="";?>
						</div>
						<div class="form-group">
							<div class="action-buttons">
								<a class="green add_schdule" href="#" id="">
									<i style="margin-top: 10px;margin-left: 25%;" class="ace-icon fa fa-plus bigger-130"></i>
								</a>
							</div>
						</div>
						<div id="put_in" style="margin-left: 5%;">
							<div class="form-group" id="take_it">
								<div class="input-group custom_datepicker clockpicker pull-center" style="width: 50%;margin-bottom: 1%;" data-placement="left" data-align="top" data-autoclose="true">
									<input type="text" required name="start_time[]" pattern="(?:[01]\d|2[0123]):(?:[012345]\d):(?:[012345]\d)" placeholder="HH:MM:SS" title="HH:MM:SS time format">
								</div>
								<div class="input-group1 custom_datepicker clockpicker1 pull-center" style="width: 50%;margin-bottom: 1%;" data-placement="left" data-align="top" data-autoclose="true">
									<input type="text" required name="end_time[]" pattern="(?:[01]\d|2[0123]):(?:[012345]\d):(?:[012345]\d)" placeholder="HH:MM:SS" title="HH:MM:SS time format">
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
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>
											<i class="ace-icon fa fa-cogs bigger-110 hidden-480"></i>
											Day
										</th>
										<th>
											<i class="ace-icon fa fa-inr bigger-110 hidden-480"></i>
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
									<td class="center">
										<label class="pos-rel">
											<input type="checkbox" class="ace" />
											<span class="lbl"></span>
										</label>
									</td>

									<td>
									
										<?php if(!empty($patient['day'])) {
												if($patient['day']==1){
													echo "Sunday";
												}
												if($patient['day']==2){
													echo "Monday";
												}
												if($patient['day']==3){
													echo "Tuesday";
												}
												if($patient['day']==4){
													echo "Wednesday";
												}
												if($patient['day']==5){
													echo "Thursday";
												}
												if($patient['day']==6){
													echo "Friday";
												}
												if($patient['day']==7){
													echo "Saturday";
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
<script src="assets/js/jquery.dataTables.min.js"></script>

<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<script src="assets/js/bootstrap-clockpicker.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-clockpicker.min.css">
<link rel="stylesheet" href="assets/css/github.min.css">
 <!-- inline scripts related to this page -->
<script type="text/javascript">
$(document).ready(function(){
	$('input[name="all"],input[name="title"]').bind('click', function(){
	var status = $(this).is(':checked');
	toggleAllWorkers(status);
	});
	
	function toggleAllWorkers(status) {
		$('.emp').prop('checked',status);
	}
	
	
	// Manual operations
	
	
});
	
</script>
<script type="text/javascript">
// $('.clockpicker').clockpicker()
	// .find('input').change(function(){
		// console.log(this.value);
	// });


// $('.clockpicker1').clockpicker()
	// .find('input').change(function(){
		// console.log(this.value);
	// });
// var input = $('#single-input').clockpicker({
	// placement: 'bottom',
	// align: 'left',
	// autoclose: true,
	// 'default': 'now'
// });

// $('.clockpicker-with-callbacks').clockpicker({
		// donetext: 'Done',
		// init: function() { 
			// console.log("colorpicker initiated");
		// },
		// beforeShow: function() {
			// console.log("before show");
		// },
		// afterShow: function() {
			// console.log("after show");
		// },
		// beforeHide: function() {
			// console.log("before hide");
		// },
		// afterHide: function() {
			// console.log("after hide");
		// },
		// beforeHourSelect: function() {
			// console.log("before hour selected");
		// },
		// afterHourSelect: function() {
			// console.log("after hour selected");
		// },
		// beforeDone: function() {
			// console.log("before done");
		// },
		// afterDone: function() {
			// console.log("after done");
		// }
	// })
	// .find('input').change(function(){
		// console.log(this.value);
	// });


// $('#check-minutes').click(function(e){

	// e.stopPropagation();
	// input.clockpicker('show')
			// .clockpicker('toggleView', 'minutes');
// });
// if (/mobile/i.test(navigator.userAgent)) {
	// $('input').prop('readOnly', true);
// }

$( ".add_schdule" ).click(function() {
  $("#take_it").clone().appendTo("#put_in");
});
</script>
