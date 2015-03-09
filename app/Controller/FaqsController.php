<?php
App::uses('SlController', 'Controller');
/**
 * Faqs Controller
 *
 * @property Faq $Faq
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FaqsController extends SlController {

	protected function _getCategory() {
		$this -> loadModel('FaqCategory');
		$faqCategories = $this -> FaqCategory -> find('list',array('recursive'=>-1,'conditions'=>array('enable'=>true)));
		if (count($faqCategories)) {
			$this -> set('faqCategories', $faqCategories);
			if (isset($this -> request -> query['faq_category_id'])) {
				if (!$this -> FaqCategory -> exists($this -> request -> query['faq_category_id']))
					throw new NotFoundException(__('Invalid post'));

				$faq_category_id = $this -> request -> query['faq_category_id'];
			} else {
				$faq_category_id = key($faqCategories);
			}
			$this -> set('faqCategoryId', $faq_category_id);
		} else {
			throw new Exception(__('Insert Faq Category First'));
		}
		return $faqCategories;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$faqCategories = $this -> _getCategory();

		if (isset($this -> request -> query['id'])) {
			$faq = $this -> view($this -> request -> query['id']);
			$faq_category_id = $faq['Faq']['faq_category_id'];
		} else {
			if (isset($this -> request -> query['faq_category_id'])) {
				if ($this -> FaqCategory -> exists($this -> request -> query['faq_category_id'])) {
					$faq_category_id = $this -> request -> query['faq_category_id'];
				} else {
					throw new NotFoundException(__('Invalid post'));
				}
			} else {
				$faq_category_id = key($faqCategories);
			}

			$faq = $this -> Faq -> find('first', array('conditions' => array('faq_category_id' => $faq_category_id)));
		}

		$this -> Faq -> recursive = 0;
		$this -> setSearch('Faq');
		$this -> paginate = array('conditions' => array('faq_category_id' => $faq_category_id));

		if (count($faq))
			$this -> set('faq', $faq);
		
		$this -> set('faqs', $this -> Paginator -> paginate());
		$this -> set('faqCategoryId', $faq_category_id);
		
		//$this->render('index_default');		
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Faq -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Faq.' . $this -> Faq -> primaryKey => $id));
		$faq = $this -> Faq -> find('first', $options);
		$this -> set('faq', $faq);
		$this -> set('_serialize', 'faq');
		
		if($this->addImpression($id)) {
			$this->Faq->id = $id;
			$this->Faq->saveField('count',$faq['Faq']['count']+1);
		}
		return $faq;
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Faq -> create();
			if ($this -> Faq -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this -> _getCategory();
		}
		//$users = $this->Faq->User->find('list');
		//$this->set(compact('users'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this -> Faq -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this -> request -> is(array('post', 'put'))) {
			$this -> Faq -> id = $id;
			//			$this -> request -> data['Faq']['user_id'] = $this -> Auth -> user('id');
			if ($this -> Faq -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Faq.' . $this -> Faq -> primaryKey => $id));
			$this -> request -> data = $this -> Faq -> find('first', $options);
			$this -> _getCategory();
		}
		//$users = $this->Faq->User->find('list');
		//$this->set(compact('users'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this -> Faq -> id = $id;
		if (!$this -> Faq -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Faq -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout='admin';		
		$this->Faq->recursive = 0;
		$this->set('faqs', $this->Paginator->paginate());
	}
}
