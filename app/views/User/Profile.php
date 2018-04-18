<?php 
$patient = $tpl['result']['userDetails'][0];
$language = $tpl['result']['userLanguage'];
$medicalHistory = $tpl['result']['userMedicalHistory'];

// echo "<pre>";
// print_r($patient);
// echo "</pre>";
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

				<li>
					<a href="#">
					<?php 
						if(!empty($patient['type'])){
														
							if($patient['type'] == 1){
								$type = "Admin";
							}
							if($patient['type'] == 2){
								$type = "Therapist";
							}
							if($patient['type'] == 3){
								$type = "Patient";
							}
							echo $type;
						}
						else {
							echo $type = "NA";
						}		
					?>
					</a>
				</li>
				<li class="active">Profile</li>
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
					<?php echo $type; ?> Profile 
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
					
					</div>
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php if(!empty($patient['pic'])){echo PROFILE_PICS.$patient['pic'];} else {echo PROFILE_PICS."profile-pic.jpg";} ?>" />
									</span>

									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
												<i class="ace-icon fa fa-circle light-green"></i>
												&nbsp;
												<span class="white"><?php if(!empty($patient['firstname'])) {echo  $patient['firstname']." ".$patient['lastname'];} else {echo "NA";} ?></span>
											</a>

											<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
												<li class="dropdown-header"> Change Status </li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-circle green"></i>
&nbsp;
														<span class="green">Available</span>
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-circle red"></i>
&nbsp;
														<span class="red">Busy</span>
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-circle grey"></i>
&nbsp;
														<span class="grey">Invisible</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<div class="profile-contact-info">
									<div class="profile-contact-links align-left">
									
										<a data-toggle="modal" id="openModel" data-target="#myModal" class="btn btn-link">
											<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
											Send a message
										</a>

										<a href="#" class="btn btn-link">
											<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
											<?php if(!empty($patient['email'])) {echo  $patient['email'];} else {echo "NA";} ?>
										</a>
									</div>

									<div class="space-6"></div>												
								</div>
							</div>

							<div class="col-xs-12 col-sm-9">
								<div class="center">
									<a href="?controller=User&action=UserMedicalHistory&edit=<?php echo $patient['id']; ?>">
										<span class="btn btn-app btn-sm btn-light no-hover">
											<span class="line-height-1 bigger-170 blue"><?php if(!empty($medicalHistory)) {echo count($medicalHistory);} ?></span>

											<br />
											<span class="line-height-1 smaller-90">Medical</span>
										</span>
									</a>
									<span class="btn btn-app btn-sm btn-yellow no-hover">
										<span class="line-height-1 bigger-170"> <?php if(!empty($language)) {echo count($language);} else{echo "0";} ?> </span>

										<br />
										<span class="line-height-1 smaller-90"> Language </span>
									</span>

									<span class="btn btn-app btn-sm btn-pink no-hover">
										<span class="line-height-1 bigger-170"> 4 </span>

										<br />
										<span class="line-height-1 smaller-90"> Projects </span>
									</span>

									<span class="btn btn-app btn-sm btn-grey no-hover">
										<span class="line-height-1 bigger-170"> 23 </span>

										<br />
										<span class="line-height-1 smaller-90"> Reviews </span>
									</span>

									<span class="btn btn-app btn-sm btn-success no-hover">
										<span class="line-height-1 bigger-170"> 7 </span>

										<br />
										<span class="line-height-1 smaller-90"> Albums </span>
									</span>

									<span class="btn btn-app btn-sm btn-primary no-hover">
										<span class="line-height-1 bigger-170"> 55 </span>

										<br />
										<span class="line-height-1 smaller-90"> Contacts </span>
									</span>
								</div>

								<div class="space-12"></div>

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Username </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php if(!empty($patient['user_id'])) {echo  $patient['user_id'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Gender </div>

										<div class="profile-info-value">
											<i class="fa fa-<?php
											if(!empty($patient['gender'])){
												if($patient['gender'] == 1){
													echo "male";
												}
												if($patient['gender'] == 2){
													echo "female";
												}
												if($patient['gender'] == 3){
													echo "male";
												}
											} ?> light-green bigger-110"></i>
											<span class="editable" id="age">
												<?php  
													if(!empty($patient['gender'])){
														
														if($patient['gender'] == 1){
															$gender = "Male";
														}
														if($patient['gender'] == 2){
															$gender = "Female";
														}
														if($patient['gender'] == 3){
															$gender = "Other";
														}
														echo $gender;
													}
													else {
														echo "NA";
													}										
												?>
											</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Date of birth </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="age"><?php if(!empty($patient['dob'])) {echo   date('d-m-Y', strtotime ($patient['dob']));} else {echo "NA";} ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Anniversary </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="age"><?php if($patient['marriage_date'] != "0000-00-00 00:00:00") {echo   date('d-m-Y', strtotime ($patient['marriage_date']));} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Referred By </div>

										<div class="profile-info-value">
											<i class="fa fa-user light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['referred_id'])) {echo  $patient['referred_id'];} else {echo "NA";} ?></span>
											
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Blood Group </div>

										<div class="profile-info-value">
											<span class="editable" id="country"><?php if(!empty($patient['blood_group'])) {echo  $patient['blood_group'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Mobile </div>

										<div class="profile-info-value">
											<i class="fa fa-mobile light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['contact_no'])) {echo  $patient['contact_no'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name">  Contact </div>

										<div class="profile-info-value">
											<i class="fa fa-mobile light-green bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['contact_no_a'])) {echo  $patient['contact_no_a'];} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Address </div>
										
										
										<div class="profile-info-value">
											<i class="fa fa-map-marker light-orange bigger-110"></i>
											<span class="editable" id="country"><?php if(!empty($patient['address'])) {echo  $patient['address'];} else {echo "NA";} ?></span>
											<span class="editable" id="country"><?php if(!empty($patient['area'])) {echo  $patient['area'];} else {echo "NA";} ?></span>
											<span class="editable" id="country"><?php if(!empty($patient['location'])) {echo  $patient['location'];} else {echo "NA";} ?></span>
											<span class="editable" id="country"><?php if(!empty($patient['city'])) {echo  $patient['city'];} else {echo "NA";} ?></span>
											<span class="editable" id="country"><?php if(!empty($patient['city'])) {echo  $patient['city'];} else {echo "NA";} ?></span>
											<span class="editable" id="country"><?php if(!empty($patient['pin'])) {echo  $patient['pin'];} else {echo "NA";} ?></span>
										</div>
										
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Joined </div>

										<div class="profile-info-value">
											<i class="fa fa-clock-o light-green bigger-110"></i>
											<span class="editable" id="signup"><?php if(!empty($patient['created_at'])) {echo   date('d-m-Y', strtotime ($patient['created_at']));} else {echo "NA";} ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> About Me </div>

										<div class="profile-info-value">
											<span class="editable" id="about">I am suffering form 
											<?php 
											if(!empty($medicalHistory)){
												$text ="";
												foreach($medicalHistory as $medicalHis){
													$text .="<b>".$medicalHis['mh_name']."</b>"." ";
												}
												echo $text;
											}
											?>
											</span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Language </div>

										<div class="profile-info-value">
											<span class="editable" id="about">I knows
											<?php 
											if(!empty($language)){
												$text ="";
												foreach($language as $lang){
													$text .="<b>".$lang['language_name']."</b>"." ";
												}
												echo $text;
											}
											?>
											</span>
										</div>
									</div>
									
								</div>

								<div class="space-20"></div>
								<div class="space-6"></div>
							</div>
						</div>
					</div>

					<div class="hide">
						<div id="user-profile-2" class="user-profile">
							<div class="tabbable">
								<ul class="nav nav-tabs padding-18">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-user bigger-120"></i>
											Profile
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#feed">
											<i class="orange ace-icon fa fa-rss bigger-120"></i>
											Activity Feed
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#friends">
											<i class="blue ace-icon fa fa-users bigger-120"></i>
											Friends
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#pictures">
											<i class="pink ace-icon fa fa-picture-o bigger-120"></i>
											Pictures
										</a>
									</li>
								</ul>

								<div class="tab-content no-border padding-24">
									<div id="home" class="tab-pane in active">
										<div class="row">
											<div class="col-xs-12 col-sm-3 center">
												<span class="profile-picture">
													<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="assets/images/avatars/profile-pic.jpg" />
												</span>

												<div class="space space-4"></div>

												<a href="#" class="btn btn-sm btn-block btn-success">
													<i class="ace-icon fa fa-plus-circle bigger-120"></i>
													<span class="bigger-110">Add as a friend</span>
												</a>

												<a href="#" class="btn btn-sm btn-block btn-primary">
													<i class="ace-icon fa fa-envelope-o bigger-110"></i>
													<span class="bigger-110">Send a message</span>
												</a>
											</div><!-- /.col -->

											<div class="col-xs-12 col-sm-9">
												<h4 class="blue">
													<span class="middle">Alex M. Doe</span>

													<span class="label label-purple arrowed-in-right">
														<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
														online
													</span>
												</h4>

												<div class="profile-user-info">
													<div class="profile-info-row">
														<div class="profile-info-name"> Username </div>

														<div class="profile-info-value">
															<span>alexdoe</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Location </div>

														<div class="profile-info-value">
															<i class="fa fa-map-marker light-orange bigger-110"></i>
															<span>Netherlands</span>
															<span>Amsterdam</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Age </div>

														<div class="profile-info-value">
															<span>38</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Joined </div>

														<div class="profile-info-value">
															<span>2010/06/20</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Last Online </div>

														<div class="profile-info-value">
															<span>3 hours ago</span>
														</div>
													</div>
												</div>

												<div class="hr hr-8 dotted"></div>

												<div class="profile-user-info">
													<div class="profile-info-row">
														<div class="profile-info-name"> Website </div>

														<div class="profile-info-value">
															<a href="#" target="_blank">www.alexdoe.com</a>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name">
															<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
														</div>

														<div class="profile-info-value">
															<a href="#">Find me on Facebook</a>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name">
															<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
														</div>

														<div class="profile-info-value">
															<a href="#">Follow me on Twitter</a>
														</div>
													</div>
												</div>
											</div><!-- /.col -->
										</div><!-- /.row -->

										<div class="space-20"></div>

										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="widget-box transparent">
													<div class="widget-header widget-header-small">
														<h4 class="widget-title smaller">
															<i class="ace-icon fa fa-check-square-o bigger-110"></i>
															Little About Me
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															<p>
																My job is mostly lorem ipsuming and dolor sit ameting as long as consectetur adipiscing elit.
															</p>
															<p>
																Sometimes quisque commodo massa gets in the way and sed ipsum porttitor facilisis.
															</p>
															<p>
																The best thing about my job is that vestibulum id ligula porta felis euismod and nullam quis risus eget urna mollis ornare.
															</p>
															<p>
																Thanks for visiting my profile.
															</p>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-6">
												<div class="widget-box transparent">
													<div class="widget-header widget-header-small header-color-blue2">
														<h4 class="widget-title smaller">
															<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
															My Skills
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main padding-16">
															<div class="clearfix">
																<div class="grid3 center">
																	<div class="easy-pie-chart percentage" data-percent="45" data-color="#CA5952">
																		<span class="percent">45</span>%
																	</div>

																	<div class="space-2"></div>
																	Graphic Design
																</div>

																<div class="grid3 center">
																	<div class="center easy-pie-chart percentage" data-percent="90" data-color="#59A84B">
																		<span class="percent">90</span>%
																	</div>

																	<div class="space-2"></div>
																	HTML5 & CSS3
																</div>

																<div class="grid3 center">
																	<div class="center easy-pie-chart percentage" data-percent="80" data-color="#9585BF">
																		<span class="percent">80</span>%
																	</div>

																	<div class="space-2"></div>
																	Javascript/jQuery
																</div>
															</div>

															<div class="hr hr-16"></div>

															<div class="profile-skills">
																<div class="progress">
																	<div class="progress-bar" style="width:80%">
																		<span class="pull-left">HTML5 & CSS3</span>
																		<span class="pull-right">80%</span>
																	</div>
																</div>

																<div class="progress">
																	<div class="progress-bar progress-bar-success" style="width:72%">
																		<span class="pull-left">Javascript & jQuery</span>

																		<span class="pull-right">72%</span>
																	</div>
																</div>

																<div class="progress">
																	<div class="progress-bar progress-bar-purple" style="width:70%">
																		<span class="pull-left">PHP & MySQL</span>

																		<span class="pull-right">70%</span>
																	</div>
																</div>

																<div class="progress">
																	<div class="progress-bar progress-bar-warning" style="width:50%">
																		<span class="pull-left">Wordpress</span>

																		<span class="pull-right">50%</span>
																	</div>
																</div>

																<div class="progress">
																	<div class="progress-bar progress-bar-danger" style="width:38%">
																		<span class="pull-left">Photoshop</span>

																		<span class="pull-right">38%</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- /#home -->

									<div id="feed" class="tab-pane">
										<div class="profile-feed row">
											<div class="col-sm-6">
												<div class="profile-activity clearfix">
													<div>
														<img class="pull-left" alt="Alex Doe's avatar" src="assets/images/avatars/avatar5.png" />
														<a class="user" href="#"> Alex Doe </a>
														changed his profile photo.
														<a href="#">Take a look</a>

														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															an hour ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<img class="pull-left" alt="Susan Smith's avatar" src="assets/images/avatars/avatar1.png" />
														<a class="user" href="#"> Susan Smith </a>

														is now friends with Alex Doe.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															2 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>
														joined
														<a href="#">Country Music</a>

														group.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															5 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>
														uploaded a new photo.
														<a href="#">Take a look</a>

														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															5 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<img class="pull-left" alt="David Palms's avatar" src="assets/images/avatars/avatar4.png" />
														<a class="user" href="#"> David Palms </a>

														left a comment on Alex's wall.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															8 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>
											</div><!-- /.col -->

											<div class="col-sm-6">
												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>
														published a new blog post.
														<a href="#">Read now</a>

														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															11 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<img class="pull-left" alt="Alex Doe's avatar" src="assets/images/avatars/avatar5.png" />
														<a class="user" href="#"> Alex Doe </a>

														upgraded his skills.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															12 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>

														logged in.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															12 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>

														logged out.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															16 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>

												<div class="profile-activity clearfix">
													<div>
														<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
														<a class="user" href="#"> Alex Doe </a>

														logged in.
														<div class="time">
															<i class="ace-icon fa fa-clock-o bigger-110"></i>
															16 hours ago
														</div>
													</div>

													<div class="tools action-buttons">
														<a href="#" class="blue">
															<i class="ace-icon fa fa-pencil bigger-125"></i>
														</a>

														<a href="#" class="red">
															<i class="ace-icon fa fa-times bigger-125"></i>
														</a>
													</div>
												</div>
											</div><!-- /.col -->
										</div><!-- /.row -->

										<div class="space-12"></div>

										<div class="center">
											<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
												<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
												<span class="bigger-110">View more activities</span>

												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</button>
										</div>
									</div><!-- /#feed -->

									<div id="friends" class="tab-pane">
										<div class="profile-users clearfix">
											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar4.png" alt="Bob Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-online"></span>
																Bob Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Content Editor</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
																<span class="green"> 20 mins ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar1.png" alt="Rose Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-offline"></span>
																Rose Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Graphic Designer</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
																<span class="grey"> 30 min ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar.png" alt="Jim Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-busy"></span>
																Jim Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">SEO &amp; Advertising</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 red"></i>
																<span class="grey"> 1 hour ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar5.png" alt="Alex Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-idle"></span>
																Alex Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Marketing</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
																<span class=""> 40 minutes idle </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar2.png" alt="Phil Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-online"></span>
																Phil Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Public Relations</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
																<span class="green"> 2 hours ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar3.png" alt="Susan Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-online"></span>
																Susan Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">HR Management</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
																<span class="green"> 20 mins ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar1.png" alt="Jennifer Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-offline"></span>
																Jennifer Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Graphic Designer</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
																<span class="grey"> 2 hours ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="#">
															<img src="assets/images/avatars/avatar3.png" alt="Alexa Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-offline"></span>
																Alexa Doe
															</a>
														</div>
													</div>

													<div class="popover">
														<div class="arrow"></div>

														<div class="popover-content">
															<div class="bolder">Accounting</div>

															<div class="time">
																<i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
																<span class="grey"> 4 hours ago </span>
															</div>

															<div class="hr dotted hr-8"></div>

															<div class="tools action-buttons">
																<a href="#">
																	<i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
																</a>

																<a href="#">
																	<i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="hr hr10 hr-double"></div>

										<ul class="pager pull-right">
											<li class="previous disabled">
												<a href="#">&larr; Prev</a>
											</li>

											<li class="next">
												<a href="#">Next &rarr;</a>
											</li>
										</ul>
									</div><!-- /#friends -->

									<div id="pictures" class="tab-pane">
										<ul class="ace-thumbnails">
											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-1.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-2.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-3.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-4.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-5.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-6.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-1.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>

											<li>
												<a href="#" data-rel="colorbox">
													<img alt="150x150" src="assets/images/gallery/thumb-2.jpg" />
													<div class="text">
														<div class="inner">Sample Caption on Hover</div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="#">
														<i class="ace-icon fa fa-link"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-paperclip"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-pencil"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>
										</ul>
									</div><!-- /#pictures -->
								</div>
							</div>
						</div>
					</div>

					<div class="hide">
						<div id="user-profile-3" class="user-profile row">
							<div class="col-sm-offset-1 col-sm-10">
								<div class="well well-sm">
									<!-- -
<button type="button" class="close" data-dismiss="alert">&times;</button>
&nbsp; -->
									<div class="inline middle blue bigger-110"> Your profile is 70% complete </div>

									&nbsp; &nbsp; &nbsp;
									<div style="width:200px;" data-percent="70%" class="inline middle no-margin progress progress-striped active pos-rel">
										<div class="progress-bar progress-bar-success" style="width:70%"></div>
									</div>
								</div><!-- /.well -->

								<div class="space"></div>

								<form class="form-horizontal">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-16">
											<li class="active">
												<a data-toggle="tab" href="#edit-basic">
													<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
													Basic Info
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#edit-settings">
													<i class="purple ace-icon fa fa-cog bigger-125"></i>
													Settings
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#edit-password">
													<i class="blue ace-icon fa fa-key bigger-125"></i>
													Password
												</a>
											</li>
										</ul>

										<div class="tab-content profile-edit-tab-content">
											<div id="edit-basic" class="tab-pane in active">
												<h4 class="header blue bolder smaller">General</h4>

												<div class="row">
													<div class="col-xs-12 col-sm-4">
														<input type="file" />
													</div>

													<div class="vspace-12-sm"></div>

													<div class="col-xs-12 col-sm-8">
														<div class="form-group">
															<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username</label>

															<div class="col-sm-8">
																<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
															</div>
														</div>

														<div class="space-4"></div>

														<div class="form-group">
															<label class="col-sm-4 control-label no-padding-right" for="form-field-first">Name</label>

															<div class="col-sm-8">
																<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
																<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
															</div>
														</div>
													</div>
												</div>

												<hr />
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-date">Birth Date</label>

													<div class="col-sm-9">
														<div class="input-medium">
															<div class="input-group">
																<input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>
															</div>
														</div>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right">Gender</label>

													<div class="col-sm-9">
														<label class="inline">
															<input name="form-field-radio" type="radio" class="ace" />
															<span class="lbl middle"> Male</span>
														</label>

														&nbsp; &nbsp; &nbsp;
														<label class="inline">
															<input name="form-field-radio" type="radio" class="ace" />
															<span class="lbl middle"> Female</span>
														</label>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Comment</label>

													<div class="col-sm-9">
														<textarea id="form-field-comment"></textarea>
													</div>
												</div>

												<div class="space"></div>
												<h4 class="header blue bolder smaller">Contact</h4>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input type="email" id="form-field-email" value="alexdoe@gmail.com" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-website">Website</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input type="url" id="form-field-website" value="http://www.alexdoe.com/" />
															<i class="ace-icon fa fa-globe"></i>
														</span>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input class="input-medium input-mask-phone" type="text" id="form-field-phone" />
															<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
														</span>
													</div>
												</div>

												<div class="space"></div>
												<h4 class="header blue bolder smaller">Social</h4>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="facebook_alexdoe" id="form-field-facebook" />
															<i class="ace-icon fa fa-facebook blue"></i>
														</span>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-twitter">Twitter</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="twitter_alexdoe" id="form-field-twitter" />
															<i class="ace-icon fa fa-twitter light-blue"></i>
														</span>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Google+</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="google_alexdoe" id="form-field-gplus" />
															<i class="ace-icon fa fa-google-plus red"></i>
														</span>
													</div>
												</div>
											</div>

											<div id="edit-settings" class="tab-pane">
												<div class="space-10"></div>

												<div>
													<label class="inline">
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Make my profile public</span>
													</label>
												</div>

												<div class="space-8"></div>

												<div>
													<label class="inline">
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Email me new updates</span>
													</label>
												</div>

												<div class="space-8"></div>

												<div>
													<label>
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Keep a history of my conversations</span>
													</label>

													<label>
														<span class="space-2 block"></span>

														for
														<input type="text" class="input-mini" maxlength="3" />
														days
													</label>
												</div>
											</div>

											<div id="edit-password" class="tab-pane">
												<div class="space-10"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass1" />
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass2" />
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save
											</button>

											&nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>
							</div><!-- /.span -->
						</div><!-- /.user-profile -->
					</div><!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Message</h4>
        </div>
        <div class="modal-body">
			<div class="form-group">
				<input type="text" placeholder="Contact Details" id="mobile" name="contact_no" value="<?php if(!empty($patient['contact_no'])) {echo  "+91".$patient['contact_no'];} else {echo "NA";} ?>" >
				<br><label class="errMsg" id="mobileError" style="display:none">Please enter a mobile number!</label>
			</div>
			
			<div class="form-group">
				<textarea rows="4" cols="77" name="content" placeholder="Type Your Message Here" id="messageContent"></textarea>
				<br>
				<label class="errMsg" id="contentError" style="display:none">Please type your message here!</label>
				<label class="errMsg" id="msgNotSent" style="display:none">Message Sending Failed!</label>
				<label class="" id="msgSent" style="display:none;color:green">Message Sent Successfully!</label>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" id="sendPrivateMessage" class="btn btn-primary">Send</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
 </div>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
$("#sendPrivateMessage").click(function(){
    var mobile = $("#mobile").val();
    var message = $("#messageContent").val();
	// alert(message);
	$("#msgSent").hide();
	$("#msgNotSent").hide();
	if(mobile){
		// alert(mobile);
	    $("#mobileError").hide();
		if(message){
			// alert(message);
			$("#contentError").hide();
			$.ajax({
				type: "POST",
				url: '<?php echo $_SERVER['PHP_SELF']; ?>?controller=SMSTemplates&action=sendSms',
				dataType: "json",
				data: {mobile:mobile, message:message },
				success: function(response) {
					if(response.status == "OK"){
						$("#msgSent").show();
					}else{
						$("#msgNotSent").show();
					}
				},
				error: function(response) {
					console.log(response.status);
				}
			});
		} else {
			$("#contentError").show();
		}
	} else {
		$("#mobileError").show();
	}
});
$("#openModel").click(function(){
	$("#messageContent").val('');
	$("#contentError").hide();
	$("#mobileError").hide();
	$("#msgSent").hide();
	$("#msgNotSent").hide();
});



 
 </script>