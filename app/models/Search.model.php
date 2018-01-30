<?php
require_once MODELS_PATH . 'App.model.php';
class Search extends AppModel
{
	var $primaryKey = 'search_id';
	
	var $table = 'itas_student_search';
	
	var $schema = array(
		array('name' => 'search_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'course_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_mobile', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'kyeword', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'fee_type', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'amount', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'datetime', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'datetime', 'default' => ':NULL')
	);
}
?>