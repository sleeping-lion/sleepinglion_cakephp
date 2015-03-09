<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Blog'), array('controller' => 'blogs', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Blog')) ?>
<?php
echo $this->Form->create('Blog');
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('BlogContent.content',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Article'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>