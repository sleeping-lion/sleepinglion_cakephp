<?php
App::uses('SlController', 'Controller');
/**
 * BlogCategories Controller
 *
 * @property BlogCategory $BlogCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlogCategoriesController extends SlController {
	protected function _getCategory() {
		$this -> loadModel('BlogCategory');
		$blogCategories = $this -> BlogCategory -> find('list', array('conditions' => array('leaf' => false,'enable'=>true), 'recursive' => -1));

		if (isset($this -> request -> query['blog_category_id'])) {
			if (!$this -> BlogCategory -> exists($this -> request -> query['blog_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$blog_category_id = $this -> request -> query['blog_category_id'];
		} else {
			$blog_category_id = key($blogCategories);
		}
		$this -> set('blogCategories', $blogCategories);
		$this -> set('blogCategoryId', $blog_category_id);
		return $blogCategories;
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> BlogCategory -> recursive = -1;
		$this -> Paginator -> settings = array('paramType' => 'querystring', 'limit' => 10, 'order' => array('blog_category_id' => 'desc','leaf'=>'asc','id'=>'desc'));
		$this -> set('blogCategories', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> BlogCategory -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('BlogCategory.' . $this -> BlogCategory -> primaryKey => $id));
		$this -> set('blogCategory', $this -> BlogCategory -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> BlogCategory -> create();
			if(!empty($this -> request -> data['BlogCategory']['blog_category_id'])) {
				$this -> request -> data['BlogCategory']['leaf']=true;
			}
			if ($this -> BlogCategory -> save($this -> request -> data)) {
				if(empty($this -> request -> data['BlogCategory']['blog_category_id'])) {
					$this -> BlogCategory->saveField('blog_category_id',$this->BlogCategory->getLastInsertId());
				}
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->_getCategory();
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
		if (!$this -> BlogCategory -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> BlogCategory -> id = $id;
			if(!empty($this -> request -> data['BlogCategory']['blog_category_id'])) {
				$this -> request -> data['BlogCategory']['leaf']=true;
			}			
			if ($this -> BlogCategory -> save($this -> request -> data)) {
				if(empty($this -> request -> data['BlogCategory']['blog_category_id'])) {
					$this -> BlogCategory->saveField('blog_category_id',$this->BlogCategory->getLastInsertId());
				}				
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('BlogCategory.' . $this -> BlogCategory -> primaryKey => $id));
			$this -> request -> data = $this -> BlogCategory -> find('first', $options);
			$this->_getCategory();			
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
		$this -> BlogCategory -> id = $id;
		if (!$this -> BlogCategory -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');

		if ($this -> BlogCategory -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
