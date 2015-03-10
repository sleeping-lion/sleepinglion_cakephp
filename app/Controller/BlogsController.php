<?php
App::uses('SlController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlogsController extends SlController {

	protected function _getCategoriedCategory() {
		$this -> loadModel('BlogCategory');
		$blogCategories = $this -> BlogCategory -> find('list', array('fields' => array('BlogCategory.id', 'BlogCategory.title', 'BlogCategory2.title'), 'joins' => array( array('table' => 'blog_categories', 'alias' => 'BlogCategory2', 'type' => 'left', 'conditions' => array('BlogCategory.blog_category_id = BlogCategory2.id', 'BlogCategory2.leaf' => false, 'BlogCategory.enable' => true))), 'conditions' => array('BlogCategory.leaf' => true), 'order' => array('BlogCategory.blog_category_id desc,BlogCategory2.id desc'), 'recursive' => -1));

		if (!count($blogCategories))
			throw new Exception(__('Insert Blog Category First'));

		if (isset($this -> request -> query['blog_category_id'])) {
			if (!$this -> BlogCategory -> exists($this -> request -> query['blog_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$blog_category_id = $this -> request -> query['blog_category_id'];
		}

		$this -> set('blogCategories', $blogCategories);
		$this -> set('blogCategoryId', $blog_category_id);
		return $blogCategories;
	}

	protected function _getCategory() {
		$this -> loadModel('BlogCategory');
		$blogCategories = $this -> BlogCategory -> find('list', array('conditions' => array('leaf' => true, 'enable' => true), 'recursive' => -1));
		if (!count($blogCategories))
			throw new Exception(__('Insert Blog Category First'));

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
		$blogCategories = $this -> _getCategory();
		if (isset($this -> params['tag'])) {
			$this -> loadModel('Tagging');
			$ids = $this -> Tagging -> find('list', array('fields' => array('Tagging.taggable_id'), 'joins' => array( array('table' => 'tags', 'alias' => 'Tag', 'conditions' => array('Tagging.tag_id=Tag.id'))), 'conditions' => array('Tag.name' => $this -> params['tag']), 'recursive' => -1));

			$this -> setSearch('Blog');
			$conditions = array('Blog.id' => $ids);
			$blog_category_id = null;
			// @meta_keywords=params[:tag]+','+t(:meta_keywords)
		} else {
			if (isset($this -> request -> query['id'])) {
				$blog = $this -> view($this -> request -> query['id']);
				$blog_category_id = $blog['Blog']['blog_category_id'];
			} else {
				if (isset($this -> request -> query['blog_category_id'])) {
					if ($this -> BlogCategory -> exists($this -> request -> query['blog_category_id'])) {
						$blog_category_id = $this -> request -> query['blog_category_id'];
					} else {
						throw new NotFoundException(__('Invalid post'));
					}
				} else {
					$blog_category_id = key($blogCategories);
				}

				//	$blog = $this -> Blog -> find('first', array('conditions' => array('Blog.blog_category_id' => $blog_category_id)));
			}
			$conditions = array('Blog.blog_category_id' => $blog_category_id);
		}

		$this -> Blog -> recursive = 0;
		$this -> setSearch('Blog');
		$this -> paginate = array('conditions' => $conditions, 'order' => 'Blog.id desc');

		$this -> set('blogs', $this -> Paginator -> paginate());
		$this -> set('blogCategoryId', $blog_category_id);
		if (isset($blog)) {
			$this -> set('blog', $blog);
		}
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
		if (!$this -> Blog -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Blog.' . $this -> Blog -> primaryKey => $id));
		$blog = $this -> Blog -> find('first', $options);
		$this -> set('blog', $blog);
		$this -> set('_serialize', 'blog');

		if ($this -> addImpression($id)) {
			$this -> Blog -> id = $id;
			$this -> Blog -> saveField('count', $blog['Blog']['count'] + 1);
		}

		$this -> loadModel('BlogComment');
		$this -> BlogComment -> recursive = 0;
		$this -> Paginator -> settings = array('paramType' => 'querystring', 'limit' => 5, 'order' => array('id' => 'desc'));
		$this -> set('blogComments', $this -> Paginator -> paginate('BlogComment', array('blog_id' => $blog['Blog']['id'])));
	}

	protected function saveTaggins($post_id, $tags) {
		$this -> loadModel('Tag');
		$tag_a = explode(',', $tags);
		$tag_a = array_unique($tag_a);

		$taggings = array();

		foreach ($tag_a as $index => $value) {
			if ($this -> Tag -> find('count', array('conditions' => array('name' => $value)))) {
				$tag_e = $this -> Tag -> find('first', array('conditions' => array('name' => $value)));
				$taggings[] = array('taggable_id' => $post_id, 'tag_id' => $tag_e['Tag']['id'], 'taggable_type' => 'Blog', 'context' => 'tags');
			} else {
				$this -> Tag -> save(array('Tag' => array('name' => $value)));
				$taggings[] = array('taggable_id' => $post_id, 'tag_id' => $this -> Tag -> getLastInsertID(), 'taggable_type' => 'Blog', 'context' => 'tags');
			}
		}

		$this -> loadModel('Tagging');
		return $this -> Tagging -> saveAll($taggings);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Blog -> create();
			$tags = $this -> request -> data['Tag']['tags'];
			unset($this -> request -> data['Tag']);

			if ($this -> Blog -> saveAll($this -> request -> data)) {
				$this -> saveTaggins($this -> Blog -> getLastInsertID(), $tags);
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this -> _getCategoriedCategory();
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
		if (!$this -> Blog -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['Blog']['id'] = $id;
			if ($this -> Blog -> saveAll($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Blog.' . $this -> Blog -> primaryKey => $id));
			$this -> request -> data = $this -> Blog -> find('first', $options);

			$this -> _getCategoriedCategory();
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
		$this -> Blog -> id = $id;
		if (!$this -> Blog -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Blog -> delete()) {
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
		$this -> layout = 'admin';
		$this -> Blog -> recursive = 0;
		$this -> set('blogs', $this -> Paginator -> paginate());
	}

}
