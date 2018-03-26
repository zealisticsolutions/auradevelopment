<?php
// ini_set("display_errors", "on");
// error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
class AuraTherapist extends Admin
{
	
	function Dashboard(){
		// print_r($_SESSION);
	}
	
	function Logout()
	{
		session_unset();
		session_destroy();
		
		if(!isset($_SESSION['ADMIN_ADMIN']))
		{
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=index");
		}
	}
}	
?>