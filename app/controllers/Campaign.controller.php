<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
require_once THIRD_PARTY_PATH . 'formvalidator.php';
require_once THIRD_PARTY_PATH . 'validationrule.php';
class Campaign extends Admin
{
	
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
	
	public function newPatient1(){
		
		
		ini_set('display_errors', '1');

		$table = 'aura_user';
 
		// Table's primary key
		$primaryKey = 'id';
		 
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array(
				'db'        => 'id',
				'dt'        => 'id',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'firstname',
				'dt'        => 'firstname',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'lastname',
				'dt'        => 'lastname',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'lastname',
				'dt'        => 'name',
				'formatter' => function( $d, $row ) {
					return '<a href="?controller=User&action=Profile&id='.$row['id'].'"> '.$row["firstname"].' '.$row['lastname'].'</a>';
				}
			),
			array(
				'db'        => 'email',
				'dt'        => 'email',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'gender',
				'dt'        => 'gender',
				'formatter' => function( $d, $row ) {
					if($d==1){
						$gender = "Male";
					} else if($d==2) {
						$gender = "Female";
					} else {
						$gender = "Other";
					}
					return $gender;
				}
			),
			array(
				'db'        => 'contact_no',
				'dt'        => 'contact_no',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'id',
				'dt'        => 'id',
				'formatter' => function( $d, $row ) {
					return $d;
				}
			),
			array(
				'db'        => 'id',
				'dt'        => 'check',
				'formatter' => function( $d, $row ) {
					// return $d;
					return '<input type="checkbox" name="type" value="'.$d.'" class="checkBoxClass" id="Checkbox1" />';
				}
			),
			array(
				'db'        => 'id',
				'dt'        => 'action',
				'formatter' => function( $d, $row ) {
					// return $d;
					return '<div class="hidden-sm hidden-xs action-buttons">
								<a class="blue" href="?controller=User&action=Profile&id='.$row["id"].'">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a>

								<a class="green" href="?controller=User&action=editProfile&edit='.$row["id"].'">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>
							</div>';
					
				}
			),
			array(
				'db'        => 'status',
				'dt'        => 'status',
				'formatter' => function( $d, $row ) {
					if($d==1){
						$class = "success";
						$status ="Active";
					}else {
						$class = "danger";
						$status ="Inactive";
					}
					return '<span class="label label-sm label-'.$class.' arrowed arrowed-righ">'.$status.'</span>';
					// return $return;
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
		 $joinQuery ="";
		 $extraWhere =" 1 = 1 ";
		if($_POST['city'] !=''){
			 $extraWhere .=" And city = '".$_POST['city']."'";
		} 
		if($_POST['location'] !=''){
			 $extraWhere .=" And location = '".$_POST['location']."'";
		} 
		if($_POST['gender'] !=''){
			 $extraWhere .=" And gender = '".$_POST['gender']."'";
		} 
		if($_POST['age'] !=''){
			 $age = $_POST['age'];
			 if($age == 1 ){
				 $range = " 0 and 9 ";
			 }
			 if($age == 2 ){
				 $range = " 10 and 19 ";
			 }
			 if($age == 3 ){
				 $range = " 20 and 29 ";
			 }
			 if($age == 4 ){
				 $range = " 30 and 39 ";
			 }
			 if($age == 5 ){
				 $range = " 40 and 49 ";
			 }
			 if($age == 6 ){
				 $range = " 50 and 59 ";
			 }
			 if($age == 7 ){
				 $range = " 60 and 100 ";
			 }
			 $extraWhere .=" And YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5)) BETWEEN ".$range;
		} 
		
		// elseif($start_date !=''){
			 // $extraWhere ="ab.appointment_date >= '".$start_date."'";
		// } elseif($end_date !=''){
			// $extraWhere ="ab.appointment_date >= '".$end_date."'";
		// }
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
	public function newPatient(){
		
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		$sql = "SELECT DISTINCT city FROM aura_user ORDER by city ASC";	
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$city[] = $row['city'];
        }
		$sql = "SELECT DISTINCT city FROM aura_user ORDER by city ASC";	
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$city[] = $row['city'];
        }
		$this->tpl['city'] = $city;
		
	}
	public function getLocation(){
		
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		$sql = "SELECT DISTINCT location FROM aura_user where city ='".$_POST['city']."' ORDER by city ASC";	
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$location['location'][] = $row['location'];
        }
		// echo "<per>";
		// print_r($location);
		echo json_encode($location, true);
		die;
	}
	public function runEmailCampaign(){
		
		date_default_timezone_set('Etc/UTC');
		ini_set('max_execution_time', 1200); //300 seconds = 5 minutes
		require COMPONENTS_PATH.'PHPMailer/PHPMailerAutoload.php';
		// echo "<pre>";
		// print_r($_POST['selected_value']);
		// print_r($_POST['description']);
		$users = explode(",",$_POST['selected_value']);
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		
		foreach($users as $user){
			$sql = "SELECT email FROM aura_user where id =".$user;	
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				if(!empty($row['email'])){
					
					$mail = new PHPMailer;
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = 25;
					$mail->SMTPAuth = true;
					$mail->Username = 'auraprojectdev@gmail.com';
					$mail->Password = 'aura@123';
					$mail->setFrom('auraprojectdev@gmail.com', 'Aura Test');
					$mail->addAddress($row['email']);
					$mail->Subject = 'Aura testing project';
					$mail->msgHTML($_POST['description']);
					if (!$mail->send()) {
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
						echo 'Message sent!';
					}
				}
				
			}
		}
		print_r($email);
		die;
		die;
		
	}
	public function runSMSCampaign(){
		
		$users = explode(",",$_POST['selected_value']);
		$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB);
		
		foreach($users as $user){
			$sql = "SELECT contact_no FROM aura_user where id =".$user;	
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				if(!empty($row['contact_no'])){
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,SMS_API_URL);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"api_key=".SMS_API_KEY."&method=sms&message=".$_POST['description1']."&to=".$row['contact_no']."&sender=".SMS_API_SENDER);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec ($ch);
					curl_close ($ch);
				}
				
			}
		}
		die;
	}
	
}	
?>