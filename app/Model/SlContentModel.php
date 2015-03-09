<?php
App::uses('AppModel', 'Model');
/**
 * Notices Model
 *
 */
class SlContentModel extends AppModel {
	/* 	public $actsAs = array(
  	'Translate' => array(
            'content'
        )
	);  */
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
	