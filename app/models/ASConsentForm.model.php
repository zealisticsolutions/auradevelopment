<?php
require_once MODELS_PATH . 'App.model.php';
class ASConsentForm extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'signed_consent_form';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'booking_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'consent_form_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'file_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL')
	);
}
?>
