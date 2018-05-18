<?php
require_once MODELS_PATH . 'App.model.php';
class ACHistory extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'counselling_history';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'patient_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'treatment_category', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'treatment_plan', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'offer', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'others', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'notes', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'sessions', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_by', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'datetime', 'default' => ':NULL')
	);
}
?>