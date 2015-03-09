<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Confirm Delete'), array('controller' => 'guest_books', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Confirm Delete')) ?>
<?php echo $this -> Form -> create('GuestBook',array('url'=>array('action'=>'delete',$this->request->params['id']))) ?>
<?php echo __('Are you sure you wish to delete this article?') ?>
<?php echo $this -> Form -> end(array('label' => __('Delete Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-danger')) ?>
<?php echo $this->Html->link(__('Cancel'),array('action'=>'view',$this->request->params['id']),array('class' => 'btn btn-default')) ?>
