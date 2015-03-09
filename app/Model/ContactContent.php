<?php
App::uses('AppModel', 'Model');
/**
 * ContactContent Model
 *
 */
class ContactContent extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'content';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
