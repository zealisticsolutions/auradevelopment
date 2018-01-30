<?php
require_once MODELS_PATH . 'App.model.php';
class ETType extends AppModel
{
	var $primaryKey = 'ett_id';
	
	var $table = 'email_template_type';
	
	var $schema = array(
		array('name' => 'ett_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'ett_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
