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
					'className' => 'Product',
					'foreignKey' => 'product_id',
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