<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class EmailTemplates extends Admin
{
	function add(){
		$opts = array();
		Object::import('Model', 'ETType');
		$ETType = new ETType();
		$row_count = 100;
		// $opts["t1.ett_id"] = $_GET['id'];
		$result = $ETType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
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
					Object::import('Model', 'ETemplate');
					$ETemplate = new ETemplate();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["ett_id"] = $_POST['template_type'];
					$result = $ETemplate->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
					
					if(!empty($result)){
						$this->tpl['templateError'] = "The Email Template Is Already Exits! If You Want To Edit It Please Go To Edit Template Section.";
					} else {
						$form_data = array(
							'ett_id'					=>$_POST['template_type'],
							'content'					=>$_POST['content'],
							'created_at'				=>$time,
							'updated_at'				=>''
						);	
						$lastID = $ETemplate->save($form_data);
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
			Object::import('Model', array('ETemplate', 'ETType','EConstant'));
			$ETemplate = new ETemplate();
			$ETType = new ETType();
			$EConstant = new EConstant();
			$row_count = 1000000;
			$time= date("Y-m-d H:i:s");
			$opts["t1.et_id"] = $_GET['id'];
			$ETemplate->addJoin($ETemplate->joins, $ETType->getTable(), 'TC', array('TC.ett_id' => 't1.ett_id'), array('TC.ett_name'));
			$emailTemplates = $ETemplate->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'et_id', 'direction' => 'asc')));
			
			$opts = array();
			$opts["t1.ett_id"] = $_GET['id'];
			$emailTemplateConstants = $EConstant->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
			$data['emailTemplates'] = $emailTemplates;
			$data['emailTemplateConstants'] = $emailTemplateConstants;
			
			$this->tpl['result'] = $data;
			
			if(!empty($_POST)){
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
					
					$data["ett_id"] = $_POST['template_type'];
					$form_data = array(
						'content'					=>$_POST['content'],
						'updated_at'				=>$time
					);	
					// echo "<pre>";
					// print_r($form_data);
					// die;
					$ETemplate->debug = true;
					$lastID = $ETemplate->update(array_merge($form_data,$data));
					if($lastID){
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=EmailTemplates&action=listEt");
					}
					
				}
			}
		}
	}
	function listEt(){
		$opts = array();
		Object::import('Model', array('ETemplate', 'ETType'));
		$ETemplate = new ETemplate();
		$ETType = new ETType();
		$row_count = 1000000;
		$time= date("Y-m-d H:i:s");
		$ETemplate->addJoin($ETemplate->joins, $ETType->getTable(), 'TC', array('TC.ett_id' => 't1.ett_id'), array('TC.ett_name'));
		$emailTemplates = $ETemplate->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'et_id', 'direction' => 'asc')));
		$this->tpl['result'] = $emailTemplates;
		// echo "<pre>";
		// print_r($emailTemplates);
		// die;
	}	
	function emailConstant(){
		$opts = array();
		Object::import('Model', 'ETType');
		$ETType = new ETType();
		$row_count = 100;
		$result = $ETType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		if(!empty($_POST)){
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('template_type', 'Email Template Name is required!', 'required');
			$validator->addRule('constant_name', 'Constant Name is required!', 'required');
			
			
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
				
				$data["ett_id"] = $_POST['template_type'];
				$form_data = array(
					'ett_id'					=>$_POST['template_type'],
					'content'					=>$_POST['content'],
					'updated_at'				=>$time
				);	
				// echo "<pre>";
				// print_r($form_data);
				// die;
				$ETemplate->debug = true;
				// $lastID = $ETemplate->update(array_merge($form_data,$data));
				if($lastID){
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=EmailTemplates&action=listEt");
				}
				
			}
		}
	}
}	
?>