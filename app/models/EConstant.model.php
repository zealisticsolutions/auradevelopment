<?php
require_once MODELS_PATH . 'App.model.php';
class EConstant extends AppModel
{
	var $primaryKey = 'etc_id';
	
	var $table = 'email_template_constant';
	
	var $schema = array(
		array('name' => 'etc_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'ett_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'et_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'constant', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
