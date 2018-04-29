<?php
require_once MODELS_PATH . 'App.model.php';
class UserModel extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'user';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'email', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'pasword', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'last_password_change', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'firstname', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'lastname', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'gender', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'dob', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'marriage_date', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'blood_group', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'referred_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'refer_code', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'contact_no', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'contact_no_a', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'address', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'area', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'location', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'city', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'pin', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'pic', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'type', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'status', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'update_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
