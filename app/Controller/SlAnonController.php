<?php
App::uses('SlController', 'Controller');

class SlAnonController extends SlController {

	public $components = array('Recaptcha.Recaptcha');

	public function beforeFilter() {
		parent::beforeFilter();				
		$this -> Auth -> allow('index', 'view', 'add','check_password','confirm_delete');
		
		if($this->request->params['action']=='edit' OR $this->request->params['action']=='delete') {
			if($this->Session->check("AnonAuth.{$this -> modelClass}.{$this->request->params['pass'][0]}"))
				$this -> Auth -> allow('edit','delete');
		}
	}

	protected function searchUserCondition($modelAilas=null,$search_text,$modelUserAlias='User') {
		return array('OR'=>array($modelUserAlias.'.name LIKE'=>'%'.$search_text.'%',$modelAilas.'.name LIKE'=>'%'.$search_text.'%'));
	}
	
	public function confirm_delete($id=null) {
		if (!$this->{$this -> modelClass} -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
	}
	
	protected function grantAnonAuth($id) {
		$this->Session->write('AnonAuth',array($this -> modelClass=>array($id=>true)));
	} 
	
	public function check_password($id = null) {
		if (!$this->{$this -> modelClass} -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this -> request -> is('post')) {
			$mm=$this -> {$this -> modelClass}->findById($id);
		
			if (strcmp($mm[$this -> modelClass]['encrypted_password'],Security::hash($this ->request->data[$this -> modelClass]['password'], 'sha1', true))) {
				$this -> Session -> setFlash(__('Invalid password, try again'), 'error');
			} else {
				$this->grantAnonAuth($id);
				
				if(isset($this->request->data[$this -> modelClass]['delete'])) {
					return $this -> redirect(array('action' => 'confirm_delete',$this ->request->params['id']));
				} else {
					return $this -> redirect(array('action' => 'edit',$this ->request->params['id']));
				}
			}
		}
	}
}
