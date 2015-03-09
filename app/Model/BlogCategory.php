<?php
App::uses('SlModel', 'Model');
/**
 * BlogCategory Model
 *
 * @property BlogType $BlogType
 * @property BlogCategoryRel $BlogCategoryRel
 * @property Blog $Blog
 */
class BlogCategory extends SlModel {
	public $actsAs = array(
  	'Translate' => array('title')
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'blog_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'unique' => array('rule' => 'isUnique', 'message' => 'title must be unique')				
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',60),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enable' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
 public $belongsTo = array('ParentBlogCategory'=>array('table'=>'blog_categories','className' => 'BlogCategory', 'foreignKey' => 'blog_category_id','counterCache' =>  'blog_categories_count'));

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array('Blog');

}
