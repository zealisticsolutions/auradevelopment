<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="?controller=AuraAdmin&action=Dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 1){ ?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog bigger-130"></i>
							<span class="menu-text">
								Settings
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						
							<li class="">
								<a href="?controller=Settings&action=Language">
									<i class="menu-icon fa fa-caret-right"></i>
								Language
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?controller=Settings&action=MedicalHistory">
									<i class="menu-icon fa fa-caret-right"></i>
									Medical History Master
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?controller=Settings&action=medicalRoom">
									<i class="menu-icon fa fa-caret-right"></i>
									Medical Room
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?controller=Settings&action=serviceType">
									<i class="menu-icon fa fa-caret-right"></i>
									Service Type
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?controller=Settings&action=emailTemplateType">
									<i class="menu-icon fa fa-caret-right"></i>
									Email Template Type
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=Settings&action=smsTemplateType">
									<i class="menu-icon fa fa-caret-right"></i>
									SMS Template Type
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=Settings&action=consentFormType">
									<i class="menu-icon fa fa-caret-right"></i>
									Consent Form Type
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=Settings&action=promoCode">
									<i class="menu-icon fa fa-caret-right"></i>
									Promo Code
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=Campaign&action=newPatient">
									<i class="menu-icon fa fa-caret-right"></i>
									Run a Campaign
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Service </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="?controller=AuraService&action=addService">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Service
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?controller=AuraService&action=listService">
									<i class="menu-icon fa fa-caret-right"></i>
									List Service
							</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-envelope"></i>
							<span class="menu-text"> Email Templates </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="?controller=EmailTemplates&action=add">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Templates
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?controller=EmailTemplates&action=listEt">
									<i class="menu-icon fa fa-caret-right"></i>
									List Templates
							</a>
							
							<!--<li class="">
								<a href="?controller=EmailTemplates&action=emailConstant">
									<i class="menu-icon fa fa-caret-right"></i>
									Email Constant
							</a>-->

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-mobile"></i>
							<span class="menu-text"> SMS Templates </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="?controller=SMSTemplates&action=add">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Templates
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?controller=SMSTemplates&action=listSt">
									<i class="menu-icon fa fa-caret-right"></i>
									List Templates
							</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php } ?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php //if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 1){ ?>
							<li class="">
								<a href="?controller=User&action=registration">
									<i class="menu-icon fa fa-caret-right"></i>
									Add
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?controller=User&action=therepist">
									<i class="menu-icon fa fa-caret-right"></i>
									Doctors
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=User&action=Receptionists">
									<i class="menu-icon fa fa-caret-right"></i>
									Receptionists
								</a>

								<b class="arrow"></b>
							</li>
							<?php //} ?>
							<li class="">
								<a href="?controller=User&action=newPatient">
									<i class="menu-icon fa fa-caret-right"></i>
									Patients
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-mobile"></i>
							<span class="menu-text"> Consent Form </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="?controller=ConsentForm&action=add">
									<i class="menu-icon fa fa-caret-right"></i>
									Consent Form
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
					
					<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 2){ ?>
					<li class="">
						<a href="?controller=Doctor&action=myExpertise">
							<i class="menu-icon fa fa-stethoscope"></i>
							<span class="menu-text"> My Specialties </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="?controller=MySchedule&action=index">
							<i class="menu-icon fa fa-stethoscope"></i>
							<span class="menu-text"> My Schedule </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php } ?>
					<?php if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 4){ ?>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Appointments </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php //if(!empty($_SESSION["USER_TYPE"]) And $_SESSION["USER_TYPE"] == 1){ ?>
							<li class="">
								<a href="?controller=Receptionists&action=bookAppinments">
									<i class="menu-icon fa fa-caret-right"></i>
									Book Appointments
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?controller=Receptionists&action=bookings">
									<i class="menu-icon fa fa-caret-right"></i>
									Booking Calender
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=Receptionists&action=listBooking">
									<i class="menu-icon fa fa-caret-right"></i>
									Listing View
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					
					
					
					<?php } ?>
				</ul><!-- /.nav-list -->

				<!--<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>-->
			</div>