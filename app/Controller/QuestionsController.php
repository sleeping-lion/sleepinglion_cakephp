<?php
App::uses('SlAnonController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionsController extends SlAnonController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Question -> recursive = 0;
		$this -> setSearch('Question');
		$this -> set('questions', $this -> Paginator -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Question -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Question.' . $this -> Question -> primaryKey => $id));
		$question = $this -> Question -> find('first', $options);
		$this -> set('question', $question);

		if ($this -> addImpression($id)) {
			$this -> Question -> id = $id;
			$this -> Question -> saveField('count', $question['Question']['count'] + 1);
		}

		$this -> loadModel('QuestionComment');
		$this -> QuestionComment -> recursive = 0;
		$this -> Paginator -> settings = array('paramType' => 'querystring', 'limit' => 5, 'order' => array('id' => 'desc'));
		$this -> set('questionComments', $this -> Paginator -> paginate('QuestionComment', array('question_id' => $question['Question']['id'])));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			if ($this -> Session -> read('Auth.User') OR $this -> Recaptcha -> verify()) {
				$this -> Question -> create();
				if ($this -> Question -> saveAll($this -> request -> data)) {
					$this -> Session -> setFlash(__('The post has been saved.'), 'success');
					return $this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
				}
			} else {
				// display the raw API error
				$this -> Session -> setFlash($this -> Recaptcha -> error, 'error');
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
		if (!$this -> Question -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> Question -> id = $id;
			if ($this -> Question -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Question.' . $this -> Question -> primaryKey => $id));
			$this -> request -> data = $this -> Question -> find('first', $options);
		}
		$users = $this -> Question -> User -> find('list');
		$this -> set(compact('users'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this -> Question -> id = $id;
		if (!$this -> Question -> exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Question -> delete()) {
			$this -> Session -> setFlash(__('The post has been deleted.'), 'success');
		} else {
			$this -> Session -> setFlash(__('The post could not be deleted. Please, try again.'), 'error');
		}
		return $this -> redirect(array('action' => 'index'));
	}

}
