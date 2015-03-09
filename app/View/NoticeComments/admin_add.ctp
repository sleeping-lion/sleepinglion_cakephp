<?php $this->Html->addCrumb(__('Notice Comment'), array('controller' => 'notice_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Notice Comment'), array('controller' => 'notice_comments', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Notice Comment')) ?>
<?php
echo $this->Form->create('NoticeComment');
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('content',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Article'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>