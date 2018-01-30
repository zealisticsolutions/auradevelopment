<?php
require_once MODELS_PATH . 'App.model.php';
class UMHistory extends AppModel
{
	var $primaryKey = 'umh_id';
	
	var $table = 'user_medical_history';
	
	var $schema = array(
		array('name' => 'umh_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'mh_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
