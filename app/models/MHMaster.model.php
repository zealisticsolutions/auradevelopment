<?php
require_once MODELS_PATH . 'App.model.php';
class MHMaster extends AppModel
{
	var $primaryKey = 'mh_id';
	
	var $table = 'medical_history_master';
	
	var $schema = array(
		array('name' => 'mh_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'mh_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
