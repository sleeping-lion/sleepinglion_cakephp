<?php
App::uses('SlController', 'Controller');
/**
 * Faqs Controller
 *
 * @property Faq $Faq
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CkeditorAssetsController extends SlController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> CkeditorAsset -> recursive = 0;
		$this -> set('ckeditorAssets', $this -> Paginator -> paginate());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> CkeditorAsset -> create();
			
			$this -> request -> data['CkeditorAsset']['CKEditorFuncNum']=$this->params->query['CKEditorFuncNum'];
			$this -> request -> data['CkeditorAsset']['data_file_name']=$_FILES['upload'];
			
			//$this -> request -> data['data_file_name']=
			if ($this -> CkeditorAsset -> save($this -> request -> data)) {
			//	$this -> Session -> setFlash(__('The post has been saved.'), 'success');
				$ckeditorAsset=$this->view($this -> CkeditorAsset->getLastInsertID());
				$url='/files/ckeditor_asset/photo/'.$this -> CkeditorAsset->getLastInsertID().'/'.$ckeditorAsset['CkeditorAsset']['data_file_name'];
				echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $this->request->data['CkeditorAsset']['CKEditorFuncNum'] . ',"' . $url . '","' .__('File Uploaded Successfully'). '")</script>';
				exit;
			} else {
				$this -> Session -> setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		}
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> CkeditorAsset -> exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('CkeditorAsset.' . $this -> CkeditorAsset -> primaryKey => $id));
		$ckeditorAsset = $this -> CkeditorAsset -> find('first', $options);
		$this -> set('ckeditorAsset', $ckeditorAsset);
		$this -> set('_serialize', 'ckeditorAsset');
		
		return $ckeditorAsset;
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CkeditorAsset->id = $id;
		if (!$this->CkeditorAsset->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->CkeditorAsset->allowMethod('post', 'delete');
		if ($this->CkeditorAsset->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
