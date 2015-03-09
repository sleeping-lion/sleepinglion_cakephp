<?php $this -> Html -> addCrumb(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Gallery Category')) ?>
<?php
echo $this -> Form -> create('GalleryCategory');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>