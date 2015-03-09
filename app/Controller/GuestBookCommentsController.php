<?php
App::uses('SlAnonController', 'Controller');
/**
 * GuestBookComments Controller
 *
 * @property GuestBookComment $GuestBookComment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GuestBookCommentsController extends SlAnonController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> GuestBookComment -> recursive = 0;
		$this -> set('guestBookComments', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> GuestBookComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('GuestBookComment.' . $this -> GuestBookComment -> primaryKey => $id));
		$this -> set('guestBookComment', $this -> GuestBookComment -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GuestBookComment -> create();
			if ($this -> GuestBookComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('controller' => 'guest_books', 'action' => 'view', $this -> request -> data['GuestBookComment']['guest_book_id']));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
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
		if (!$this -> GuestBookComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			if ($this -> GuestBookComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('GuestBookComment.' . $this -> GuestBookComment -> primaryKey => $id));
			$this -> request -> data = $this -> GuestBookComment -> find('first', $options);
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
		$this -> GuestBookComment -> id = $id;
		if (!$this -> GuestBookComment -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> GuestBookComment -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('controller' => 'guest_books', 'action' => 'view', $this -> request -> data['GuestBookComment']['guest_book_id']));
	}

}
