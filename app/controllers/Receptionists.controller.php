<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class Receptionists extends Admin
{
	public function bookAppinments(){
		$opts = array();
		Object::import('Model', array('SRType', 'MSRoom'));
		$SRType = new SRType();
		$MSRoom = new MSRoom();
		$row_count = 100;
		$srvType = $SRType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));
		$data['srvType']  = $srvType;
		$this->tpl['result'] = $data;
	}
	public function bookings(){
		$opts = array();
		Object::import('Model', 'User');
		$UserModel = new UserModel();
		$row_count = 1000000;
		$opts["t1.type"] = 2;
		$time= date("Y-m-d H:i:s");
		$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
		// echo "<pre>";
		// print_r($result);
		// die;
		$this->tpl['doctor'] = $result;
		
	}
	public function dataBooking(){
		
		$start = date('Y-m-d', $_GET['start']);
		$end = date('Y-m-d', $_GET['end']);
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		$sql = "SELECT 
				ab.*, 
				CONCAT(p.firstname, ' ', p.lastname) as patient_name,
				p.contact_no As patient_mobile,
				p.dob As patient_dob,
				p.email As patient_email,
				p.gender As patient_gender,
				p.pic As patient_pic,
				d.appointment_color As appointment_color,
				d.id As doctor_id,
				CONCAT(d.firstname, ' ', d.lastname) as doctor_name,
				CONCAT(r.firstname, ' ', r.lastname) as rec_booked_by,
				CONCAT(c.firstname, ' ', c.lastname) as rec_canceled_by,
                ars.srv_name As treatment_name,
                arst.st_name As treatment_categories,
                aroom.sr_name As treatment_room
				 
				FROM `aura_booking` as ab 
				INNER JOIN aura_user As  p ON ab.patient_id = p.id 
				INNER JOIN aura_user As d ON d.id=ab.therepist_id 
				INNER JOIN aura_user As r ON r.id=ab.booked_by
				LEFT JOIN aura_user As c ON c.id=ab.canceled_by 
                INNER JOIN aura_service As ars ON ars.s_id=ab.s_id 
                INNER JOIN aura_service_type As arst ON arst.st_id=ab.st_id
                INNER JOIN aura_service_room As aroom ON aroom.sr_id=ab.room_id
				Where ab.appointment_date between '".$start."' AND '".$end."'
				";
				
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$sTime =$this->numToSlot($row['s_slots']);
			$eTime =$this->numToSlot($row['e_slots']);
			if($row['patient_gender'] == 1){
				$gender = "Male";
			}
			if($row['patient_gender'] == 2){
				$gender = "Female";
			}
			if($row['patient_gender'] == 3){
				$gender = "Other";
			}
			else {
				$gender = "NA";
			}
			if($row['rec_canceled_by'] == ''){
				$rec_canceled_by = "NA";
			} else {
				$rec_canceled_by = $row['rec_canceled_by'];
			}
			$dob = date("d-m-Y", strtotime($row['patient_dob']));
			$data['title'] = $row['treatment_name'];
			$data['start'] = $row['appointment_date'].'T'.$sTime.':00';
			$data['className'] = $row['appointment_color'];
			$data['end'] = $row['appointment_date'].'T'.$eTime.':00';
			$data['slot'] = $sTime.' To '.$eTime;
			$data['patient_name']   = $row['patient_name'];
			$data['patient_dob']   = $dob;
			$data['patient_mobile'] = $row['patient_mobile'];
			$data['doctor_id']  = $row['doctor_id'];
			$data['patient_email']  = $row['patient_email'];
			$data['patient_gender'] = $gender;
			$data['patient_pic'] = $row['patient_pic'];
			$data['doctor_name'] = $row['doctor_name'];
			$data['rec_booked_by'] = $row['rec_booked_by'];
			$data['rec_canceled_by'] = $rec_canceled_by;
			$data['treatment_categories'] = $row['treatment_categories'];
			$data['treatment_room'] = $row['treatment_room'];
			$bookingData['events'][] = $data;
			$booking[]= $row;
        }
		// echo "<pre>";
		// print_r($booking);
		// print_r($bookingData);
		// die;
		
		echo json_encode($bookingData);
		die;
	}
	public function gerTreatments(){
		$opts = array();
		Object::import('Model', array('AService', 'MSRoom'));
		$AService = new AService();
		$MSRoom = new MSRoom();
		// $UserModel = new UserModel();
		$row_count = 100;
		$opts['t1.st_id'] = $_POST['data'];
		$srvType = $AService->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 's_id', 'direction' => 'asc')));
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		$sql = "SELECT au.id, CONCAT(au.firstname, ' ', au.lastname) as name  FROM aura_therepist_services As ts LEFT JOIN aura_user As au ON au.id =ts.user_id Where ts.st_id=".$_POST['data'];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$data['doctors'][]  = $row;
        }
		$data['srvType']  = $srvType;
		echo json_encode($data);
		die;
	}
	public function getDoctors(){
		$opts = array();
		Object::import('Model', array('AService', 'UserModel','SRType'));
		$AService = new AService();
		$MSRoom = new MSRoom();
		$row_count = 100;
		$opts['t1.st_id'] = $_POST['data'];
		$srvType = $AService->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 's_id', 'direction' => 'asc')));
		$data['srvType']  = $srvType;
		// $opts["t1.user_id"] = $_SESSION['USER_ID'];
		$ATSpecialities->addJoin($ATSpecialities->joins, $SRType->getTable(), 'TC', array('TC.st_id' => 't1.st_id'), array('TC.st_name'));
		$ATSpecialities = $ATSpecialities->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));	
		echo json_encode($data);
		die;
	}
	public function getSlots(){
		
		// echo "<pre>";
		// print_r($_POST);
		$weekday = date('N', strtotime($_POST['appointment_date']));
		$opts["t1.user_id"] = $_POST['doctors'];
		$opts["t1.day"] = $weekday;
		Object::import('Model', array('AService', 'ADSchedule','Booking'));
		$AService = new AService();
		$ADSchedule = new ADSchedule();
		$Booking = new Booking();
		$row_count = 1000000;
		$Schedules = $ADSchedule->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'day', 'direction' => 'asc')));	
		
		$opts = array();
		$opts["t1.s_id"] = $_POST['services'];
		$row_count = 1000000;
		$Service = $AService->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 's_id', 'direction' => 'asc')));	
		$appointment_date = date('Y-m-d', strtotime($_POST['appointment_date']));
		
		$invalidSlots =$this->validateSlots($_POST['doctors'],$appointment_date);
		
		// print_r($invalidSlots);
		// print_r($Service);
		// die;
		$data['service'] =$Service[0];
		
		foreach($Schedules as $Schedule ){
			$startSlot = $this->startingSlots($Schedule['start_time']);
			$endSlot = $this->endingSlots($Schedule['end_time']);
			$RequiredNoOfSlots = $Service[0]['duration']/GRANULARITY;
			$BookTillSlots =$endSlot-$RequiredNoOfSlots;
			for($i = $startSlot; $i<= $BookTillSlots; $i++)
			{
				if(!empty($invalidSlots)){
					if (in_array($i, $invalidSlots)) {
						
					} else {
						$FrmSlots = $i; 
						$sSlots = $this->numToSlot($FrmSlots);						
						$toSlots = $i+ $RequiredNoOfSlots;
						$eSlots = $this->numToSlot($toSlots);
						
						// echo "Start-".$FrmSlots."-Time-".$sSlots;
						// echo "End-".$toSlots."-Time-".$eSlots;
						// echo "<br>";
						if ((in_array($FrmSlots, $invalidSlots)) or (in_array($toSlots, $invalidSlots))){ 
						
						} else {
							$availableSlots[] = $sSlots." To ".$eSlots;
						}
					
					}				
				} else {
					$FrmSlots = $i; 
					$sSlots = $this->numToSlot($FrmSlots);
					$toSlots = $i+ $RequiredNoOfSlots;
					$eSlots = $this->numToSlot($toSlots);
					$availableSlots[] = $sSlots." To ".$eSlots;
				}			
				// else {
					// $FrmSlots = $i; 
					// $sSlots = $this->numToSlot($FrmSlots);
					// $toSlots = $i+ $RequiredNoOfSlots;
					// $eSlots = $this->numToSlot($toSlots);
					// $availableSlots[] = $sSlots." To ".$eSlots;
				// }
			}
		}
		$data['availableSlots'] =$availableSlots;
		$data['success'] =1;
		echo json_encode($data);
		
		die;
	}
	public function validateSlots($doctors,$appointment_date){
		
		Object::import('Model', array('Booking'));
		$Booking = new Booking();
		$opts = array();
		$opts["t1.therepist_id"] = $doctors;
		$opts["t1.appointment_date"] = $appointment_date;
		$row_count = 1000000;
		$bookingDatas = $Booking->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));	
		
		if(!empty($bookingDatas)){
			foreach($bookingDatas as $bookedData){
				for($i = $bookedData['s_slots']; $i < $bookedData['e_slots']; $i++ ){
					$invalidSlots[] = $i;
				}
			}
		}
		if(!empty($invalidSlots)){
			return $invalidSlots;
		} else {
			return 0;
		}
		
	}
	public function startingSlots($stime){
		$StartingTime = (explode(':',$stime));
		$s_hr = $StartingTime[0];
		$s_min = $StartingTime[1];
		return $StartingSlots = (($s_hr*60)+$s_min)/GRANULARITY;
	}
	public function endingSlots($etime){
		$StartingTime = (explode(':',$etime));
		$s_hr = $StartingTime[0];
		$s_min = $StartingTime[1];
		return $StartingSlots = (($s_hr*60)+$s_min)/GRANULARITY;
	}
	public function numToSlot($FrmSlots){
		$StartSlotsForCalculation = $FrmSlots;
		$StartTotalMinut = $StartSlotsForCalculation * GRANULARITY;
		$StartActualMinut = $StartTotalMinut % 60;
		$DisplayStartMIN = (($FrmSlots)*GRANULARITY) % 60;
		$DisplayStartMIN = sprintf('%02d', $DisplayStartMIN);
		$DisplayStartHrs = ((($FrmSlots)*GRANULARITY)- $StartActualMinut)/60;
		$DisplayStartHrs = sprintf('%02d', $DisplayStartHrs);
		return $DisplayStartHrs.":".$DisplayStartMIN;
	}
	public function bookSlots(){
		if(!empty($_POST)){
			
			if($_POST['user_exist']==1){
				
				
				
			} else {
				
			}
			echo "<pre>";
			print_r($_POST);
			die;
		}
	}
	public function checkUserExist(){
		if(!empty($_POST['mobile'])){
			$opts = array();
			Object::import('Model', 'User');
			$UserModel = new UserModel();
			$row_count = 1000000;
			$opts["t1.contact_no"] = $_POST['mobile'];
			$time= date("Y-m-d H:i:s");
			$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
			if(count($result)> 0){
				$result = $result[0];
				unset($result['pasword']);
				$result['user_exist'] =1;
				echo json_encode($result);
				die;
			} else {
				$data['user_exist'] =2;
				echo json_encode($data);
				die;
			}
			die;
		}
	}
	public function createNewUser(){
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
		
		if(!empty($_POST)){
			
			// echo PROFILE_PICS_PATH;
			// echo "<pre>";
			// print_r($_POST);
			// die;
			
			$_POST['username'] = $_POST['email_address'];
			$_POST['password'] = 123456789;
			$_POST['c_password'] = 123456789;
			$_POST['user_type'] = 3;
			$_POST['username'] = $_POST['email_address'];
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
			
			$validator->addRule('appoinment_date', 'Appointment date room number is required !', 'required');
			$validator->addRule('room', 'Treatment room number is required !', 'required');
			$validator->addRule('cost', 'Cost is required !', 'required');
			$validator->addRule('pop_st_id', 'Treatment type is required !', 'required');
			$validator->addRule('pop_s_id', 'Treatment id is required !', 'required');
			$validator->addRule('pop_doctors', 'Doctor is required !', 'required');
			$validator->addRule('Slots', 'Slots is required !', 'required');
			$validator->addRule('contact_no', 'Mobile number is required !', 'required');
			$validator->addRule('email_address', 'Email Address is a required !', 'required');
			$validator->addRule('email_address', 'Please provide a proper email!', 'email');
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
				// print_r($errors);
				if(count($errors)>0){
					$error['errMsg'] = $errors;
					echo json_encode($error);
					die;
				}
				// $this->tpl['errorMsg'] = $errors;
				
			} else {
				if($_POST['password'] == $_POST['c_password']){
					
					$opts = array();
					Object::import('Model', 'User');
					$UserModel = new UserModel();
					$opts["t1.email"] = $_POST['email_address'];
					$row_count = 100;
					$result = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
					if(!empty($result)){
						$emailExistErr['email']= "The Email You Have Entered Is Already Exist!";
						// $this->tpl['emailExistErr'] = $emailExistErr;
						$error['errMsg'] = $emailExistErr;
						echo json_encode($error);
						die;
					} else {
						
						$opts = array();
						$opts["t1.contact_no"] = $_POST['contact_no'];
						$row_count = 100;
						$mobileExist = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
						if(!empty($mobileExist)){
							$mobileExistErr['contact_no']= "The Mobile No You Have Entered Is Already Exist!";
							$error['errMsg'] = $mobileExistErr;
							echo json_encode($error);
							die;
						} else {
							$opts = array();
							$opts["t1.user_id"] = $_POST['username'];
							$row_count = 100;
							$username = $UserModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
							if(!empty($username)){
								$usernameExistErr['user_name']= "The User Name You Have Entered Is Already Exist!";
								$error['errMsg'] = $usernameExistErr;
								echo json_encode($error);
								die;
								
							} else {
								if(!empty($_POST['marriage_date'])){
								$mrgDtate = date("Y-m-d", strtotime($_POST['marriage_date']));
								} else {
									$mrgDtate='';
								}								
								
								$fileName="profile-pic.jpg";
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
									$error['success'] = "New User Created";
									$this->complteBooking($_POST,$lastID);
									// echo json_encode($error);
									// die;
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
	public function complteBooking($data = null, $customer_id=null){
		if(empty($data)){
			$data = $_POST;
		} 
		if(empty($customer_id)){
			$customer_id = $data['patient_id'];
		} 
		// echo "<pre>";
		// print_r($data);
		// print_r($customer_id);
		// die;
		if(!empty($data)){
			$validator = new FormValidator();
			
			/* 
			 * Add validation rules (fieldname, error msg, rule type, criteria)
			 * A field can have multiple rules and will validate them in the order they
			 * are provided
			 */
			$validator->addRule('appoinment_date', 'Appointment date room number is required !', 'required');
			$validator->addRule('room', 'Treatment room number is required !', 'required');
			$validator->addRule('cost', 'Cost is required !', 'required');
			$validator->addRule('pop_st_id', 'Treatment type is required !', 'required');
			$validator->addRule('pop_s_id', 'Treatment id is required !', 'required');
			$validator->addRule('pop_doctors', 'Doctor is required !', 'required');
			$validator->addRule('Slots', 'Slots is required !', 'required');
			$validator->addRule('appoinment_date', 'Appointment date is required !', 'required');
			$validator->addRule('contact_no', 'Mobile number is required !', 'required');
			$validator->addRule('email_address', 'Email Address is a required !', 'required');
			$validator->addRule('email_address', 'Please provide a proper email!', 'email');
			$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'minlength', 10);
			$validator->addRule('contact_no', 'Please enter a valid mobile no !', 'maxlength', 10);
			
			
			
			$validator->addRule('contact_no', 'Mobile No should be numeric !', 'numeric');
			
			// Input the POST data and check it
			$validator->addEntries($data);
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
				// print_r($errors);
				if(count($errors)>0){
					$error['errMsg'] = $errors;
					echo json_encode($error);
					die;
				}
			} else {
				$Slots = explode(" To ",$data['Slots']);
				$starting_slots = $this->startingSlots($Slots[0]);
				$ending_slots = $this->startingSlots($Slots[1]);
				Object::import('Model', 'Booking');
				$Booking = new Booking();
				$appointment_date = date('Y-m-d', strtotime($data['appoinment_date']));
				
				$time= date("Y-m-d H:i:s");
				$form_data = array(
					'patient_id'		=>$customer_id,
					'therepist_id'		=>$data['pop_doctors'],
					'room_id'			=>$data['room'],
					's_id'				=>$data['pop_s_id'],
					'duration'			=>$data['duration'],
					'st_id'				=>$data['pop_st_id'],
					'tca_peel'			=>"",
					'amount'			=>$data['cost'],
					'srv_name'			=>"",
					'coupon'			=>"",
					'discount'			=>"",
					's_slots'			=>$starting_slots,
					'e_slots'			=>$ending_slots,
					'appointment_date'	=>$appointment_date,
					'booked_by'			=>$_SESSION['USER_ID'],
					'canceled_by'		=>"",
					'created_at'		=>$time,
					'updated_at'		=>""
				);
				$lastID = $Booking->save($form_data);
				if($lastID > 0){
					$result['status']=1;
					$result['message']="The Appointment Is Booked Successfully!";
					echo json_encode($result);
					die;
				} else {
					$result['status']=0;
					$result['message']="The Appointment Could Not Booked Try Again!";
					echo json_encode($result);
					die;
				}	
			}
		}
		die;
		
	}
	
	public function listBooking(){
	}
	
	public function bookingDetails(){
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
			$sql = "SELECT 
				ab.*, 
				CONCAT(p.firstname, ' ', p.lastname) as patient_name,
				p.contact_no As patient_mobile,
				p.dob As patient_dob,
				p.email As patient_email,
				p.gender As patient_gender,
				p.pic As patient_pic,
				d.appointment_color As appointment_color,
				d.id As doctor_id,
				CONCAT(d.firstname, ' ', d.lastname) as doctor_name,
				CONCAT(r.firstname, ' ', r.lastname) as rec_booked_by,
				CONCAT(c.firstname, ' ', c.lastname) as rec_canceled_by,
                ars.srv_name As treatment_name,
                arst.st_name As treatment_categories,
                aroom.sr_name As treatment_room
				 
				FROM `aura_booking` as ab 
				INNER JOIN aura_user As  p ON ab.patient_id = p.id 
				INNER JOIN aura_user As d ON d.id=ab.therepist_id 
				INNER JOIN aura_user As r ON r.id=ab.booked_by
				LEFT JOIN aura_user As c ON c.id=ab.canceled_by 
                INNER JOIN aura_service As ars ON ars.s_id=ab.s_id 
                INNER JOIN aura_service_type As arst ON arst.st_id=ab.st_id
                INNER JOIN aura_service_room As aroom ON aroom.sr_id=ab.room_id
				Where ab.id =".$_GET['id'];
				
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$data[] =$row;
		}
		$sTime =$this->numToSlot($data[0]['s_slots']);
		$eTime =$this->numToSlot($data[0]['e_slots']);
		$timing = $sTime." To ".$eTime;
		
		$date = date("d-m-Y", strtotime($data[0]['appointment_date']));
		$data[0]['timing']= $date." ".$timing;
		$this->tpl['bookingData'] = $data[0];
		// echo "<pre>";
		// print_r($data[0]);
		// die;
	}
	
	public function ListBookingTable(){
		
		
		ini_set('display_errors', '0');

		$table = 'aura_booking';
 
		// Table's primary key
		$primaryKey = 'id';
		 
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array(
				'db'        => 'ab.id',
				'dt'        => 'booking_id',
				'field'        => 'booking_id',
				'as'        => 'booking_id',
				'formatter' => function( $d, $row ) {
					
				return '<div class="hidden-sm hidden-xs action-buttons">
						<a class="blue" target="_blank" title="Appointment Details" href="?controller=Receptionists&action=bookingDetails&id='.$d.'">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>

						<a class="green" href="?controller=User&action=editProfile&edit=">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" title="Cancel Appointment" href="#">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
						<a class="orange" title="Patient Arrived" href="#">
							<i class="ace-icon fa fa-check bigger-130"></i>
						</a>
						<a class="orange" title="Consent Form" href="#">
							<i class="ace-icon fa fa-check bigger-130"></i>
						</a>
						<a class="orange" title="Before & After Image" href="#">
							<i class="ace-icon fa fa-check bigger-130"></i>
						</a>
					</div>';
					// return $d;
				}
			),
			array(
				'db'        => 'p.id',
				'dt'        => 'patinet_id',
				'field'     => 'patinet_id',
				'as'		=> 'patinet_id',
				'formatter' => function( $d, $row ) {
					return $row;
				}
			),
			array(
				'db'        => 'p.firstname',
				'dt'        => 'p_firstname',
				'field'     => 'p_firstname',
				'as'		=> 'p_firstname',
				'formatter' => function( $d, $row ) {
					return $row;
				}
			),
			array(
				'db'        => 'p.lastname',
				'dt'        => 'p_lastname',
				'field'        => 'p_lastname',
				'as'		=> 'p_lastname',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'r.id',
				'dt'        => 'receptionist_id',
				'field'     => 'receptionist_id',
				'as'		=> 'receptionist_id',
				'formatter' => function( $d, $row ) {
					return $row;
				}
			),
			array(
				'db'        => 'r.firstname',
				'dt'        => 'r_firstname',
				'field'     => 'r_firstname',
				'as'		=> 'r_firstname',
				'formatter' => function( $d, $row ) {
					return $row;
				}
			),
			array(
				'db'        => 'r.lastname',
				'dt'        => 'r_lastname',
				'field'     => 'r_lastname',
				'as'		=> 'r_lastname',
				'formatter' => function( $d, $row ) {
					// return $d;
					return '<a target="_blank" href="?controller=User&action=Profile&id='.$row['receptionist_id'].'"> '.$row["r_firstname"].' '.$d.'</a>';
				}
			),
			array(
				'db'        => 'p.contact_no',
				'dt'        => 'patient_mobile',
				'field'        => 'patient_mobile',
				'as'        => 'patient_mobile',
				'formatter' => function( $d, $row ) {
					return $row['firstname']." ".$row['lastname'];
				}
			),
			array(
				'db'        => 'p.lastname',
				'dt'        => 'name',
				'field'        => 'name',
				'as'        => 'name',
				'formatter' => function( $d, $row ) {
					return '<a target="_blank" href="?controller=User&action=Profile&id='.$row['patinet_id'].'"> '.$row["p_firstname"].' '.$row['p_lastname'].'</a>';
				}
			),
			
			
			array(
				'db'        => 'd.id',
				'dt'        => 'doctor_id',
				'field'        => 'doctor_id',
				'as'        => 'doctor_id',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'd.firstname',
				'dt'        => 'doctor_fname',
				'field'        => 'doctor_fname',
				'as'        => 'doctor_fname',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'd.lastname',
				'dt'        => 'doctor_lname',
				'field'        => 'doctor_lname',
				'as'        => 'doctor_lname',
				'formatter' => function( $d, $row ) {
					return '<a target="_blank" href="?controller=User&action=Profile&id='.$row['doctor_id'].'"> '.$row["doctor_fname"].' '.$row['doctor_lname'].'</a>';
				}
			),
			array(
				'db'        => 'ab.appointment_date',
				'dt'        => 'appointment_date',
				'field'        => 'appointment_date',
				'as'        => 'appointment_date',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'ab.s_slots',
				'dt'        => 's_slots',
				'field'        => 's_slots',
				'as'        => 's_slots',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'ab.e_slots',
				'dt'        => 'e_slots',
				'field'        => 'e_slots',
				'as'        => 'e_slots',
				'formatter' => function( $d, $row ) {
					
					$sSlots = $this->numToSlot($row['s_slots']);
					$eSlots = $this->numToSlot($d);
					$newDate = date("d-m-Y", strtotime($row['appointment_date']));
					return '<button type="button"  style="font-size: 13px;"  class="btn btn-sm bookSlot btn-success"><i class="ace-icon fa fa-clock-o bigger-110"></i><b>'.$newDate.' '.$sSlots.' to '.$eSlots.'</b></button>';
				}
			),
			array(
				'db'        => 'ars.s_id',
				'dt'        => 'treatment_id',
				'field'        => 'treatment_id',
				'as'        => 'treatment_id',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'aroom.sr_name',
				'dt'        => 'treatment_room',
				'field'        => 'treatment_room',
				'as'        => 'treatment_room',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'ars.srv_name',
				'dt'        => 'treatment_name',
				'field'        => 'treatment_name',
				'as'        => 'treatment_name',
				'formatter' => function( $d, $row ) {
					// return $d;
					return '<a href="?controller=AuraService&action=editService&id='.$row['treatment_id'].'" target="_blank"> '.$d.'</a>';
				}
			),
			array(
				'db'        => 'ab.canceled_by',
				'dt'        => 'canceled_by',
				'field'        => 'canceled_by',
				'as'        => 'canceled_by',
				'formatter' => function( $d, $row ) {
					if($d==0){
						$class = "success";
						$status ="Confirm";
					}else {
						$class = "danger";
						$status ="Canceled";
					}
					return '<span class="label label-sm label-'.$class.' arrowed arrowed-righ">'.$status.'</span>';
				}
			)
		);
		 
		// SQL server connection information
		$sql_details = array(
			'user' => DEFAULT_USER,
			'pass' => DEFAULT_PASS,
			'db'   => DEFAULT_DB,
			'host' => DEFAULT_HOST
		);
		 
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP
		 * server-side, there is no need to edit below this line.
		 */
		$joinQuery =" FROM aura_booking As ab INNER JOIN aura_user As  p ON ab.patient_id = p.id LEFT JOIN aura_user As d ON d.id=ab.therepist_id LEFT JOIN aura_user As r ON r.id=ab.booked_by LEFT JOIN aura_user As c ON c.id=ab.canceled_by LEFT JOIN aura_service As ars ON ars.s_id=ab.s_id LEFT JOIN aura_service_type As arst ON arst.st_id=ab.st_id LEFT JOIN aura_service_room As aroom ON aroom.sr_id=ab.room_id ";
		if($_GET['start_date'] !=''){
			// $start_date = $_GET['start_date'];
			$start_date = date("Y-m-d", strtotime($_GET['start_date']));
		}
		if($_GET['end_date'] !=''){
			// $end_date = $_GET['end_date'];
			$end_date = date("Y-m-d", strtotime($_GET['end_date']));
		}
		if($start_date !='' AND $end_date !=''){
			// echo $_POST['start_date'];
			 $extraWhere ="ab.appointment_date >= '".$start_date."' And ab.appointment_date <= '".$end_date."'";
		} elseif($start_date !=''){
			 $extraWhere ="ab.appointment_date >= '".$start_date."'";
		} elseif($end_date !=''){
			$extraWhere ="ab.appointment_date >= '".$end_date."'";
		}
		// echo $extraWhere;
		 $groupBy ="";
		 $having ="";
		require( CONTROLLERS_PATH.'ssp.customized.class.php' );
		// $sql_details = "LIMIT 0 10";
		// echo json_encode(
		$data =	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having );
		// );
		// echo "<pre>";
		// $result['hhhh']="kjhkhkj";
		// $data['draw'] = 10;
		// $data['recordsFiltered'] = 10;
		 echo json_encode($data, true);
		// print_r($data);
		die;
		
	}
}	
?>