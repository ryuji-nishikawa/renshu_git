<?php
	App::uses('AppModel', 'Model');
	App::uses('Oauth', 'OAUTH');
<<<<<<< HEAD
	App::uses('Session11','Session29');
=======
	App::uses('Session11','Session30');
>>>>>>> ついに30回目
	App::uses('Apphelper','helper');
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
					'order' => 'これは12/20に30回目の編集',
					'conditions' => 'Customer.company_id = Company.id',
					'fields' => 'Company.company_name444'
				),
			);
	}
?>