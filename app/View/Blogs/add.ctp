<?php $this -> Html -> script(array('/ckeditor/ckeditor.js','boards/new.js'), false) ?>
<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Blog'), array('controller' => 'blogs', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Blog')); ?>
<?php
echo $this->Form->create('Blog',array('type'=>'file')); 
echo $this->Form->input('blog_category_id',array('type'=>'select','div'=>array('class'=>'form-group'),'class'=>'form-control','selected'=>$blogCategoryId));
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('Tag.tags',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('description',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('BlogContent.content',array('div'=>array('class'=>'form-group'),'class'=>'form-control','id'=>'sl_content'));
echo $this->Form->input('photo', array('type' => 'file','div'=>array('class'=>'form-group')));
echo $this->Form->input('photo_dir', array('type' => 'hidden','div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Article'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>