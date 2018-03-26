<?php
require_once MODELS_PATH . 'App.model.php';
class ADSchedule extends AppModel
{
	var $primaryKey = 'sch_id';
	
	var $table = 'doctor_schedule';
	
	var $schema = array(
		array('name' => 'sch_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'day', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'start_time', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'end_time', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
