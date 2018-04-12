<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Campaign</li>
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
					Campaign
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Start
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<h1>Filter Yor Campaign</h1>
					</div><!-- /.page-header -->
					
					<div class="row">
						<div class="col-sm-2">
							<select id="city" class="form-control form-control-lg" name="type">
								<option value="">City</option>
								<?php 
								if(!empty($tpl['city'])){ $cities = $tpl['city']; } 
								foreach($cities as $city){
								?>
								<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-2">
							<select id="location" class="form-control form-control-lg" name="type">
								<option value="">Location</option>
							</select>
						</div>
						<div class="col-sm-2">
							<select id="gender" class="form-control form-control-lg" name="type">
								<option value="">Gender</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
							</select>
						</div>
						<div class="col-sm-2">
							<select id="age" class="form-control form-control-lg" name="type">
								<option value="">Age</option>
								<option value="1">Below 9</option>
								<option value="2">10 to 19</option>
								<option value="3">20 to 29</option>
								<option value="4">30 to 39</option>
								<option value="5">40 to 49</option>
								<option value="6">50 to 59</option>
								<option value="7">60 Plus</option>
							</select>
						</div>
						<div class="col-sm-2">
							<button type="button" id="start_campaign" class="btn btn-sm btn-success">Start Campaign</button>
						</div>
						<div class="col-sm-2">
							<input type="hidden" id="selected_value" name="country" value="">
						</div>
					</div>
					<br><br>
					<!-- PAGE CONTENT ENDS -->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
									Name
								</th>
								<th>
									<i class="ace-icon fa fa-envelope bigger-110 hidden-480"></i>
									Email
								</th>
								<th class="hidden-480">
									Gender
								</th>

								<th>
									<i class="ace-icon fa fa-mobile bigger-110 hidden-480"></i>
									Mobile
								</th>
								<th class="hidden-480">Status</th>
								<th class="hidden-480">Action</th>
								<th>
									<input type="checkbox" id="ckbCheckAll" />
									All
								</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>


<style>
.ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: +1000 !important;
  width: 97%;
}

.ajax-loader img {
  position: relative;
  top:50%;
  left:33%;
}
</style>
 <!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close hide_button"  data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Broadcast Campaign</h4>
			</div>
			<div class="modal-body">
				
				<select class="form-control" id="campaign_type" style="width: 17%;" name="template_type" id="form-field-select-2">
					<option value="">Campaign Type</option>
					<option value="1">SMS</option>
					<option value="2">EMAIL</option>
				</select>
				<label class="errMsg" style="display:none" id="campaign_type_error" >Please select a campaign type !</label>
				<br>
				<div class="ajax-loader">
				  <img src="assets/logo/spinner-gif.gif" class="img-responsive" />
				</div>
				<div id="emailDiv" style="display:none">
					<textarea name ="content" id ="description"></textarea>
					<label class="errMsg" style="display:none" id="email_content_error" >Please enter the content!</label>
				</div>
				<div id="smsDiv" style="display:none">
					<textarea rows="7" cols="120"  name ="content1" id ="description1"></textarea>
					<label class="errMsg" style="display:none" id="sms_content_error" >Please enter the content!</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default hide_button" data-dismiss="modal">Close</button>
				<button type="button" id="sendcampaign" class="btn btn-sm btn-success hide_button">Broadcast Campaign</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Alert</h4>
			</div>
			<div class="modal-body">
				<p>Please Select atleast one patient to start your campaign !</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$("#ckbCheckAll").click(function () {
			$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		});
		$("#sendcampaign").click(function () {
			// alert("message sent");
			var campaign_type = $("#campaign_type").val();
			var description1 = $("#description1").val();
			var description = CKEDITOR.instances['description'].getData();
			if(campaign_type){
				$("#campaign_type_error").hide();
				if(campaign_type == 1){
					if(description1){
						$("#sms_content_error").hide();
						var selected_value = $("#selected_value").val();
						alert(campaign_type);
						alert(description1);
						$.ajax({ 
							type: 'POST', 
							dataType: 'json',
							url: '?controller=Campaign&action=runSMSCampaign', 
							data: { selected_value:selected_value,campaign_type:campaign_type,description1:description1 },
							beforeSend: function(){
								$('.ajax-loader').css("visibility", "visible");
								$('.hide_button').hide();
							},
							complete: function(){
								$('.ajax-loader').css("visibility", "hidden");
								$('.hide_button').show();
							},
							success: function (data) { 			
							}
						});
					} else {
						$("#sms_content_error").show();
					}
				}
				if(campaign_type == 2){
					if(description){
						$("#email_content_error").hide();
						var selected_value = $("#selected_value").val();
						$.ajax({ 
							type: 'POST', 
							dataType: 'json',
							url: '?controller=Campaign&action=runEmailCampaign', 
							data: { selected_value:selected_value,campaign_type:campaign_type,description:description },
							beforeSend: function(){
								$('.ajax-loader').css("visibility", "visible");
								$('.hide_button').hide();
							},
							complete: function(){
								$('.ajax-loader').css("visibility", "hidden");
								$('.hide_button').show();
							},
							success: function (data) { 			
							}
						});
						
					} else {
						$("#email_content_error").show();
					}
				}
			} else {
				$("#campaign_type_error").show();
			}
		});
		
		$('#campaign_type').on('change', function() {
			var campaign_type = $("#campaign_type").val();
			// alert(campaign_type);
			if(campaign_type == 1){
				$("#smsDiv").show();
				$("#emailDiv").hide();
			}
			if(campaign_type == 2){
				$("#emailDiv").show();
				$("#smsDiv").hide();
			}
		});
		
		
		$("#start_campaign").click(function(){
			
			var yourArray = [];
			$("input:checkbox[name=type]:checked").each(function(){
				yourArray.push($(this).val());
			});
			$("#selected_value").val(yourArray);
			var selected_value = $("#selected_value").val();
			if(selected_value){
				$('#myModal').modal('show');
			} else { 
				$('#myModal1').modal('show');
			}
			// console.log(yourArray);
		});
		
		$('#city').on('change', function() {
			var city = this.value;
			$('#location').empty();
			$('#location').append('<option value="">Select</option>');
			$.ajax({ 
				type: 'POST', 
				dataType: 'json',
				url: '?controller=Campaign&action=getLocation', 
				data: { city:city }, 
				success: function (data) { 
					// alert("done");
					// console.log(data);
					
					$.each(data.location, function(i, value) {
						$('#location').append('<option value="'+value+'">'+value+'</option>');
						// alert("test");
						console.log(data.location);
					});
					
								
				}
			});
		});
		
		
		$('#city').on('change', function() {
			loadTable();
		});
		$('#location').on('change', function() {
			loadTable();
		});
		$('#gender').on('change', function() {
			loadTable();
		});
		$('#age').on('change', function() {
			loadTable();
		});
		
		//initiate dataTables plugin
		loadTable();
		function loadTable(){
			var city = $("#city").val();
			var location = $("#location").val();
			var gender = $("#gender").val();
			var age = $("#age").val();
			// alert(city);
			// alert(location);
			// alert(gender);
			// alert(age);
			if ( $.fn.dataTable.isDataTable( '#dynamic-table' ) ) {
				// myTable = $('#dynamic-table').DataTable();
				$('#dynamic-table').dataTable().fnDestroy();
			}
			var myTable = 
			$('#dynamic-table').DataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sPageButton": "paginate_button",
				"bPaginate": true,
				"order": [[ 0, "desc" ]],
				"ajax": {
				"url": "?controller=Campaign&action=newPatient1",
					"type": "POST",
					"dataType": "json",
					"data":{city:city,location:location,gender:gender,age:age},
					// "contentType": 'application/json; charset=utf-8',
				},
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				 "columns": [
					
					{ "data": "name" },
					{ "data": "email" },
					{ "data": "gender" },
					{ "data": "contact_no" },
					{ "data": "status" },
					{ "data": "action" },
					{ "data": "check" }
				],
				"columnDefs": [
				   { "orderable": false, targets: 6 }
				],
				"language": {
					"infoFiltered":"",
					"processing": "<img src='assets/logo/spinner-gif.gif' height='75' width='75' />"
				}
			});
		}
	
		$.fn.dataTable.ext.classes.sPageButton = 'btn btn-success';

		
		
		
	})
</script>
<script>
	CKEDITOR.replace( 'description' );
</script>