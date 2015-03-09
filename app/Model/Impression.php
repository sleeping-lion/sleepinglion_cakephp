<?php
App::uses('AppModel', 'Model');
/**
 * Notices Model
 *
 */
class Impression extends AppModel {
	public function beforeSave($options = array()) {
		$this -> data[$this -> alias]['user_id']=CakeSession::read('Auth.User.id');
		
		
		$now = date('Y-m-d H:i:s');
		
	// set created_at field before creatio
			if(isset($this -> data[$this -> alias]['id'])) {
				$this -> data[$this -> alias]['created_at'] = $now;
			} else {
			$this -> data[$this -> alias]['created_at'] = $now;
		}
		// set updated_at field value before each save
		$this -> data[$this -> alias]['updated_at'] = $now;
		
		return parent::beforeSave($options);
	}
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'context';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'impressionable_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
}
