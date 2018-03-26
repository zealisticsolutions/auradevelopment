<?php 

?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Email Template</li>
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
					Settings
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Email Templates Constant
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add
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
									<select class="form-control aura_multiple_select" style="width: 103%;"  name="template_type" id="form-field-select-2">
										<option value="">Email Template Type</option>
										<?php 
											$emailTempTypes = $tpl['result'];
											// echo "<pre>";
											// print_r($emailTempTypes);
											// die;
											foreach($emailTempTypes as $emailTempType){
										?>
										<option value="<?php echo $emailTempType['ett_id']; ?>" <?php if(!empty($_POST['template_type'])){echo "selected";} ?>><?php echo $emailTempType['ett_name'] ?></option>
										
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
								<div class="col-sm-8"></div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-7">
									<input type="text" id="form-field-1" placeholder="Email Constant Name" name="constant_name" value="<?php if(!empty($service['srv_name'])){echo $service['srv_name'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['constant_name'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['constant_name']; ?></label>
									<?php } ?>
								</div>
								<div class="col-sm-5"></div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-7">
									<button style = "margin-bottom: 4px;"type="submit" class="btn btn-info btn-sm">
										<i class="ace-icon fa fa-plus bigger-110"></i>Add
									</button>
									<?php if(!empty($tpl['errorMsg']['st_name'])) {?>
										<br><label class="errMsg"><?php echo $tpl['errorMsg']['st_name']; ?></label>
									<?php } ?>
								</div>
								<div class="col-sm-5"></div>
							</div>
							
							
							
						</form>
						<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th>Service Type</th>
										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Created on
										</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php 
									$languages= $tpl['result'];
									// echo "<pre>";
									// print_r($languages);
									// die;
									foreach($languages as $language){
									?>
									<tr>
										<td>
											<a href="?controller=Settings&action=editEmailTemplateTyep&id=<?php echo $language['ett_id']; ?>">
												<?php echo $language['ett_name'] ?>
											</a>
										</td>
										<td><?php  echo $date = date('d-m-Y H:i:s', strtotime ($language['created_at'])); ?></</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												<a href="?controller=Settings&action=editEmailTemplateTyep&id=<?php echo $language['ett_id']; ?>" class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</a>
											</div>

											<div class="hidden-md hidden-lg">
												<div class="inline pos-rel">
													<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																<span class="blue">
																	<i class="ace-icon fa fa-search-plus bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->