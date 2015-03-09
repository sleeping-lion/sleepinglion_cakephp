<?php
App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');

class SlPasswordHasher extends AbstractPasswordHasher {
	public function hash($password) {
		return crypt($password . Configure::read('Security.salt'), '$2a$10$' . substr(md5(time()), 0, 22));
	}

	public function check($password, $hashedPassword) {
		return $hashedPassword === $this->hash($password);
	}
}
