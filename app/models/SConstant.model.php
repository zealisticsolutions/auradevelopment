<?php
require_once MODELS_PATH . 'App.model.php';
class SConstant extends AppModel
{
	var $primaryKey = 'sc_id';
	
	var $table = 'sms_template_constant';
	
	var $schema = array(
		array('name' => 'sc_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'stt_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'smst_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'constant', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
