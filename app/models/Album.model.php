<?php
require_once MODELS_PATH . 'App.model.php';
class Album extends AppModel
{
	var $primaryKey = 'pic_id';
	
	var $table = 'itas_collage_album';
	
	var $schema = array(
		array('name' => 'pic_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'collage_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'pic_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'datetime', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'datetime', 'default' => ':NULL')
	);
}
?>

			
			
