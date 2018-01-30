<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class Service extends Admin
{
	function addService(){
		$opts = array();
		Object::import('Model', array('SRType', 'MSRoom'));
		$SRType = new SRType();
		$MSRoom = new MSRoom();
		$row_count = 100;
		$srvType = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
		// $srvRoom = $MSRoom->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'sr_id', 'direction' => 'asc')));
		$data['srvType']  = $srvType;
		// $data['srvRoom']  = $srvRoom;
		$this->tpl['result'] = $data;
		if(!empty($_POST)){
			$validator = new FormValidator();
			
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('service_type', 'Service Type is required!', 'required');
			$validator->addRule('srv_name', 'Last Name is required !', 'required');
			$validator->addRule('amount', 'Amount is required!', 'required');
			$validator->addRule('amount', 'Amount is required!', 'numeric');
			$validator->addRule('duration', 'Duration is required !', 'required');
			$validator->addRule('tca_peal', 'Tca peal is required !', 'required');
			$validator->addRule('session_required', 'No of Session is required!', 'numeric');
			$validator->addRule('description', 'Description is required !', 'required');
			
			
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
				
				$opts = array();
				Object::import('Model', 'AService');
				$AService = new AService();
				$time= date("Y-m-d H:i:s");
				$form_data = array(
					'st_id'		   			=>$_POST['service_type'],
					'srv_name'			    =>$_POST['srv_name'],
					'amount' 		        =>$_POST['amount'],
					'duration'  			=>$_POST['duration'],
					'tca_peel' 				=>$_POST['tca_peal'],      	      
					'no_sessions_required' 	=>$_POST['session_required'],           
					'description' 			=>$_POST['description'],             
					'status' 				=>1,             
					'created_at' 			=>$time,         
					'updated_at' 			=>''
				);
				$lastID = $AService->save($form_data);
			}
		}
	}
	function listService(){
		$opts = array();
		Object::import('Model', array('AService', 'SRType'));
		$AService = new AService();
		$SRType = new SRType();
		$row_count = 1000000;
		$service_type = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
		if(!empty($_POST['service_type'])) {
			$opts['t1.st_id'] = $_POST['service_type'];
		}
		
		$result = $AService->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 's_id', 'direction' => 'asc')));
		$data['service']= $result;
		$data['service_type']= $service_type;
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->tpl['result'] = $data;
		
	}
	function editService(){
		// echo $_GET['id'];
		if(!empty($_GET['id'])){
			$opts = array();
			Object::import('Model', array('AService', 'SRType'));
			$AService = new AService();
			$SRType = new SRType();
			$row_count = 1000000;
			$service_type = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
			
			$opts["t1.s_id"] = $_GET['id'];
			// $AService->debug = true;
			$result = $AService->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 's_id', 'direction' => 'asc')));
			
			if(!empty(count($result))){
				$data['service']= $result;
				$data['service_type']= $service_type;
				$this->tpl['result'] = $data;
			
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
					$validator->addRule('service_type', 'Service Type is required!', 'required');
					$validator->addRule('srv_name', 'Last Name is required !', 'required');
					$validator->addRule('amount', 'Amount is required!', 'required');
					$validator->addRule('amount', 'Amount is required!', 'numeric');
					$validator->addRule('status', 'Status is required !', 'required');
					$validator->addRule('duration', 'Duration is required !', 'required');
					$validator->addRule('tca_peel', 'Tca peal is required !', 'required');
					$validator->addRule('no_sessions_required', 'No of Session is required!', 'numeric');
					$validator->addRule('description', 'Description is required !', 'required');
					
					
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
						$this->tpl['errorMsg'] = $errors;
					} else {
						
						$opts = array();
						Object::import('Model', 'AService');
						$AService = new AService();
						$time= date("Y-m-d H:i:s");
						$data['s_id'] = $_GET['id'];
						$form_data = array(
							'st_id'		   			=>$_POST['service_type'],
							'srv_name'			    =>$_POST['srv_name'],
							'amount' 		        =>$_POST['amount'],
							'duration'  			=>$_POST['duration'],
							'tca_peel' 				=>$_POST['tca_peel'],      	      
							'no_sessions_required' 	=>$_POST['no_sessions_required'],           
							'description' 			=>$_POST['description'],             
							'status' 				=>$_POST['status'],
							'updated_at' 			=>$time
						);
						
						$result1 = $AService->update(array_merge($form_data,$data));
						
						if(!empty($result1)){
							$this->redirect($_SERVER['PHP_SELF'] . "?controller=Service&action=listService");
						}
					}	
					
				}
			
			} else {
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=Service&action=listService");
			}
			
		}
	}
}	
?>