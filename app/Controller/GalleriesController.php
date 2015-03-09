<?php
App::uses('SlController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GalleriesController extends SlController {
	
	protected function getModelContentAlias($modelAilas) {
		return $modelAilas;
	}	

	protected function _getCategory() {
		$this -> loadModel('GalleryCategory');
		$galleryCategories = $this -> GalleryCategory -> find('list',array('recursive'=>-1,'conditions'=>array('enable'=>true)));
		if (!count($galleryCategories))
			throw new Exception(__('Insert Gallery Category First'));

		if (isset($this -> request -> query['gallery_category_id'])) {
			if (!$this -> GalleryCategory -> exists($this -> request -> query['gallery_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$gallery_category_id = $this -> request -> query['gallery_category_id'];
		} else {
			$gallery_category_id = key($galleryCategories);
		}

		$this -> set('galleryCategories', $galleryCategories);
		$this -> set('galleryCategoryId', $gallery_category_id);
		return $galleryCategories;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$galleryCategories = $this -> _getCategory();

		if (isset($this -> request -> query['id'])) {
			$gallery = $this -> view($this -> request -> query['id']);
			$gallery_category_id = $gallery['Gallery']['gallery_category_id'];
		} else {
			if (isset($this -> request -> query['gallery_category_id'])) {
				if ($this -> GalleryCategory -> exists($this -> request -> query['gallery_category_id'])) {
					$gallery_category_id = $this -> request -> query['gallery_category_id'];
				} else {
					throw new NotFoundException(__('Invalid post'));
				}
			} else {
				$gallery_category_id = key($galleryCategories);
			}

			$gallery = $this -> Gallery -> find('first', array('conditions' => array('gallery_category_id' => $gallery_category_id)));
		}

		$this -> Gallery -> recursive = 0;
		$this -> paginate = array('conditions' => array('gallery_category_id' => $gallery_category_id));

		if (count($gallery))
			$this -> set('gallery', $gallery);
		$galleries = $this -> Paginator -> paginate();

		$this -> set('galleries', array_chunk($galleries, 6));
		$this -> set('galleryCategoryId', $gallery_category_id);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Gallery -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Gallery.' . $this -> Gallery -> primaryKey => $id));
		$gallery = $this -> Gallery -> find('first', $options);
		$this -> set('gallery', $gallery);
		$this -> set('_serialize', 'gallery');

		if ($this -> addImpression($id)) {
			$this -> Gallery -> id = $id;
			$this -> Gallery -> saveField('count', $gallery['Gallery']['count'] + 1);
		}

		return $gallery;
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Gallery -> create();

			$this -> request -> data['Gallery']['user_id'] = $this -> Auth -> user('id');

			if (empty($this -> request -> data['Gallery']['gallery_category_id']))
				$this -> request -> data['Gallery']['gallery_category_id'] = 1;

			if ($this -> Gallery -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this -> _getCategory();
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
		if (!$this -> Gallery -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this -> request -> is(array('post', 'put'))) {
			$this -> Gallery -> id = $id;
			if ($this -> Gallery -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Gallery.' . $this -> Gallery -> primaryKey => $id));
			$this -> request -> data = $this -> Gallery -> find('first', $options);
			$this -> _getCategory();
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
		if (!$this -> Gallery -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		$this -> Gallery -> id = $id;
				
		if ($this -> Gallery -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}
	
	
	/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout='admin';
		$this->Gallery->recursive = 0;
		$this->set('galleries', $this->Paginator->paginate());
	}
}
