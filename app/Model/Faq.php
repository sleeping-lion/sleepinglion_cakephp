<?php
App::uses('SlModel', 'Model');
/**
 * Faq Model
 *
 * @property FaqCategory $FaqCategory
 */
class Faq extends SlModel {
	public $actsAs = array(	
  	'Translate' => array(
            'title'
        ),	
    'Sitemap.Sitemap' => array(
        'primaryKey' => 'id', //Default primary key field
        'loc' => 'buildUrl', //Default function called that builds a url, passes parameters (Model $Model, $primaryKey)
        'lastmod' => 'updated_at', //Default last modified field, can be set to FALSE if no field for this
        'changefreq' => 'daily', //Default change frequency applied to all model items of this type, can be set to FALSE to pass no value
        'priority' => '0.9', //Default priority applied to all model items of this type, can be set to FALSE to pass no value
        'conditions' => array(), //Conditions to limit or control the returned results for the sitemap
    ));
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
		'faq_category_id' => array(
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
		),
		'user_id' => array(
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
		'count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function save($data = null, $validate = true, $fieldList = array()) {
		$now = date('Y-m-d H:i:s');
	// set created_at field before creation
		if (!isset($this->data[$this->name]) || !$this->data[$this->name]['id']) {
			$data[$this->name]['created_at'] = $now;
		}
		// set updated_at field value before each save
		$data[$this->name]['updated_at'] = $now;
		return parent::save($data, $validate, $fieldList);
	}	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('User','FaqCategory' =>array('counterCache' =>  'faqs_count'));

/**
 * hasOne associations
 *
 * @var array
 */
 
	public $hasOne = array('FaqContent'	=>array('foreignKey' => 'id','dependent' => true));
}
