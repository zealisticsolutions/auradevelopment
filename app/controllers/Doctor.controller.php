<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class Doctor extends Admin
{
	function myExpertise(){
		if($this->isDoctor()){
			$opts = array();
			Object::import('Model', array('SRType', 'AService','ATSpecialities'));
			$SRType = new SRType();
			$AService = new AService();
			$ATSpecialities = new ATSpecialities();
			$row_count = 1000000;
			// $SRType->debug = true;
			// $AService->addJoin($AService->joins, $SRType->getTable(), 'TC', array('TC.st_id' => 't1.st_id'), array('TC.st_name'));
			// $Sevices = $AService->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));	
			$Sevices = $SRType->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));	
			// echo "<pre>";
			// print_r($Sevices);
			// die;
			// $SRType->debug = true;
			$opts["t1.user_id"] = $_SESSION['USER_ID'];
			$ATSpecialities->addJoin($ATSpecialities->joins, $SRType->getTable(), 'TC', array('TC.st_id' => 't1.st_id'), array('TC.st_name'));
			$ATSpecialities = $ATSpecialities->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));	
			// echo "<pre>";
			// print_r($ATSpecialities);
			// die;
			$data['master'] =$Sevices;
			$data['mySpecialities'] =$ATSpecialities;
			$this->tpl['result'] = $data;
		}
	}
	function addMyExpertise(){
		if($this->isDoctor()){
			$opts = array();
			Object::import('Model', 'ATSpecialities');
			$ATSpecialities = new ATSpecialities();
			if($_GET['id']){
				
				$opts["t1.user_id"] = $_SESSION['USER_ID'];
				$opts["t1.st_id"] = $_GET['id'];
				$row_count = 1000000;
				$mySpecialities = $ATSpecialities->getAll(array_merge($opts, array('row_count' => $row_count, 'col_name' => 'st_id', 'direction' => 'asc')));	
				if(count($mySpecialities) == 0){
					$time= date("Y-m-d H:i:s");
					$form_data = array(
						'st_id'					=>$_GET['id'],
						'user_id'				=>$_SESSION['USER_ID'],
						'created_at'			=>$time
					);
					$lastIDU = $ATSpecialities->save($form_data);
					if($lastIDU){
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=Doctor&action=myExpertise");
					}
				} else {
					$_SESSION['specialitiesError']= "The Specialty is already added to My Specialties!";
					$this->redirect($_SERVER['PHP_SELF'] . "?controller=Doctor&action=myExpertise");
				}
			} else {
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
			}
		}
		
	}
	function deleteMyExpertise(){
		if($this->isDoctor()){
		}
	}
}	
?>