<?php
App::uses('SlController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NoticesController extends SlController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Notice -> recursive = 0;
		$this -> setSearch('Notice');
		$this -> set('notices', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Notice -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Notice.' . $this -> Notice -> primaryKey => $id));
		$notice = $this -> Notice -> find('first', $options);
		$this -> set('notice', $notice);

		if ($this -> addImpression($id)) {
			$this -> Notice -> id = $id;
			$this -> Notice -> saveField('count', $notice['Notice']['count'] + 1);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Notice -> create();
			if ($this -> Notice -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
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
		if (!$this -> Notice -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['Notice']['id']=$id;
			if ($this -> Notice -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this -> Notice -> primaryKey => $id));
			$this -> request -> data = $this -> Notice -> find('first', $options);
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
		$this -> Notice -> id = $id;
		if (!$this -> Notice -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Notice -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
