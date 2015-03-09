<?php

final class Group extends AppModel {
	public $actsAs = array('Acl' => array('type' => 'requester'),'Translate' => array('title'));
	public $validate = array('name' => array('rule' => 'notEmpty'));

	public function parentNode() {
		return null;
	}
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = array('id','level');
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array('User');
}
