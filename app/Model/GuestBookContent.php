<?php
App::uses('SlContentModel', 'Model');
/**
 * GuestBookContent Model
 *
 */
class GuestBookContent extends SlContentModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */

	public $belongsTo = array('GuestBook' => array('foreignKey' => 'id'));
}
