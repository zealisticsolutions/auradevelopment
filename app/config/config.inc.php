<?php
require_once(ROOT_PATH . 'app/config/functions.inc.php');
if (in_array(version_compare(phpversion(), '5.1.0'), array(0,1)))
{
	date_default_timezone_set("Asia/Kolkata");
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
		define("DEFAULT_HOST",   "localhost");
		define("DEFAULT_USER",   "root");
		define("DEFAULT_PASS",   "");
		define("DEFAULT_DB",     "zealistic_aura");
		define("DEFAULT_PREFIX", "aura_");
	} else {
		# REMOTE
		define("DEFAULT_HOST",   "localhost");
		define("DEFAULT_USER",   "root");
		define("DEFAULT_PASS",   "");
		define("DEFAULT_DB",     "zealistic_aura");
		define("DEFAULT_PREFIX", "aura_");
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
		define("BASE_PATH", "http://" . $_SERVER['SERVER_NAME'] . "/aura/");
	} else {
		define("BASE_PATH", "http://" . $_SERVER['SERVER_NAME'] . "/aura/");
	}
}

if (!defined("SMS_API_URL")) define("SMS_API_URL", "http://trans.businesskarma.in/api/v4/");
if (!defined("SMS_API_KEY")) define("SMS_API_KEY", "Acff2ecad1e27dc0412594b34035144d1");
if (!defined("SMS_API_SENDER")) define("SMS_API_SENDER", "AuraCL");


// Clinic Informnation
if (!defined("CLINIC")) define("CLINIC", "AuraCL");
if (!defined("CLINICCONTACTNUMBER")) define("CLINICCONTACTNUMBER", "265-67987987");
if (!defined("APPLINK")) define("CLINICCONTACTNUMBER", "www.aura-testing-app.com");



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
if (!defined("PROFILE_PICS_PATH")) define("PROFILE_PICS_PATH", APP_PATH . "web/profile_pics/");
if (!defined("CSS_PATH")) define("CSS_PATH", "app/web/css/");
if (!defined("IMG_PATH")) define("IMG_PATH", "app/web/img/");
if (!defined("ALBUM_PATH")) define("ALBUM_PATH", "app/album/");
if (!defined("JS_PATH")) define("JS_PATH", "app/web/js/");
if (!defined("PROFILE_PICS")) define("PROFILE_PICS", "app/web/profile_pics/");
if (!defined("UPLOAD_PATH")) define("UPLOAD_PATH", "app/web/upload/");

if (!defined("SCRIPT_VERSION")) define("SCRIPT_VERSION", "");
if (!defined("SCRIPT_ID")) define("SCRIPT_ID", "");
if (!defined("GRANULARITY")) define("GRANULARITY", 5);
if (!defined("SIGNATURE_PATH")) define("SIGNATURE_PATH", WEB_PATH . "signature/");
if (!defined("SIGNED_CONSENT_FORM")) define("SIGNED_CONSENT_FORM", WEB_PATH . "signed_consent_form/");
if (!defined("COUNSELLING_REPORT")) define("COUNSELLING_REPORT", WEB_PATH . "counselling_report/");
$consent_form = array(1,2,4);
?>