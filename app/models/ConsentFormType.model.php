<?php
require_once MODELS_PATH . 'App.model.php';
class ConsentFormType extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'consent_form_type';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'consent_form_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
