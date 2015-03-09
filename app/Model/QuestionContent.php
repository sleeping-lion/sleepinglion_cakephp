<?php
App::uses('SlContentModel', 'Model');
/**
 * QuestionContent Model
 *
 */
class QuestionContent extends SlContentModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */

	public $belongsTo = array('Question' => array('foreignKey' => 'id'));
}
