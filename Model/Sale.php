<?php
	App::uses('AppModel', 'Model');
	class Sale extends AppModel{
		public $belongsTo = array(
				'Customer' => array(
					'className' => 'Customer',
					'foreignKey' => 'customer_id',
					'order' => '',
					'conditions' => ''
				),
				'Product' => array(
					/** クラスはProduct2を使う */
					'className' => 'Product2',
					'foreignKey' => 'channel_id',
					'order' => '',
					'conditions' => ''
				),
				'Company' => array(
					'className' => 'Company',
					'foreignKey' => '',
					'order' => '',
					'conditions' => 'Customer.company_id = Company.id',
					'fields' => 'Company.company_name'
				),
			);
	}
?>