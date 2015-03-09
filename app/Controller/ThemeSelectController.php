<?php
App::uses('SlController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ThemeSelectController extends SlController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if (empty($this -> params -> query['theme']) OR $this -> params -> query['theme'] == 'Default') {
			$this -> Session -> delete('theme');
		} else {
			$this -> Session -> write('theme', $this -> params -> query['theme']);
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
	public function view($theme = null) {
		if (empty($theme)) {
			$this -> Session -> delete('theme');
		} else {
			$this -> Session -> write('theme', $theme);
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
