<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class ConsentForm extends Admin
{
	function add(){
		$opts = array();
		Object::import('Model', 'ConsentFormType');
		$ConsentFormType = new ConsentFormType();
		$row_count = 100;
		$result = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'desc')));
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
			$validator->addRule('consent_form_type', 'Consent form type is required !', 'required');
			$validator->addRule('content', 'Consent form content is required !', 'required');
			
			
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
					Object::import('Model', 'ConsentFormModel');
					$ConsentFormModel = new ConsentFormModel();
					$row_count = 1000000;
					$time= date("Y-m-d H:i:s");
					$opts["consent_type_id"] = $_POST['consent_form_type'];
					$result = $ConsentFormModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
					
					if(!empty($result)){
						$data['consent_type_id'] = $_POST['consent_form_type'];
						$form_data = array(
							'content'					=>$_POST['content'],
							'updated_at'				=>$time
						);	
						// $lastID = $ConsentFormModel->save($form_data);
						$ConsentFormModel->update(array_merge($form_data,$data));
					} else {
						$form_data = array(
							'consent_type_id'			=>$_POST['consent_form_type'],
							'content'					=>$_POST['content'],
							'created_at'				=>$time,
							'updated_at'				=>''
						);	
						$lastID = $ConsentFormModel->save($form_data);
						if($lastID){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=EmailTemplates&action=listEt");
						}
					}
				}
			}
		}
	}
	
	function showConsentForm(){
		$opts = array();
		Object::import('Model', 'ConsentFormType');
		$ConsentFormType = new ConsentFormType();
		$row_count = 100;
		$result = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'desc')));
		$this->tpl['result'] = $result;
	}
	public function getConsentForm(){
		$opts = array();
		Object::import('Model', 'ConsentFormModel');
		$ConsentFormModel = new ConsentFormModel();
		$row_count = 1000000;
		$time= date("Y-m-d H:i:s");
		$opts["consent_type_id"] = $_POST['consent_form_type'];
		$result = $ConsentFormModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
		if(!empty($result)){
			$result[0]['success'] =1;
			echo json_encode($result[0]);
			die;
		}else {
			$result[0]['success'] =0;
			echo json_encode($result[0]);
			die;
		}
		
	}
	public function saveSignature(){
		// define('UPLOAD_DIR', 'images/');
		$img = $_POST['img'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = SIGNATURE_PATH . uniqid() . '.jpg';
		$success = file_put_contents($file, $data);
		die;
	}
}	
?>