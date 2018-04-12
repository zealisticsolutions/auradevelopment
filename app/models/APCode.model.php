<?php
require_once MODELS_PATH . 'App.model.php';
class APCode extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'promo_code';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'promo_code', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'value', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'type', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'valid_form', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'valid_till', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'frequency', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'min_value_limit', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'description', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
