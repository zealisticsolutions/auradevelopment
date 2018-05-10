<?php
require_once MODELS_PATH . 'App.model.php';
class APHistory extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'treatment_history';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'booking_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'parameters', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'notes', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
