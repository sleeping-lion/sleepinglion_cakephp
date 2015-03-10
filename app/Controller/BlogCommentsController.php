<?php
App::uses('SlAnonController', 'Controller');
/**
 * BlogComments Controller
 *
 * @property BlogComment $BlogComment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlogCommentsController extends SlAnonController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> BlogComment -> recursive = 0;
		$this -> set('blogComments', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> BlogComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('BlogComment.' . $this -> BlogComment -> primaryKey => $id));
		$this -> set('blogComment', $this -> BlogComment -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> BlogComment -> create();
			if ($this -> BlogComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('controller' => 'guest_books', 'action' => 'view', $this -> request -> data['BlogComment']['guest_book_id']));
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
		if (!$this -> BlogComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['BlogComment']['id']=$id;			
			if ($this -> BlogComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('BlogComment.' . $this -> BlogComment -> primaryKey => $id));
			$this -> request -> data = $this -> BlogComment -> find('first', $options);
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
		$this -> BlogComment -> id = $id;
		if (!$this -> BlogComment -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> BlogComment -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('controller' => 'guest_books', 'action' => 'view', $this -> request -> data['BlogComment']['guest_book_id']));
	}

}
