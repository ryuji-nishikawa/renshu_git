<?php
	App::uses('AppModel', 'Model');
	App::uses('Oauth', 'OAUTH');
	App::uses('Session8','Session8');
	class Sale extends AppModel{
		public $belongsTo = array(
				'Customer' => array(
					'className' => 'Customer',
					'foreignKey' => 'customer_id',
					'order' => '',
					'conditions' => ''
				),
				'Product' => array(
					'className' => 'Product2',
					/* 外部キーを変更 コメントを延長追加*/
					'foreignKey' => 'channel_id',
					'order' => '',
					'conditions' => ''
				),
				'Company' => array(
					'className' => 'Company',
					'foreignKey' => '',
					'order' => 'これは12/13に8回目の編集',
					'conditions' => 'Customer.company_id = Company.id',
					'fields' => 'Company.company_name444'
				),
			);
	}
?>