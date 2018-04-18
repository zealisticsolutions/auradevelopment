<?php
require_once MODELS_PATH . 'App.model.php';
class Payment extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'payment';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'booking_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'amount_paid', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'amount_due', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_by', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'invoice_type', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'payment_type', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'payment_mode', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'datetime', 'default' => ':NULL')
	);
}
?>