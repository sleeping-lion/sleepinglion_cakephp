<?php
App::uses('SlContentModel', 'Model');
/**
 * PortfolioContent Model
 *
 */
class PortfolioContent extends SlContentModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

	public $belongsTo = array('Portfolio'=>array('foreignKey' => 'id'));
}
