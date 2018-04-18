<?php 
require_once CONTROLLERS_PATH . 'Admin.controller.php';
class Login extends Admin
{
	function IsLogin()
	{
		if(isset($_POST) && !empty($_POST))
		{
			// print_r($_POST);
			// die;
			$opts = array();
			Object::import('Model', 'Siteuser');
			$ServerModel = new Siteuser();
			$ServerModel->debug = false;
			$opts["t1.email"] = $_POST['email'];
			$opts["t1.pasword"] = $_POST['password'];
			$offset =1;
			$row_count = 1;
			$result = $ServerModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'user_id', 'direction' => 'asc')));
			// print_r($result);
			// die;
			if(count($result) == 1)
			{
				//print_r($result);
				$_SESSION["ADMIN_USER_ID"]   = $result[0]['id'];
				$_SESSION["ADMIN_EMAIL_ID"]   = $result[0]['email'];
				$_SESSION["ADMIN_ADMIN"]     = $result[0]['type'];
				$_SESSION["ADMIN_MOBILE"]    = $result[0]['mobile'];
				
				if($_SESSION['ADMIN_ADMIN'] == "1")
				{
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=AdminCollage&action=AddCollage");
				}
				// if($_SESSION['ADMIN'] == "2")
				// {
					// $this->redirect($_SERVER['PHP_SELF'] . "?controller=Login&action=IsLogin");
				// }
			}
			else
			{
				 $msg = "Invalid User Name or Password!";
			}
			$this->tpl['msg'] = $msg;
		}		 
	}
	
	function isLogout()
	{
		session_unset();
		session_destroy();
		
		if(!isset($_SESSION['ADMIN_ADMIN']))
		{
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=index");
		}
	}
	
	// function index()
	// {
	// }

}
?>
