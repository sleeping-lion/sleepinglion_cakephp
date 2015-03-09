<?php $this -> Html -> addCrumb(__('Blog Categories'), array('controller' => 'blog_categories', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Add Blog Category'), array('controller' => 'blog_categories', 'action' => 'add')); ?>
<?php $this -> assign('title', __('Add Blog Category')); ?>
<?php
echo $this -> Form -> create('BlogCategory');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>