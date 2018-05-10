<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Treatment</a>
				</li>
				<li class="active">Room</li>
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
					Treatment
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Room
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="cacel_appointment" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert!</h4>
        </div>
        <div class="modal-body">
			<input type="hidden" id="app_id_cancel" value="">
          <p>Are you sure want to cancel appointment?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <input type="button" id="cancelAppoint" class="btn btn-success" value="Yes" >
        </div>
      </div>
    </div>
  </div>

<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		loadBookingTable();
		//initiate dataTables plugin
		$(document).on('change', '.date-picker', function() { 
			var startDate = $(this).val();
			if(startDate){
				loadBookingTable();
			}
		});
		
		$(document).on('change', '.date-picker2', function() { 
			var startDate = $(this).val();
			if(startDate){
				loadBookingTable();	
			}
		});
		$(document).on('change', '#rooms', function() { 
			loadBookingTable();	
		});
		$(document).on('change', '#doctor', function() { 
			loadBookingTable();	
		});
		$(document).on('change', '#treatments', function() { 
			loadBookingTable();	
		});
		
		$(document).on('click', '.cancel', function() { 
			// alert($(this).attr("app_id"));
			$("#app_id_cancel").val($(this).attr("app_id"));
			$('#cacel_appointment').modal('show');
			
			
		});
		// $(document).on('click', '#cancelAppoint', functimenton() { 
			// alert("hhhhhhh");
		// });
		
		$("#cancelAppoint").click(function(){
			var app_id_cancel = $("#app_id_cancel").val();
			$.ajax({
				   type: "POST",
				   url: "?controller=Receptionists&action=cancelAppointment",
				   dataType: 'json',
				   data: {app_id_cancel:app_id_cancel}, // serializes the form's elements.
				   success: function(data)
				   {
					    if(data.status == 1){
							location.href="?controller=Receptionists&action=listBooking";
					    }						   
				   }
				 });
			});
		
		
		function loadBookingTable(){
			var start_date = $(".date-picker").val();
			var end_date = $(".date-picker2").val();
			var rooms = $("#rooms").val();
			var doctor = $("#doctor").val();
			var treatments = $("#treatments").val();
			if ( $.fn.DataTable.isDataTable('#dynamic-table') ) {
				$('#dynamic-table').DataTable().destroy();
			}
			$('#dynamic-table').DataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sPageButton": "paginate_button",
				"bPaginate": true,
				"order": [[ 6, "desc" ]],
				"ajax": {
				"url": "?controller=Receptionists&action=ListBookingTable&start_date="+start_date+"&end_date="+end_date+"&rooms="+rooms+"&doctor="+doctor+"&treatments="+treatments,
					"type": "POST",
					"dataType": "json",
					// "data":{start:0,length:10},
					// "contentType": 'application/json; charset=utf-8',
				},
				 "columns": [
					{ "data": "name" },
					{ "data": "doctor_lname" },
					{ "data": "e_slots" },
					// { "data": "r_lastname" },
					{ "data": "treatment_room" },
					{ "data": "treatment_name" },
					{ "data": "canceled_by" },
					{ "data": "booking_id" },
					{ "data": "doctor_fname" },
					{ "data": "p_firstname" },
					{ "data": "p_lastname" },
					{ "data": "doctor_lname" },
					
				],
				"columnDefs": [
					{
						"targets": [ 7 ],
						"visible": false,
						"searchable": true
					},
					{
						"targets": [ 8 ],
						"visible": false,
						"searchable": true
					},
					{
						"targets": [ 9 ],
						"visible": false,
						"searchable": true
					},
					{
						"targets": [ 10 ],
						"visible": false,
						"searchable": true
					},
				   
				],
				"language": {
					"infoFiltered":"",
					"processing": "<img src='assets/logo/spinner-gif.gif' height='75' width='75' />"
				}
			} );
		}
		$.fn.dataTable.ext.classes.sPageButton = 'btn btn-success';
		// $(".date-picker").datepicker(
		// "setDate", new Date()
		// );
		// var startDate= new Date();
		// $('.date-picker').val(startDate);
		var d = new Date();
           var currMonth = d.getMonth();
           var currYear = d.getFullYear();
           var startDate = new Date(currYear, currMonth, 1);
		$('.date-picker').datepicker({
			autoclose: true,
			minDate: 0,
			defaultDate: "+1w",
			todayHighlight: true,
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		 $(".date-picker").datepicker("setDate", d);
		$('.date-picker2').datepicker({
			autoclose: true,
			todayHighlight: true,
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		 $(".date-picker2").datepicker("setDate", d);
		
		
		
	})
</script>
