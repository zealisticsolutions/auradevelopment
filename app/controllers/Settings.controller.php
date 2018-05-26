<?php
// ini_set("display_errors", "on");
// error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';

class Settings extends Admin
{
	function Language(){
		
		$opts = array();
		Object::import('Model', 'Language');
		$LanguageModel = new Language();
		$row_count = 100;
		$time= date("Y-m-d H:i:s");
		if(!empty($_POST)){
			
			$opts["t1.language_name"] = $_POST['language'];
			$result = $LanguageModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
			if(isset($_POST['language']) && strlen(trim($_POST['language'])) > 0){
				$form_data = array(
						'language_name'				=>$_POST['language'],
						'created_at'				=>$time,
						'updated_at'				=>$time,
					);
				if(count($result)==0){
					$lastID = $LanguageModel->save($form_data);
				}else {
					$errorMsg = "Language is already added !";
				}
			} else {
				$errorMsg = "Please enter a language properly !";
			}
		}
		$opts = array();
		$result = $LanguageModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		if(!empty($errorMsg)){
			$this->tpl['errorMsg'] = $errorMsg;
		}
	}
	
	function editLanguage(){
		if(isset($_GET['id']) && strlen(trim($_GET['id'])) > 0){
			$opts = array();
			Object::import('Model', 'Language');
			$Language = new Language();
			// $Language->debug = true;
			$row_count = 1000000;
			$opts["t1.language_id"] = $_GET['id'];
			$time= date("Y-m-d H:i:s");
			$result = $Language->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
			$this->tpl['result'] = $result;
			if(isset($_POST['Update']) && !empty($_POST['Update']))
			{
				// print_r($_POST);
				// die;
				$data['language_id'] = $_POST['language_id'];
				$form_data = array(
						'language_name'				=>$_POST['Language'],
						'updated_at'				=>$time
					);
				
				$result1 = $Language->update(array_merge($form_data,$data));
				// $Language->debug = true;
				if($result1 >= 1)
					{
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=Language");
					}
			}	
		}
		
	}
	
	function MedicalHistory(){
		$opts = array();
		Object::import('Model', 'MHMaster');
		$MHMaster = new MHMaster();
		$row_count = 100;
		$time= date("Y-m-d H:i:s");
		if(!empty($_POST)){
			
			if(isset($_POST['medical_history']) && strlen(trim($_POST['medical_history'])) > 0){
				
				$opts["t1.mh_name"] = $_POST['medical_history'];
				$result = $MHMaster->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
				
				if(count($result)== 0){
					$form_data = array(
							'mh_name'					=>$_POST['medical_history'],
							'created_at'				=>$time,
							'updated_at'				=>'',
						);
					$lastID = $MHMaster->save($form_data);
				}else {
					$errorMsg = "Medical History is already added";
				}
			} else {
				
				$errorMsg = "Please enter a Medical History !";
			}
		}
		$opts = array();
		$result = $MHMaster->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		if(!empty($errorMsg)){
			$this->tpl['errorMsg'] = $errorMsg;
		}
	}
	function editMedicalHistory(){
		if(isset($_GET['id']) && strlen(trim($_GET['id'])) > 0){
			$opts = array();
			Object::import('Model', 'MHMaster');
			$MHMaster = new MHMaster();
			$row_count = 1000000;
			$opts["t1.mh_id"] = $_GET['id'];
			$time= date("Y-m-d H:i:s");
			$result = $MHMaster->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
			$this->tpl['result'] = $result;
			if(isset($_POST['Update']) && !empty($_POST['Update']))
			{
				$data['mh_id'] = $_POST['id'];
				$form_data = array(
						'mh_name'					=>$_POST['medical_history'],
						'updated_at'				=>$time,
					);
				$result1 = $MHMaster->update(array_merge($form_data,$data));
				if($result1 >= 1)
					{
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=MedicalHistory");
					}
			}	
		}
	}
	
	function medicalRoom(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('sr_room', 'Medical Room is required!', 'required');
			$validator->addRule('description', 'Description is required!', 'required');
			
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
				// echo "<pre>";
				// print_r($errors);
				// die;	
				// $_POST = $_POST;
				$this->tpl['errorMsg'] = $errors;
			} else {
				if(isset($_POST['sr_room']) && strlen(trim($_POST['sr_room'])) > 0){
					
					$opts = array();

					Object::import('Model', 'MSRoom');
					$MSRoom = new MSRoom();
					$row_count = 1000000;
					$row_count = 100;
					$opts["t1.sr_name"] = $_POST['sr_room'];
					$result = $MSRoom->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'sr_id', 'direction' => 'asc')));
					$time= date("Y-m-d H:i:s");
					
						$form_data = array(
							'sr_name'					=>$_POST['sr_room'],
							'description'				=>$_POST['description'],
							'created_at'				=>$time,
							'updated_at'				=>''
						);
					if(count($result)==0){	
						$lastID = $MSRoom->save($form_data);
						$_POST['sr_room']='';
						$_POST['description']='';
						
					}else{
						$errors['sr_room']="Medical Room is already added";
						$this->tpl['errorMsg'] = $errors;
					}
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'MSRoom');
		$MSRoom = new MSRoom();
		$row_count = 100;
		$result = $MSRoom->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'sr_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		
	}
	function editMedicalRoom(){
		
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', 'MSRoom');
			$MSRoom = new MSRoom();
			$row_count = 100;
			$opts["t1.sr_id"] = $_GET['id'];
			$result = $MSRoom->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'sr_id', 'direction' => 'asc')));
			
			// echo "<pre>";
			// print_r($result);
			// die;
			$this->tpl['result'] = $result[0];
			if(!empty($_POST)){
			
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('sr_room', 'Medical Room is required!', 'required');
				$validator->addRule('description', 'Description is required!', 'required');
				
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
					
					if(isset($_POST['sr_room']) && strlen(trim($_POST['sr_room'])) > 0){
						
						$opts = array();
						Object::import('Model', 'MSRoom');
						$MSRoom = new MSRoom();
						$row_count = 1000000;
						$time= date("Y-m-d H:i:s");
						$data['sr_id'] = $_GET['id'];
						$form_data = array(
								'sr_name'					=>$_POST['sr_room'],
								'description'				=>$_POST['description'],
								'updated_at'				=>$time
							);
							
						$lastID = $MSRoom->update(array_merge($form_data,$data));
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=medicalRoom");
						}
					}
				}
			}
		}
	}
	function serviceType(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('st_name', 'Service Type is required !', 'required');
			// $validator->addRule('description', 'Last Name is a required !', 'required');
			
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
				print_r($errors);
				
			} else {
				if(isset($_POST['st_name']) && strlen(trim($_POST['st_name'])) > 0){
					
					$opts = array();
					Object::import('Model', 'SRType');
					$SRType = new SRType();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["t1.st_name"] = $_POST['st_name'];
					$result = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
					$form_data = array(
							'st_name'					=>$_POST['st_name'],
							'created_at'				=>$time,
							'updated_at'				=>''
						);
						// print_r($form_data);
					if(count($result)==0){
						$lastID = $SRType->save($form_data);
					}else{
						$errors['st_name'] = "Treatment Category is already added !";
						$this->tpl['errorMsg'] = $errors;
					}
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'SRType');
		$SRType = new SRType();
		$row_count = 100;
		$result = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		
	}
	function editServiceTyep() {
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', 'SRType');
			$SRType = new SRType();
			$row_count = 100;
			$opts["t1.st_id"] = $_GET['id'];
			$result = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
			
			// echo "<pre>";
			// print_r($result);
			// die;
			$this->tpl['result'] = $result[0];
			if(!empty($_POST)){
			
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('st_name', 'Service Type is required !', 'required');
				
				
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
					
					if(isset($_POST['st_name']) && strlen(trim($_POST['st_name'])) > 0){
						// echo "hhhhhhhhhh";
						// die;
						$opts = array();
						Object::import('Model', 'SRType');
						$SRType = new SRType();
						$row_count = 1000000;
						$time= date("Y-m-d H:i:s");
						$data['st_id'] = $_GET['id'];
						$form_data = array(
							'st_name'					=>$_POST['st_name'],
							'updated_at'				=>$time
						);
						$lastID = $SRType->update(array_merge($form_data,$data));
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=serviceType");
						}
					}
				}
			}
		}
		
	}
	function smsTemplateType(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('stt_name', 'SMS Template Name is required !', 'required');
			// $validator->addRule('description', 'Last Name is a required !', 'required');
			
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
				if(isset($_POST['stt_name']) && strlen(trim($_POST['stt_name'])) > 0){
					
					$opts = array();
					Object::import('Model', 'SMSTType');
					$SMSTType = new SMSTType();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["t1.stt_name"] = $_POST['stt_name'];
					$result = $SMSTType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'stt_id', 'direction' => 'asc')));
					$form_data = array(
						'stt_name'					=>$_POST['stt_name'],
						'created_at'				=>$time,
						'updated_at'				=>''
					);
					if(count($result)==0){
						$lastID = $SMSTType->save($form_data);
					} else {
						 $errors['stt_name'] = "Sms Template Type is already added!";
						 $this->tpl['errorMsg'] = $errors;
					}
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'SMSTType');
		$SMSTType = new SMSTType();
		$row_count = 100;
		$result = $SMSTType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'stt_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
	}
	function editSmsTemplateTyep(){
		
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', 'SMSTType');
			$SMSTType = new SMSTType();
			$row_count = 100;
			$opts["t1.stt_id"] = $_GET['id'];
			$result = $SMSTType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'stt_id', 'direction' => 'asc')));
			
			$this->tpl['result'] = $result[0];
			if(!empty($_POST)){
			
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('stt_name', 'SMS Template Name is required !', 'required');
				
				
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
					
					if(isset($_POST['stt_name']) && strlen(trim($_POST['stt_name'])) > 0){
						// echo "hhhhhhhhhh";
						// die;
						$opts = array();
						Object::import('Model', 'SMSTType');
						$SMSTType = new SMSTType();
						$row_count = 1000000;
						$time= date("Y-m-d H:i:s");
						$data['stt_id'] = $_GET['id'];
						$form_data = array(
							'stt_name'					=>$_POST['stt_name'],
							'updated_at'				=>$time
						);
						$lastID = $SMSTType->update(array_merge($form_data,$data));
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=smsTemplateType");
						}
					}
				}
			}
		}
		
	}
	function emailTemplateType(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('ett_name', 'Email Template Name is required !', 'required');
			// $validator->addRule('description', 'Last Name is a required !', 'required');
			
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
				if(isset($_POST['ett_name']) && strlen(trim($_POST['ett_name'])) > 0){
					
					$opts = array();
					Object::import('Model', 'ETType');
					$ETType = new ETType();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["t1.ett_name"] = $_POST['ett_name'];
					$result = $ETType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
					$form_data = array(
						'ett_name'					=>$_POST['ett_name'],
						'created_at'				=>$time,
						'updated_at'				=>''
					);
					if(count($result)==0){
						$lastID = $ETType->save($form_data);
					} else {
						$errors['ett_name'] = "Email Template Type is already added!";
						$this->tpl['errorMsg'] = $errors;
					}
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'ETType');
		$ETType = new ETType();
		$row_count = 100;
		$result = $ETType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
	}
	function editEmailTemplateTyep(){
		
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', 'ETType');
			$ETType = new ETType();
			$row_count = 100;
			$opts["t1.ett_id"] = $_GET['id'];
			$result = $ETType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'ett_id', 'direction' => 'asc')));
			
			$this->tpl['result'] = $result[0];
			if(!empty($_POST)){
			
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('ett_name', 'Email Template Name is required !', 'required');
				
				
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
					
					if(isset($_POST['ett_name']) && strlen(trim($_POST['ett_name'])) > 0){
						// echo "hhhhhhhhhh";
						// die;
						$opts = array();
						Object::import('Model', 'SRType');
						$ETType = new ETType();
						$row_count = 1000000;
						$time= date("Y-m-d H:i:s");
						$data['ett_id'] = $_GET['id'];
						$form_data = array(
							'ett_name'					=>$_POST['ett_name'],
							'updated_at'				=>$time
						);
						$lastID = $ETType->update(array_merge($form_data,$data));
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=emailTemplateType");
						}
					}
				}
			}
		}
		
	}
	
	function consentFormType(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('consent_form_type', 'Consent form name is required !', 'required');
			// $validator->addRule('description', 'Last Name is a required !', 'required');
			
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
				if(isset($_POST['consent_form_type']) && strlen(trim($_POST['consent_form_type'])) > 0){
					
					$opts = array();
					Object::import('Model', 'ConsentFormType');
					$ConsentFormType = new ConsentFormType();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["t1.consent_form_name"] = $_POST['consent_form_type'];
					$result = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'desc')));
					$form_data = array(
						'consent_form_name'			=>$_POST['consent_form_type'],
						'created_at'				=>$time,
						'updated_at'				=>''
					);
					if(count($result)==0){
						$lastID = $ConsentFormType->save($form_data);
					} else {
						$errors['consent_form_type']="Consent Form Type is already added!";
						$this->tpl['errorMsg'] = $errors;
					}
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'ConsentFormType');
		$ConsentFormType = new ConsentFormType();
		$row_count = 100;
		$result = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'desc')));
		$this->tpl['result'] = $result;
	}
	function editConsentFormType(){
		
		if(!empty($_GET['id'])){
			
			$opts = array();
			Object::import('Model', 'ConsentFormType');
			$ConsentFormType = new ConsentFormType();
			$row_count = 100;
			$opts["t1.id"] = $_GET['id'];
			$result = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
			
			$this->tpl['result'] = $result[0];
			if(!empty($_POST)){
			
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('consent_form_name', 'Consent form namw is required !', 'required');
				
				
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
					
					if(isset($_POST['consent_form_name']) && strlen(trim($_POST['consent_form_name'])) > 0){
						// echo "hhhhhhhhhh";
						// die;
						$opts = array();
						Object::import('Model', 'ConsentFormType');
						$ConsentFormType = new ConsentFormType();
						$row_count = 1000000;
						$time= date("Y-m-d H:i:s");
						$data['id'] = $_GET['id'];
						$form_data = array(
							'consent_form_name'					=>$_POST['consent_form_name'],
							'updated_at'				=>$time
						);
						$lastID = $ConsentFormType->update(array_merge($form_data,$data));
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Settings&action=consentFormType");
						}
					}
				}
			}
		}
		
	}
	public function promoCode(){
		if(!empty($_POST)){
			
			$validator = new FormValidator();
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('promo_code', 'Promo code is required!', 'required');
			$validator->addRule('value', 'Value is required!', 'required');
			$validator->addRule('value', 'Value should be numeric !', 'numeric');
			$validator->addRule('type', 'Please Select promo code type!', 'required');
			$validator->addRule('valid_form', 'Please select valid form!', 'required');
			$validator->addRule('valid_till', 'Please Select valid till!', 'required');
			$validator->addRule('frequency', 'Please enter using frequency per user!', 'required');
			$validator->addRule('frequency', 'Using frequency should be numeric !', 'numeric');
			
			$validator->addRule('min_value_limit', 'Please enter minimum value for promo code!', 'required');
			$validator->addRule('min_value_limit', 'Minimum value for promo code should be numeric !', 'numeric');
			$validator->addRule('description', 'Description is required!', 'required');
			// $validator->addRule('value', 'Description is required!', 'required');
						
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
				// echo "<pre>";
				// print_r($errors);
				// die;	
				// $_POST = $_POST;
				$this->tpl['errorMsg'] = $errors;
			} else {
				if(isset($_POST['promo_code']) && strlen(trim($_POST['promo_code'])) > 0){
					
					$opts = array();

					Object::import('Model', 'APCode');
					
					$APCode = new APCode();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$valid_form = date('Y-m-d H:i:s', strtotime($_POST['valid_form']));
					$valid_till = date('Y-m-d H:i:s', strtotime($_POST['valid_till']));
					
					$form_data = array(
							'promo_code'		=>$_POST['promo_code'],
							'value'				=>$_POST['value'],
							'type'				=>$_POST['type'],
							'valid_form'		=>$valid_form,
							'valid_till'		=>$valid_till,
							'frequency'			=>$_POST['frequency'],
							'min_value_limit'	=>$_POST['min_value_limit'],
							'description'		=>$_POST['description'],
							'created_at'		=>$time,
							'updated_at'		=>''
						);

					// print_r($form_data);
					// die;
					$lastID = $APCode->save($form_data);
					$_POST="";
				}
			}
		} 
		$opts = array();
		Object::import('Model', 'APCode');
		$APCode = new APCode();
		$row_count = 100;
		$result = $APCode->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
	}
}	
?>