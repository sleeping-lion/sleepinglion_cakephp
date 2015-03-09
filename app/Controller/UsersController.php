<?php
App::uses('SlController', 'Controller');


/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends SlController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('admin_login','admin_logout','login', 'add', 'logout');
		

		/* 
		 * 새로 권한 입력하려면 여기를 이용
		 * 수정후에  aco,aro,aros_acos 테이블의 모든 데이터를 지운후 각 테이블 auto_increment도 1로 맞춘다.
		 * 그 후에  위의 두둘을 주석처리 하고 $this -> initAcl() 메소드를 호출 시키면 입력된다.
		 * 한번 호출후엔 다시 위의 두줄을 나오게 하고 밑에의 $this -> initAcl()를 주석 처리한다. 
		 * 두번 호출하면 두번 입력됨!!!  =  그럼 다시 처음부터 테이블 지우고 위 과정 시행
		 */				
		//$this -> initAcl();
	}
	
	private function createAro() {
		$aro = new Aro();
		$aro -> create();
		$aro -> save(array('model' => 'Group', 'foreign_key' => 1, 'parent_id' => null, 'alias' => 'admins'));
		$aro -> create();
		$aro -> save(array('model' => 'Group', 'foreign_key' => 2, 'parent_id' => null, 'alias' => 'managers'));
		$aro -> create();
		$aro -> save(array('model' => 'Group', 'foreign_key' => 3, 'parent_id' => null, 'alias' => 'users'));
		$aro -> create();
		$aro -> save(array('model' => 'Group', 'foreign_key' => 4, 'parent_id' => null, 'alias' => 'viewers'));
	}

	private function createAco() {
		$aco = new Aco();
		$aco -> create();
		$aco -> save(array('parent_id' => null, 'alias' => 'controllers')); //1
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Users')); //2
		$aco -> create();			
		$aco -> save(array('parent_id' => 2, 'alias' => 'Groups')); //3
		$aco -> create();	
		$aco -> save(array('parent_id' => 1, 'alias' => 'Notices')); //4
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'GuestBooks')); //5
		$aco -> create();	
		$aco -> save(array('parent_id' => 5,'alias' => 'GuestBookComments')); //6
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Questions')); //7
		$aco -> create();
		$aco -> save(array('parent_id' => 7, 'alias' => 'QuestionComments')); //8
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Faqs')); //9
		$aco -> create();
		$aco -> save(array('parent_id' => 9, 'alias' => 'FaqCategories')); // 10
		$aco -> create();	
		$aco -> save(array('parent_id' => 1, 'alias' => 'Blogs')); //11
		$aco -> create();
		$aco -> save(array('parent_id' => 11, 'alias' => 'BlogCategories')); //12
		$aco -> create();
		$aco -> save(array('parent_id' => 11, 'alias' => 'BlogComments')); //13
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'CkeditorAssets')); //14
		$aco -> create();	
		$aco -> save(array('parent_id' => 1, 'alias' => 'Galleries')); // 15
		$aco -> create();
		$aco -> save(array('parent_id' => 15, 'alias' => 'GalleryCategories')); // 16
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Contacts')); // 17
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Portfolios')); // 18
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Histories')); // 19
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Home')); //20	
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Intro')); //21		
		$aco -> create();
		$aco -> save(array('parent_id' => 1, 'alias' => 'Resources')); //22		
	}

	private function initAcl() {
		$this -> createAro();
		$this -> createAco();

		$group = $this -> User -> Group;
		
		// admins
		$group -> id = 1;
		$this -> Acl -> allow($group, 'controllers');
//		$this -> Acl -> deny($group, 'Services', 'delete');
//		$this -> Acl -> deny($group, 'Groups', 'create');
//		$this -> Acl -> deny($group, 'Groups', 'delete');

		// managers
		$group -> id = 2;
		$this -> Acl -> allow($group, 'controllers');
		$this -> Acl -> deny($group, 'Users');

		// users
		$group -> id = 3;
		$this -> Acl -> allow($group, 'Gallery', 'read');
		$this -> Acl -> allow($group, 'Notice', 'read');
		$this -> Acl -> allow($group, 'Contacts', 'create');
		$this -> Acl -> allow($group, 'Contacts', 'read');


		// viewers
		$group -> id = 4;
		$this -> Acl -> allow($group, 'Gallery', 'read');
		$this -> Acl -> allow($group, 'Notice', 'read');
		$this -> Acl -> allow($group, 'Contacts', 'create');
		$this -> Acl -> allow($group, 'Contacts', 'read');
		

		// we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit ;
	}	

	public function login() {
		if ($this -> Session -> read('Auth.User')) {
			//	$this -> Session -> setFlash('You are logged in! no Auth');
			return $this -> redirect(array('controller'=>'home','action'=>'index'));
		}
		
		if ($this -> request -> is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
        	}
			$this -> Session -> setFlash(_('Invalid email or password, try again'),'error');
		}
	}

	public function logout() {
		return $this -> redirect($this -> Auth -> logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid post'),'success');
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {		
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'),'error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->User->id = $id;			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			

		}				
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout='admin';		
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->layout='admin';		
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='admin';		
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->layout='admin';		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->layout='admin';		
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_login() {
		if ($this -> Session -> read('Auth.User.group_id')==1) {
			//	$this -> Session -> setFlash('You are logged in! no Auth');
			return $this -> redirect(array('controller'=>'home','action'=>'admin_index'));
		}		
		
		$this -> layout = 'admin_login';
		/* if ($this -> Session -> read('Auth.User')) {
			$this -> Session -> setFlash('You are logged in! no Auth');
			return $this -> redirect($this -> Auth -> redirect());
		}  */
		
		if ($this -> request -> is('post')) {
			if ($this -> Auth -> login()) {
				return $this -> redirect($this -> Auth -> redirect());
			}
			$this -> Session -> setFlash(__('Invalid username or password, try again'), 'error');
		}
	}

	public function admin_logout() {
		$this -> logout();
	}	
}
