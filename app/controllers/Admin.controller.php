<?php
require_once CONTROLLERS_PATH . 'App.controller.php';
class Admin extends AppController
{
	var $layout             = 'admin';
	var $default_user       = 'admin_user';
	var $default_language   = 'admin_language';
	var $require_login      = false;
	function __construct() {		
		// print_r($_GET);
		if($_GET['controller']=='AuraAdmin' AND $_GET['action']=='index'){
			// if($this->isLogin()){
				// if($_GET['controller']=='AuraAdmin' AND $_GET['action']=='index'){
					// $this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
				// }
			// }
		} else{
			if($this->isLogin()){
				// print_r($_GET);
				if($_GET['controller']=='AuraAdmin' AND $_GET['action']=='index'){
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
				}
			}
		}
		
	}
	
	function Admin($require_login=null)
	{
		if (!is_null($require_login) && is_bool($require_login))
		{
			$this->require_login = $require_login;
		}
		
		if ($this->require_login)
		{
			if (!$this->isLoged() && @$_GET['action'] != 'login')
			{
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=index");
				exit;
			}
		}
	}
	
	function beforeFilter()
	{
		$this->js[] = array('file' => 'jquery-1.4.3.min.js', 'path' => LIBS_PATH . 'jquery/');
		$this->css[] = array('file' => 'layout.css', 'path' => CSS_PATH);
	}
	
	function beforeRender()
	{
		
	}
		
	function index()
	{
		if ($this->isLoged())
		{
			if ($this->isAdmin() || $this->isEditor())
			{
				Object::import('Model', array('Listing', 'Gallery'));
				$ListingModel = new ListingModel();
				$GalleryModel = new GalleryModel();
				
				$opts = array();
				if ($this->isEditor())
				{
					$opts['t1.user_id'] = $this->getUserId();
				}
				
				$this->tpl['listing_count'] = $ListingModel->getCount($opts);
				
				$ListingModel->addSubQuery($ListingModel->subqueries, "SELECT `small_path` FROM `".$GalleryModel->getTable()."` WHERE `foreign_id` = `t1`.`id` AND `status` = 'T' LIMIT 1", "pic");
				$this->tpl['arr'] = $ListingModel->getAll(array_merge($opts, array('offset' => 0, 'row_count' => 3, 'col_name' => 't1.views', 'direction' => 'desc')));
				
			} else {
				$this->tpl['status'] = 2;
			}
		} else {
			$this->tpl['status'] = 1;
		}
	}
	
	function login()
	{
		$this->layout = 'admin_login';
		
		if (isset($_POST['login_user']))
		{
			Object::import('Model', 'User');
			$UserModel = new UserModel();

			$opts['username'] = $_POST['login_username'];
			$opts['password'] = sha1($_POST['login_password'] . $this->salt);
			
			$user = $UserModel->getAll($opts);

			if (count($user) != 1)
			{
				# Login failed
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=Admin&action=login&err=1");
			} else {
				$user = $user[0];
				unset($user['password']);
															
				if (!in_array($user['role_id'], array(1,2)))
				{
					# Login denied
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=Admin&action=login&err=2");
				}
				
				if ($user['status'] != 'T')
				{
					# Login forbidden
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=Admin&action=login&err=3");
				}
					
				# Login succeed
    			$_SESSION[$this->default_user] = $user;
    			
    			# Update
    			$data['id'] = $user['id'];
    			$data['last_login'] = date("Y-m-d H:i:s");
    			$UserModel->update($data);

    			if ($this->isAdmin())
    			{
	    			$this->redirect($_SERVER['PHP_SELF'] . "?User&action=index");
    			}
    			
				if ($this->isEditor())
    			{
	    			$this->redirect($_SERVER['PHP_SELF'] . "?User&action=index");
    			}
			}
		}
		$this->js[] = array('file' => 'jquery.validate.pack.js', 'path' => LIBS_PATH . 'jquery/plugins/validate/js/');
		$this->js[] = array('file' => 'admin.js', 'path' => JS_PATH);
		return false;
	}
	
	function logout()
	{
		if ($this->isLoged())
        {
        	unset($_SESSION[$this->default_user]);
        	$this->redirect($_SERVER['PHP_SELF'] . "?controller=Admin&action=login");
        } else {
        	$this->redirect($_SERVER['PHP_SELF'] . "?controller=Admin&action=login");
        }
	}
	
	function local($iso)
	{
		if (in_array(strtolower($iso), array('en')))
		{
			$_SESSION[$this->default_language] = $iso;
		}
				
		$this->redirect($_SESSION['PHP_SELF'] . "?controller=User&action=index");
	}
	
	function isAdminLoged () {
		if((!empty($_SESSION["ADMIN_USER_ID"])) AND ($_SESSION["ADMIN_ADMIN"] == 1) AND (!empty($_SESSION["ADMIN_MOBILE"]))){
			return true;
		} 
		
	}
	function isUserLoged () {
		if((!empty($_SESSION["USER_NAME"])) AND ($_SESSION["USER_TYPE"] == 1) AND (!empty($_SESSION["USER_MOBILE"]))){
			return true;
		}
		
	}
	function isDoctor () {
		if((!empty($_SESSION["USER_NAME"])) AND ($_SESSION["USER_TYPE"] == 2 or $_SESSION["USER_TYPE"] == 5 ) AND (!empty($_SESSION["USER_EMAIL"]))){
			return true;
		} else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=Login&action=isLogout");
		}
		
	}
	function isLogin () {
		if((!empty($_SESSION["USER_NAME"])) AND (!empty($_SESSION["USER_EMAIL"]))){
			return true;
		} else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=Login&action=isLogout");
		}
		
	}
	
	// added for system only
	
}
