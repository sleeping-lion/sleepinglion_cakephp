<?php $this->Html->addCrumb(__('Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Guest Book Comment')) ?>
<?php
echo $this->Form->create('GuestBookComment');
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('content',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Comment'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>