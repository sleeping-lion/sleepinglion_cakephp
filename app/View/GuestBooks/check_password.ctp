<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Check Password'), array('controller' => 'guest_books', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Check Password')) ?>
<?php echo $this -> Form -> create('GuestBook') ?>
<?php
if(isset($this->request->query['delete'])) {
echo $this -> Form -> input('delete',array('type'=>'hidden','value'=>$this->request->query['delete']));
}
echo $this -> Form -> input('password', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary')); ?>