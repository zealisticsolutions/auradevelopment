<?php
require_once MODELS_PATH . 'App.model.php';
class Language extends AppModel
{
	var $primaryKey = 'language_id';
	
	var $table = 'language';
	
	var $schema = array(
		array('name' => 'language_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'language_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
