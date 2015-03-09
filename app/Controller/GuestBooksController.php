<?php
App::uses('SlAnonController', 'Controller');
/**
 * GuestBooks Controller
 *
 * @property GuestBook $GuestBook
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GuestBooksController extends SlAnonController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> GuestBook -> recursive = 0;
		$this -> setSearch('GuestBook');
		$this -> set('guestBooks', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> GuestBook -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		$options = array('conditions' => array('GuestBook.' . $this -> GuestBook -> primaryKey => $id));
		$guestBook = $this -> GuestBook -> find('first', $options);
		$this -> set('guestBook', $guestBook);

		if ($this -> addImpression($id)) {
			$this -> GuestBook -> id = $id;
			$this -> GuestBook -> saveField('count', $guestBook['GuestBook']['count'] + 1);
		}
		
		$this->loadModel('GuestBookComment');
		$this -> GuestBookComment -> recursive = 0;
		$this -> Paginator -> settings=array('paramType' => 'querystring', 'limit' => 5, 'order' => array('id' => 'desc'));
		$this -> set('guestBookComments', $this -> Paginator -> paginate('GuestBookComment',array('guest_book_id'=>$guestBook['GuestBook']['id'])));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			if ($this -> Session -> read('Auth.User') OR $this -> Recaptcha -> verify()) {
				$this -> GuestBook -> create();
				if ($this -> GuestBook -> saveAll($this -> request -> data)) {
					if(!$this -> Session -> check('Auth.User'))
						$this->grantAnonAuth($this -> GuestBook->id);
					$this -> Session -> setFlash(__('The post has been saved.'), 'success');
					return $this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
				}
			} else {
				// display the raw API error
				$this -> Session -> setFlash($this -> Recaptcha -> error, 'error');
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
		if (!$this -> GuestBook -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> GuestBook -> id = $id;			
			if ($this -> GuestBook -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('GuestBook.' . $this -> GuestBook -> primaryKey => $id));
			$this -> request -> data = $this -> GuestBook -> find('first', $options);
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
		$this -> GuestBook -> id = $id;
		if (!$this -> GuestBook -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> GuestBook -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
