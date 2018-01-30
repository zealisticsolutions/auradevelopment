<?php
require_once MODELS_PATH . 'App.model.php';
class SRType extends AppModel
{
	var $primaryKey = 'st_id';
	
	var $table = 'service_type';
	
	var $schema = array(
		array('name' => 'st_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'st_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
