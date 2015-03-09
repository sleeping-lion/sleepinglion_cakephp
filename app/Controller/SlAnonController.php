<?php
App::uses('SlController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SlAnonController extends SlController {

	public $components = array('Recaptcha.Recaptcha');

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index', 'view', 'add', 'edit');
	}

	protected function searchUserCondition($modelAilas=null,$search_text,$modelUserAlias='User') {
		return array('OR'=>array($modelUserAlias.'.name LIKE'=>'%'.$search_text.'%',$modelAilas.'.name LIKE'=>'%'.$search_text.'%'));
	}
}
