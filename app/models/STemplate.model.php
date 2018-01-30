<?php
require_once MODELS_PATH . 'App.model.php';
class STemplate extends AppModel
{
	var $primaryKey = 'stt_id';
	
	var $table = 'sms_template';
	
	var $schema = array(
		array('name' => 'smst_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'stt_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'content', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
