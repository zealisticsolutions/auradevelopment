<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class User extends Admin
{
	function registration(){
		
		$opts = array();
		Object::import('Model', array('Language', 'MHMaster'));
		$LanguageModel = new Language();
		$MHMaster = new MHMaster();
		$row_count = 100;
		$result = $LanguageModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
		$mh_master = $MHMaster->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
		$data['language']  = $result;
		$data['mh_master']  = $mh_master;
		$this->tpl['result'] = $data;
		// $this->tpl['mh_master'] = $mh_master;
		if(!empty($_POST)){
			
			// echo PROFILE_PICS_PATH;
			// echo "<pre>";
			// print_r($_FILES);
			// die;
		
			$validator = new FormValidator();
			
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('firstname', 'First Name is required !', 'required');
			$validator->addRule('lastname', 'Last Name is required !', 'required');
			$validator->addRule('username', 'User name is required !', 'required');
			$validator->addRule('user_type', 'User Type is required !', 'required');
			$validator->addRule('password', 'Password is required !', 'required');
			$validator->addRule('password', 'Password must be at least 8 characters !', 'minlength', 8);
			$validator->addRule('c_password', 'Confirm Password is a required !', 'required');
			$validator->addRule('gender', 'Gender is a required !', 'required');
			$validator->addRule('dob', 'Date of Birth is a required !', 'required');
			$validator->addRule('contact_no', 'Contact Details is a required !', 'required');
			$validator->addRule('email_address', 'Email Address is a required !', 'required');
			$validator->addRule('email_address', 'Please provide a proper email!', 'email');
			$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'minlength', 10);
			// $validator->addRule('contact_no_a', 'Please enter a valid mobile no !', 'minlength', 10);
			$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'maxlength', 10);
			// $validator->addRule('contact_no_a', 'Please enter a valid mobile no !', 'maxlength', 10);
			$validator->addRule('contact_no', 'Mobile No should be numeric !', 'numeric');
			// $validator->addRule('contact_no_a', 'Mobile No should be numeric !', 'numeric');
			// $validator->addRule('picture', 'Last Name is a required !', 'required');
			
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
				if($_POST['password'] == $_POST['c_password']){
					
					$opts = array();
					Object::import('Model', 'User');
					$UserModel = new UserModel();
					$opts["t1.email"] = $_POST['email_address'];
					$row_count = 100;
					$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
					if(!empty($result)){
						$emailExistErr= "The Email You Have Entered Is Already Exist!";
						$this->tpl['emailExistErr'] = $emailExistErr;
					} else {
						
						$opts = array();
						$opts["t1.contact_no"] = $_POST['contact_no'];
						$row_count = 100;
						$mobileExist = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
						// print_r($mobileExist);
						// die;
						if(!empty($mobileExist)){
							$mobileExistErr= "The Mobile No You Have Entered Is Already Exist!";
							$this->tpl['mobileExistErr'] = $mobileExistErr;
						} else {
							$opts = array();
							$opts["t1.user_id"] = $_POST['username'];
							$row_count = 100;
							// $UserModel->debug = true;
							$username = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
							// echo "<pre>";
							// print_r($username);
							// print_r($_POST);
							if(!empty($username)){
								$usernameExistErr= "The User Name You Have Entered Is Already Exist!";
								$this->tpl['usernameExistErr'] = $usernameExistErr;
								
							} else {
								if(!empty($_POST['marriage_date'])){
								$mrgDtate = date("Y-m-d", strtotime($_POST['marriage_date']));
								} else {
									$mrgDtate='';
								}								
								
								$target_dir = PROFILE_PICS_PATH;
								$fileName = time().".jpg";
								echo $target_file = $target_dir .$fileName;
								if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
									
								} else {
									$fileName="profile-pic.jpg";
								}
								
								$time= date("Y-m-d H:i:s");
								$form_data = array(
									'user_id'		        =>$_POST['username'],
									'email'			        =>$_POST['email_address'],
									'pasword' 		        =>$_POST['password'],
									'last_password_change'  =>'',
									'firstname' 			=>$_POST['firstname'],      	      
									'lastname' 				=>$_POST['lastname'],           
									'gender' 				=>$_POST['gender'],             
									'dob' 					=>date("Y-m-d", strtotime($_POST['dob'])),                
									'marriage_date' 		=>$mrgDtate,
									'blood_group' 			=>$_POST['blood_group'],        
									'referred_id' 			=>$_POST['referred_id'],        
									'refer_code' 			=>"",         
									'contact_no' 			=>$_POST['contact_no'],         
									'contact_no_a' 			=>$_POST['contact_no_a'], 
									'address' 				=>$_POST['address'],            
									'area' 					=>$_POST['area'],               
									'location' 				=>$_POST['location'],           
									'city' 					=>$_POST['city'],               
									'pin' 					=>$_POST['pincode'],                
									'pic' 					=>$fileName,                
									'type' 					=>$_POST['user_type'],               
									'status' 				=>1,               
									'created_at' 			=>$time,         
									'update_at' 			=>$time
								);
								// echo "<pre>";
								// print_r($form_data);
								// die;
								
								$lastID = $UserModel->save($form_data);
								if($lastID){
								
									if(!empty($_POST['medical_history'])){
										
										$opts = array();
										Object::import('Model', 'UMHistory');
										$UMHistory = new UMHistory();
										$row_count = 100;
										$time= date("Y-m-d H:i:s");
										foreach($_POST['medical_history'] as $medical_history){
											$form_data = array(
												'user_id'					=>$lastID,
												'mh_id'						=>$medical_history,
												'created_at'				=>$time,
												'updated_at'				=>$time,
											);
											$lastIDU = $UMHistory->save($form_data);
										}
									}
									
									if(!empty($_POST['language'])){
										
										$opts = array();
										Object::import('Model', 'ULanguage');
										$ULanguage = new ULanguage();
										$row_count = 100;
										$time= date("Y-m-d H:i:s");
										foreach($_POST['language'] as $language){
											// echo $language."<br>";
											$form_data = array(
												'user_id'					=>$lastID,
												'language_id'				=>$language,
												'created_at'				=>$time,
												'updated_at'				=>$time,
											);
											$lastIDU = $ULanguage->save($form_data);
										}
									}
									
									if($_POST['user_type']==2){
										$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=therepist");
									}
									if($_POST['user_type']==3){
										$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=Patients");
									}
								}
							}
						}
					}
				} else {
					$passwordErr= "Password does not match confirm password";
					$this->tpl['passwordErr'] = $passwordErr;
				}
			}
		}
	}
	
	function editProfile(){
		if(!empty($_GET['edit'])){
			
			$opts = array();
			Object::import('Model', array('Language', 'MHMaster','User'));
			$UserModel = new UserModel();
			$LanguageModel = new Language();
			$MHMaster = new MHMaster();
			$opts["t1.id"] = $_GET['edit'];
			$row_count = 100;
			
			if(!empty($_POST)){
				// echo "<pre>";
				// print_r($_POST);
				// echo "</pre>";
				// die;	
				$validator = new FormValidator();
				/* 
				 * Add validation rules (fieldname, error msg, rule type, criteria)
				 * A field can have multiple rules and will validate them in the order they
				 * are provided
				 */
				$validator->addRule('firstname', 'First Name is required !', 'required');
				$validator->addRule('lastname', 'Last Name is required !', 'required');
				$validator->addRule('type', 'User Type is required !', 'required');
				$validator->addRule('gender', 'Gender is required !', 'required');
				$validator->addRule('dob', 'Date of Birth is required !', 'required');
				$validator->addRule('contact_no', 'Contact Details is required !', 'required');
				$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'minlength', 10);
				$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'maxlength', 10);
				$validator->addRule('contact_no', 'Mobile No should be numeric !', 'numeric');
				
				
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
					
					
					if(!empty($_POST['marriage_date'])){
					$mrgDtate = date("Y-m-d", strtotime($_POST['marriage_date']));
					} else {
						$mrgDtate='';
					}	
					
					$opts = array();
					$opts["t1.id"] = $_GET['edit'];
					$opts["t1.contact_no"] = $_POST['contact_no'];
					$row_count = 100;
					// $UserModel->debug =true;
					$mobileExist1 = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
					
					
					$opts = array();
					// $opts["t1.id"] = $_GET['edit'];
					$opts["t1.contact_no"] = $_POST['contact_no'];
					$row_count = 100;
					// $UserModel->debug =true;
					$mobileExist2 = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
					
					if(count($mobileExist1) != count($mobileExist2)){
						echo $mobileExistErr= "The Mobile No You Have Entered Is Already Exist!";
						$this->tpl['mobileExistErr'] = $mobileExistErr;
					} else {
						
						
						// echo "<pre>";
						// print_r($_FILES['picture']['name']);
						// die;	
						if(!empty($_FILES['picture']['name'])){
							$target_dir = PROFILE_PICS_PATH;
							$fileName = time().".jpg";
							echo $target_file = $target_dir .$fileName;
							if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
								
							} else {
								$fileName="profile-pic.jpg";
							}
						} else {
							$opts = array();
							$opts["t1.id"] = $_GET['edit'];
							$row_count = 100;
							$userProfilePic = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
							$fileName=$userProfilePic[0]['pic'];
						}
						
						
						$time= date("Y-m-d H:i:s");
						$form_data = array(
							'firstname' 			=>$_POST['firstname'],      	      
							'lastname' 				=>$_POST['lastname'],           
							'gender' 				=>$_POST['gender'],             
							'dob' 					=>date("Y-m-d", strtotime($_POST['dob'])),                
							'marriage_date' 		=>$mrgDtate,
							'blood_group' 			=>$_POST['blood_group'],        
							'referred_id' 			=>$_POST['referred_id'],        
							'refer_code' 			=>"",         
							'contact_no' 			=>$_POST['contact_no'],         
							'contact_no_a' 			=>$_POST['contact_no_a'], 
							'address' 				=>$_POST['address'],            
							'area' 					=>$_POST['area'],               
							'location' 				=>$_POST['location'],           
							'city' 					=>$_POST['city'],               
							'pin' 					=>$_POST['pin'],                
							'pic' 					=>$fileName,                
							'type' 					=>$_POST['type'],               
							'status' 				=>$_POST['status'],               
							'update_at' 			=>$time
						);
						$data['id'] = $_GET['edit'];
						$result1 = $UserModel->update(array_merge($form_data,$data));
					}
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				}
			} else {
				$editUser = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
				$_POST = $editUser[0];
				// echo "<pre>";
				// print_r($_POST);
				// die;
			}
			$result = $LanguageModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
			$mh_master = $MHMaster->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
			$data['language']  = $result;
			$data['mh_master']  = $mh_master;
			$this->tpl['result'] = $data;
		}
	}
	function therepist(){
		$opts = array();
		Object::import('Model', 'User');
		$UserModel = new UserModel();
		$row_count = 1000000;
		$opts["t1.type"] = 2;
		$time= date("Y-m-d H:i:s");
		$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		
	}
	function Patients(){
		$opts = array();
		Object::import('Model', 'User');
		$UserModel = new UserModel();
		$row_count = 1000000;
		$opts["t1.type"] = 3;
		$time= date("Y-m-d H:i:s");
		$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
		
		// echo "<pre>";
		// print_r($result);
		// die;
	}
	function Profile(){
		if(!empty($_GET['id'])){
			$opts = array();
			Object::import('Model', array('ULanguage', 'UMHistory','User','Language','MHMaster'));
			$UserModel = new UserModel();
			$ULanguage = new ULanguage();
			$UMHistory = new UMHistory();
			$MHMaster = new MHMaster();
			$Language = new Language();
			$row_count = 1000000;
			
			
			
			
			$opts["t1.id"] = $_GET['id'];
			$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
			
			$opts["t1.user_id"] = $_GET['id'];
			$ULanguage->addJoin($ULanguage->joins, $Language->getTable(), 'TC', array('TC.language_id' => 't1.language_id'), array('TC.language_name'));
			$UserLanguage = $ULanguage->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'language_id', 'direction' => 'asc')));
			
			$opts["t1.user_id"] = $_GET['id'];
			$UMHistory->addJoin($UMHistory->joins, $MHMaster->getTable(), 'TC', array('TC.mh_id' => 't1.mh_id'), array('TC.mh_name'));
			$userMedicalHistory = $UMHistory->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'mh_name', 'direction' => 'asc')));
			
			$data['userDetails'] = $result;
			$data['userMedicalHistory'] = $userMedicalHistory;
			$data['userLanguage'] = $UserLanguage;
			
			// echo "<pre>";
			// print_r($data);
			// die;
			
			
			
			
			if(count($result) == 1){
				$this->tpl['result'] = $data;
			} else {
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
			}
			
		}
	}
	function UserMedicalHistory(){
		if(!empty($_GET['edit'])){
			$opts = array();
			Object::import('Model', array('ULanguage', 'UMHistory','User','Language','MHMaster'));
			$MHMaster = new MHMaster();
			$UMHistory = new UMHistory();
			$row_count = 1000000;
			$opts["t1.user_id"] = $_GET['edit'];
			$UMHistory->addJoin($UMHistory->joins, $MHMaster->getTable(), 'TC', array('TC.mh_id' => 't1.mh_id'), array('TC.mh_name'));
			$userMedicalHistory = $UMHistory->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'mh_name', 'direction' => 'asc')));
			
			$medicalHistory = $MHMaster->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
			
			// echo "<pre>";
			// print_r($medicalHistory);
			// die;
			$data['medicalHistory'] =$medicalHistory;
			$data['userMedicalHistory'] =$userMedicalHistory;
			$this->tpl['result'] = $data;
		}  else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
		}
	}
	function deleteUserMedicalHistory(){
		
		if(!empty($_GET['user']) And !empty($_GET['mh'])){
		
			$opts = array();
			Object::import('Model', array('ULanguage', 'UMHistory','User','Language','MHMaster'));
			$UMHistory = new UMHistory();
			$opts["t1.user_id"] = $_GET['user'];
			$opts["t1.umh_id"] = $_GET['mh'];
			$row_count = 1000000;
			$userMedicalHistory = $UMHistory->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
			if(count($userMedicalHistory) == 1){
				
				if (1 == $UMHistory->delete($_GET['mh']))
				{
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=UserMedicalHistory&edit=24");
				} else {
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
				}
			} else {
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
			}
		} else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
		}
	}
	function addUserMedicalHistory(){
		if(!empty($_GET['user']) And !empty($_GET['mh'])){
		
			$opts = array();
			Object::import('Model', array('ULanguage', 'UMHistory','User','Language','MHMaster'));
			$UMHistory = new UMHistory();
			$opts["t1.user_id"] = $_GET['user'];
			$opts["t1.mh_id"] = $_GET['mh'];
			$row_count = 1000000;
			// $UMHistory->debug =true;
			$userMedicalHistory = $UMHistory->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'mh_id', 'direction' => 'asc')));
			// echo "<pre>";
			// print_r($userMedicalHistory);
			// die;
			
			if(count($userMedicalHistory) > 0){
				$medicalHistoryError = "The Medical History Is Already Added!";
				$_SESSION['medicalHistoryError']  = $medicalHistoryError;
				// $this->tpl['medicalHistoryError'] = $medicalHistoryError;
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=UserMedicalHistory&edit=".$_GET['user']);
			} else {
				
				$opts = array();
				Object::import('Model', 'UMHistory');
				$UMHistory = new UMHistory();
				$row_count = 100;
				$time= date("Y-m-d H:i:s");
				
				$form_data = array(
					'user_id'					=>$_GET['user'],
					'mh_id'						=>$_GET['mh'],
					'created_at'				=>$time,
					'updated_at'				=>$time,
				);
				$lastIDU = $UMHistory->save($form_data);
				if($lastIDU){
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=UserMedicalHistory&edit=".$_GET['user']);
				}
			}
		} else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
		}
		
	}
}	
?>