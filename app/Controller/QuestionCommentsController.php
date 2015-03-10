<?php
App::uses('SlAnonController', 'Controller');
/**
 * QuestionComments Controller
 *
 * @property QuestionComment $QuestionComment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionCommentsController extends SlAnonController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> QuestionComment -> recursive = 0;
		$this -> set('questionComments', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> QuestionComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('QuestionComment.' . $this -> QuestionComment -> primaryKey => $id));
		$this -> set('questionComment', $this -> QuestionComment -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> QuestionComment -> create();
			if ($this -> QuestionComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('controller' => 'questions', 'action' => 'view', $this -> request -> data['QuestionComment']['question_id']));
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
		if (!$this -> QuestionComment -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> request -> data['QuestionComment']['id'] = $id;
			if ($this -> QuestionComment -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('QuestionComment.' . $this -> QuestionComment -> primaryKey => $id));
			$this -> request -> data = $this -> QuestionComment -> find('first', $options);
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
		$this -> QuestionComment -> id = $id;
		if (!$this -> QuestionComment -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> QuestionComment -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('controller' => 'questions', 'action' => 'view', $this -> request -> data['QuestionComment']['question_id']));
	}

}
