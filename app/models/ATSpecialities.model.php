<?php
require_once MODELS_PATH . 'App.model.php';
class ATSpecialities extends AppModel
{
	var $primaryKey = 'ts_id';
	
	var $table = 'therepist_services';
	
	var $schema = array(
		array('name' => 'ts_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'st_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
