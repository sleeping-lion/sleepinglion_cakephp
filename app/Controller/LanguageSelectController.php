<?php
App::uses('SlController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LanguageSelectController extends SlController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if (empty($this -> params -> query['language']) OR $this -> params -> query['language'] == 'kor') {
			$this -> Session -> write('Config.language','kor');
		} else {
			$this -> Session -> write('Config.language', $this -> params -> query['language']);
		}
		$this -> redirect('/');
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($language = null) {
		if (empty($language)) {
			$this -> Session -> delete('Config.language');
		} else {
			$this -> Session -> write('Config.language', $language);
		}
		$this -> redirect('/');
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {

	}

}
