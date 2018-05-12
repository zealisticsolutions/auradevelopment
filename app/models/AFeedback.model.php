<?php
require_once MODELS_PATH . 'App.model.php';
class AFeedback extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'feedback_form';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'recommend', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'treatment', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'improved', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'comments', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'mobile', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'email', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
