<?php
App::uses('SlContentModel', 'Model');
/**
 * NoticeContent Model
 *
 */
class NoticeContent extends SlContentModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */

	public $belongsTo = array('Notice' => array('foreignKey' => 'id'));
}
