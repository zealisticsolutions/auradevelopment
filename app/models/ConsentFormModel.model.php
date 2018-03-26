<?php
require_once MODELS_PATH . 'App.model.php';
class ConsentFormModel extends AppModel
{
	var $primaryKey = 'consent_type_id';
	
	var $table = 'consent_form';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'consent_type_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'content', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
