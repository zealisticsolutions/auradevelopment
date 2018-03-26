<?php
require_once MODELS_PATH . 'App.model.php';
class Booking extends AppModel
{
	var $primaryKey = 'id';
	
	var $table = 'booking';
	
	var $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'patient_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'therepist_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'room_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 's_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'st_id', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'srv_name', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'duration', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'tca_peel', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'amount', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'coupon', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'discount', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 's_slots', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'e_slots', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'appointment_date', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'booked_by', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'canceled_by', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'created_at', 'type' => 'varchar', 'default' => ':NULL'),
		array('name' => 'updated_at', 'type' => 'varchar', 'default' => ':NULL'),
	);
}
?>
