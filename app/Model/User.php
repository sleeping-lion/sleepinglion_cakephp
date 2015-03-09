<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property BlogComment $BlogComment
 * @property Blog $Blog
 * @property Gallery $Gallery
 * @property GuestBookComment $GuestBookComment
 * @property GuestBook $GuestBook
 * @property History $History
 * @property Impression $Impression
 * @property Notice $Notice
 * @property Product $Product
 * @property QuestionComment $QuestionComment
 * @property Question $Question
 */
class User extends AppModel {
	public $belongsTo = array('Group' => array('counterCache' => true));
	public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
	public $insertedIds = array();
	protected $adminGroupId = 1;
	protected $defaultGroupId = 3;

	public function afterSave($created, $options = Array()) {
		if ($created) {
			$this -> insertedIds[] = $this -> getInsertID();
		}
		return true;
	}

	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

	public function beforeSave($options = array()) {
		if (isset($this -> data[$this -> alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this -> data[$this -> alias]['encrypted_password'] = $passwordHasher -> hash($this -> data[$this -> alias]['password']);
		}

		$this -> data[$this -> alias]['group_id'] = $this -> defaultGroupId;

		return true;
	}

	public function parentNode() {
		if (!$this -> id && empty($this -> data)) {
			return null;
		}
		if (isset($this -> data['User']['group_id'])) {
			$groupId = $this -> data['User']['group_id'];
		} else {
			$groupId = $this -> field('group_id');
		}
		if (!$groupId) {
			return null;
		}

		return array('Group' => array('id' => $groupId));
	}

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
	public $validate = array('email' => array('notEmpty' => array('rule' => array('notEmpty'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), 'maxLength' => array('rule' => array('maxLength', 255),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), 'unique' => array('rule' => 'isUnique', 'message' => 'email must be unique')), 'name' => array('notEmpty' => array('rule' => array('notEmpty'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), 'maxLength' => array('rule' => array('maxLength', 60),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), 'password' => array('notEmpty' => array('rule' => array('notEmpty', 255),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), 'role' => array('notEmpty' => array('rule' => array('notEmpty'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array('UserPhoto');
}
