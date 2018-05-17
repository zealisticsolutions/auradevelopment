<?php
// ini_set("display_errors", "on");
// error_reporting(E_ALL);
require_once CONTROLLERS_PATH . 'Admin.controller.php';
class AuraAdmin extends Admin
{
	function index(){
		
		// if($this->isUserLoged()){
			
			$opts = array();
			Object::import('Model', 'User');
			$ServerModel = new UserModel();
			
			
			if(isset($_POST['register-submit']) && !empty($_POST['register-submit'])){
				
				if(!empty($_POST['fname']) and !empty($_POST['mobilenum']) and !empty($_POST['password']) and !empty($_POST['confirm-password'])){
					
					if($_POST['password'] == $_POST['confirm-password']){
						
						if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
						{
						  
							$opts["t1.mobile"] = $_POST['mobilenum'];
							$offset =1;
							$row_count = 1;
							$result = $ServerModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'user_id', 'direction' => 'asc')));
							
							if(count($result) == 0)
							{	
								// echo "<pre>";
								// print_r($_POST);
								// echo "</pre>";
								$dateTime = date("Y-m-d h:i:s") ;
								$form_data = array(
									'name'			=>$_POST['fname'],
									'pasword'		=>$_POST['password'],
									'mobile'		=>$_POST['mobilenum'],
									'type'			=>2,		
									'created_at'	=>$dateTime,
									'updated_at'	=>" "
								);
								 $result = $ServerModel->save($form_data);
								if($result) {
									$msg = "Registration successful!";
								}
								
							} else {
								// mobile no exits...	
								$msg = "Mobile no already registred";
							}
						}
						else // phone number is not valid
						{
						  $msg = 'Phone number invalid !';
						}
						
						
					} else {
						$msg = "password does not match confirm password!";
					}
					
				} else {
					$msg = "Please fill all the filed properly!";
				}
				$this->tpl['registration_msg'] = $msg;
				
			}
			if(isset($_POST['login-submit']) && !empty($_POST['login-submit'])){
				
				// echo "<pre>";
				// print_r($_POST);
				// die;
				$ServerModel->debug = false;
				$opts["t1.email"] = $_POST['mobilenum'];
				$opts["t1.pasword"] = $_POST['password'];
				$offset =1;
				$row_count = 1;
				$result = $ServerModel->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'user_id', 'direction' => 'asc')));
				// echo "<pre>";
				// print_r($result);
				// die;
				if(count($result) == 1)
				{
					// print_r($result);
					
					$_SESSION["USER_NAME"]   = $result[0]['firstname']." ".$result[0]['lastname'];
					$_SESSION["USER_TYPE"]     = $result[0]['type'];
					$_SESSION["USER_EMAIL"]    = $result[0]['email'];
					$_SESSION["USER_ID"]    = $result[0]['id'];
					$_SESSION["USER_PIC"]    = $result[0]['pic'];
					
					
					if($_SESSION['USER_TYPE'] == "1")
					{   
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=Dashboard");
						die;
					}
					if($_SESSION['USER_TYPE'] == "2")
					{   
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraTherapist&action=Dashboard");
						die;
					}
					if($_SESSION['USER_TYPE'] == "4")
					{   
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraTherapist&action=Dashboard");
						die;
					}
					if($_SESSION['USER_TYPE'] == "5")
					{   
						$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraTherapist&action=Dashboard");
						die;
					}
					
				}
				else
				{
					 $msg = "Incorrect Username or password!";
				}
				$this->tpl['msg'] = $msg;
			}
		// }else {
			// $this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=SearchListing");
		// }
	}
	function home(){
			
	}
	function search(){
		$opts = array();
		Object::import('Model', array('Collage', 'Course','Album','CourseName'));
		$Course = new Course();
		$Collage= new Collage();
		$Album= new Album();
		$CourseName= new CourseName();
		
		
		$opts = array();
		$CourseName= new CourseName();
		$row_count = 1000000;
		$result = $CourseName->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'course_name_id', 'direction' => 'asc')));
		$this->tpl['result'] = $result;
	}
	function Dashboard(){
		if($this->isLogin()){
		}
	}
	
	function ListCollageDataTable(){
		if($this->isLogin()){
		}
		if(!empty($_POST['course']))
		{
			Object::import('Model', 'Search');
			$Search= new Search();
			$Search->debug = true;
			// $mobile = $_SESSION["USER_MOBILE"];
			$dateTime = date("Y-m-d h:i:s") ;
			$form_data = array(
				'course_id'		=>$_POST['course'],
				'user_mobile'	=>$_SESSION["USER_MOBILE"],
				'kyeword'		=>$_POST['Keyword'],
				'fee_type'		=>$_POST['feeType'],
				'amount'		=>$_POST['amount'],		
				'created_at'	=>$dateTime,
				'updated_at'	=>" "
			);
			// echo $_SESSION["USER_MOBILE"];
			// die;
			$result = $Search->save($form_data);
			// die;
				// search_id	course_id	kyeword	fee_type	amount	created_at	updated_at
			
			$conn = mysqli_connect(DEFAULT_HOST, DEFAULT_USER, DEFAULT_PASS, DEFAULT_DB) or die("Connection failed: " . mysqli_connect_error());
			
			$requestData= $_REQUEST;
			
			$columns = array( 
				0=> 'collage_name', 
				1=> 'location',
				2=> 'course_name',
				3=> 'yearly_fee',
				4=> 'monthly_fee',
				5=> 'rating',
				6=> 'collage_id'
			);

			
			// $sql = "SELECT 	clg.collage_name, 
						// clg.location, 
						// clg.rating,
						// clg.collage_id, 
						// crs.course_id,
						// crsn.course_name, 
						// crs.yearly_fee,
						// crs.monthly_fee 
					// FROM bkitas_collage as clg 
					// JOIN bkitas_course as crs 
						// ON clg.collage_id = crs.collage_id 
					// JOIN bkitas_course_name as crsn 
						// ON crs.course_id = crsn.course_name_id 
					// WHERE clg.status = 1 
						// AND crsn.course_name_id =1 
						// AND crs.yearly_fee < 130000 
					// GROUP BY crs.collage_id";
			
			// $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
			// $totalData = mysqli_num_rows($query);
			// $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


			if( !empty($requestData['search']['value']) ) {
				//if there is a search parameter
				// echo "test1";
				// die;
				$sql = "SELECT 	clg.collage_name, 
						clg.location, 
						clg.rating,
						clg.collage_id, 
						crs.course_id,
						crsn.course_name, 
						crs.yearly_fee,
						crs.monthly_fee 
					FROM bkitas_collage as clg 
					JOIN bkitas_course as crs 
						ON clg.collage_id = crs.collage_id 
					JOIN bkitas_course_name as crsn 
						ON crs.course_id = crsn.course_name_id 
					WHERE clg.status = 1 
						AND crsn.course_name_id =".$_POST['course']."
						AND crs.".$_POST['feeType']." < ".$_POST['amount']." ";
					
				$sql.=" OR collage_name LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR location LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR course_name LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR yearly_fee LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR monthly_fee LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR rating LIKE '".$requestData['search']['value']."%' ";
				
				
				
				
				$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
				$totalFiltered = mysqli_num_rows($query); 

				$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees"); 
				$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 			
				$sql.="GROUP BY crs.collage_id";
			} else {	
				// echo "test2";
				
				$sql = "SELECT 	clg.collage_name, 
						clg.location, 
						clg.rating,
						clg.collage_id, 
						crs.course_id,
						crsn.course_name, 
						crs.yearly_fee,
						crs.monthly_fee 
					FROM bkitas_collage as clg 
					JOIN bkitas_course as crs 
						ON clg.collage_id = crs.collage_id 
					JOIN bkitas_course_name as crsn 
						ON crs.course_id = crsn.course_name_id 
					WHERE clg.status = 1 
						AND crsn.course_name_id =".$_POST['course']."
						AND crs.".$_POST['feeType']." < ".$_POST['amount']." 
					GROUP BY crs.collage_id";
					// die;
				$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
				$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
			}

			$data = array();
			$star = "";
			while( $row=mysqli_fetch_array($query) ) {  
				$nestedData=array(); 
					for($i=0; $i < $row["rating"]; $i++){
						$star.='<span class="glyphicon glyphicon-star" style = "color:#FFD700"></span>';	
					}
				$nestedData[] = $row["collage_name"];
				$nestedData[] = $row["location"];
				$nestedData[] = $row["course_name"];
				$nestedData[] = $row["yearly_fee"];
				$nestedData[] = $row["monthly_fee"];
				$nestedData[] = $star;
				
				// if($row["status"]==1){
					// $status = "Active";
				// } 
				// else {
					// $status = "Inactive";
				// }
				
				// $nestedData[] = $status;
				$nestedData[] = '<a href="?controller=User&action=CollageDetails&Collage='.$row["collage_id"].'&Course='.$row["course_id"].'" class="btn btn-primary">Details</a>';
				$data[] = $nestedData;
				$star = "";
			}



			$json_data = array(
						"draw"            => intval( $requestData['draw'] ),  
						"recordsTotal"    => intval( $totalData ),  
						"recordsFiltered" => intval( $totalFiltered ), 
						"data"            => $data 
						);
		}
		echo json_encode($json_data); 
		die;
	} 
	
	function CollageDetails () {
		
		if($this->isUserLoged()){
			
			if(!empty($_GET['Collage']) and !empty($_GET['Course'])){
				
				Object::import('Model', 'Intrest');
				$Intrest= new Intrest();
				// $Intrest->debug = true;
				
				$dateTime = date("Y-m-d h:i:s") ;
				$form_data = array(
					'collage_id'		=>$_GET['Collage'],
					'course_id'			=>$_GET["Course"],
					'user_mobile'		=>$_SESSION["USER_MOBILE"],	
					'created_at'		=>$dateTime,
					'updated_at'		=>" "
				);
				$result = $Intrest->save($form_data);
				
				$opts = array();
				Object::import('Model', array('Collage', 'Course','Album','CourseName'));
				$Course = new Course();
				$Collage= new Collage();
				$Album= new Album();
				$CourseName= new CourseName();
				
				$opts = array();
				$CourseName= new CourseName();
				$row_count = 1000000;
				$opts["t1.course_name_id"] = $_GET['Course'];
				$result = $CourseName->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'course_name_id', 'direction' => 'asc')));
				$this->tpl['course_name'] = $result[0]['course_name'];
				
				
				$opts = array();
				$Collage = new Collage();
				$row_count = 1000000;
				$opts["t1.collage_id"] = $_GET['Collage'];
				$collageDetails = $Collage->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'collage_id', 'direction' => 'desc')));
				$this->tpl['collageDetails'] = $collageDetails[0];
				
				$opts = array();
				$Course = new Course();
				$row_count = 1000000;
				$opts["t1.collage_id"] = $_GET['Collage'];
				$opts["t1.course_id"] = $_GET['Course'];
				$courseDetails = $Course->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'collage_id', 'direction' => 'desc')));
				$this->tpl['courseDetails'] = $courseDetails[0];
				
				$opts = array();
				$Album = new Album();
				$row_count = 1;
				$opts["t1.collage_id"] = $_GET['Collage'];
				$albumDetails = $Album->getAll(array_merge($opts, array( 'row_count' => $row_count, 'col_name' => 'collage_id', 'direction' => 'desc')));
				$this->tpl['albumDetails'] = $albumDetails[0]['pic_name'];
				
				// echo "<pre>";
				// print_r($albumDetails[0]['pic_name']);
				// echo "</pre>";
				// die;
			} else {
				$this->redirect($_SERVER['PHP_SELF'] . "?controller=AuraAdmin&action=SearchListing");
			}
		} else {
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=index");
		}
	}		
	
	function Logout()
	{
		session_unset();
		session_destroy();
		
		if(!isset($_SESSION['ADMIN_ADMIN']))
		{
			$this->redirect($_SERVER['PHP_SELF'] . "?controller=User&action=index");
		}
	}
}	
?>