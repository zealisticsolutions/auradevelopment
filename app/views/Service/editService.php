<?php
$service =$tpl['result']['service'][0];
$serviceType =$tpl['result']['service_type'];
// echo "<pre>";
// print_r($serviceType);
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
				<li class="active">Service</li>
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
					Home
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Services
						<i class="ace-icon fa fa-angle-double-right"></i>
						Edit
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="vspace-12-sm"></div>
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Service Type </label>

								<div class="col-sm-4">
									<select class="form-control aura_multiple_select" name="service_type" id="form-field-select-2">
										<option value="">Service Type</option>
										<?php 
											foreach($serviceType as $srvType){
										?>
										<option value="<?php echo $srvType['st_id']; ?>" <?php if(!empty($service['st_id']) And $service['st_id']==$srvType['st_id']){echo "selected";} ?>><?php echo $srvType['st_name'] ?></option>
										
										<?php 
											}
										?>
										
									</select>
									<?php if(!empty($tpl['errorMsg']['service_type'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['service_type']; ?></label>
									<?php } ?>
								</div>
							</div>
							<!--
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Service Room </label>
								<div class="col-sm-4">
									<select class="form-control aura_multiple_select" name="medical_history" id="form-field-select-2">
										<option value="">Service Room</option>
										<?php 
											// $languages= $tpl['result']['mh_master'];
											// foreach($languages as $language){
										?>
										<option value="<?php //echo $language['mh_id']; ?>"><?php //echo $language['mh_name'] ?></option>
										<?php 
											//}
										?>
									</select>
								</div>
							</div>
							-->
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Service Name </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Service Name" name="srv_name" value="<?php if(!empty($service['srv_name'])){echo $service['srv_name'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['srv_name'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['srv_name']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Amount </label>
								<div class="col-sm-9">
									<input type="number" id="form-field-1" placeholder="Amount" name="amount" value="<?php if(!empty($service['amount'])){echo $service['amount'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['amount'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['amount']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Duration </label>
								<div class="col-sm-9">
									<input type="number" id="form-field-1" placeholder="Duration in minutes" name="duration" value="<?php if(!empty($service['duration'])){echo $service['duration'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['duration'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['duration']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> TCA Peel </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="TCA Peel" name="tca_peel" value="<?php if(!empty($service['tca_peel'])){echo $service['tca_peel'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['tca_peal'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['tca_peal']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Session Required </label>
								<div class="col-sm-9">
									<input type="number" id="form-field-1" placeholder="No Of Session Required" name="no_sessions_required" value="<?php if(!empty($service['no_sessions_required'])){echo $service['no_sessions_required'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['session_required'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['session_required']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Description </label>
								<div class="col-sm-9">
									<textarea rows="4" cols="43" placeholder="Description" name="description"><?php if(!empty($service['description'])){echo $service['description'];} ?></textarea>
									<?php if(!empty($tpl['errorMsg']['description'])) {?>
										<br><label class="errMsg"><?php echo $tpl['errorMsg']['description']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Status </label>

								<div class="col-sm-4">
									<select class="form-control aura_multiple_select" name="status" id="form-field-select-2">
										<option value="">Select</option>
										<option value="1" <?php if($service['status']==1){echo "selected";} ?>>Active</option>
										<option value="2" <?php if($service['status']==2){echo "selected";} ?>>Inactive</option>
									</select>
									<?php if(!empty($tpl['errorMsg']['status'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['status']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Update
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</div>
							
						</div>
							
							
						</form>

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
		

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   
<script type="text/javascript">
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
</script>
