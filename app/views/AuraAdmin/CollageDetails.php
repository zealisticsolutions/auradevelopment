<?php
// echo "CollageDetails";
?>

		
<section id="search-detail">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="site-header-left">
					<h2>Search Detail</h2>
					<hr>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								College Image
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<img src="<?php echo ALBUM_PATH.$tpl['albumDetails'];?>" style = "width: 100%;" class="img-responsive">
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								College Information : <?php echo $tpl['collageDetails']['collage_name']; ?>
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<p><?php echo $tpl['collageDetails']['description']; ?></p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Fees Structure : <?php echo $tpl['course_name'];?>
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-unstyled">
											<h3>Yearly</h3>
											<li><?php echo number_format($tpl['courseDetails']['yearly_fee']);?></li>
										</ul>
										<hr class="site-hr">
										<ul class="list-unstyled">
											<h3>Monthly</h3>
											<li><?php echo number_format($tpl['courseDetails']['monthly_fee']); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
								Contact Detail
								</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<address>
											<h3>Address</h3>
											<?php echo $tpl['collageDetails']['location']; ?>
											</p>
										</address>
										<h3>Website: </h3>
										<p><a href="#">www.doamin.com</a></p>
										<h3>Phone: </h3>
										<p><a href="#">+91-9876543210</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br><br><br><br><br>