<?php
require_once MODELS_PATH . 'App.model.php';
class APHistory extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'treatment_history';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'booking_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'treatment_category', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'treatment_plan', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'offer', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'others', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'parameters', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'notes', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'treatment_type', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'report_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'sessions', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_by', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
