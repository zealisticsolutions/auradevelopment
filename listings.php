<?php
if (!isset($_GET['iframe']))
{ 
	$content = ob_get_contents();
	ob_end_clean();
	ob_start();
}

if (!isset($_GET['controller']) || empty($_GET['controller'])) 
{ 
	$_GET["controller"] = "Listings"; 
}
if (!isset($_GET['action']) || empty($_GET['action'])) 
{ 
	$_GET["action"] = "index"; 
}

include dirname(__FILE__) . '/index.php';

if (!isset($_GET['iframe']))
{
	$app = ob_get_contents();
	ob_end_clean();
	echo preg_replace('/\{APP_TPL\}/', $app, $content);
}
?>