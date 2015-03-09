<?php $this -> Html -> script(array('/ckeditor/ckeditor.js','boards/new.js'), false); ?>
<?php $this -> Html -> addCrumb(__('Notice'), array('controller' => 'notices', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Edit Notice'), array('controller' => 'notices', 'action' => 'edit', $this -> request -> data['Notice']['id'])); ?>
<?php $this -> assign('title', __('Edit Notice')); ?>
<?php
echo $this -> Form -> create('Notice');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('NoticeContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control','id'=>'sl_content'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>