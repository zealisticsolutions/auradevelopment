<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class SMSTemplates extends Admin
{
	function add(){
		$opts = array();
		Object::import('Model', 'SMSTType');
		$SMSTType = new SMSTType();
		$row_count = 100;
		// $opts["t1.ett_id"] = $_GET['id'];
		$result = $SMSTType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'stt_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		if(!empty($_POST)){
			// echo "<pre>";
			// print_r($_POST);
			// die;
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('template_type', 'Email Template Name is required !', 'required');
			$validator->addRule('content', 'Email Template Content is required !', 'required');
			
			
			// Input the POST data and check it
			$validator->addEntries($_POST);
			$validator->validate();
			// Retrieve an associative array of "sanitized" form inputs (HTML tags stripped, etc.)
			$entries = $validator->getEntries();
			
			// Replace the default field values with what the user submitted
			foreach ($entries as $key => $value) {
				${$key} = $value;
			}
		
			/* 
			 * Conditional logic can be used based on whether errors were found
			 * e.g. redirecting to a different page on success
			 */
			if ($validator->foundErrors()) {
				$errors = $validator->getErrors();
			}
			
			if(!empty($errors)){
				$this->tpl['errorMsg'] = $errors;
			} else {
				if(isset($_POST['template_type']) && strlen(trim($_POST['template_type'])) > 0){
					$opts = array();
					Object::import('Model', 'STemplate');
					$STemplate = new STemplate();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["stt_id"] = $_POST['template_type'];
					$result = $STemplate->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'stt_id', 'direction' => 'asc')));
					
					if(!empty($result)){
						$this->tpl['templateError'] = "The SMS Template Is Already Exits! If You Want To Edit It Please Go To Edit Template Section.";
					} else {
						$form_data = array(
							'stt_id'					=>$_POST['template_type'],
							'content'					=>$_POST['content'],
							'created_at'				=>$time,
							'updated_at'				=>''
						);	
						$lastID = $STemplate->save($form_data);
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=EmailTemplates&action=listEt");
						}
					}
				}
			}
		}
	}
	function edit(){
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', array('STemplate', 'SMSTType', 'SConstant'));
			$STemplate = new STemplate();
			$SMSTType = new SMSTType();
			$SConstant = new SConstant();
			$row_count = 1000000;
			$time= date("Y-m-d H:i:s");
			$opts["t1.smst_id"] = $_GET['id'];
			$STemplate->addJoin($STemplate->joins, $SMSTType->getTable(), 'TC', array('TC.stt_id' => 't1.stt_id'), array('TC.stt_name'));
			$emailTemplates = $STemplate->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'smst_id', 'direction' => 'asc')));
		
			$opts = array();
			$opts["t1.smst_id"] = $_GET['id'];
			$emailTemplateConstants = $SConstant->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'smst_id', 'direction' => 'asc')));
			$data['emailTemplates'] = $emailTemplates;
			$data['emailTemplateConstants'] = $emailTemplateConstants;
			
			$this->tpl['result'] = $data;


			$this->tpl['result'] = $data;
			if(!empty($_POST)){
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('template_type', 'SMS Template Name is required !', 'required');
				$validator->addRule('content', 'SMS Template Content is required !', 'required');
				
				
				// Input the POST data and check it
				$validator->addEntries($_POST);
				$validator->validate();
				// Retrieve an associative array of "sanitized" form inputs (HTML tags stripped, etc.)
				$entries = $validator->getEntries();
				
				// Replace the default field values with what the user submitted
				foreach ($entries as $key => $value) {
					${$key} = $value;
				}
			
				/* 
				 * Conditional logic can be used based on whether errors were found
				 * e.g. redirecting to a different page on success
				 */
				if ($validator->foundErrors()) {
					$errors = $validator->getErrors();
				}
				
				if(!empty($errors)){
					$this->tpl['errorMsg'] = $errors;
				} else {
					
					$data["stt_id"] = $_POST['template_type'];
					$form_data = array(
						'content'					=>$_POST['content'],
						'updated_at'				=>$time
					);	
					// echo "<pre>";
					// print_r($form_data);
					// die;
					// $STemplate->debug = true;
					$lastID = $STemplate->update(array_merge($form_data,$data));
					if($lastID){
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=SMSTemplates&action=listSt");
					}
					
				}
			}
		}
	}
	function listSt(){
		$opts = array();
		Object::import('Model', array('STemplate', 'SMSTType'));
		$STemplate = new STemplate();
		$SMSTType = new SMSTType();
		$row_count = 1000000;
		$time= date("Y-m-d H:i:s");
		$STemplate->addJoin($STemplate->joins, $SMSTType->getTable(), 'TC', array('TC.stt_id' => 't1.stt_id'), array('TC.stt_name'));
		$emailTemplates = $STemplate->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'smst_id', 'direction' => 'asc')));
		$this->tpl['result'] = $emailTemplates;
		// echo "<pre>";
		// print_r($emailTemplates);
		// die;
	}	
	function sendSms(){
		
		$_POST['mobile'];
		$_POST['message'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,SMS_API_URL);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"api_key=".SMS_API_KEY."&method=sms&message=".$_POST['message']."&to=".$_POST['mobile']."&sender=".SMS_API_SENDER);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		// $myArr = array("Status"=>"true", "Message"=>"Hi Your Message is sent!");
		// $myJSON = json_encode($server_output);
		echo $server_output;
		die;
	}
	function bookingConfirmationSms(){
		
		$opts = array();
		Object::import('Model', array('STemplate', 'SMSTType', 'SConstant'));
		$STemplate = new STemplate();
		$SMSTType = new SMSTType();
		$SConstant = new SConstant();
		$row_count = 1000000;
		$time= date("Y-m-d H:i:s");
		$opts["t1.stt_id"] = 1;
		$STemplate->addJoin($STemplate->joins, $SMSTType->getTable(), 'TC', array('TC.stt_id' => 't1.stt_id'), array('TC.stt_name'));
		$emailTemplates = $STemplate->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'smst_id', 'direction' => 'asc')));
	
		echo "<pre>";
		// print_r($emailTemplates[0]['content']);
		$content = str_replace("{{","",$emailTemplates[0]['content']);
		echo $content = str_replace('}}','',$content);
		$test= "Hello my kjhkjkhkjhkj {{CLINIC}}";
		 $content = str_replace('{{','".',$test);
		 $content = str_replace('}}','."',$content);
		 // echo "Hello my kjhkjkhkjhkj ".CLINIC."";
		 echo ".$content";
		die;
		$_POST['mobile'];
		
		$_POST['message'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,SMS_API_URL);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"api_key=".SMS_API_KEY."&method=sms&message=".$_POST['message']."&to=".$_POST['mobile']."&sender=".SMS_API_SENDER);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		// $myArr = array("Status"=>"true", "Message"=>"Hi Your Message is sent!");
		// $myJSON = json_encode($server_output);
		echo $server_output;
		die;
	}
}	
?>