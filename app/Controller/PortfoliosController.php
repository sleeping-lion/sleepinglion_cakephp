<?php
App::uses('SlController', 'Controller');
/**
 * Portfolios Controller
 *
 * @property Portfolio $Portfolio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PortfoliosController extends SlController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Portfolio->recursive = 0;
		$this -> setSearch('Portfolio');		
		$this->set('portfolios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Portfolio->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Portfolio.' . $this->Portfolio->primaryKey => $id));
		$this->set('portfolio', $this->Portfolio->find('first', $options));
		
		if($this->addImpression($id)) {
			$this->Portfolio->id = $id;
			$this->Portfolio->saveField('count',$this->Portfolio->count+1);
		}		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Portfolio->create();
			if ($this->Portfolio->saveAll($this->request->data)) {
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
		if (!$this->Portfolio->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Portfolio->id = $id;			
			if ($this->Portfolio->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Portfolio.' . $this->Portfolio->primaryKey => $id));
			$this->request->data = $this->Portfolio->find('first', $options);
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
		$this->Portfolio->id = $id;
		if (!$this->Portfolio->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Portfolio->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
