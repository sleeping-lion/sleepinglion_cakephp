<?php
App::uses('SlController', 'Controller');
/**
 * GalleryCategories Controller
 *
 * @property GalleryCategory $GalleryCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GalleryCategoriesController extends SlController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> GalleryCategory -> recursive = 0;
		$this -> set('galleryCategories', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> GalleryCategory -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('GalleryCategory.' . $this -> GalleryCategory -> primaryKey => $id));
		$this -> set('galleryCategory', $this -> GalleryCategory -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GalleryCategory -> create();
			if ($this -> GalleryCategory -> save($this -> request -> data)) {
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
		if (!$this -> GalleryCategory -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['GalleryCategory']['id'] = $id;
			if ($this -> GalleryCategory -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('GalleryCategory.' . $this -> GalleryCategory -> primaryKey => $id));
			$this -> request -> data = $this -> GalleryCategory -> find('first', $options);
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
		$this -> GalleryCategory -> id = $id;
		if (!$this -> GalleryCategory -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> GalleryCategory -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
