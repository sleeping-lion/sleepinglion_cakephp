<?php
App::uses('AppModel', 'Model');
/**
 * Notices Model
 *
 */
class Tag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
/**
 * belongsTo associations
 *
 * @var array
 */
 
	public $hasAndBelongsToMany = array('Blog'=> array(
            'className' => 'Blog',
            'joinTable' => 'taggings',
            'foreignKey' => 'tag_id',
            'associationForeignKey' => 'taggable_id',
            'with' => 'Tagging'
        ),
    );
}
