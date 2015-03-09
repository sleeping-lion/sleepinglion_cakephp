<?php
App::uses('SlController', 'Controller');
/**
 * Intros Controller
 *
 * @property Intro $Intro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class IntroController extends SlController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this -> loadModel('User');
		$user=$this->User->find('first',array('conditions'=>array('group_id'=>1,'intro'=>true),'recursive'=>-1));
		$this -> set('user',$user);

		$this -> loadModel('UserPhoto');
		$conditions=array('user_id'=>$user['User']['id']);
		$userPhotos=$this -> paginate('UserPhoto',$conditions);
		$this -> set('userPhotos',array_chunk($userPhotos,6));
		
		if(isset($this->request->query['id'])) {
      $userPhoto = $this->userPhoto->findById($this->request->query['id']);
   } else {
   		if(count($userPhotos)) {
      	$userPhoto= $userPhotos[0];
			} else {
				$userPhoto=null;
			}
   		}
   
		$this -> set('userPhoto', $userPhoto);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this -> layout = false;
		$this -> loadModel('UserPhoto');
		if (!$this -> UserPhoto -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('UserPhoto.' . $this -> UserPhoto -> primaryKey => $id));
		$userPhoto = $this -> UserPhoto -> find('first', $options);
		$this -> set('userPhoto', $userPhoto);
		$this -> set('_serialize','userPhoto');
		
		$this->addImpression($id);
	}
}
