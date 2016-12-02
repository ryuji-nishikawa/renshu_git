<?php
class User extends AppModel{
	public $validate = array(
		'username' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '名前は必ず入力してください',
			),
			array(
				'rule' => array('maxLength',64),
				'message' => '名前が長すぎます',
			),
			array(
				'rule' => 'alphaNumeric',
				'message' => '名前は半角英数字で入力してください',
			),
		),
		'description' => array(
			array(
				'rule' => array('maxLength',200),
				'message' => '備考が長すぎます',
			),
		),
	);
}
?>