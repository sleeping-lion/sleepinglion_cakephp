<?php $this -> Html -> script(array('/ckeditor/ckeditor.js','boards/new.js'), false); ?>
<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'portfolios', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Add Portfolio'), array('controller' => 'portfolios', 'action' => 'add')); ?>
<?php $this -> assign('title', __('Add Portfolio')); ?>
<?php
echo $this -> Form -> create('Portfolio');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('NoticeContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control','id'=>'sl_content'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>