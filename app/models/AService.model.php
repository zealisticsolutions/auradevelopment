<?php
require_once MODELS_PATH . 'App.model.php';
class AService extends AppModel
{
	var $primaryKey = 's_id';
	
	var $table = 'service';
	
	var $schema = array(
		array('name' => 's_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'st_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'sr_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'srv_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'amount', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'duration', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'tca_peel', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'no_sessions_required', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'description', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'status', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
