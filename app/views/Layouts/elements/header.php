<html>
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ALCC</title>
		<link rel="SHORTCUT ICON" href="assets/logo/fevicon.jpg" />
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

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
		<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<?php
	if($_GET["controller"]=="User" And $_GET["action"]=="index"){
	} else {
		
	?>
	<div id="navbar" class="navbar header_main navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<div class="col-sm-6">
						<a href="<?php if(!empty($_SESSION['USER_EMAIL'])){echo "?controller=AuraAdmin&action=Dashboard";} else{echo "?controller=AuraAdmin&action=index";}?>" class="navbar-brand">
							<small>
								<img class="img-responsive header_logo" src="assets/logo/logo.png" alt="Chania">
							</small>
						</a>
					</div>
					<?php if(($_GET['controller'] == "AuraAdmin") and ($_GET['action'] == "index")){
					} else{ ?>
						<div class="col-sm-6 total_count">
						Total Appointments
						 <label id="TotalAppointment" for="male">1</label>
						Remaining Appointments
						 <label id="RemainingAppointment" for="male">1</label>
						</div>
					<?php } ?>
				</div>
				
				<?php if(($_GET['controller'] == "AuraAdmin") and ($_GET['action'] == "index")){
				} else{ ?>
				 
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="collapse" data-target="#demo" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php if(!empty($_SESSION['USER_PIC'])){echo PROFILE_PICS.$_SESSION['USER_PIC'];} else {echo PROFILE_PICS."profile-pic.jpg";} ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php if(!empty($_SESSION["USER_NAME"])){echo $_SESSION["USER_NAME"];} ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							
							<ul id="demo" class="user-menu collapse dropdown-menu-right logout-drop-down dropdown-menu dropdown-yellow  dropdown-close">
								<li>
									<a href="?controller=User&action=Profile&id=<?php if(!empty($_SESSION["USER_ID"])){echo $_SESSION["USER_ID"];} ?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="?controller=Login&action=isLogout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<?php } ?>
			</div><!-- /.navbar-container -->
		</div>
	<?php
	}
	?>
