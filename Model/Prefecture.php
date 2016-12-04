<?php
App::uses('AppModel', 'Model');
class Prefecture extends AppModel{
	public $hasMany = array(
		'className' => 'Customer',
		'foreignKey' => 'prefecture_id',
		'dependent' => false,
	);
}
?>