<?php
require_once MODELS_PATH . 'App.model.php';
class ULanguage extends AppModel
{
	var $primaryKey = 'ul_id';
	
	var $table = 'user_language';
	
	var $schema = array(
		array('name' => 'ul_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'language_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
