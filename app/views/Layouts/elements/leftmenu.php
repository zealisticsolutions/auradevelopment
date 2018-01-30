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
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
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
									Therapist
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?controller=User&action=Patients">
									<i class="menu-icon fa fa-caret-right"></i>
									Patients
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
								<a href="?controller=Service&action=addService">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Service
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?controller=Service&action=listService">
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
							<i class="menu-icon fa fa-envelope"></i>
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
					
					
					
					
					<li class="">
						<a href="widgets.html">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Widgets </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="calendar.html">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Calendar

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="active">
						<a href="gallery.html">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Gallery </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> More Pages </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="profile.html">
									<i class="menu-icon fa fa-caret-right"></i>
									User Profile
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Inbox
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="pricing.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Pricing Tables
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="invoice.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Invoice
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="timeline.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Timeline
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="search.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Search Results
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="email.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Email Templates
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="login.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Login &amp; Register
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Other Pages

								<span class="badge badge-primary">5</span>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="faq.html">
									<i class="menu-icon fa fa-caret-right"></i>
									FAQ
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-404.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 404
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-500.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 500
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="grid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Grid
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="blank.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Blank Page
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<!--<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>-->
			</div>