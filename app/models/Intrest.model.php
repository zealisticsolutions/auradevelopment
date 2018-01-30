<?php
require_once MODELS_PATH . 'App.model.php';
class Intrest extends AppModel
{
	var $primaryKey = 'intrest_id';
	
	var $table = 'itas_student_intrest';
	
	var $schema = array(
		array('name' => 'intrest_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'collage_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'course_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'user_mobile', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'datetime', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'datetime', 'default' => ':NULL')
	);
}
?>