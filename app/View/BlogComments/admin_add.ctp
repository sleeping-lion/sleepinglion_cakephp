<?php $this->Html->addCrumb(__('Blog Comment'), array('controller' => 'blog_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Blog Comment'), array('controller' => 'blog_comments', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Blog Comment')) ?>
<?php
echo $this->Form->create('Blog Comment');
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('BlogContent.content',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Article'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>