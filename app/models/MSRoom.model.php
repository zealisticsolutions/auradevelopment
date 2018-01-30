<?php
require_once MODELS_PATH . 'App.model.php';
class MSRoom extends AppModel
{
	var $primaryKey = 'sr_id';
	
	var $table = 'service_room';
	
	var $schema = array(
		array('name' => 'sr_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'sr_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'description', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
