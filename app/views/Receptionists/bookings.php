<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Calendar</li>
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
								Appointment Calendar
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Calendar View
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-sm-9">
										<div class="space"></div>

										<div id="calendar"></div>
									</div>	
									<div class="col-sm-3">
										<div class="widget-box transparent" style="margin-top: 3%;">
											<div class="widget-header">
												<h2>Doctor List</h2>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div id="external-events">
														<div tabindex="0" class="doctor_name external-event" data-class="label-grey">
															<label style="    margin-left: 5%;margin-top: 4%;margin-bottom: 3%;">
																<input  type="checkbox" class="doctor-list ace ace-checkbox" checked id="drop-remove" value="all" />
																<span class="lbl"> All Doctor</span>
															</label>
														</div>
														<?php $doctor = $tpl['doctor']; 
														for ($i = 0; $i < count($doctor); $i++){
															// echo "hhhhh";
														?>
														
														<div tabindex="<?php echo $i + 1; ?>" class="doctor_name external-event <?php echo $doctor[$i]['appointment_color']; ?>" data-class="label-grey">
															<label style="    margin-left: 5%;margin-top: 4%;margin-bottom: 3%;">
																<input  type="checkbox" class="doctor-list ace ace-checkbox" id="drop-remove" value="<?php echo $doctor[$i]['id']; ?>" />
																<span class="lbl"> <?php echo $doctor[$i]['firstname']." ".$doctor[$i]['lastname']; ?></span>
															</label>
														</div>
														
														<?php } ?>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/fullcalendar.min.js"></script>
		<script src="assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
			
<script type="text/javascript">
jQuery(function($) {

    /* initialize the external events
	-----------------------------------------------------------------*/
	
	// $('.doctor_name').click(function(){
		// $(this).focus();
	// });
	
	$('.doctor-list').on('change', function() {
        $('.doctor-list').not(this).prop('checked', false);  
    });
	

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
// var doctor_id = $('.doctor-list:checked').val()
	// alert(doctor_id);
$('#calendar').fullCalendar({
	// var doctor_id = $('.doctor-list:checked').val()
	// alert(checkedValue);
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	},
  events: function(start, end, timezone, callback) {
    $.ajax({
      url: '?controller=Receptionists&action=dataBooking',
      dataType: 'json',
      data: {
        // our hypothetical feed requires UNIX timestamps
        start: start.unix(),
        end: end.unix()
        // doctor_id: end.unix(),
		// doctor_id: $('.doctor-list:checked').val()
      },
      success: function(doc) {
		// console.log(doc.events);
		// alert("jkhjk");
        var events = [];
			
			$.each(doc.events, function(i, value) {
				events.push({
					title: value.title,
					start: value.start,
					className: value.className,
					end: value.end,
					patient_name: value.patient_name,
					patient_pic: value.patient_pic,
					patient_mobile: value.patient_mobile,
					patient_email: value.patient_email,
					patient_gender: value.patient_gender,
					patient_dob: value.patient_dob,
					slot: value.slot,
					doctor_id: value.doctor_id,
					doctor_name: value.doctor_name,
					treatment_room: value.treatment_room,
					rec_booked_by: value.rec_booked_by,
					rec_canceled_by: value.rec_canceled_by,
				});
			});
        callback(events);
      }
    });
  },
  // eventClick: function(calEvent, jsEvent, view) {

			
			// var modal = 
			// '<div class="modal fade">\
			  // <div class="modal-dialog">\
			   // <div class="modal-content">\
				 // <div class="modal-body">\
				   // <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   // <form class="no-margin">\
					  // <label>Change event name &nbsp;</label>\
					  // <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 // <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   // </form>\
				 // </div>\
				 // <div class="modal-footer">\
					// <button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					// <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 // </div>\
			  // </div>\
			 // </div>\
			// </div>';
		
		
			// var modal = $(modal).appendTo('body');
			// modal.find('form').on('submit', function(ev){
				// ev.preventDefault();

				// calEvent.title = $(this).find("input[type=text]").val();
				// calendar.fullCalendar('updateEvent', calEvent);
				// modal.modal("hide");
			// });
			// modal.find('button[data-action=delete]').on('click', function() {
				// calendar.fullCalendar('removeEvents' , function(ev){
					// return (ev._id == calEvent._id);
				// })
				// modal.modal("hide");
			// });
			
			// modal.modal('show').on('hidden', function(){
				// modal.remove();
			// });
		// },
		 eventMouseover: function(calEvent, jsEvent) {  

			var durationTime = moment(calEvent.start).format('HH') + ":" + moment(calEvent.start).format('mm') + " - " + moment(calEvent.end).format('HH') + ":" + moment(calEvent.end).format('mm')
			var serviceName = calEvent.serviceName;
			
			// var tooltip = '<div class="tooltipevent" style="width:500px;  height:500px; position:absolute;z-index:1000;">' + durationTime + serviceName +'</div>';
			var tooltip = ' <div class="tooltipevent" style="width:300px;  height:500; position:absolute;z-index:1000;">\
								<div class="panel panel-danger">\
								  <div class="panel-heading">Appointment Details</div>\
								  <div class="panel-body">\
								  <img src="app/web/profile_pics/'+calEvent.patient_pic+'" class="img-rounded" alt="Patient Pic" width="100" height="100"> \
								  <br>\
								  <br>\
								  <b>Patient Name: '+calEvent.patient_name+'</b>\
								   <br>\
								  <b>Gender: '+calEvent.patient_gender+'</b>\
								   <br>\
								  <b>Mobile: '+calEvent.patient_mobile+'</b>\
								   <br>\
								  <b>Email: '+calEvent.patient_email+'</b><br>\
								  <b>DOB: '+calEvent.patient_dob+'</b><br>\
								  <b>Treatment: '+calEvent.title+'</b><br>\
								  <b>Time: '+calEvent.slot+'</b><br>\
								  <b>Dcotor: '+calEvent.doctor_name+'</b><br>\
								  <b>Room: '+calEvent.treatment_room+'</b><br>\
								  <b>Booked By: '+calEvent.rec_booked_by+'</b><br>\
								  <b>Cancled By: '+calEvent.rec_canceled_by+'</b><br>\
								   <br>\
								  </div>\
								</div>\
							</div>\
							';
			$("body").append(tooltip);
			$(this).mouseover(function(e) {
				$(this).css('z-index', 10000);
				$('.tooltipevent').fadeIn('500');
				$('.tooltipevent').fadeTo('250', 1.9);
			}).mousemove(function(e) {
				$('.tooltipevent').css('top', e.pageY + 10);
				// $('.tooltipevent').css('bottom', e.pageY + -100);
				$('.tooltipevent').css('left', e.pageX + -250);
			});
		},
		eventMouseout: function(calEvent, jsEvent) {
			$(this).css('z-index', 800);
			$('.tooltipevent').remove();
		},
		eventRender: function eventRender( event, element, view ) {
			return ['all', event.doctor_id].indexOf($('.doctor-list:checked').val()) >= 0
		}
});
	
$('.doctor-list').on('change',function(){
    $('#calendar').fullCalendar('rerenderEvents');
})


})
		</script>