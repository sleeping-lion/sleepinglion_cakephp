<?php $this -> Html -> script(array('/ckeditor/ckeditor.js','boards/new.js'), false) ?>
<?php $this -> Html -> addCrumb(__('History'), array('controller' => 'histories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit History'), array('controller' => 'histories', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Edit History')) ?>
<?php
echo $this -> Form -> create('History');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('year', array('type'=>'year','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('month', array('type'=>'month','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('content', array('div' => array('class' => 'form-group'), 'class' => 'form-control','id'=>'sl_content'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>