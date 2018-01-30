<?php
require_once CONTROLLERS_PATH . 'App.controller.php';
class Front extends AppController
{
	var $layout             = 'front';
	var $default_access     = 'front_type';
	var $default_session    = 'front_user_id';
	var $default_session_id = 'front_session_id';
	var $default_email      = 'front_email';
	
	var $default_captcha    = 'StivaSoftCaptcha';
	
	function afterFilter()
	{
		Object::import('Model', 'Option');
		$OptionModel = new OptionModel();
		$this->tpl['option_arr'] = $OptionModel->getAllPairs();
	}
	
	function beforeFilter()
	{
		$this->css[] = array('file' => 'front.css', 'path' => CSS_PATH);
	}
	
	function beforeRender()
	{
		if (isset($_GET['iframe']))
		{
			$this->layout = 'iframe';
		}
	}
	
	function captcha($renew=null)
	{
		$this->isAjax = true;
		
		Object::import('Component', 'Captcha');
		$Captcha = new Captcha('app/web/obj/Anorexia.ttf', $this->default_captcha, 6);
		$Captcha->setImage('app/web/img/button.png');
		$Captcha->init($renew);
	}
}
?>