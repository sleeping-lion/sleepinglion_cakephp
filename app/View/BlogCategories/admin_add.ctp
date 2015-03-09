<?php $this -> Html -> addCrumb(__('Blog Category'), array('controller' => 'blog_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Blog Category'), array('controller' => 'blog_categories', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Blog Category')) ?>
<?php
echo $this -> Form -> create('BlogCategory');
echo $this -> Form -> input('blog_category_id',array('type'=>'select','div'=>array('class'=>'form-group'),'class'=>'form-control','selected'=>$blogCategoryId, 'empty' => '상위 없음'));
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('leaf', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>