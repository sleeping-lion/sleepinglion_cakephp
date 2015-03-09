<?php
App::uses('AppModel', 'Model');
/**
 * Notices Model
 *
 */
class SlAnonModel extends AppModel {
	public function beforeSave($options = array()) {
		$user_id=CakeSession::read('Auth.User.id');
		if($this->params['action']=='add' OR $this->params['action']=='edit') {		
		if($user_id) {
			$this -> data[$this -> alias]['user_id']=$user_id;
		} else {
			$this -> data[$this -> alias]['encrypted_password'] =  Security::hash($this -> data[$this -> alias]['password'], 'sha1', true);
		}
		}
		
		$now = date('Y-m-d H:i:s');
		
	// set created_at field before creatio
			if(isset($this -> data[$this -> alias]['id'])) {
				$this -> data[$this -> alias]['created_at'] = $now;
			} else {
			$this -> data[$this -> alias]['created_at'] = $now;
		}
		// set updated_at field value before each save
		$this -> data[$this -> alias]['updated_at'] = $now;
		
		return parent::beforeSave($options);
	}
}
	