<?php
App::uses('SlAnonModel', 'Model');
/**
 * GuestBook Model
 *
 * @property User $User
 * @property GuestBookComment $GuestBookComment
 */
class GuestBook extends SlAnonModel {
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
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
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
		'name' => array(
			'maxLength' => array(
				'rule' => array('maxLength',60),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'guest_book_comments_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
	
	public function beforeSave($options = array()) {		
		$this -> data[$this -> alias]['user_id']=CakeSession::read('Auth.User.id');
		
		return parent::beforeSave($options);
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('User');
	public $hasMany = array('GuestBookComment');
	public $hasOne = array('GuestBookContent'	=>array('foreignKey' => 'id','dependent' => true));
}
