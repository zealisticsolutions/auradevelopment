<?php
require_once MODELS_PATH . 'App.model.php';
class SMSTType extends AppModel
{
	var $primaryKey = 'stt_id';
	
	var $table = 'sms_template_type';
	
	var $schema = array(
		array('name' => 'stt_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'stt_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
