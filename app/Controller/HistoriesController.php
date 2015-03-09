<?php
App::uses('SlController', 'Controller');
/**
 * Historys Controller
 *
 * @property History $History
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HistoriesController extends SlController {
	
	protected function getModelContentAlias($modelAilas) {
		return $modelAilas;
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> History -> recursive = 0;
		$this -> setSearch('History');
		$this -> set('histories', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> History -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('History.' . $this -> History -> primaryKey => $id));
		$history = $this -> History -> find('first', $options);
		$this -> set('history', $history);

		if ($this -> addImpression($id)) {
			$this -> History -> id = $id;
			$this -> History -> saveField('count', $history['History']['count'] + 1);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> History -> create();
			if ($this -> History -> saveAll($this -> request -> data)) {
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
		if (!$this -> History -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> History -> id = $id;
			if ($this -> History -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('History.' . $this -> History -> primaryKey => $id));
			$this -> request -> data = $this -> History -> find('first', $options);
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
		$this -> History -> id = $id;
		if (!$this -> History -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> History -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
