<?php $this -> Html -> addCrumb(__('Blog Categories'), array('controller' => 'blog_categories', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Edit Blog Category'), array('controller' => 'blog_categories', 'action' => 'edit', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Edit Blog Category')); ?>
<?php
echo $this -> Form -> create('BlogCategory');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>