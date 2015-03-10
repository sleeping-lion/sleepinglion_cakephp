<?php
App::uses('SlController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GroupsController extends SlController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Group -> recursive = 0;
		$this -> setSearch('Group');
		$this -> set('groups', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Group -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Group.' . $this -> Group -> primaryKey => $id));
		$group = $this -> Group -> find('first', $options);
		$this -> set('group', $group);

		if ($this -> addImpression($id)) {
			$this -> Group -> id = $id;
			$this -> Group -> saveField('count', $notice['Group']['count'] + 1);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Group -> create();
			if ($this -> Group -> save($this -> request -> data)) {
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
		if (!$this -> Group -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['Group']['id'] = $id;
			if ($this -> Group -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Group.' . $this -> Group -> primaryKey => $id));
			$this -> request -> data = $this -> Group -> find('first', $options);
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
		$this -> Group -> id = $id;
		if (!$this -> Group -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Group -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
