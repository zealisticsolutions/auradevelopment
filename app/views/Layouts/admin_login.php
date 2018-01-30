<!doctype html>
<html>
	<head>
		<title>Listing script by ClassifiedsGeek.com</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<?php
		foreach ($controller->css as $css)
		{
			echo '<link type="text/css" rel="stylesheet" href="'.(isset($css['remote']) && $css['remote'] ? NULL : BASE_PATH).$css['path'].$css['file'].'" />';
		}
		
		foreach ($controller->js as $js)
		{
			echo '<script type="text/javascript" src="'.(isset($js['remote']) && $js['remote'] ? NULL : BASE_PATH).$js['path'].$js['file'].'"></script>';
		}
		?>
	</head>
	<body>
		<div id="container_login">
			<!--<a href="http://www.classifiedsgeek.com" target="_blank" id="login_logo"><img src="<?php echo IMG_PATH; ?>login_logo.png" alt="Property Listing Script by ClassifiedsGeek.com" /></a> -->
			<div id="main_login">
			<?php require $content_tpl; ?>
			</div> <!-- main_login -->
				
		</div> <!-- container_login -->
	</body>
</html>
