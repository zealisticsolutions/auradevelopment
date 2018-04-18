<?php
// $srvTypes =$tpl['result']['srvType'];
// echo "<pre>";
// print_r($srvTypes);
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
					Service
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="vspace-12-sm"></div>
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								
								<?php 
									if(!empty($tpl['bookingDetails'])){ 
										$data = $tpl['bookingDetails'][0];
										// echo "<pre>";
										// print_r($data);
										// die;
									}
								?>
								
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Invoice Type </label>
								<div class="col-sm-4">
									<select id="services" Style="width: 98%;" name="invoice" class="form-control form-control-lg" required>
										<option value="">Invoice Type</option>
										<option value="1">Aura Laser & Cosmetic Clinic</option>
										<option value="2">Aura Skin Studio</option>
										<option value="3">Dr. Gamini Shah</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Payment Type </label>
								<div class="col-sm-4">
									<select id="services" Style="width: 98%;" name="payment_type" class="form-control form-control-lg" required>
										<option value="">Payment Type</option>
										<option value="1">Partial Payment</option>
										<option value="2">Full Payment</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Payment Mode </label>
								<div class="col-sm-4">
									<select id="services" Style="width: 98%;" name="payment_mode" class="form-control form-control-lg" required>
										<option value="">Payment Mode</option>
										<option value="1">Cash Payment</option>
										<option value="2">Debit Card Payment</option>
										<option value="3">Credit Card Payment</option>
										<option value="4">Cheque Payment</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Amount </label>
								<div class="col-sm-9">
									<input type="number" required  placeholder="Amount" readonly name="amount" id="amount" value="<?php if(!empty($data['amount'])){echo $data['amount'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['amount'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['amount']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right " for="form-field-1"> Promo Code </label>
								<div class="col-sm-9">
									<input type="text" <?php if(!empty($data['coupon'])){echo "readonly";}  ?> placeholder="Promo Code" name="promo_code" id="promo_code" value="<?php if(!empty($_POST['promo_code'])){echo $_POST['promo_code'];} if(!empty($data['coupon'])){echo $data['coupon'];} ?>" class="col-xs-10 col-sm-5" />
									<br><br><label class="errMsg" style="display:none" id="invalid_promo_code_err">Invalid Promo Code!</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right " for="form-field-1"> Discount Applied </label>
								<div class="col-sm-9">
									<input type="number"  placeholder="Discount Applied" readonly name="discount_applied" id="discount_applied" value="<?php if(!empty($_POST['discount_applied'])){echo $_POST['discount_applied'];} if(!empty($data['discount'])){echo $data['discount'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['amount'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['amount']; ?></label>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right required" for="form-field-1"> Pay </label>
								<div class="col-sm-9">
									<input type="text" required  placeholder="Pay" name="payble" id="payble" value="<?php if(!empty($_POST['payble'])){echo $_POST['payble'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['amount'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['amount']; ?></label>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right " for="form-field-1"> Due </label>
								<div class="col-sm-9">
									<input type="text" required placeholder="Payble"  name="due_amount" id="due_amount" value="<?php if(!empty($data['due_amount'])){echo $data['due_amount'];} ?>" class="col-xs-10 col-sm-5" />
									<?php if(!empty($tpl['errorMsg']['due_amount'])) {?>
										<br><br><label class="errMsg"><?php echo $tpl['errorMsg']['due_amount']; ?></label>
									<?php } ?>
								</div>
							</div>
							
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
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
	$("#promo_code").change(function(){
		var amount = $("#amount").val();
		var promo_code = $("#promo_code").val();
		// alert(amount);
		// alert(promo_code);
		$.ajax({
		   type: "POST",
		   url: "?controller=Receptionists&action=checkPromoCode",
		   dataType: 'json',
		   data: {amount:amount,promo_code:promo_code}, // serializes the form's elements.
		   success: function(data)
		   {
			   if(data.data){
				   if(data.data.type == 1){
					 $("#invalid_promo_code_err").hide();
					 var discount_applied =	((amount * data.data.value)/100);
					 $("#discount_applied").val(discount_applied);
					 var payble = amount - discount_applied;
					 $("#payble").val(payble);
					  // var due_amount = $("#due_amount").val() - payble;
					 $("#due_amount").val(payble);
				   }
				   if(data.data.type == 2){
					 $("#invalid_promo_code_err").hide();
					 var discount_applied =	data.data.value;
					 $("#discount_applied").val(discount_applied);
					 var payble = amount - discount_applied;
					 $("#payble").val(payble);
					  // var due_amount = $("#due_amount").val() - payble;
					 $("#due_amount").val(payble);
				   }
			   } else {
				   $("#invalid_promo_code_err").show();
			   }
		   }
		});
	});
	$("#payble").blur(function(){
		var payble = $("#payble").val();
		var due_amount = $("#due_amount").val();
		var actual_due = due_amount - payble;
		$("#due_amount").val(actual_due.toFixed(2));
	});
</script>
