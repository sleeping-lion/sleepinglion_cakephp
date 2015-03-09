<?php
App::uses('SlModel', 'Model');
/**
 * Notices Model
 *
 */
class Tagging extends SlModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'context';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tag_id' => array(
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
			)	
		),
		'taggable_id' => array(
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
			)
		)		
	);
	
/**
 * belongsTo associations
 *
 * @var array
 */	
	public $belongsTo = array('Tag' => array('counterCache' => 'taggings_count'),'Blog'	=>array('foreignKey' => 'taggable_id'));
}
