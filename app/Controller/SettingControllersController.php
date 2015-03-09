<?php
App::uses('SlController', 'Controller');
/**
 * SettingControllers Controller
 *
 * @property SettingController $SettingController
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SettingControllersController extends SlController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> SettingController -> recursive = 0;
		$this -> setSearch('SettingController');
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
		if (!$this -> SettingController -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('SettingController.' . $this -> SettingController -> primaryKey => $id));
		$notice = $this -> SettingController -> find('first', $options);
		$this -> set('notice', $notice);

		if ($this -> addImpression($id)) {
			$this -> SettingController -> id = $id;
			$this -> SettingController -> saveField('count', $notice['SettingController']['count'] + 1);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> SettingController -> create();
			if ($this -> SettingController -> saveAll($this -> request -> data)) {
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
		if (!$this -> SettingController -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> SettingController -> id = $id;
			if ($this -> SettingController -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('SettingController.' . $this -> SettingController -> primaryKey => $id));
			$this -> request -> data = $this -> SettingController -> find('first', $options);
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
		$this -> SettingController -> id = $id;
		if (!$this -> SettingController -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> SettingController -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
