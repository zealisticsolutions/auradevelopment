<!doctype html>
<html>
	<head>
		<title></title>
		<?php
		foreach ($controller->css as $css)
		{
			echo '<link type="text/css" rel="stylesheet" href="'.(isset($css['remote']) && $css['remote'] ? NULL : BASE_PATH).$css['path'].$css['file'].'" />';
		}
		?>
	</head>
	<body>
	<?php
	require $content_tpl;
	foreach ($controller->js as $js)
	{
		echo '<script type="text/javascript" src="'.(isset($js['remote']) && $js['remote'] ? NULL : BASE_PATH).$js['path'].$js['file'].'"></script>';
	}
	?>
	</body>
</html>