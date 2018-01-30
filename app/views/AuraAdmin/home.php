<?php 

?>
<section class="home-section">
	<div class="container-fluid">
		<div id="carousel-example" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="row">
				<div class="col-xs-12">
					<div class="carousel-inner">
						<div class="item active">
							<div class="carousel-content">
								<div>
									<h2>Find Good University?</h2>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="carousel-content">
								<div>
									<h2>Whare do you want to go?</h2>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="carousel-content">
								<div>
									<h2>Want Addmission?</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$('.carousel').carousel({
		interval: 2000
	});
	 setCarouselHeight('#carousel-example');

		function setCarouselHeight(id)
		{
			var slideHeight = [];
			$(id+' .item').each(function()
			{
				// add all slide heights to an array
				slideHeight.push($(this).height());
			});

			// find the tallest item
			max = Math.max.apply(null, slideHeight);

			// set the slide's height
			$(id+' .carousel-content').each(function()
			{
				$(this).css('height',max+'px');
			});
		}
</script>