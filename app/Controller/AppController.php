<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 
class AppController extends Controller {
	#public $theme='Simple';
	#public $theme='BlacknWhite';	
	public $helpers = array('Html', 'Form', 'App', 'Session');
	public $components = array('Paginator','Acl','RequestHandler', 'Auth' => array('authorize' => 'Controller','authenticate' => array('Form' => array(
	      'passwordHasher' => 'Blowfish',
	'fields' => array('username' => 'email','password'=>'encrypted_password')))), 'Session');	
	// public $components = array('Paginator','Acl','Session', 'Auth' => array('loginRedirect' => array('controller' => 'home', 'action' => 'index'), 
	//'logoutRedirect' => array('controller' => 'users', 'action' => 'login'), 
//	'authorize' => 'Controller',
//	'authenticate' => array('Form' => array(
//	 'passwordHasher' => 'SLPasswordHasher',
//	'fields' => array('username' => 'email','password'=>'encrypted_password')))));


	public function beforeFilter() {
		$this->Auth->flash['element'] = 'auth';
		
		if(isset($this->request->query['no_layout']))
			$this->layout=false;
		
		$this -> Auth -> loginRedirect = array('controller' => 'users', 'action' => 'login');
		$this -> Auth -> logoutRedirect = array('controller' => 'users', 'action' => 'login');
		
		$this -> Auth -> allow('display', 'login', 'logout', 'admin_login', 'admin_logout');
	}

	public function isAuthorized() {
		$controller = $this -> name;
		$action = $this -> action;
		
		$allow = false;
		
	//	if ($action == 'login' OR $action == 'logout')
	//		return true;
	
		if ($this -> Auth -> loggedIn()) {
			
			$group_id = $this -> Session -> read('Auth.User.group_id');

			switch($action) {
				case 'index' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'admin_index' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'view' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'admin_view' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'add' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'create');
					break;
				case 'admin_add' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'create');
					break;
				case 'edit' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'admin_edit' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'admin_change_status' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'delete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'delete');
					break;
				case 'admin_delete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'delete');
					break;
				case 'complete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
			}
		} else {
			return false;
		}

		//if (!$allow) {
		//	$this -> Session -> setFlash(__('You Do not Have Auth.'), 'error');
		//}
		return $allow;
	}	
	
//	public function isOwnedBy($post, $user) {
//		return $this -> field('id', array('id' => $post, 'user_id' => $user)) !== false;
//	}
}
