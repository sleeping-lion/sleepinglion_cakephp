<?php $this -> Html -> addCrumb(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'edit', $this -> request -> data['GalleryCategory']['id'])) ?>
<?php $this -> assign('title', __('Edit Gallery Category')) ?>
<?php
echo $this -> Form -> create('GalleryCategory');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>