<?php
App::uses('AppModel', 'Model');
/**
 * Notices Model
 *
 */
class UserPhoto extends AppModel {
	public $actsAs = array('Upload.Upload' => array('photo' => array('fields' => array('dir' => 'id'), 'thumbnailSizes' => array('xvga' => '1024x768','small'=>'400x300','thumb' => '100x100'))));

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'photo';
/**
 * Validation rules
 *
 * @var array
 */

	
/**
 * belongsTo associations
 *
 * @var array
 */	

	public $belongsTo = array('User' => array('counterCache' =>  'user_photos_count'));
}
