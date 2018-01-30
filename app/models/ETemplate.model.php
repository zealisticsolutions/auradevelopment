<?php
require_once MODELS_PATH . 'App.model.php';
class ETemplate extends AppModel
{
	var $primaryKey = 'ett_id';
	
	var $table = 'email_template';
	
	var $schema = array(
		array('name' => 'et_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'ett_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'content', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
