<?php

App::uses('Component', 'Controller');
class TagCloud extends Component {
	public function index() {
		$this->Load->Model('Tag');
			$blog = $this -> Blog -> find('first', array('conditions' => array('Blog.blog_category_id' => $blog_category_id)));
		$this -> set('blogs', $this -> Paginator -> paginate());
	}
	
	public function add() {
		$clean['tag'] = explode(',', $clean['tag']);
		foreach ($clean['tag'] as $index => $value) {
			$clean['tag'][$index] = trim($value);
		}
	}	
}
