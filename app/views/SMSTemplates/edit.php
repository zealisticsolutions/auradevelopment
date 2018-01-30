<?php 

?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Settings</a>
				</li>
				<li class="active">SMS Templates</li>
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
						SMS Templates
						<i class="ace-icon fa fa-angle-double-right"></i>
						Edit
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="vspace-12-sm"></div>
						<form class="form-horizontal" method="post">
							
							<div class="form-group">
								<div class="col-sm-3">
									<select class="form-control aura_multiple_select" name="template_type" id="form-field-select-2">
										<option value="">Email Template Name</option>
										<?php 
											$emailTempTypes = $tpl['result']['emailTemplates'];
											// echo "<pre>";
											// print_r($emailTempTypes);
											// die;
											foreach($emailTempTypes as $emailTempType){
										?>
										<option value="<?php echo $emailTempType['stt_id']; ?>" <?php if(!empty($emailTempType['stt_id'])){echo "selected";} ?>><?php echo $emailTempType['stt_name'] ?></option>
										
										<?php 
											}
										?>
									</select>
									<?php if(!empty($tpl['errorMsg']['template_type'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['template_type']; ?></label>
									<?php } ?>
									<?php if(!empty($tpl['templateError'])) {?>
										<label class="errMsg"><?php echo $tpl['templateError']; ?></label>
									<?php } ?>
								</div>
								<div class="col-sm-9"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-8">
									<textarea   name ="content" id ="description"><?php if(!empty($emailTempType['content'])){echo $emailTempType['content'];} ?></textarea>
									<?php if(!empty($tpl['errorMsg']['content'])) {?>
										<label class="errMsg"><?php echo $tpl['errorMsg']['content']; ?></label>
									<?php } ?>
								</div>
								<div class="col-sm-4">
									<div class="constants_list" style="background-color: #f0ad4e;">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>
														<i class="ace-icon fa fa-cogs bigger-110 hidden-480"></i>
														Constants to be used
													</th>
												</tr>
											</thead>

											<tbody>
												<?php 
													
													$patients = $tpl['result']['emailTemplateConstants'];
													foreach($patients as $patient) {
												?>
												<tr>
													<td>
														<?php if(!empty($patient['constant'])) {echo  $patient['constant'];} else {echo "NA";} ?>
													</td>
												</tr>
												<?php 
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<button style = "margin-bottom: 4px;"type="submit" class="btn btn-info btn-sm">
								<i class="ace-icon fa fa-plus bigger-110"></i>Update
							</button>
							
						</form>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	
	CKEDITOR.replace( 'description' );
</script>