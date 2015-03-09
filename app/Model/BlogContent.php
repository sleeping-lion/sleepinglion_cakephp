<?php
App::uses('SlContentModel', 'Model');
/**
 * BlogContent Model
 *
 */
class BlogContent extends SlContentModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */

	public $belongsTo = array('Blog' => array('foreignKey' => 'id'));
}
