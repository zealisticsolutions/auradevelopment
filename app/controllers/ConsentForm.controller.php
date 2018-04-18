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
		$file_name = uniqid() . '.jpg';
		$file = SIGNATURE_PATH . $file_name;
		$success = file_put_contents($file, $data);
		$this->saveConsentForm($file,$_POST['consent_form_type'],$_POST['user_id']);
		die;
	}
	public function saveConsentForm($file,$consent_form_type,$user_id){
		

		$opts = array();
		Object::import('Model', 'ConsentFormModel');
		$ConsentFormModel = new ConsentFormModel();
		$row_count = 1000000;
		$time= date("Y-m-d H:i:s");
		$opts["consent_type_id"] = $consent_form_type;
		$result = $ConsentFormModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'asc')));
	
		$opts = array();
		Object::import('Model', 'ConsentFormType');
		$ConsentFormType = new ConsentFormType();
		$row_count = 100;
		$opts["id"] = $consent_form_type;
		$consent_form = $ConsentFormType->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'id', 'direction' => 'desc')));
		
		// echo "<pre>";
		// print_r($consent_form[0]['consent_form_name']);
		// die;
		$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
		require_once COMPONENTS_PATH . '/vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'c',
			'margin_left' => 10,
			'margin_right' => 10,
			'margin_top' => 47,
			'margin_bottom' => 47,
			'margin_header' => 05,
			'margin_footer' => 20
		]);

		$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

		$header = '
		<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
		<td width="33%"><img src="assets/logo/logo.png" width="126px" /></td>
		<td width="33%" align="center"></td>
		<td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
		</tr></table>';

		$headerEven = '
		<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
		<td width="33%"><img src="assets/logo/logo.png" width="126px" /></td>
		<td width="33%" align="center"></td>
		<td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
		</tr></table>';

		$footer = '<table width="100%" style="border-top: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
		<td width="33%">Page No <span style="font-size:14pt;">{PAGENO}</span></td>
		<td width="33%" align="center"></td>
		<td width="33%" style="text-align: right;"><span style="font-weight: bold;">Flat No. A/4, Bihari Apartment, RC Dutt Rd, Behind Dwarkesh Complex, Beside Hotel Welcome, Alkapuri, Vadodara, Gujarat 390007</span></td>
		</tr></table>';

		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLHeader($headerEven, 'E');

		$mpdf->SetHTMLFooter($footer);
		$mpdf->SetHTMLFooter($footer, 'E');
		$mpdf->SetWatermarkImage('assets/logo/logo.png', 0.05, 'F');
		// $mpdf->SetWatermarkImage('assets/tiger.wmf', );
		$mpdf->showWatermarkImage = true;

		$html = '
		<table width="100%" style="font-family: margin-top:-200px; serif; font-size: 20pt; color: #000088;"><tr>
		<td width="20%"></td>
		<td width="60%" align="center"><span style="font-weight: bold;margin-top: -100px;"><u>'.$consent_form[0]['consent_form_name'].' Consent Form</u></span></td>
		<td width="20%" style="text-align: right;"></td>
		</tr></table>';

		$html .=$result[0]['content'];
		
		$html .='<table width="100%"><tr>
		<td width="33%">Patient Sign: <br> Date: '.date("d-m-Y G:i A").'</td>
		<td width="33%" align="center"></span></td>
		<td width="33%" style="text-align: right;"><img src="'.$file.'" width="150px" /></td>
		</tr></table>
		
		';

		$mpdf->WriteHTML($html);
		$pdfFileName = $consent_form[0]['consent_form_name']."_".date("d_m_Y_H_i_s").'.pdf';
		$signedFileName = SIGNED_CONSENT_FORM.$pdfFileName;
		$mpdf->Output($signedFileName,'F');
		// $mpdf->Output();
		if(file_exists($signedFileName)){
			$opts = array();
			Object::import('Model', 'ASConsentForm');
			$ASConsentForm = new ASConsentForm();
			$row_count = 1000000;
			$time= date("Y-m-d H:i:s");
			$form_data = array(
				'booking_id'			=>$user_id,
				'consent_form_id'		=>$consent_form_type,
				'file_name'				=>$pdfFileName,
				'created_at'			=>$time
			);	
			$lastID = $ASConsentForm->save($form_data);
			if($lastID){
				$response['success'] =1;
				echo json_encode($response);
				die;
			}
		}else {
			$response['success'] =0;
			echo json_encode($response);
			die;
		}
		

	}
}	
?>