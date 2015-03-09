<?php
App::uses('SlController', 'Controller');
/**
 * FaqCategories Controller
 *
 * @property FaqCategory $FaqCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FaqCategoriesController extends SlController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FaqCategory->recursive = 0;
		$this->set('faqCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FaqCategory->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('FaqCategory.' . $this->FaqCategory->primaryKey => $id));
		$this->set('faqCategory', $this->FaqCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FaqCategory->create();
			if ($this->FaqCategory->save($this->request->data)) {
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
		if (!$this->FaqCategory->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->FaqCategory->id = $id;
			if ($this->FaqCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('FaqCategory.' . $this->FaqCategory->primaryKey => $id));
			$this->request->data = $this->FaqCategory->find('first', $options);
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
		$this->FaqCategory->id = $id;		
		if (!$this->FaqCategory->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
				
		if ($this->FaqCategory->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
