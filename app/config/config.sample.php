<?php
require_once(ROOT_PATH . 'app/config/functions.inc.php');
if (in_array(version_compare(phpversion(), '5.1.0'), array(0,1)))
{
	date_default_timezone_set('UTC');
} else {
	$safe_mode = ini_get('safe_mode');
	if ($safe_mode)
	{
		putenv("TZ=UTC");
	}
}

$stop = false;
if (isset($_GET['controller']) && $_GET['controller'] == 'Installer')
{
	$stop = true;
	if (isset($_GET['install']))
	{
		switch ($_GET['install'])
		{
			case 1:
				$stop = true;
				break;
			default:
				$stop = false;
				break;
		}
	}
}

if (!$stop)
{
	if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	{
		# LOCAL
		define("DEFAULT_HOST",   "[hostname]");
		define("DEFAULT_USER",   "[username]");
		define("DEFAULT_PASS",   "[password]");
		define("DEFAULT_DB",     "[database]");
		define("DEFAULT_PREFIX", "[prefix]");
	} else {
		# REMOTE
		define("DEFAULT_HOST",   "[hostname]");
		define("DEFAULT_USER",   "[username]");
		define("DEFAULT_PASS",   "[password]");
		define("DEFAULT_DB",     "[database]");
		define("DEFAULT_PREFIX", "[prefix]");
	}
	
	if (preg_match('/\[hostname\]/', DEFAULT_HOST))
	{
		redirect("index.php?controller=Installer&action=step0&install=1");
	}

	$link = @mysql_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	
	mysql_query("SET NAMES 'utf8'", $link);
	
	$db_selected = mysql_select_db(DEFAULT_DB, $link);
	if (!$db_selected) {
	    die ('Can\'t select database: ' . mysql_error());
	}
	
	if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	{
		define("BASE_PATH", "http://" . $_SERVER['SERVER_NAME'] . "/[folder]");
	} else {
		define("BASE_PATH", "http://" . $_SERVER['SERVER_NAME'] . "/[folder]");
	}
}

if (!defined("APP_PATH")) define("APP_PATH", ROOT_PATH . "app/");
if (!defined("CORE_PATH")) define("CORE_PATH", ROOT_PATH . "core/");
if (!defined("LIBS_PATH")) define("LIBS_PATH", "core/libs/");
if (!defined("THIRD_PARTY_PATH")) define("THIRD_PARTY_PATH", "core/third-party/");
if (!defined("FRAMEWORK_PATH")) define("FRAMEWORK_PATH", CORE_PATH . "framework/");
if (!defined("CONFIG_PATH")) define("CONFIG_PATH", APP_PATH . "config/");
if (!defined("CONTROLLERS_PATH")) define("CONTROLLERS_PATH", APP_PATH . "controllers/");
if (!defined("COMPONENTS_PATH")) define("COMPONENTS_PATH", APP_PATH . "controllers/components/");
if (!defined("MODELS_PATH")) define("MODELS_PATH", APP_PATH . "models/");
if (!defined("VIEWS_PATH")) define("VIEWS_PATH", APP_PATH . "views/");
if (!defined("WEB_PATH")) define("WEB_PATH", APP_PATH . "web/");
if (!defined("CSS_PATH")) define("CSS_PATH", "app/web/css/");
if (!defined("IMG_PATH")) define("IMG_PATH", "app/web/img/");
if (!defined("JS_PATH")) define("JS_PATH", "app/web/js/");
if (!defined("UPLOAD_PATH")) define("UPLOAD_PATH", "app/web/upload/");

if (!defined("SCRIPT_VERSION")) define("SCRIPT_VERSION", "");
if (!defined("SCRIPT_ID")) define("SCRIPT_ID", "");
?>